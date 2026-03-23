<?php

namespace App\Service\Legacy;

use DateTime;
use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\Request;

class LegacyBillDateHelperService
{
    private float $currentBalance = 0.0;
    private float $disposablePerDay = 40.0;
    private bool $days15 = false;
    private float $paycheckDisposableAmount = 0.0;
    /** @var array<string, mixed> */
    private array $results = [];

    public function __construct(
        private readonly Connection $connection,
        private readonly LegacyBillsService $legacyBillsService,
        private readonly LegacyIpPayPeriodItemService $payPeriodItemService,
        private readonly string $legacySalt1 = '',
        private readonly string $legacySalt2 = ''
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function loadBillDates(
        Request $request,
        int $userId,
        float $currentBalance,
        string $payDate,
        int $prevDate,
        int $nextDate,
        float $disposablePerDay = 40,
        bool $days15 = false,
        bool $insertPayPeriodItem = false
    ): array {
        $this->currentBalance = $currentBalance;
        $this->disposablePerDay = $disposablePerDay > 0 ? $disposablePerDay : 40;
        $this->days15 = $days15;

        if ($payDate === '') {
            $payDate = date('Y-m-d');
        }

        if ($prevDate || $nextDate) {
            $payDate = $this->getAdjustedPayDate($payDate, $prevDate === 1);
        }

        $payDateDay = (int) date('d', strtotime($payDate));
        $paycheckDate = $payDateDay < 15
            ? date('Y-m-01', strtotime($payDate))
            : date('Y-m-15', strtotime($payDate));

        $paycheckDisposable = $this->connection->fetchAssociative(
            'SELECT disposable_amount FROM dt_paycheck_disposable WHERE paycheck_date = :paycheck_date LIMIT 1',
            ['paycheck_date' => $paycheckDate]
        );
        $this->paycheckDisposableAmount = $paycheckDisposable ? (float) $paycheckDisposable['disposable_amount'] : 0.0;

        if (!$currentBalance) {
            $settings = $this->connection->fetchAssociative(
                'SELECT vnd_current_balance FROM vnd_user_settings WHERE vnd_user_id = :vnd_user_id LIMIT 1',
                ['vnd_user_id' => $userId]
            );
            $currentBalance = $settings ? (float) $settings['vnd_current_balance'] : 960;
        } else {
            $token = (string) $request->query->get('hash_key_token_cs', '');
            $computed = $this->computeHashKey($request);
            if ($token !== '' && $token === $computed && $this->validateTags((string) $currentBalance)) {
                $this->connection->update(
                    'vnd_user_settings',
                    ['vnd_current_balance' => $currentBalance],
                    ['vnd_user_id' => $userId]
                );
            }
        }

        $startDate = date('Y-m-d', strtotime($payDate));
        $endDate = ((int) date('d', strtotime($startDate)) < 15)
            ? date('Y-m-14', strtotime($startDate))
            : date('Y-m-d', strtotime(date('Y-m-t', strtotime($startDate)) . ' -1 day'));

        $usePayPeriodDate = ((int) date('d', strtotime($endDate)) === 14)
            ? date('Y-m-01', strtotime($endDate))
            : date('Y-m-15', strtotime($endDate));

        $payPeriodResult = $this->connection->fetchAssociative(
            'SELECT id FROM ip_pay_period WHERE pay_period_date = :pay_period_date LIMIT 1',
            ['pay_period_date' => $usePayPeriodDate]
        );
        $payPeriodId = $payPeriodResult ? (int) $payPeriodResult['id'] : null;

        $this->legacyBillsService->setPayPeriod($endDate, $startDate);
        $billDates = $this->legacyBillsService->loadBillDatesByUserId($userId);

        $myBills = [];
        foreach ($billDates as $row) {
            $amount = $this->formatFloat((float) $row['vnd_amount']);
            $passed = $this->connection->fetchAssociative(
                'SELECT multiplier FROM vnd_pay_period_bill_date_passed WHERE bill_date = :bill_date AND amount = :amount AND title = :title LIMIT 1',
                [
                    'bill_date' => $row['vnd_date'],
                    'amount' => $amount,
                    'title' => $row['vnd_bill_desc'],
                ]
            );

            if ($passed) {
                $amount = $this->formatFloat($amount * (float) $passed['multiplier']);
            }

            $normalizedDate = date('Y-m-d 00:00:00', strtotime((string) $row['vnd_date']));
            $key = strtotime($normalizedDate);
            if ((int) date('d', strtotime((string) $row['vnd_date'])) === 28) {
                $key = strtotime(date('Y-m-t 00:00:00', strtotime((string) $row['vnd_date']))) - 86400;
            }

            $myBills[$key][] = [
                'bill_date_id' => $row['vnd_id'] ?? null,
                'is_enabled' => (int) ($row['is_enabled'] ?? 1),
                'desc' => $row['vnd_bill_desc'],
                'amount' => $amount,
                'is_heavy' => (int) round((float) ($row['is_heavy'] ?? 0)),
                'vnd_frequency' => $row['vnd_frequency'] ?? '',
                'vnd_frequency_type' => $row['vnd_frequency_type'] ?? '',
                'can_be_multiplied_by' => $row['can_be_multiplied_by'] ?? 1,
                'multiplier' => $row['multiplier'] ?? 1,
                'date' => $normalizedDate,
            ];
        }

        $daysArr = [];
        $fullCurAmount = $currentBalance;
        $dayIndex = 10000;
        $padIndex = 1000;
        $timestamp = strtotime($startDate);
        $startWeekDay = (int) date('w', $timestamp);

        if ($startWeekDay > 0) {
            for ($p = 0; $p < $startWeekDay; $p++) {
                $daysArr[] = [
                    'index' => $padIndex,
                    'index2' => $padIndex,
                    'showAsDay' => false,
                    'weekDayNum' => $p,
                    'Day' => '',
                    'Timestamp' => 0,
                    'Date' => '',
                    'desc' => [],
                ];
                $padIndex++;
            }
        }

        while ($timestamp <= strtotime($endDate)) {
            $day = (int) date('w', $timestamp);
            $billsDescArr = [];
            foreach ($myBills[$timestamp] ?? [] as $bill) {
                $billsDescArr[] = [
                    'bill_date_id' => $bill['bill_date_id'],
                    'pay_period_id' => $payPeriodId,
                    'title' => $bill['desc'].' - $'.$bill['amount'],
                    'desc' => $bill['desc'],
                    'amount' => $bill['is_enabled'] ? $bill['amount'] : 0,
                    'savedAmount' => $bill['amount'],
                    'isEnabled' => $bill['is_enabled'],
                    'is_heavy' => $bill['is_heavy'],
                    'vnd_frequency' => $bill['vnd_frequency'],
                    'vnd_frequency_type' => $bill['vnd_frequency_type'],
                    'can_be_multiplied_by' => $bill['can_be_multiplied_by'],
                    'multiplier' => $bill['multiplier'],
                    'date' => $bill['date'],
                ];
                $fullCurAmount -= (float) $bill['amount'];
            }

            $daysArr[] = [
                'index' => $dayIndex,
                'index2' => $dayIndex,
                'showAsDay' => true,
                'weekDayNum' => (string) $day,
                'Day' => $this->dayName($day).', '.$this->getDaySuffix((int) date('d', $timestamp)),
                'Timestamp' => $timestamp,
                'Date' => date('m/d/Y 00:00:00', $timestamp),
                'desc' => $billsDescArr,
                'Balance' => $this->formatFloat($fullCurAmount),
            ];
            $dayIndex++;
            $timestamp = strtotime('+1 day', $timestamp);
        }

        $daysWeeksArr = [];
        $weekIndex = 0;
        $chunk = [];
        foreach ($daysArr as $index => $dayData) {
            $chunk[] = $dayData;
            if (count($chunk) === 7 || $index === count($daysArr) - 1) {
                $daysWeeksArr[] = [
                    'index' => $weekIndex,
                    'index2' => $weekIndex,
                    'title' => 'Week'.$weekIndex,
                    'days' => $chunk,
                ];
                $chunk = [];
                $weekIndex++;
            }
        }

        $numDays9 = $this->resolvePayPeriodDays($payDate);
        $countDaysAdd = $this->computeCountDaysAdd($payDate, $prevDate, $nextDate);

        $this->results = [
            'count_days_add' => $countDaysAdd,
            'results' => $daysWeeksArr,
            'hash_key' => $this->computeHashKey($request),
            'cur_balance' => $this->formatFloat($currentBalance),
            'pay_date' => date('m/d/Y 12:00:00 A', strtotime($payDate)),
            'num_days_pay_period' => $numDays9,
            'remaining_balance' => $this->formatFloat($fullCurAmount),
        ];

        $totalDisposable = $this->formatFloat($this->calculateDisposable());
        $this->results['total_disposable'] = $totalDisposable;
        $this->results['paycheck_disposable_amount'] = $this->paycheckDisposableAmount;

        if ($insertPayPeriodItem) {
            $this->payPeriodItemService->insertPayPeriodItem($payDate, $totalDisposable);
        }

        return $this->results;
    }

    private function resolvePayPeriodDays(string $payDate): int
    {
        $month = (int) date('m', strtotime($payDate));
        $day = (int) date('d', strtotime($payDate));
        $payPeriodNum = $day < 15 ? 1 : 2;

        $row = $this->connection->fetchAssociative(
            'SELECT num_days FROM vnd_pay_period_days WHERE month_num = :month_num AND pay_period_num = :pay_period_num LIMIT 1',
            ['month_num' => $month, 'pay_period_num' => $payPeriodNum]
        );

        return $row ? (int) $row['num_days'] : 1;
    }

    private function getAdjustedPayDate(string $payDate, bool $isPrev): string
    {
        $year = (int) date('Y', strtotime($payDate));
        $month = (int) date('m', strtotime($payDate));
        $day = (int) date('d', strtotime($payDate));

        if ($isPrev) {
            if ($day < 15) {
                $day = 15;
                if ($month > 1) {
                    $month--;
                } else {
                    $month = 12;
                    $year--;
                }
            } else {
                $day = 1;
            }
        } else {
            if ($day < 15) {
                $day = 15;
            } else {
                $day = 1;
                if ($month < 12) {
                    $month++;
                } else {
                    $month = 1;
                    $year++;
                }
            }
        }

        return sprintf('%d-%d-%d', $year, $month, $day);
    }

    private function computeCountDaysAdd(string $payDate, int $prevDate, int $nextDate): int
    {
        if (!$prevDate && !$nextDate) {
            return 0;
        }

        $dayOfMonthPay = (int) date('d', strtotime($payDate));
        $payDateTime = strtotime($payDate);

        $countDaysAdd = ($nextDate || $dayOfMonthPay < 15) ? 0 : -1;
        if (!$nextDate && $dayOfMonthPay < 15) {
            $countDaysAdd = -1;
        }

        $u = 0;
        while (true) {
            $retVal = $this->isWeekendOrHoliday($payDateTime);
            if (!$retVal && $countDaysAdd >= 0) {
                break;
            }

            $payDateTime = strtotime('-1 day', $payDateTime);
            $countDaysAdd++;
            $retVal = $this->isWeekendOrHoliday($payDateTime);
            if (!$retVal) {
                break;
            }
            if ($u > 50) {
                break;
            }
            $u++;
        }

        return $countDaysAdd;
    }

    private function calculateDisposable(): float
    {
        $startingBalance = $this->currentBalance;
        $daysCount = 0;

        foreach ($this->results['results'] as $week) {
            foreach ($week['days'] as $day) {
                foreach ($day['desc'] as $expense) {
                    $startingBalance -= (float) $expense['amount'];
                }
                if (!$this->days15 && !empty($day['showAsDay'])) {
                    $daysCount++;
                }
            }
        }

        if ($this->days15) {
            $daysCount = 15;
        }

        return $startingBalance - ($this->disposablePerDay * $daysCount);
    }

    private function computeHashKey(Request $request): string
    {
        $ip = $request->getClientIp() ?? '';
        $userAgent = $request->headers->get('User-Agent', '');
        $ipArr = explode('.', $ip);
        $uaArr = preg_split('/\s+/', trim($userAgent)) ?: [];

        $ip1 = $ipArr[1] ?? '';
        $ip3 = $ipArr[3] ?? '';
        $ua0 = $uaArr[0] ?? '';
        $ua2 = $uaArr[2] ?? '';

        return md5($ip1.$this->legacySalt2.$ua2.$this->legacySalt1.$ip3.$ua0);
    }

    private function validateTags(string $str): bool
    {
        $bad = ['<', '>', '&gt;', '&lt;', '<script'];
        foreach ($bad as $needle) {
            if (str_contains($str, $needle)) {
                return false;
            }
        }

        return true;
    }

    private function formatFloat(float $num): float
    {
        return round($num, 2);
    }

    private function dayName(int $w): string
    {
        return match ($w) {
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            default => 'Saturday',
        };
    }

    private function isWeekendOrHoliday(int $timestamp): bool
    {
        $date = new DateTime();
        $date->setTimestamp($timestamp);
        $dayOfWeek = (int) $date->format('w');
        if ($dayOfWeek === 0 || $dayOfWeek === 6) {
            return true;
        }

        $year = (int) $date->format('Y');
        $month = (int) $date->format('n');
        $day = (int) $date->format('j');

        if ($month === 9) {
            $firstMonday = new DateTime("first monday of september $year");
            if ($day === (int) $firstMonday->format('j')) {
                return true;
            }
        }

        if ($month === 5) {
            $lastMonday = new DateTime("last monday of may $year");
            if ($day === (int) $lastMonday->format('j')) {
                return true;
            }
        }

        return false;
    }

    private function getDaySuffix(int $num): string
    {
        $mod100 = $num % 100;
        if ($mod100 >= 11 && $mod100 <= 13) {
            return $num.'th';
        }

        return match ($num % 10) {
            1 => $num.'st',
            2 => $num.'nd',
            3 => $num.'rd',
            default => $num.'th',
        };
    }
}
