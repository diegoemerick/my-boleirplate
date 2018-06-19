<?php

namespace Gcpf\Infrastructure\Repository;

use Gcpf\Infrastructure\Database\Connection;

class CpfRepository implements CpfRepositoryInterface
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Connection();
    }

    public function getCpf($cpf): array
    {
        $query = 'SELECT * FROM documents WHERE number = :number';
        $this->conn->db->query($query);
//        $stmt = $this->conn->db->prepare($query);
//        $stmt->bindParam(':number', $cpf);
//        $result = $stmt->execute();
echo $result;
        return $result;
    }

    public function storeBlackList($data)
    {
        // TODO: Implement storeBlackList() method.
    }

    public function removeBlackList($data)
    {
        // TODO: Implement removeBlackList() method.
    }

    public function showBlackList($data)
    {
        // TODO: Implement showBlackList() method.
    }
}