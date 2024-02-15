	function validarCadena() {
		inputElement = document.getElementById('cadenaInput');
		cadena = inputElement.value;
	
	if (cadena === cadena.toUpperCase())
	{
	document.getElementById('resultado').textContent = 'La cadena es MAYÚSCULA.';
	}
else if (cadena === cadena.toLowerCase()) {
        document.getElementById('resultado').textContent = 'La cadena es minúscula.';
    } else {
        document.getElementById('resultado').textContent = 'La cadena es mixta (mayúscula y minúscula).';
    }


	}

