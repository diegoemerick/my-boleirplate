<?php

namespace Tests\Domain\Model;

use Gcpf\Domain\Model\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testValidateNumberFalse()
    {
        $number = '10309003611';
        $cpf = new Cpf();

        $this->assertFalse($cpf->validateNumber($number));
    }

    public function testValidateNumber()
    {
        $number = '10309003610';
        $cpf = new Cpf();

        $this->assertTrue($cpf->validateNumber($number));
    }
}