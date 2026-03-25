<?php

namespace App\Controller\Api;

use App\Entity\Legacy\DlFood;
use App\Entity\Legacy\DlFoodLog;
use App\Entity\Legacy\DlMacroType;
use App\Entity\Legacy\DlMealOfDay;
use App\Entity\Legacy\DlType;
use App\Entity\Legacy\DlUnitOfMeasure;
use App\Service\FoodLog\FoodLogService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FoodLogController extends AbstractController
{
    public function __construct(private readonly FoodLogService $foodLogService)
    {
    }

    #[Route('/api/food-log', name: 'api_food_log_index', methods: ['GET', 'OPTIONS'])]
    public function index(Request $request): JsonResponse
    {
        if ($request->isMethod(Request::METHOD_OPTIONS)) {
            $response = new JsonResponse(null, Response::HTTP_NO_CONTENT);
            $this->applyCors($response);

            return $response;
        }

        /** @var list<DlFoodLog> $rows */
        $rows = $this->foodLogService->createFoodLogDqlQuery()->getResult();
        $payload = array_map(fn (DlFoodLog $log) => $this->serializeFoodLog($log), $rows);

        $response = new JsonResponse($payload);
        $this->applyCors($response);

        return $response;
    }

    /**
     * @return array<string, mixed>
     */
    private function serializeFoodLog(DlFoodLog $log): array
    {
        return [
            'id' => $log->getId(),
            'amount' => $log->getAmount(),
            'amount_title' => $log->getAmountTitle(),
            'date_consumed' => $log->getDateConsumed()->format('Y-m-d\TH:i:sP'),
            'food' => $this->serializeFood($log->getFood()),
            'meal_of_day' => $this->serializeMealOfDay($log->getMealOfDay()),
        ];
    }

    /**
     * @return array<string, mixed>|null
     */
    private function serializeFood(?DlFood $food): ?array
    {
        if ($food === null) {
            return null;
        }

        return [
            'id' => $food->getId(),
            'title' => $food->getTitle(),
            'type_id' => $food->getTypeId(),
            'has_fiber' => $food->getHasFiber(),
            'percent_fiber' => $food->getPercentFiber(),
            'percent_soluble_fiber' => $food->getPercentSolubleFiber(),
            'is_soluble_fiber' => $food->getIsSolubleFiber(),
            'is_cruciferous' => $food->getIsCruciferous(),
            'default_amount' => $food->getDefaultAmount(),
            'macro_type' => $this->serializeMacroType($food->getMacroType()),
            'unit_of_measure' => $this->serializeUnitOfMeasure($food->getUnitOfMeasure()),
            'type' => $this->serializeDlType($food->getType()),
        ];
    }

    /**
     * @return array<string, mixed>|null
     */
    private function serializeMealOfDay(?DlMealOfDay $meal): ?array
    {
        if ($meal === null) {
            return null;
        }

        return [
            'id' => $meal->getId(),
            'title' => $meal->getTitle(),
        ];
    }

    /**
     * @return array<string, mixed>|null
     */
    private function serializeMacroType(?DlMacroType $macroType): ?array
    {
        if ($macroType === null) {
            return null;
        }

        return [
            'id' => $macroType->getId(),
            'title' => $macroType->getTitle(),
        ];
    }

    /**
     * @return array<string, mixed>|null
     */
    private function serializeUnitOfMeasure(?DlUnitOfMeasure $unit): ?array
    {
        if ($unit === null) {
            return null;
        }

        return [
            'id' => $unit->getId(),
            'title' => $unit->getTitle(),
        ];
    }

    /**
     * @return array<string, mixed>|null
     */
    private function serializeDlType(?DlType $type): ?array
    {
        if ($type === null) {
            return null;
        }

        return [
            'id' => $type->getId(),
            'title' => $type->getTitle(),
        ];
    }

    private function applyCors(JsonResponse $response): void
    {
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Authorization, Content-Type');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, OPTIONS');
    }
}
