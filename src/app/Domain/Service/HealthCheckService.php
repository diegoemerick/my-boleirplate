<?php

namespace App\Domain\Service;

use Domain\Model\healthCheck;

class HealthCheckService
{
    /**
     * This function get uptime of server and status
     * for route healthcheck
     */
    public function getStatusServer()
    {
        $str   = @file_get_contents('/proc/uptime');
        $num   = floatval($str);
        $secs  = fmod($num, 60); $num = (int)($num / 60);
        $mins  = $num % 60;      $num = (int)($num / 60);
        $hours = $num % 24;      $num = (int)($num / 24);
        $days  = $num;

        $result = sprintf("uptime: %s days - %s:%s:%s", $days, $hours, $mins, $secs);

        $healthCheck = new healthCheck();
        return $healthCheck->buildHealth($healthCheck::AVAILABLE, $result);
    }
}