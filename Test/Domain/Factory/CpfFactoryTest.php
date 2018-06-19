<?php

namespace Test\Domain\Factory;

use Gcpf\Domain\Factory\CpfFactory;
use Gcpf\Domain\Model\Cpf;
use PHPUnit\Framework\TestCase;
use PHPUnit\Util\Json;

class CpfFactoryTest extends TestCase
{
    public function testBuildStoreBlackListTest()
    {
        $cpfFactory = new CpfFactory();
        $reponse = $cpfFactory->buildStoreBlackList('10309003610');

        $this->assertTrue($reponse->getBlock());
    }

    public function testResponseCpf()
    {
        $cpfFactory = new CpfFactory();
        $cpf = new Cpf();
        $cpf->setNumber('10309015484');
        $cpf->setBlock(false);

        $response = $cpfFactory->responseCpf($cpf);

        $this->assertEquals($response, $this->responseCpfMock());
    }

    private function responseCpfMock()
    {
        $response = [
            'cpf'=> "10309015484",
            'blocked' => false
        ];

        return json_encode($response);
    }
}