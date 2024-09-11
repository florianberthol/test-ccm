<?php

namespace App\Controller;

use Random\RandomException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class ApiGameController extends AbstractController
{
    public function __invoke():Response
    {
        $losers = [
            2, 56, 345, 674, 234, 764, 543, 123, 324, 9, 78, 12, 94, 12, 50, 5, 13
        ];

        $winners = [];

        do {
            try {
                $value = random_int(1, 1000);
            } catch (RandomException $exception) {
                echo $exception->getMessage();
            }
            if (!in_array($value, $losers) && !in_array($value, $winners)) {
                $winners[] = $value;
            }
        } while(count($winners ) <  20);

        return new JsonResponse(['winners' => $winners]);
    }
}
