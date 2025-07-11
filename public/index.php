<?php

require __DIR__ . "/../app/config/databaseConfig.php";
require __DIR__ . "/../app/core/Database.php";
require __DIR__ . "/../app/models/TarefaModel.php";

// echo "hello world!";

// $var = DbConfig::getDevDbConfig();
// echo "<hr />";
// var_dump($var);
// echo "<hr />";
// Database::connect();

require __DIR__ . "/../app/views/home_template.php";