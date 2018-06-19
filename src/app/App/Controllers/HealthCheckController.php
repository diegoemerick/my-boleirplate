<?php

namespace Gcpf\App\Controllers;

use App\Domain\Factory\HealthCheckFactory;
use App\Domain\Service\HealthCheckService;

/**
 * Class HealthCheckController
 * @package App\Controllers
 */
class HealthCheckController
{
    public function getStatusServer()
    {
        try {
            $healthCheckService = new HealthCheckService();
            $factoryHealth = new HealthCheckFactory();

            echo $factoryHealth->buildResponseHealthCheck(
                $healthCheckService->getStatusServer()
            );
        } catch (\Exception $exception) {
            return 'Failed get uptime server';
        }
    }
}