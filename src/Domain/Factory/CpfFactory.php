<?php

namespace Gcpf\Domain\Factory;

use Gcpf\Domain\Model\Cpf;

class CpfFactory
{
    /**
     * @param $number
     * @param bool $block
     * @return cpf
     */
    public function buildStoreBlackList($number, $block = true): Cpf
    {
        $storeCpf = new Cpf();
        $storeCpf->setNumber($number);
        $storeCpf->setBlock($block);

        return $storeCpf;
    }

    /**
     * @param Cpf $cpf
     * @return string
     */
    public function responseCpf(cpf $cpf): string
    {
        $reponse = [
            'cpf'=> $cpf->getNumber(),
            'blocked' => $cpf->getBlock()
        ];

        return json_encode($reponse);
    }
}