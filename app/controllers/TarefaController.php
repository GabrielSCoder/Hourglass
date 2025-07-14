<?php

class TarefaController
{
    public function index()
    {
        $title   = "Tarefas";
        $usuarioId = AuthController::usuarioId();
        $usuario = UsuarioModel::GetUserById($usuarioId);
        $tarefas = TarefaModel::getAllByUser($usuarioId);
        $message = "Todas as tarefas";
        $content = __DIR__ . "/../views/tabelaTarefa.php";
        require __DIR__ . "/../views/home_template.php";
    }

    public function ver()
    {
        $title   = "Tarefa";
        $id      = $_GET['id'];
        $tarefa  = TarefaModel::getById($id);
        $action = "?pagina=tarefa&action=editar";
        $content = __DIR__ . "/../views/formularioTabela.php";
        require __DIR__ . "/../views/home_template.php";
    }

    public function criar()
    {
        $title   = "Tarefa - formulario";
        $action = "?pagina=tarefa&action=salvar";
        $usuario_id = AuthController::usuarioId();
        $content = __DIR__ . "/../views/formularioTabela.php";
        require __DIR__ . "/../views/home_template.php";
    }

    public function excluir()
    {
        $id = $_GET['id'];
        try {
            TarefaModel::deleteTarefa($id);
            header("Location: ?pagina=tarefa");
            exit;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function editar()
    {
        $tarefa = new Tarefa($_POST);
        try {
            TarefaModel::updateTarefa($tarefa);
            header('Location: ?pagina=tarefa');
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

    public function salvar()
    {
        $tarefa = new Tarefa($_POST);
        try {
            // var_dump($tarefa);
            TarefaModel::createTarefa($tarefa);
            header('Location: ?pagina=tarefa');
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }
}