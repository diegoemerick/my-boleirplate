<?php

namespace Gcpf\Domain\Factory;

use Gcpf\Domain\Model\cpf;

class cpfFactory
{
    /**
     * @param $number
     * @param bool $block
     * @return cpf
     */
    public function buildStoreBlackList($number, $block = true): cpf
    {
        $storeCpf = new cpf();
        $storeCpf->setNumber($number);
        $storeCpf->setBlock($block);

        return $storeCpf;
    }

    /**
     * @param cpf $cpf
     * @return array
     */
    public function responseCpf(cpf $cpf): array
    {
        $reponse = [
            'cpf'=> $cpf->getNumber(),
            'blocked' => $cpf->getBlock()
        ];

        return json_encode($reponse);
    }
}