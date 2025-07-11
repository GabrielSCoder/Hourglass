<?php

class HomeController
{
    public static function index()
    {
        $title = "Início";
        $message = "Todas as tarefas";
        $content = __DIR__ . "/../views/homeView.php";
        require __DIR__ . "/../views/home_template.php";
    }
}