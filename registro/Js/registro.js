document.addEventListener("DOMContentLoaded", function () {
    const registrarBtn = document.getElementById("registrar");
    const mensajeEmergente = document.getElementById("mensajeEmergente");

    registrarBtn.addEventListener("click", function () {

        const registroExitoso = true; // Cambia a "false" si el registro no es exitoso

        if (registroExitoso) {
            // Mostrar el mensaje emergente
            mensajeEmergente.style.display = "block";

        // Ocultar el mensaje después de 10 segundos 
        setTimeout(function () {
            mensajeEmergente.style.display = "none";
        }, 10000); 

        }
    });
});
