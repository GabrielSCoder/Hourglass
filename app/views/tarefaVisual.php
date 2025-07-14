<div
    style="border: solid black 1px; padding: 10px 10px; border-radius: 10px; margin-bottom: 5px; height: 500px; width: 90%;">
    <h4><?=$tarefa['titulo']?></h4><br />
    <p><?=$tarefa['descricao'] ?></p>
    <h4>Prioridade <strong><?=$tarefa['prioridade'];?></strong></h4><br />
    <h5>Criada em: <?=date("d/m/Y H:i", strtotime($tarefa['data_limite']))?></h5>
    <?php if (!empty($tarefa['data_limite'])): ?>
    <h5>Até: <?=date("d/m/Y H:i", strtotime($tarefa['data_limite']))?></h5>
    <?php endif; ?>
</div>