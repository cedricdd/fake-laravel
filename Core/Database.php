<?php

namespace Core;

class Database 
{
    protected \PDO $pdo;

    public function __construct(array $config = []) {
        if(empty($config)) exit("Impossible to establich a connection to the database, missing infos!");

        $dsn = "mysql:host=" . $config["host"] . ";dbname=" . $config["dbname"] . ";charset=" . $config["charset"];
        $this->pdo = new \PDO($dsn, $config["username"], $config["password"], $config["options"]);
    }

    public function execute(string $statement, array $params = []): void {
        $query = $this->pdo->prepare($statement);
        $query->execute($params);
    }

    public function fetch(string $statement, array $params = []): mixed {
        $query = $this->pdo->prepare($statement);
        $query->execute($params);

        return $query->fetch();
    }

    public function fetchAll(string $statement, array $params = []): array {
        $query = $this->pdo->prepare($statement);
        $query->execute($params);

        return $query->fetchAll();
    }

    public function fetchColumn(string $statement, array $params = []): string {
        $query = $this->pdo->prepare($statement);
        $query->execute($params);

        return $query->fetchColumn();
    }
}