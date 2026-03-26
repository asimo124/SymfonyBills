<?php

namespace App\Controller\Api;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BudgetDiscrepancyController extends AbstractController
{
    private const AMOUNT_MAX_DIFF = 2;

    private const DAYS_MAX_DIFF = 4;

    private const TITLE_MAX_CHARS = 21;

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    #[Route('/api/loadBudgetDiscrepancies', name: 'api_budget_discrepancies', methods: ['GET', 'OPTIONS'])]
    public function __invoke(Request $request): JsonResponse
    {
        if ($request->isMethod(Request::METHOD_OPTIONS)) {
            $response = new JsonResponse(null, Response::HTTP_NO_CONTENT);
            $this->applyCors($response);

            return $response;
        }

        $connection = $this->entityManager->getConnection();

        $query = $this->entityManager->createQuery(<<<'DQL'
            SELECT tm
            FROM App\Entity\Legacy\AeTitleMatch tm
            INNER JOIN tm.rocketMoneyItem rmi
            INNER JOIN tm.expensesApp b
            ORDER BY rmi.name, b.vndBill
            DQL);

        $results = $query->getResult();

        $response = new JsonResponse(['items' => $results]);
        $response->setEncodingOptions(JSON_PRETTY_PRINT | JsonResponse::DEFAULT_ENCODING_OPTIONS);
        $this->applyCors($response);

        return $response;
    }

    private function applyCors(JsonResponse $response): void
    {
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Authorization, Content-Type');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, OPTIONS');
    }
}
