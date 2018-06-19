<?php

namespace Tests\Domain\Model;

use PHPUnit\Framework\TestCase;
use Gcpf\Domain\Model\HealthCheck;

class HealthCheckTest extends TestCase
{
    public function testInstanceHealthCheck(): void
    {
        $healthcheck = new HealthCheck();
        $this->assertInstanceOf(HealthCheck::class, $healthcheck);
    }
}