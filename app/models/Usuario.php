<?php

class Usuario
{
    public $id;
    public $nome;
    public $usuario;
    public $senha;
    public $data_criacao;
    public $data_nascimento;

    public function __construct($params = [])
    {
        $this->id = $params['id'] ?? null.
        $this->nome = $params['nome'] ?? null;
        $this->usuario = $params['usuario'] ?? null;
        $this->data_criacao = $params['data_criacao'] ?? null;
        $this->data_nascimento = $params['data_nascimento'] ?? null;
    }
}