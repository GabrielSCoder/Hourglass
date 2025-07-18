<div style="width: 500px;">
    <form method="post" action="<?= $action ?>" id="tarefa-form">

        <?php if (isset($usuario_id) || !empty($tarefa['usuario_id'])):?>
        <input type="hidden" name="usuario_id" value="<?= $usuario_id ?? $tarefa['usuario_id'] ?>" />
        <?php endif; ?>

        <?php if (!empty($tarefa['id'])):?>
        <input type="hidden" name="id" value="<?= $usuario_id ?? $tarefa['id'] ?>" />
        <?php endif; ?>


        <label>Tarefa</label>
        <input type="text" name="titulo" value="<?=htmlspecialchars($tarefa['titulo'] ?? '') ?>"
            <?= $_GET['action'] === "ver" ? 'disabled' : "" ?> />
        <label>Descrição (Opcional)</label>
        <textarea type="text" name="descricao" rows="4"
            <?= $_GET['action'] === "ver" ? 'disabled' : "" ?>><?=htmlspecialchars($tarefa['descricao'] ?? '') ?> </textarea>

        <label>Data limite (opcional)</label>
        <input type="datetime-local" name="data_limite" value="<?=htmlspecialchars($tarefa['data_limite'] ?? null) ?>"
            <?= $_GET['action'] === "ver" ? 'disabled' : "" ?> />

        <label>Prioridade</label>
        <fieldset style="padding: 5px 5px; display: flex; gap: 10px; margin-bottom: 15px;"
            <?= $_GET['action'] === "ver" ? 'disabled' : "" ?>>
            <input type="radio" name="prioridade" value="baixa"
                <?= (isset($tarefa['prioridade']) && $tarefa['prioridade'] === 'baixa') ? 'checked' : '' ?> />
            <label>Baixa</label>
            <input type="radio" name="prioridade" value="media"
                <?= (isset($tarefa['prioridade']) && $tarefa['prioridade'] === 'media') ? 'checked' : '' ?> />
            <label>Média</label>
            <input type="radio" name="prioridade" value="alta"
                <?= (isset($tarefa['prioridade']) && $tarefa['prioridade'] === 'alta') ? 'checked' : '' ?> />
            <label>Alta</label>
        </fieldset>
        <label>Tarefa concluída:
            <input type="checkbox" name="concluida" id="concluida"
                <?= (isset($tarefa) && $tarefa['concluida'] == 1) ? 'checked disabled' : '' ?>
                <?= $_GET['action'] === "ver" ? 'disabled' : "" ?> />
        </label>
        <input type="button" id="btn-disable" value="editar"
            <?= (isset($tarefa) && $tarefa['concluida'] == 1 || !isset($_GET['id'])) ? 'disabled' :  "" ?> />
        <input type="submit" value="confirmar" <?= $_GET['action'] === "ver" ? 'disabled' : "" ?> />
    </form>
    <?php if (!empty($message)): ?>
    <br />
    <p style="color: red; text-align: center;"><?=$message;?></p>
    <?php endif; ?>
</div>