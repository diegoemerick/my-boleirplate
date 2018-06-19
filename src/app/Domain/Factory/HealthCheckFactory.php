<?php

namespace App\Domain\Factory;

use App\Domain\Model\healthCheck;

class healthCheckFactory
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