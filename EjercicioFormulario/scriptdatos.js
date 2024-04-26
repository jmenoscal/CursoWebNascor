
    // Función para obtener los datos y mostrarlos
    function obtenerDatos() {
            const nombre = document.getElementById("nombreInput").value;
            const telefono = document.getElementById("telefonoInput").value;
            const apellido1 = document.getElementById("apellido1").value;
            const apellido2 = document.getElementById("apellido2").value;
            const fechaNacimiento = document.getElementById("fechaNacimiento").value;
            const email = document.getElementById("email").value;
            const turno = document.querySelector("input[name='turno']:checked").value;
            const curso = document.getElementById("curso").value;
            const privacidad = document.getElementById("privacidad").checked;


        // Validación de campos obligatorios
            if (!nombre || !apellido1 || !apellido2 || !telefono || !fechaNacimiento || !email ) {
                alert("Por favor, completa todos los campos obligatorios.");
                return;
            }


        // Validar longitud mínima del nombre y que no contenga números
            if ( nombre.length < 3 || !/^[A-Za-z\s]+$/.test(nombre) || !/^[A-Za-z\s]+$/.test(apellido1) || !/^[A-Za-z\s]+$/.test(apellido2)) {
                alert("Los campos de nombre y apellidos deben contener solo letras.");
                return;
            }


        // Validar longitud del teléfono (9 dígitos)
            if (!/^\d{9}$/.test(telefono)) {
                alert("El teléfono debe tener exactamente 9 números sin guiones.");
                return;
            }


        // Validación de formato de email
            const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
            if (!email.match(emailRegex)) {
                alert("Por favor, introduce un email válido.");
                return;
            }

            // Validación de selección de turno
            if (!turno) {
                alert("Selecciona un turno (mañana o tarde).");
                return false;
            }

            // Mostrar los datos
        if (privacidad) {
            resultadoTotal = document.getElementById("resultadoTotal");
            resultadoTotal.innerHTML = "Tus Datos introducidos son:<br>Nombre: " + nombre + "<br>Primer Apellido: " + apellido1 + "<br>Segundo Apellido: " + apellido2 + "<br>Teléfono: " + telefono + "<br>Fecha de Nacimiento: " + fechaNacimiento + "<br>Email: " + email + "<br>Turno: " + turno + "<br>curso: " + curso;
        }
        else {
        alert('Debes aceptar la cláusula de privacidad para enviar el formulario.');
        }

    }
