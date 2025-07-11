<?php

class Database
{
    private static $pdo;

    public static function connect()
    {
        $env = getenv('ENV');
        $line = "";

        if (!isset(self::$pdo))
        {
            if (isset($env))
            {
                if ($env == 'prod')
                {
                    $line = DbConfig::getProdDbConfig();
                } else {
                    $line = DbConfig::getDevDbConfig();
                }
            } else {
                $line = DbConfig::getDevDbConfig();
            }
    
            try {
                self::$pdo = new PDO("mysql:host={$line->host};dbname={$line->dbname};", $line->user, $line->password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $error)
            {
                die("erro". $error->getMessage());
                // return false;
            }
        }

        return self::$pdo;
    }
}