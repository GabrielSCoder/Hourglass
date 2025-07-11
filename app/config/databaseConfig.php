<?php

    class DbConfig
    {
        public static function getDevDbConfig()
        {
            return (object) [
                'host' => getenv("DB_DEV_HOST"),
                'dbname' => getenv("DB_DEV_DB_NAME"),
                'user' => getenv("DB_DEV_USER"),
                'password' => getenv("DB_DEV_PASSWORD")
            ];
        }
    
        public static function getProdDbConfig()
        {
            return (object) [
                'host' => "localhost",
                'dbname' => "",
                'user' => "",
                'password' => ""
            ];
        }
    }