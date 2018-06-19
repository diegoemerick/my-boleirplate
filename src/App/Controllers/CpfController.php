<?php

namespace Gcpf\App\Controllers;

use Gcpf\Domain\Service\cpfService;
use Gcpf\Infrastructure\Repository\cpfRepository;

class CpfController
{
    /**
     * Manage services cpf and repository
     * @param $number
     * @return array
     */
    public function getCpf($number)
    {
        $cpfService = new cpfService();
        $cpfRepository = new cpfRepository();

        $stored = $cpfRepository->getCpf($number);

        if (! empty($stored)) {
            $cpfService->storeCpf($number);
        }

        $cpfStored = $cpfRepository->getCpf($number);
        return $cpfService->getCpf($cpfStored);
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

        return $cpfService->getCpf($newRegister);
    }

    public function storeBlackList($number)
    {

    }

}