<?php

namespace Gcpf\Domain\Service;

use Gcpf\Domain\Factory\cpfFactory;
use Gcpf\Domain\Model\cpf;

class CpfService
{
    /**
     * @param array $data
     * @return array
     */
    public function getCpf(array $data): array
    {
        $cpf = new cpf();
        $cpf->setBlock($data['blocked']);
        $cpf->setNumber($data['number']);

        $cpfFactory = new cpfFactory();
        $response = $cpfFactory->responseCpf($cpf);

        return $response;
    }

    /**
     * @param $number
     * @return cpf
     */
    public function storeCpf($number): cpf
    {
        $cpf = new cpf();

        $cpf->validateNumber($number);

        $cpf->setNumber($number);
        $cpf->setBlock(false);

        return $cpf;
    }

    /**
     * @param $number
     * @return cpfFactory
     */
    public function storeBlackListCpf($number): cpfFactory
    {
        $cpf = new cpfFactory();
        $cpf->buildStoreBlackList($number);

        return $cpf;
    }

    /**
     * @param $number
     * @return cpfFactory
     */
    public function removeBlackListCpf($number): cpfFactory
    {
        $cpf = new cpfFactory();
        $cpf->buildStoreBlackList($number, false);

        return $cpf;
    }

}
