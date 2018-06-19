<?php

namespace Gcpf\Domain\Model;

class HealthCheck
{
    public const AVAILABLE = 'available';
    private $status;
    private $uptime;

    /**
     * @param $status
     * @param $uptime
     * @return healthCheck
     */
    public function buildHealth($status, $uptime) : healthCheck
    {
        $health = new healthCheck();
        $health->setStatus($status);
        $health->setUptime($uptime);

        return $health;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getUptime()
    {
        return $this->uptime;
    }

    /**
     * @param mixed $uptime
     */
    public function setUptime($uptime)
    {
        $this->uptime = $uptime;
    }

}