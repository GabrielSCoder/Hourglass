<div style="width: 400px">
    <h2 style="text-align: center;">Registrar usuário</h2><br />
    <form action="<?= $action ?>" method="post" id="tarefa-form">
        <label>Nome completo</label>
        <input type="text" name="nome_completo" value="<?= htmlspecialchars($usuario->nome_completo ?? '') ?>" />
        <label>Usuário</label>
        <input type="text" name="usuario" value="<?= htmlspecialchars($usuario->usuario ?? '') ?>" />
        <label>Senha</label>
        <input type="password" name="senha" value="<?= htmlspecialchars($usuario->senha ?? '') ?>" />
        <label>Data de nascimento</label>
        <input type="date" name="data_nascimento"
            value="<?= htmlspecialchars($usuario->data_nascimento ?? '') ?>" /><br />
        <input type="submit" value="confirmar" />
    </form>
    <?php if (!empty($message)): ?>
    <br />
    <p style="color: red; text-align: center;"><?=$message;?></p>
    <?php endif; ?>
</div>