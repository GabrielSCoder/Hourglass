const btnDisable = document.getElementById("btn-disable");

if (btnDisable) {
    btnDisable.addEventListener("click", function () {
        const form = document.getElementById("tarefa-form");
        const fields = form.querySelectorAll("input, textarea, button, select, fieldset");

        fields.forEach(field => {
            console.log(field)
            if (field.disabled && field.name != "concluida" && field.id != "btn-concluir") {
                field.disabled = false;
            }
        });
    });
}
