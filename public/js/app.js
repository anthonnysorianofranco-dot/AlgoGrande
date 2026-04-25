// =========================
// DEBUG
// =========================
console.log("JS funcionando");


// =========================
// CUANDO CARGA EL DOM
// =========================
document.addEventListener("DOMContentLoaded", () => {

    // =========================
    // ELEMENTOS
    // =========================
    const btnCrear = document.getElementById("btnCrearForo");
    const form = document.getElementById("createPost");
    const btnCancelar = document.getElementById("btnCancelar");


    // =========================
    // MOSTRAR / OCULTAR FORM
    // =========================
    if (btnCrear && form) {
        btnCrear.addEventListener("click", (e) => {
            e.preventDefault();
            form.classList.toggle("hidden");
        });
    }


    // =========================
    // CANCELAR FORM
    // =========================
    if (btnCancelar && form) {
        btnCancelar.addEventListener("click", () => {
            form.classList.add("hidden");

            // limpiar campos
            const input = form.querySelector("input[type='text']");
            const textarea = form.querySelector("textarea");

            if (input) input.value = "";
            if (textarea) textarea.value = "";
        });
    }


    // =========================
    // CLICK EN POSTS (PC + MÓVIL)
    // =========================
    document.addEventListener("click", (e) => {

        const post = e.target.closest(".post");

        if (!post) return;

        const id = post.dataset.id;

        if (id) {
            window.location.href = `foro.php?id=${id}`;
        }
    });

});