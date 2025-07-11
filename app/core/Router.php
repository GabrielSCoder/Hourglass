<?php

class Router
{
    public function start($url)
    {
        $pagina = $url['pagina'] ?? "Home";
        $controllerName = ucfirst($pagina) . "Controller";
        $action = $url['action'] ?? "index";

        if (class_exists($controllerName))
        {
            $control = new $controllerName();

            if (method_exists($controllerName, $action))
            {
                $control->$action();
            } else {
                echo "Método não encontrado";
            }
        } else {
            echo "Erro de redirecionamento";
        }
    }

    public function test()
    {
        echo "olá!!!!";
    }
}
