<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->import('../config/{packages}/*.yaml');
        $container->import('../config/{packages}/'.$this->environment.'/*.yaml');

        if (is_file(\dirname(__DIR__).'/config/services.yaml')) {
            $container->import('../config/services.yaml');
            $container->import('../config/{services}_'.$this->environment.'.yaml');
        } elseif (is_file($path = \dirname(__DIR__).'/config/services.php')) {
            (require $path)($container->withPath($path), $this);
        }
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import('../config/{routes}/'.$this->environment.'/*.yaml');
        $routes->import('../config/{routes}/*.yaml');

        if (is_file(\dirname(__DIR__).'/config/routes.yaml')) {
            $routes->import('../config/routes.yaml');
        } elseif (is_file($path = \dirname(__DIR__).'/config/routes.php')) {
            (require $path)($routes->withPath($path), $this);
        }
        $routes->add('game_api', '/game/api')->controller([$this, 'apiGame']);
    }

    public function apiGame(): JsonResponse
    {
        $losers = [
            780, 853, 376, 776, 567, 19, 113, 885, 623, 152, 470, 154, 83, 846, 575, 811, 971, 29, 881, 715, 876, 372,
            35, 937, 109, 503, 511, 432, 904, 564, 298, 431, 938, 379, 473, 193, 720, 584, 362, 708, 704, 69, 442, 828,
            249, 258, 606, 730, 617, 891, 916, 41, 96, 355, 31, 763, 485, 756, 433, 313, 9, 224, 263, 8, 472, 420, 901,
            752, 246, 165, 956, 375, 306, 308, 252, 383, 604, 218, 890, 559, 292, 468, 13, 721, 925, 669, 253, 571, 466,
            836, 287, 374, 62, 51, 424, 759, 447, 361, 26, 461
        ];

        $winners = [];

        $i = 1;
        do {
            $i++;
            foreach ($losers as $loser) {
                if ($i === $loser) {
                    continue;
                }
                foreach ($winners as $winner) {
                    if ($i === $winner) {
                        $skippedItem = $i;
                        continue;
                    }
                }
                if (!isset($skippedItem) || $skippedItem !== $i) {
                    $winners[] = $i;
                }
            }
        } while (count($winners) < 200);

        return new JsonResponse(['winners' => $winners]);
    }
}
