<?php

class Tarefa
{
    public $id;
    public $titulo;
    public $data_limite;
    public $data_criacao;
    public $descricao;
    public $prioridade;
    public $concluida;
    public $usuario_id;

    public function __construct($params = [])
    {
        $this->id = $params['id'] ?? null;
        $this->titulo = $params['titulo'] ?? null;
        $this->data_limite = $params['data_limite'] ?? null;
        $this->data_criacao = $params['data_criacao'] ?? null;
        $this->prioridade = $params['prioridade'] ?? null;
        $this->concluida = $params['concluida'] ?? false;
        $this->usuario_id = $params['usuario_id'] ?? null;
    }
}