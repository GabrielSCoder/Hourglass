const btnDisable = document.getElementById("btn-disable");
const btnConcluir = document.getElementById("concluida");

if (btnDisable) {
    btnDisable.addEventListener("click", function () {
        const form = document.getElementById("tarefa-form");
        const fields = form.querySelectorAll("input, textarea, button, select, fieldset");

        fields.forEach(field => {
            console.log(field)
            if (field.disabled) {
                field.disabled = false;
            }
        });
    });
}

if (btnConcluir) {
    btnConcluir.addEventListener("click", function () {
        if (confirm("Concluir tarefa?")) {

            btnConcluir.checked = true;
            btnConcluir.value = "1";

        }
    })
}