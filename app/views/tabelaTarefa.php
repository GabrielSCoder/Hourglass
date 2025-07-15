<div
    style="flex: 1; display: flex; flex-direction: column; justify-content: start; align-items: center; padding: 100px 0px; position: relative;">
    <h2>Tarefas do usuário <?= $usuario['nome_completo']; ?></h2>
    <a style="position: absolute; top: 10px; right: 2px; padding: 10px 20px; text-decoration: none; color: black; background-color: white; border: solid gray 2px; border-radius: 5px;"
        onclick="return confirm('Deseja sair?')" href="?pagina=auth&action=logout">Sair</a>
    <button onclick="window.location.href='?pagina=tarefa&action=criar'" <?= !empty($tarefas) ? "hidden" : "" ?>>Criar
        nova</button>
    <?php if (empty($tarefas)): ?><br />
    <p>Nenhum tarefa cadastrada.</p>
    <?php else: ?>
    <div style="margin-top: 50px;">
        <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
            <h3>Tarefas</h3>
            <button onclick="window.location.href='?pagina=tarefa&action=criar'" <?= empty($tarefas) ? "hidden" : "" ?>>
                Criar nova
            </button>
        </div>
        <hr />
        <div style="margin-top: 15px;">
            <?php foreach ($tarefas as $tarefa): ?>
            <a href="?pagina=tarefa&action=ver&id=<?=$tarefa['id']?>" style="text-decoration: none; color: black;">
                <div
                    style="display: flex; justify-content: start; align-items: center; border: solid black 1px; padding: 10px 10px; border-radius: 10px; margin-bottom: 5px; ">
                    <div style=" min-width: 300px; min-height: 144px;">
                        <h4><?=$tarefa['titulo']?></h4><br />
                        <h4>Prioridade <strong><?=$tarefa['prioridade'];?></strong></h4>
                        <?php if (!empty($tarefa['data_limite'])): ?><br />
                        <h5>Até: <?=date("d/m/Y H:i", strtotime($tarefa['data_limite']))?></h5>
                        <?php endif; ?>
                        <?php if ($tarefa['concluida'] === 1): ?>
                        <br />
                        <h5 style="font-weight: 600; color: red;">Concluida</h5>
                        <?php endif; ?>
                    </div>
                    <div>
                        <a href="?pagina=tarefa&action=excluir&id=<?= $tarefa['id'] ?>"
                            onclick="return confirm('Deseja exluir?')">Excluir</a>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</div>