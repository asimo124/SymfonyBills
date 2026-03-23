<?php

namespace App\Service\Legacy;

use Doctrine\DBAL\Connection;

class LegacyBillsService
{
    private string $today = '';
    private string $nextPayDay = '';

    public function __construct(private readonly Connection $connection)
    {
    }

    public function setPayPeriod(string $nextPayDay = '', string $today = ''): void
    {
        if ($today === '') {
            $today = date('Y-m-d H:i:s');
        }

        $startDay = (int) date('d', strtotime($today));
        if ($startDay < 15) {
            $nextPayDay = date('Y-m-14', strtotime($today));
        } else {
            $nextPayDay = date('Y-m-t', strtotime($today));
        }

        $this->today = date('Y-m-d', strtotime($today));
        $this->nextPayDay = date('Y-m-d', strtotime($nextPayDay));
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function loadBillDatesByUserId(int $userId): array
    {
        $sql = <<<'SQL'
SELECT
    bd.vnd_id,
    bd.vnd_bill_desc,
    bd.vnd_amount,
    bd.vnd_date,
    bd.vnd_user_id,
    bd.vnd_is_auto,
    bd.vnd_is_future,
    bd.is_heavy,
    bd.vnd_frequency,
    bd.vnd_frequency_type,
    bd.can_be_multiplied_by,
    CASE WHEN pb.is_enabled IS NULL THEN 1 ELSE pb.is_enabled END AS is_enabled,
    CASE WHEN pb.multiplier IS NULL THEN 1 ELSE pb.multiplier END AS multiplier
FROM vnd_bill_dates bd
LEFT JOIN vnd_pay_period_bill_date_passed pb
    ON bd.vnd_date = pb.bill_date
    AND bd.vnd_amount = pb.amount
    AND bd.vnd_bill_desc = pb.title
WHERE bd.vnd_user_id = :user_id
  AND bd.vnd_date BETWEEN :start_date AND :end_date
GROUP BY bd.vnd_id
ORDER BY bd.vnd_date, bd.vnd_bill_desc
SQL;

        return $this->connection->fetchAllAssociative($sql, [
            'user_id' => $userId,
            'start_date' => $this->today,
            'end_date' => $this->nextPayDay,
        ]);
    }
}
