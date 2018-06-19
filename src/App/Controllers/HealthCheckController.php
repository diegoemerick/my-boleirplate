<?php

namespace Gcpf\App\Controllers;

use Gcpf\Domain\Factory\HealthCheckFactory;
use Gcpf\Domain\Service\HealthCheckService;

/**
 * Class HealthCheckController
 * @package 2\Controllers
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