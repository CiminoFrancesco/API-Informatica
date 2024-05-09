<?php
class ConnessioneDatabase
{
    private $connection = null;
    public function __construct()
    {
        if (file_exists(__DIR__ . '/../Connessione.php')) {
            require_once(__DIR__ . '/../Connessione.php');
        } else {
            exit("Credenziali database mancanti");
        }

        try {
            $this->connection = new \PDO(
                "mysql:host=$host;port=$port;dbname=$db",
                $user,
                $pass
            );
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
