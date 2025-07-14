<?php

class Usuario
{
    public $id;
    public $nome_completo;
    public $usuario;
    public $senha;
    public $data_criacao;
    public $data_nascimento;

    public function __construct($params = [])
    {
        $this->id = $params['id'] ?? null .
        $this->nome_completo = $params['nome_completo'] ?? null;
        $this->senha = $params['senha'] ?? null;
        $this->usuario = $params['usuario'] ?? null;
        $this->data_criacao = $params['data_criacao'] ?? null;
        $this->data_nascimento = $params['data_nascimento'] ?? null;
    }

    public function encriptar()
    {
        $this->senha = password_hash($this->senha, PASSWORD_DEFAULT);
    }

    public function verificarSenha($senha)
    {
        return password_verify($senha, $this->senha);
    }

    public function __toString()
    {
        return $this->nome_completo . " - " . $this->senha . " - " . $this->usuario . " - ". $this->data_nascimento;
    }
}