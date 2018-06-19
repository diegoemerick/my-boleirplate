<?php

namespace Tests\Domain\Service;

use Gcpf\Domain\Factory\CpfFactory;
use Gcpf\Domain\Model\Cpf;
use Gcpf\Domain\Service\CpfService;
use PHPUnit\Framework\TestCase;

class CpfServiceTest extends TestCase
{
    public function testGetCpf()
    {
        $mock = $this->cpfServiceMock();
        $this->assertNotEmpty($mock);
    }

    public function testStoreCpf()
    {
        $number = "10309003610";
        $cpfService = new CpfService();
        $response = $cpfService->storeCpf($number);

        $this->assertInstanceOf(Cpf::class, $response);
        $this->assertEquals($number, $response->getNumber());
        $this->assertEquals(false, $response->getBlock());
    }

    public function testStoreBlackList()
    {
        $cpfService = new CpfService();
        $response = $cpfService->storeBlackListCpf("10309003610");

        $this->assertEquals($response->getBlock(), true);
        $this->assertInstanceOf(Cpf::class, $response);
    }

    public function testRemoveBlackList()
    {
        $cpfService = new CpfService();
        $response = $cpfService->removeBlackListCpf("10309003610");

        $this->assertEquals($response->getBlock(), false);
        $this->assertInstanceOf(Cpf::class, $response);
    }

    private function cpfServiceMock()
    {
        $mock = $this->getMockBuilder(CpfService::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mock->method('getCpf')
            ->willReturn($this->cpfFactoryMock());

        $mock->method('storeCpf')
            ->willReturn($this->cpfMock());

        return $mock;
    }

    private function cpfMock()
    {
        $objectMock = $this->getMockBuilder(Cpf::class)
            ->disableOriginalConstructor()
            ->getMock();

        return $objectMock;
    }

    private function cpfFactoryMock()
    {
        $factoryMock = $this->getMockBuilder(CpfFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $factoryMock->method('responseCpf')
            ->willReturn(json_encode([]));

        return $factoryMock;
    }
}