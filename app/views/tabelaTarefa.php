<div>
    <h2>Tarefas do usuário <?= $usuario['nome_completo']; ?></h2>
    <?php if (empty($tarefas)): ?>
    <p>Nenhum tarefa cadastrada.</p>
    <button onclick="window.location.href='?pagina=tarefa&action=criar'">Criar nova</button>
    <?php else: ?>
    <h4>Tarefas</h4>
    <hr />
    <?php foreach ($tarefas as $tarefa): ?>
    <a href="?pagina=tarefa&action=ver&id=<?=$tarefa['id']?>" style="text-decoration: none; color: black;">
        <div
            style="display: flex; justify-content: start; align-items: center; width: 100%;border: solid black 1px; padding: 10px 10px; border-radius: 10px; margin-bottom: 5px; ">
            <div style=" min-width: 300px;">
                <h4><?=$tarefa['titulo']?></h4><br />
                <h4>Prioridade <strong><?=$tarefa['prioridade'];?></strong></h4><br />
                <?php if (!empty($tarefa['data_limite'])): ?>
                <h5>Até: <?=date("d/m/Y H:i", strtotime($tarefa['data_limite']))?></h5>
                <?php endif; ?>
            </div>
            <div>
                <a href="?pagina=tarefa&action=excluir&id=<?= $tarefa['id'] ?>"
                    onclick="return confirm('Deseja exluir?')">Excluir</a>
            </div>
        </div>
    </a>
    <?php endforeach; ?>
    <?php endif; ?>
</div>