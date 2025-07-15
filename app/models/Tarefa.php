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
        $this->data_limite = !empty($params['data_limite']) ? $params['data_limite'] : null;
        $this->descricao = $params['descricao'] ?? null;
        $this->data_criacao = $params['data_criacao'] ?? null;
        $this->prioridade = $params['prioridade'] ?? null;
        $this->concluida = isset($params['concluida']) ? 1 : 0;;
        $this->usuario_id = $params['usuario_id'] ?? null;
    }
}