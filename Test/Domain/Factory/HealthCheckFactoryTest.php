<?php
/**
 * Created by PhpStorm.
 * User: diegoemerick
 * Date: 6/19/18
 * Time: 5:39 PM
 */

namespace Test\Domain\Factory;

use Gcpf\Domain\Factory\HealthCheckFactory;
use Gcpf\Domain\Model\HealthCheck;
use PHPUnit\Framework\TestCase;

class HealthCheckFactoryTest extends TestCase
{
    public function testbuildResponseHealthCheck()
    {
        $factory = new HealthCheckFactory();
        $healthCheck = new HealthCheck();
        $healthCheck->setStatus('available');
        $healthCheck->setUptime('uptime: 1 days - 3:59:51.509999999995');

        $response = $factory->buildResponseHealthCheck($healthCheck);

        $this->assertEquals($response, $this->buildHealthCheckMock());
    }

    private function buildHealthCheckMock()
    {
        $response = [
            'status' => 'available',
            'uptime' => 'uptime: 1 days - 3:59:51.509999999995'
        ];

        return json_encode($response);
    }

}