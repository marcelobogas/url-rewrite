<?php

namespace App\Database;

use Exception;
use PDO;
use PDOException;

class Conexao
{
    private function __construct()
    {
        //..
    }

    public static function getConnection()
    {
        $pdoConfig  = rtrim(getenv('DB_DRIVER'));
        $pdoConfig .= rtrim(":Server=" . getenv('DB_HOST'));
        $pdoConfig .= rtrim(";Database=" . getenv('DB_NAME'));

        try {
            if (!isset($connection)) {
                $connection =  new PDO($pdoConfig, rtrim(getenv('DB_USER')), rtrim(getenv('DB_PASSWORD')));
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $connection;
        } catch (PDOException $e) {
            $mensagem = "Erro na conexão: " . $e->getMessage();
            throw new Exception($mensagem);
        }
    }
}