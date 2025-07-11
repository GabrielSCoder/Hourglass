<div>
    <form method="post" action="" id="tarefa-form">
        <label>Tarefa</label>
        <input type="text" name="titulo" />
        <label>Descrição (Opcional)</label>
        <textarea type="text" name="descricao" rows="4"></textarea>
        <label>Data limite (opcional)</label>
        <input type="datetime-local" name="prioridade" value="baixa" />
        <label>Prioridade</label>
        <fieldset style="padding: 5px 5px; display: flex; gap: 10px; margin-bottom: 15px;">
            <input type="radio" name="prioridade" value="baixa" />
            <label>Baixa</label>
            <input type="radio" name="prioridade" value="media" />
            <label>Média</label>
            <input type="radio" name="prioridade" value="alta" />
            <label>Alta</label>
        </fieldset>
        <label>Tarefa concluída:
            <input type="checkbox" name="concluida" />
        </label>
        <input type="submit" value="confirmar" />
    </form>
</div>