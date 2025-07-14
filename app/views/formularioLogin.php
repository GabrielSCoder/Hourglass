<div>
    <form id="tarefa-form" action="<?=$action?>" method="post">
        <label for="usuario">
            Usuário
        </label>
        <input type="text" name="usuario" />
        <label for="senha">
            Senha
        </label>
        <input type="password" name="senha" />
        <input type="submit" value="confirmar" />
        <a href="?pagina=home&action=registro">Criar conta</a>
    </form>
    <?php if (!empty($message)): ?>
    <br />
    <p style="color: red; text-align: center;"><?=$message;?></p>
    <?php endif; ?>
</div>