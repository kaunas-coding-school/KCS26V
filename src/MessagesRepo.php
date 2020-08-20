<?php

namespace KCS;

class MessagesRepo
{
    private \PDO $conn;

    public function __construct()
    {
        $this->conn = (new DB())->getConnection();
    }

    public function insert(string $vardas, string $elpastas, string $zinute): void
    {
        $sql = "INSERT INTO kcs_db.messages (name, email, message) VALUES (:vardas, :el_pastas , :zinute)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':zinute', $zinute);
        $stmt->bindParam(':el_pastas', $elpastas);
        $stmt->bindParam(':vardas', $vardas);

        $stmt->execute();
    }

    public function lastInsertId()
    {
        return $this->conn->lastInsertId();
    }
}