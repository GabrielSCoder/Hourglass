<?php

class Router
{
    public $rotas_protegidas = ["tarefa"];

    public function start($url)
    {
        $pagina         = $url['pagina'] ?? "Home";
        $controllerName = ucfirst($pagina) . "Controller";
        $action         = $url['action'] ?? "index";

        if (in_array($pagina, $this->rotas_protegidas))
        {
            AuthController::verificar();
        }

        if (AuthController::logged() && strtolower($pagina) === "home")
        {
            header("Location: ?pagina=tarefa");
            exit;
        }

        if (class_exists($controllerName))
        {
            $control = new $controllerName();

            if (method_exists($controllerName, $action))
            {
                $control->$action();
            }
            else
            {
                echo "Método não encontrado";
            }
        }
        else
        {
            echo "Erro de redirecionamento";
        }
    }

    public function test()
    {
        echo "olá!!!!";
    }
}