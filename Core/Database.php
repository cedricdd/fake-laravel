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

    public function execute(string $statement, array $params = []): mixed {
        $query = $this->pdo->prepare($statement);
        $query->execute($params);

        return $query;
    }

    public function find(string $statement, array $params = []): mixed {
        return $this->execute($statement, $params)->fetch();
    }

    public function findOrFail(string $statement, array $params = []): mixed {
        $result = $this->execute($statement, $params)->fetch();

        if(! $result) {
            abort(404, "The element count not be found!");
        }

        return $result;
    }

    public function findAll(string $statement, array $params = []): array {
        return $this->execute($statement, $params)->fetchAll();
    }
}