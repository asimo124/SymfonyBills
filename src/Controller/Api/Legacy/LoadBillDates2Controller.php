<?php

namespace App\Controller\Api\Legacy;

use App\Service\Legacy\LegacyBillDateHelperService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class LoadBillDates2Controller extends AbstractController
{
    public function __construct(private readonly LegacyBillDateHelperService $helperService)
    {
    }

    #[Route('/api/legacy/loadBillDates2', name: 'api_legacy_load_bill_dates2', methods: ['GET'])]
    public function __invoke(Request $request): JsonResponse
    {
        $userId = (int) $request->query->get('user_id', 0);
        $currentBalance = (float) $request->query->get('current_balance', 0);
        $payDate = trim((string) $request->query->get('pay_date', ''));
        $prevDate = (int) $request->query->get('prev_date', 0);
        $nextDate = (int) $request->query->get('next_date', 0);
        $disposablePerDay = (float) $request->query->get('disposable_per_day', 40);
        $days15 = (int) $request->query->get('days15', 0) === 1;
        $insertPayPeriodItem = (int) $request->query->get('insert_pay_period_item', 0) === 1;

        $result = $this->helperService->loadBillDates(
            $request,
            $userId,
            $currentBalance,
            $payDate,
            $prevDate,
            $nextDate,
            $disposablePerDay,
            $days15,
            $insertPayPeriodItem
        );

        $response = $this->json($result);
        $response->headers->set('Access-Control-Allow-Origin', '*');

        return $response;
    }
}
