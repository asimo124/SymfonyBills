<?php

namespace App\Service\FoodLog;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query;

class FoodLogService
{
    public function __construct(
        private readonly Connection $connection,
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    /**
     * @return list<array<string, mixed>>
     */
    public function getLogEntries(): array
    {
        return $this->connection->fetchAllAssociative($this->dietlogSqlLogEntries());
    }

    /**
     * Food log rows as entities, ordered by calendar day (newest first), matching legacy SQL semantics.
     */
    public function createFoodLogDqlQuery(): Query
    {
        $query = $this->entityManager->createQuery(
            <<<'DQL'
            SELECT fl
            FROM App\Entity\Legacy\DlFoodLog fl
            
            ORDER BY DATE_FORMAT(fl.dateConsumed, '%Y-%m-%d') DESC
            DQL
        );

        return $query;
    }

    /**
     * Same SELECT as dietlog_sql_log_entries() in BillsSite api/dietlog_inc.php.
     */
    private function dietlogSqlLogEntries(): string
    {
        return "SELECT md.title as meal_of_day
        , fl.id as log_id
        , f.title as food
        , mt.title as macro_type
        , fl.date_consumed
        , f.is_soluble_fiber
        , f.is_cruciferous
        , uom.title as unit_of_measure
        , CONCAT(CAST(fl.amount AS CHAR), ' ', uom.title) as amount
        , CONCAT(CAST(ROUND(
            CASE
                WHEN uom.title = 'cups'        THEN fl.amount * 236.588
                WHEN uom.title = 'ounces'      THEN fl.amount * 28.3495
                WHEN uom.title = 'teaspoons'   THEN fl.amount * 4.92892
                WHEN uom.title = 'tablespoons' THEN fl.amount * 14.7868
                WHEN uom.title = 'grams'       THEN fl.amount
            END
        , 2) AS CHAR), ' g') as amount_grams
        , CONCAT(CAST(ROUND(fl.amount * f.percent_fiber, 2) AS CHAR), ' ', uom.title) as fiber_amount
        , CONCAT(CAST(ROUND(fl.amount * f.percent_fiber * f.percent_soluble_fiber, 2) AS CHAR), ' ', uom.title) as soluble_fiber_amount
        , CONCAT(CAST(ROUND(
            CASE
                WHEN uom.title = 'cups'        THEN fl.amount * f.percent_fiber * 236.588
                WHEN uom.title = 'ounces'      THEN fl.amount * f.percent_fiber * 28.3495
                WHEN uom.title = 'teaspoons'   THEN fl.amount * f.percent_fiber * 4.92892
                WHEN uom.title = 'tablespoons' THEN fl.amount * f.percent_fiber * 14.7868
                WHEN uom.title = 'grams'       THEN fl.amount * f.percent_fiber
            END
        , 2) AS CHAR), ' g') as fiber_amount_grams
        , CONCAT(CAST(ROUND(
            CASE
                WHEN uom.title = 'cups'        THEN fl.amount * f.percent_fiber * f.percent_soluble_fiber * 236.588
                WHEN uom.title = 'ounces'      THEN fl.amount * f.percent_fiber * f.percent_soluble_fiber * 28.3495
                WHEN uom.title = 'teaspoons'   THEN fl.amount * f.percent_fiber * f.percent_soluble_fiber * 4.92892
                WHEN uom.title = 'tablespoons' THEN fl.amount * f.percent_fiber * f.percent_soluble_fiber * 14.7868
                WHEN uom.title = 'grams'       THEN fl.amount * f.percent_fiber * f.percent_soluble_fiber
            END
        , 2) AS CHAR), ' g') as soluble_fiber_amount_grams
        , fl.food_id AS food_id
        , fl.amount AS amount_value
        , fl.meal_of_day_id AS meal_of_day_id
        , DATE(fl.date_consumed) AS date_consumed_date
        FROM dl_food_log fl
        INNER JOIN dl_food f
            ON fl.food_id = f.id
        INNER JOIN dl_macro_type mt
            ON f.macro_type_id = mt.id
        INNER JOIN dl_meal_of_day md
            ON fl.meal_of_day_id = md.id
        INNER JOIN dl_unit_of_measure uom
            ON f.unit_of_measure_id = uom.id
        WHERE 1
        ORDER BY DATE_FORMAT(fl.date_consumed, '%Y-%m-%d') DESC, md.id, mt.id, f.title ";
    }
}
