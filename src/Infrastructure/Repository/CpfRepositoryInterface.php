<?php

namespace Gcpf\Infrastructure\Repository;

interface CpfRepositoryInterface
{
    public function getCpf($cpf);

    public function storeBlackList($data);

    public function removeBlackList($data);

    public function showBlackList($data);
}