<?php

namespace Gcpf\Domain\Service;

use Gcpf\Domain\Factory\CpfFactory;
use Gcpf\Domain\Model\Cpf;

class CpfService
{
    /**
     * @param array $data
     * @return string
     */
    public function getCpf(array $data)
    {
        $cpf = new Cpf();
        $cpf->setBlock($data['blocked']);
        $cpf->setNumber($data['number']);

        $cpfFactory = new CpfFactory();
        $response = $cpfFactory->responseCpf($cpf);

        return $response;
    }

    /**
     * @param $number
     * @return Cpf
     */
    public function storeCpf($number): Cpf
    {
        $cpf = new Cpf();

        $cpf->validateNumber($number);

        $cpf->setNumber($number);
        $cpf->setBlock(false);

        return $cpf;
    }

    /**
     * @param $number
     * @return Cpf
     */
    public function storeBlackListCpf($number): Cpf
    {
        $cpf = new CpfFactory();
        $cpfBlocked = $cpf->buildStoreBlackList($number);

        return $cpfBlocked;
    }

    /**
     * @param $number
     * @return Cpf
     */
    public function removeBlackListCpf($number): Cpf
    {
        $cpf = new CpfFactory();
        $cpfFree = $cpf->buildStoreBlackList($number, false);

        return $cpfFree;
    }

}
