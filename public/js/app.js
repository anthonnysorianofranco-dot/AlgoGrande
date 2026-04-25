// =========================
// DEBUG
// =========================
console.log("JS funcionando");

// =========================
// CUANDO CARGA EL DOM
// =========================
document.addEventListener("DOMContentLoaded", () => {

    // =========================
    // ELEMENTOS DEL DOM
    // =========================
    const btnCrear = document.getElementById("btnCrearForo"); // botón del menú
    const form = document.getElementById("createPost");       // formulario
    const btnCancelar = document.getElementById("btnCancelar"); // botón cancelar

    // =========================
    // MOSTRAR / OCULTAR FORM
    // =========================
    if (btnCrear && form) {
        btnCrear.addEventListener("click", (e) => {
            e.preventDefault(); // evita recargar la página
            form.classList.toggle("hidden"); // muestra/oculta
        });
    }

    // =========================
    // BOTÓN CANCELAR
    // =========================
    if (btnCancelar && form) {
        btnCancelar.addEventListener("click", () => {

            // Oculta el formulario
            form.classList.add("hidden");

            // Limpia los campos
            const input = form.querySelector("input[type='text']");
            const textarea = form.querySelector("textarea");

            if (input) input.value = "";
            if (textarea) textarea.value = "";
        });
    }

    // =========================
    // BOTÓN "VER COMENTARIOS"
    // =========================
    // Busca todos los botones creados en PHP
    document.querySelectorAll(".btn-ver").forEach(btn => {

        btn.addEventListener("click", () => {

            // Obtener el ID del foro desde data-id
            const id = btn.dataset.id;

            // Redirigir a foro.php con ese ID
            if (id) {
                window.location.href = `foro.php?id=${id}`;
            }

        });

    });

});