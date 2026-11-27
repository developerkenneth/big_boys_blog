<?php

namespace App\Models;

use Dotenv\Dotenv;
use PDO;

$dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
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


            $dsn = "mysql:host=$db_host;dbname=$db_name";
            $pdo = new PDO($dsn, $db_user, $db_pass, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);

            return $pdo;
        } catch (\PDOException $err) {
            die($err->getMessage());
        }
    }

    // fetch all the datas from a particular table
    /**
     * @param string $tableName: enter the name of the table that you want to fetch from
     */
    public function all(string $tableName)
    {
        $query = "SELECT * FROM $tableName";
        $stmt = $this->connect()->query($query);
        $result = $stmt->fetchAll();
        if ($stmt->rowCount() >= 1) {
            return $result;
        } else {
            return [];
        }
    }

    // create new data 
    public function create($tableName, $datas)
    {
        $cols = "";
        $placeholders = "";
        foreach ($datas as $col => $value) {

            $cols .= "$col,";
            $placeholders .= ":$col";
        }
        $sql = "INSERT INTO `$tableName` (`col1`, `col2`, `col3`) VALUES (:val1, :val2 :val3)";
    }
}
