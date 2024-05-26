<?php

class Database
{
    public $connection;
    public function __construct(array $config, string $username = "root", $password = "")
    {
        try {
            $dsn = 'mysql:' . http_build_query($config, '', ';');
            $this->connection = new PDO(
                $dsn,
                $username,
                $password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function query(string $query, array $params = [])
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}