<?php

namespace Gcpf\Domain\Factory;

use Gcpf\Domain\Model\HealthCheck;

class HealthCheckFactory
{
    /**
     * @param healthCheck $healthCheck
     * @return string
     *
     */
    public function buildResponseHealthCheck(healthCheck $healthCheck)
    {
        $response = [
            'status' => $healthCheck->getStatus(),
            'uptime' => $healthCheck->getUptime()
        ];

        return json_encode($response);
    }
}