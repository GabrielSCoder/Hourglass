<?php

class TarefaController
{
    public static function index()
    {
        $title = "Tarefas";
        $message = "Todas as tarefas";
        $content = __DIR__ . "/../views/formularioTabela.php";
        require __DIR__ . "/../views/home_template.php";
    }
}