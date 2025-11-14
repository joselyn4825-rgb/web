function valida() {
    const nombre = document.getElementById("nombre").value.trim();
    const tel= document.getElementById("tel").value.trim();
    const email = document.getElementById("email").value.trim();
    const direccion = document.getElementById("direccion").value.trim();
    const fecha = document.getElementById("fecha").value.trim();
    const suscribir = document.getElementById("suscribir").value.trim();
    if (nombre === "" || /*Evalúa si alguna de estas variables está vacía*/
        tel === "" ||
        email === "" ||
        direccion === "" ||
        fecha === "") {
        alert("Por favor, complete todos los campos.");
        return false;
    }
    /* Validación básica del teléfono (solo números y 10 dígitos)*/
    const regexTelefono = /^[0-9]{10}$/;
    if (!regexTelefono.test(tel)) {
        alert("Ingrese un número de teléfono válido de 10 dígitos.");
        return false;
    }

    /* Validar formato de email*/
    const EmailRegex = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
    if (!EmailRegex.test(email)) {
        alert("Ingrese un correo electrónico válido.");
        return false;
    }
    if (!direccion) { /* si la variable sexo no tiene un valor "verdadero" se ejecuta*/
        alert("Seleccione su habilidad.");
        return false;
    }
    /* Validar longitud mínima de la contraseña*/
    if (fecha === "") { /*Si fecha está vacía*/
        alert("Seleccione una fecha.");
        return false;
    }
    if (suscribir === "") {
        alert("Seleccione suscribir.");
        return false;
    }
    return true;
}