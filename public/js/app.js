console.log("JS funcionando"); // Verifica que el archivo JS esté cargando

// Espera a que todo el HTML cargue antes de ejecutar el código
document.addEventListener("DOMContentLoaded", () => {

    // =========================
    // REFERENCIAS A ELEMENTOS
    // =========================

    // Botón del menú "Crear Foro"
    const btnCrear = document.getElementById("btnCrearForo");

    // Contenedor del formulario de crear foro
    const form = document.getElementById("createPost");

    // Botón cancelar dentro del formulario
    const btnCancelar = document.getElementById("btnCancelar");


    // =========================
    // MOSTRAR / OCULTAR FORMULARIO
    // =========================

    // Si existen el botón y el formulario
    if (btnCrear && form) {

        btnCrear.addEventListener("click", (e) => {

            // Evita que el link haga navegación (#)
            e.preventDefault();

            // Alterna la clase "hidden"
            // Si está oculto → lo muestra
            // Si está visible → lo oculta
            form.classList.toggle("hidden");
        });
    }


    // =========================
    // BOTÓN CANCELAR
    // =========================

    if (btnCancelar && form) {

        btnCancelar.addEventListener("click", () => {

            // Oculta el formulario
            form.classList.add("hidden");

            // Limpia el textarea (contenido del foro)
            const textarea = form.querySelector("textarea");

            if (textarea) textarea.value = "";
        });
    }


    // =========================
    // CLICK EN POST (REDIRECCIÓN)
    // =========================

    // Selecciona todos los div con clase "post"
    document.querySelectorAll(".post").forEach(post => {

        // Agrega evento click a cada post
        post.addEventListener("click", () => {

            // Obtiene el id desde data-id
            const id = post.dataset.id;

            // Si existe el id
            if (id) {

                // Redirige a foro.php pasando el id por URL
                // Ejemplo: foro.php?id=3
                window.location.href = `foro.php?id=${id}`;
            }
        });
    });

});