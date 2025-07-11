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
        if (!isset($usuario->nome) || trim($usuario->nome) === '')
        { 
            $erros[] = "Nome vazio";
        }
        if (!isset($usuario->usuario) || trim($usuario->nome) === '')
        { 
            $erros[] = "Nome vazio";
        } else if (strlen($usuario->nome) < 8) {
            $erros[] = "Usuario deve ter no mínimo 8 caracteres";
        }
         if (!isset($usuario->senha) || trim($usuario->senha) === '')
        { 
            $erros[] = "Senha vazia";
        } else if (strlen($usuario->senha) < 8) {
            $erros[] = "Senha deve ter no mínimo 8 caracteres";
        }

        if (count($erros) > 0) return $erros;
    }

    public static function criarUsuario (Usuario $usuario)
    {
        UsuarioModel::validar($usuario);

        $pdo = Database::connect();
        $stmt = $pdo->prepare("INSERT INTO usuario (nome, usuario, senha, data_nascimento) VALUES :nome, :usuario, :senha, :data_nascimento");
        $stmt->bindParam(":nome", $usuario->nome);
        $stmt->bindParam(":usuario", $usuario->usuario);
        $stmt->bindParam(":senha", $usuario->senha);
        $stmt->bindParam(":data_nascimento", $usuario->data_nascimento);
        $stmt->execute();
        return $pdo->lastInsertedId();
    }

    public static function GetUserById($id)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAllUSers()
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM usuario");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}