// script.js

/*
function verificarFormato(){
    if(document.getElementById('nombre').value==='' || !isNaN(document.getElementById('nombre').value)){ //El nombre no puede estar vacio o tener numeros
        alert("El campo nombre esta vacio o contiene un numero");
        return false;
    }
    else if(document.getElementById('apellido').value==='' || !isNaN(document.getElementById('nombre').value)){ //El apellido no puede estar vacio o tener numeros 
        alert("El campo nombre esta vacio o contiene un numero");
        return false;
    }
    else if(document.getElementById('telefono').value.length!=9){ //El numero de telefono debe tener 9 cifras
        alert("El numero debe ser de 9 digitos");
        return false;
    }
    else if(!(preg_match('/^\d{4}-\d{2}-\d{2}$/', document.getElementById(fecha_nacimiento)))){ //La fecha de nacimiento tiene que cumplir el formato aaaa-mm-dd
        alert("La fecha introducida no sigue el patron: aaaa-mm-dd");
        return false;
   }
   else if(!(filter_var(document.getElementById(email), FILTER_VALIDATE_EMAIL))){ //El email tiene que tener formato ejemplo@servidor.extensión
    alert("El email introducido no es correcto");
    return false;
}
    
else if(/^\d{8}[a-zA-Z]$/.test(document.getElementById('dni').value)) {
    var numero = document.getElementById('dni').value.substr(0,8);
    var letra = document.getElementById('dni').value.substr(8,1);
    const letrasValidas = 'TRWAGMYFPDXBNJZSQVHLCKE';
    if (!(letrasValidas.charAt(numero%23) == letra.toUpperCase)){
        alert('DNI erroneo');
        return false;
    }

    else{
        alert('DNI erroneo');
        return false;

    }
}
}
*/

function verificarFormato() {
    var nombre = document.getElementById('nombre').value;
    var apellidos = document.getElementById('apellidos').value;
    var dni = document.getElementById('dni').value;
    var telefono = document.getElementById('telefono').value;
    var fechaNacimiento = document.getElementById('fecha_nacimiento').value;
    var email = document.getElementById('email').value;

    console.log("ha entrado");

    if (nombre === '' || !isNaN(nombre)) {
        window.alert("El campo nombre está vacío o contiene un número");
        return false;
    }
    if (apellidos === '' || !isNaN(apellidos)) {
        window.alert("El campo apellidos está vacío o contiene un número");
        return false;
    }
    if (telefono.length !== 9) {
        window.alert("El número debe tener 9 dígitos");
        return false;
    }
    if (!/^\d{4}-\d{2}-\d{2}$/.test(fechaNacimiento)) {
        window.alert("La fecha introducida no sigue el patrón: aaaa-mm-dd");
        return false;
    }
    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        window.alert("El email introducido no es correcto");
        return false;
    }

    if (/^\d{8}[a-zA-Z]$/.test(dni)) {
        var numero = dni.substr(0, 8);
        var letra = dni.substr(8, 1);
        const letrasValidas = 'TRWAGMYFPDXBNJZSQVHLCKE';
        if (letrasValidas.charAt(numero % 23).toUpperCase() !== letra.toUpperCase()) {
            alert('DNI erróneo');
            return false;
        }
    }

    return true; // Devuelve true si todas las validaciones son exitosas
}
