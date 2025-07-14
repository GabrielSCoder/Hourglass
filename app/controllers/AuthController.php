<?php

class AuthController 
{
    public static function logged()
    {
        return isset($_SESSION['usuario_id']);
    }

    public static function usuario()
    {
        return  $_SESSION['usuario'] ?? null;
    }

      public static function usuarioId()
    {
        return  $_SESSION['usuario_id'] ?? null;
    }


    public static function verificar()
    {
        if (!isset($_SESSION['usuario_id']))
        {
            header("Location: ?pagina=tarefa");
            exit;
        }
    }

    public static function logout()
    {
        session_destroy();
        header("Location: ?pagina=home");
        exit;
    }
}