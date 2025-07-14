<?php

class UsuarioModel
{
    public static function validar(Usuario $usuario)
    {
        $erros = [];

        if (!isset($usuario->id))
        {
            $erros[] = "Id inválido";
        }
        if (!isset($usuario->nome_completo) || trim($usuario->nome_completo) === '')
        {
            $erros[] = "Nome vazio";
        }
        if (!isset($usuario->usuario) || trim($usuario->usuario) === '')
        {
            $erros[] = "usuario vazio";
        }
        else if (strlen($usuario->usuario) < 8)
        {
            $erros[] = "Usuario deve ter no mínimo 8 caracteres";
        }
        else
        {
            $unico = UsuarioModel::GetUserByUsername($usuario->usuario);
            if ($unico)
            {
                $erros[] = "usuario já existe!";
            }

        }
        if (!isset($usuario->senha) || trim($usuario->senha) === '')
        {
            $erros[] = "Senha vazia";
        }
        else if (strlen($usuario->senha) < 8)
        {
            $erros[] = "Senha deve ter no mínimo 8 caracteres";
        }
        if (!isset($usuario->data_nascimento) || $usuario->data_nascimento === "00-00-0000" || trim($usuario->data_nascimento) === '')
        {
            $erros[] = "Data de nascimento vazia";
        }

        if (count($erros) > 0)
        {
            throw new Exception(implode("<br>", $erros));
        }
    }

    public static function criarUsuario(Usuario $usuario)
    {
        UsuarioModel::validar($usuario);

        $pdo  = Database::connect();
        $stmt = $pdo->prepare("INSERT INTO usuario (nome_completo, usuario, senha, data_nascimento) VALUES (:nome_completo, :usuario, :senha, :data_nascimento)");
        $stmt->bindParam(":nome_completo", $usuario->nome_completo);
        $stmt->bindParam(":usuario", $usuario->usuario);
        $stmt->bindParam(":senha", $usuario->senha);
        $stmt->bindParam(":data_nascimento", $usuario->data_nascimento);
        $stmt->execute();
        return $pdo->lastInsertId();
    }

    public static function GetUserById($id)
    {
        $pdo  = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function GetUserByUsername($username)
    {
        $pdo  = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE usuario = :usuario");
        $stmt->bindParam(":usuario", $username);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ? new Usuario($data) : null;
    }

    public static function getAllUSers()
    {
        $pdo  = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM usuario");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function printUser(Usuario $usuario)
    {
        var_dump($usuario);
    }

    public static function login(Usuario $usuario)
    {
        $user = UsuarioModel::GetUserByUsername($usuario->usuario);

        if ($user && $user->verificarSenha($usuario->senha))
        {
            $_SESSION['usuario_id'] = $user->id;
            $_SESSION['usuario']    = $user->usuario;

            return true;
        }
        else
        {
            return false;
        }
    }
}