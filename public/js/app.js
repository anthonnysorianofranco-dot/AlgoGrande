/* ========================= */
/* PRUEBA DE CONEXIÓN JS */
/* ========================= */
// Esto sirve para verificar que el archivo JS está cargando correctamente
console.log("JS funcionando");

// =========================
// ESPERAR A QUE CARGUE EL DOM
// =========================
// Asegura que todo el HTML esté cargado antes de ejecutar el JS
document.addEventListener("DOMContentLoaded", () => {

    // =========================
    // ELEMENTOS DEL DOM
    // =========================

    // Botón del sidebar para abrir el formulario de crear foro
    const btnCrear = document.getElementById("btnCrearForo");

    // Contenedor del formulario de crear foro
    const form = document.getElementById("createPost");

    // Botón para cancelar el formulario
    const btnCancelar = document.getElementById("btnCancelar");

    // =========================
    // MOSTRAR / OCULTAR FORMULARIO
    // =========================
    // Si existen los elementos necesarios
    if (btnCrear && form) {

        // Evento click en "Crear Foro"
        btnCrear.addEventListener("click", (e) => {

            // Evita que el link recargue la página
            e.preventDefault();

            // Alterna la clase hidden (mostrar/ocultar formulario)
            form.classList.toggle("hidden");
        });
    }

    // =========================
    // BOTÓN CANCELAR
    // =========================
    if (btnCancelar && form) {

        // Evento click en cancelar
        btnCancelar.addEventListener("click", () => {

            // Oculta el formulario
            form.classList.add("hidden");

            // =========================
            // LIMPIAR CAMPOS
            // =========================
            // Borra el input de texto (temática)
            form.querySelector("input[type='text']").value = "";

            // Borra el textarea (contenido)
            form.querySelector("textarea").value = "";
        });
    }

});