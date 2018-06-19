<?php

namespace Gcpf\App\Controllers;

use Gcpf\Domain\Service\CpfService;
use Gcpf\Infrastructure\Repository\CpfRepository;

class CpfController
{
    /**
     * Manage services cpf and repository
     * @param array $params
     */
    public function getCpf(array $params)
    {
        $cpfService = new CpfService();
        $cpfRepository = new CpfRepository();

        $stored = $cpfRepository->getCpf($params['number']);

        if (! empty($stored)) {
            $cpfService->storeCpf($params['number']);
        }

        $cpfStored = $cpfRepository->getCpf($params['number']);
        echo $cpfService->getCpf($cpfStored);
    }

    /**
     * @param $number
     * @return array
     */
    public function removeBlackList($number)
    {
        $cpfService = new cpfService();
        $cpfRepository = new cpfRepository();

        $stored = $cpfRepository->getCpf($number);
        $newRegister = $cpfService->storeCpf($number);

        return $cpfService->getCpf($newRegister->getNumber());
    }

    public function storeBlackList($number)
    {

    }

}