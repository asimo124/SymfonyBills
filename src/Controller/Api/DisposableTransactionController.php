<?php

namespace App\Controller\Api;

use DateTimeImmutable;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DisposableTransactionController extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    #[Route('/api/loadDisposableTransactionsChartData', name: 'api_disposable_transactions_chart_data', methods: ['GET', 'OPTIONS'])]
    public function index(Request $request): JsonResponse
    {
        if ($request->isMethod(Request::METHOD_OPTIONS)) {
            $response = new JsonResponse(null, Response::HTTP_NO_CONTENT);
            $this->applyCors($response);

            return $response;
        }

        $connection = $this->entityManager->getConnection();

        $paycheckDate = trim((string) $request->query->get('paycheck_date', ''));
        $cumulative = (int) $request->query->get('cumulative', 0);

        $paycheckDate = new DateTimeImmutable($paycheckDate);
        $paycheck3MonthsAgo = $paycheckDate->modify('-3 months');
        $payCheckDay = (int) $paycheckDate->format('d');
        if ($payCheckDay < 15) {
            $paycheck3MonthsAgo = $paycheck3MonthsAgo->format('Y-m-01');
        } else {
            $paycheck3MonthsAgo = $paycheck3MonthsAgo->format('Y-m-15');
        }
       
        $query = null;
        if ($cumulative === 0) {
            $query = $this->entityManager->createQuery(<<<'DQL'
                SELECT
                    t.transactionDate,
                    SUM(t.amount) AS spent,
                    SUM(t.amount) AS accumulated_spent
                FROM App\Entity\Legacy\DtTransaction t
                WHERE t.isCovered = 0
                AND t.amount > 0
                AND t.paycheckDate = :paycheckDate
                GROUP BY t.transactionDate
                ORDER BY t.transactionDate
                DQL);
        } else {
            $query = $this->entityManager->createQuery(<<<'DQL'
                SELECT
                    t.transactionDate,
                    SUM(t.amount) AS spent,
                    0 AS accumulated_spent
                FROM App\Entity\Legacy\DtTransaction t
                WHERE t.isCovered = 0
                AND t.amount > 0
                AND t.paycheckDate = :paycheckDate
                GROUP BY t.transactionDate
                ORDER BY t.transactionDate
                DQL);
        }

        $query->setParameter(':paycheckDate', $paycheckDate->format('Y-m-d'));

        $results = $query->getResult();

        /** @var list<array<string, mixed>> $results */
        //$results = $this->connection->fetchAllAssociative($sql, [$paycheckDate]);

        $sqlRecent = <<<'SQL'
            SELECT
                t.paycheck_date,
                t.transaction_date,
                SUM(t.amount) AS spent
            FROM dt_transaction t
            WHERE 1
            AND t.is_covered = 0
            AND t.amount > 0
            AND t.paycheck_date >= ?
            GROUP BY t.paycheck_date, t.transaction_date
            ORDER BY t.transaction_date
            SQL;

        /** @var list<array<string, mixed>> $recentResults */
        $recentResults = $connection->fetchAllAssociative($sqlRecent, [$paycheck3MonthsAgo]);

        $highestRecentAmount = 0.0;
        $recentResultsArr = [];
        foreach ($recentResults as $row) {
            $pd = (string) $row['paycheck_date'];
            if (!isset($recentResultsArr[$pd])) {
                $recentResultsArr[$pd] = [];
            }
            $recentResultsArr[$pd][] = $row;
        }

        foreach ($recentResultsArr as $rows) {
            $totalForPaycheck = 0.0;
            foreach ($rows as $row) {
                $totalForPaycheck += (float) $row['spent'];
            }
            if ($totalForPaycheck > $highestRecentAmount) {
                $highestRecentAmount = $totalForPaycheck;
            }
        }

        $maxY = (int) ($highestRecentAmount * 0.25);

        foreach ($results as $idx => $row) {
            $transactionDay = $row['transactionDate']->format('j');
            $transactionDayLabel = $this->addOrdinalSuffix($transactionDay);
            $transactionWeekDay = $row['transactionDate']->format('D');
            $results[$idx]['transaction_day'] = $transactionWeekDay . ', ' . $transactionDayLabel;
        }

        $chartOptions = [
            'chart' => [
                'type' => 'bar',
            ],
            'xaxis' => [
                'categories' => array_column($results, 'transaction_day'),
            ],
        ];

        $series = [
            [
                'name' => 'Spent',
                'data' => array_map(
                    static fn (array $row): float => (float) $row['accumulated_spent'],
                    $results
                ),
            ],
        ];

        $payload = [
            'maxY' => $maxY,
            'chartOptions' => $chartOptions,
            'series' => $series,
        ];

        $response = new JsonResponse($payload);
        $response->setEncodingOptions(JSON_PRETTY_PRINT | JsonResponse::DEFAULT_ENCODING_OPTIONS);
        $this->applyCors($response);

        return $response;
    }

    private function addOrdinalSuffix(int $day): string
    {
        if (!\in_array($day % 100, [11, 12, 13], true)) {
            return match ($day % 10) {
                1 => $day . 'st',
                2 => $day . 'nd',
                3 => $day . 'rd',
                default => $day . 'th',
            };
        }

        return $day . 'th';
    }

    private function applyCors(JsonResponse $response): void
    {
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Authorization, Content-Type');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, OPTIONS');
    }
}
