<?php

class HomeController
{
    public function index()
    {
        $title   = "Início";
        $action  = "?pagina=home&action=login";
        $content = __DIR__ . "/../views/homeView.php";
        require __DIR__ . "/../views/home_template.php";
    }

    public function registro()
    {
        $title   = "Criar conta";
        $action  = "?pagina=home&action=registrar";
        $content = __DIR__ . "/../views/formularioRegistro.php";
        require __DIR__ . "/../views/home_template.php";
    }

    public function mostrar()
    {
        $title   = "Inicio";
        $usuario = new Usuario($_POST);
        $content = __DIR__ . "/../views/homeView.php";
        require __DIR__ . "/../views/home_template.php";
    }

    public function registrar()
    {
        $usuario = new Usuario($_POST);
        $usuario->encriptar();
        try {
            UsuarioModel::criarUsuario($usuario);
            $title = "aviso";
            $message = "Usuário cadastrado com sucesso!";
            $content = __DIR__ . "/../views/avisoView.php";
            require __DIR__ . "/../views/home_template.php";
        }
        catch (Exception $e)
        {
            $title   = "Criar conta";
            $action  = "?pagina=home&action=registrar";
            $message = $e->getMessage();
            $content = __DIR__ . "/../views/formularioRegistro.php";
            require __DIR__ . "/../views/home_template.php";
        }
    }

    public function login()
    {
        $usuario = new Usuario($_POST);
        
        if (UsuarioModel::login($usuario))
        {
            header("Location: ?pagina=tarefas");
            exit;
        } else
        {
            $message = "Usuário e/ou senha incorretos";
            $action = "?pagina=home&action=login";
            $title = "Home";
            $content = __DIR__ . "/../views/homeView.php";
            require __DIR__ . "/../views/home_template.php";
        }
    }
}