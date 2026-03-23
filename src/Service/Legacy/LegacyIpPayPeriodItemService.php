<?php

namespace App\Service\Legacy;

use Doctrine\DBAL\Connection;

class LegacyIpPayPeriodItemService
{
    public function __construct(private readonly Connection $connection)
    {
    }

    public function insertPayPeriodItem(string $payPeriodDate, float $disposableAmount): void
    {
        $payPeriod = $this->connection->fetchAssociative(
            'SELECT id FROM ip_pay_period WHERE pay_period_date = :pay_period_date LIMIT 1',
            ['pay_period_date' => $payPeriodDate]
        );

        if (!$payPeriod) {
            return;
        }

        $existing = $this->connection->fetchAssociative(
            'SELECT id FROM ip_pay_period_item WHERE pay_period_id = :pay_period_id LIMIT 1',
            ['pay_period_id' => $payPeriod['id']]
        );

        if ($existing) {
            return;
        }

        $this->connection->insert('ip_pay_period_item', [
            'pay_period_id' => $payPeriod['id'],
            'disposable_amount' => $disposableAmount,
            'remaining_amount' => $disposableAmount,
        ]);
    }
}
