<?php

namespace App\Controller\Api;

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

        $rows = $this->foodLogService->createFoodLogDqlQuery()->getResult();

        return $this->json($rows);
    }

    private function applyCors(JsonResponse $response): void
    {
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Authorization, Content-Type');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, OPTIONS');
    }
}
