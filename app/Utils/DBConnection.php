<?php

namespace App\Utils;

use Dotenv\Dotenv;

class DBConnection
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $charset = 'utf8mb4';

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $this->host = $_ENV['DB_HOST'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASS'];
        $this->database = $_ENV['DB_NAME'];
    }

    public function getConnection()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->database;charset=$this->charset";

        try {
            $pdo = new \PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
}
