<?php
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();
abstract class Model
{

    // creates a pdo instance of our database
    private function connect()
    {

        $db_name = $_ENV['DB_NAME'];
        $db_user = $_ENV['DB_USER'];
        $db_host = $_ENV['DB_HOST'];
        $db_pass = $_ENV['DB_PASS'];

        try {


            $dsn = "mysql:host=$db_host;db_name=$db_name";
            $pdo = new PDO($dsn, $db_user, $db_pass, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);

            return $pdo;
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    protected function all() {}
}
