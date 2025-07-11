<?php

class TarefaModel
{
    public static function createTable()
    {
        $pdo = Database::connect();
        $pdo->query("CREATE TABLE `hourglass_dev`.`tarefa` (`id` INT NOT NULL AUTO_INCREMENT , `titulo` VARCHAR(100) NOT NULL , `prioridade` ENUM('baixa','media','alta','') NOT NULL DEFAULT 'baixa' , `data_cadastro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `data_limite` DATETIME NULL DEFAULT NULL, `descricao` VARCHAR(300), PRIMARY KEY (`id`)) ENGINE = InnoDB;");
    }

    public static function createTarefa(Tarefa $tarefa)
    {
        $pdo  = Database::connect();
        $stmt = $pdo->prepare("INSERT INTO tarefa (titulo, prioridade, descricao, data_limite, concluida, usuario_id) values :titulo, :prioridade, :descricao, :data_limite, :concluida, :usuario_id");
        $stmt->bindParam(":titulo", $tarefa->titulo);
        $stmt->bindParam(":descricao", $tarefa->descricao);
        $stmt->bindParam(":data_limite", $tarefa->data_limite);
        $stmt->bindParam(":prioridade", $tarefa->prioridade);
        $stmt->bindParam(":concluida", $tarefa->concluida);
        $stmt->bindParam(":usuario_id", $tarefa->usuario_id, PDO::PARAM_INT);
        $stmt->execute();
        return $pdo->lastInsertId();
    }

    public static function updateTarefa(Tarefa $tarefa)
    {
        $pdo  = Database::connect();
        $stmt = $pdo->prepare("UPDATE tarefa SET titulo = :titulo , prioridade = :prioridade, descricao = :descricao, data_limite = :data_limite, concluida = :concluida WHERE id = :id");
        $stmt->bindParam(":id", $tarefa->id, PDO::PARAM_INT);
        $stmt->bindParam(":titulo", $tarefa->titulo);
        $stmt->bindParam(":descricao", $tarefa->descricao);
        $stmt->bindParam(":data_limite", $tarefa->data_limite);
        $stmt->bindParam(":prioridade", $tarefa->prioridade);
        $stmt->bindParam(":concluida", $tarefa->concluida);
        $stmt->execute();
        return $pdo->lastInsertId();
    }

    public static function deleteTarefa($id)
    {
        $pdo  = Database::connect();
        $stmt = $pdo->prepare("DELETE from tarefa WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return true;
    }

    public static function getById($id)
    {
        $pdo  = Database::connect();
        $stmt = $pdo->prepare("SELECT * from tarefa WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAllByUser($id)
    {
       $pdo  = Database::connect();
        $stmt = $pdo->prepare("SELECT * from tarefa WHERE usuario_id = :usuario_id");
        $stmt->bindParam(":usuario_id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
}