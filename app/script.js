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
    var hoy = new Date();
    const pattern = new RegExp('^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$', 'i');
    //https://es.stackoverflow.com/questions/81041/expresion-regular-para-validar-letras-con-acentos-y-%C3%B1

    console.log("ha entrado");

    if (nombre === '' || !pattern.test(nombre)) {
        window.alert("El campo nombre está vacío o contiene un número");
        return false;
    }
    if (apellidos === '' || !pattern.test(apellidos)) {
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

    if (fechaNacimiento = new Date(fechaNacimiento) > hoy){
        window.alert("Tu fecha de nacimiento no puede ser mayor que la fecha de hoy")
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
    } else {
        alert('DNI erróneo');
            return false;
    }


   // window.alert("Formatos validos")
   // return true; // Devuelve true si todas las validaciones son exitosas
}


function modificarUsuario(){
    var nombre = document.getElementById('nombre').value;
    var apellidos = document.getElementById('apellidos').value;
    var telefono = document.getElementById('telefono').value;
    var fecha_nacimiento = document.getElementById('fecha_nacimiento').value;
    var email = document.getElementById('email').value;
    var hoy = new Date();
    const pattern = new RegExp('^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$', 'i');
    //https://es.stackoverflow.com/questions/81041/expresion-regular-para-validar-letras-con-acentos-y-%C3%B1

    if(nombre.length>0){
        if((!pattern.test(nombre))){
            window.alert("El campo nombre contiene un caracter no válido");
            return false;
        }
    }
    if(apellidos.length>0){
        if((!pattern.test(apellidos))){
            window.alert("El campo apellidos contiene un caracter no válido");
            return false;
        }
    }
    if(fecha_nacimiento.length>0){ 
                if(!(/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/.test(fecha_nacimiento))){ //https://foroayuda.es/php-regex-para-verificar-la-fecha-esta-en-formato-aaaa-mm-dd/
                    window.alert("La fecha introducida no sigue el patron: aaaa-mm-dd");
                    return false;
                }
                if (fecha_nacimiento = new Date(fecha_nacimiento) > hoy){
                    window.alert("Tu fecha de nacimiento no puede ser mayor que la fecha de hoy")
                    return false;
                }
            }       
     if(telefono.length>0){
          if(telefono.length !=9){
            window.alert("El numero debe ser de 9 digitos!");
            return false;
          }
        }  
    if(email.length>0){
        if(!(/^[a-zA-Z]+([\.]?[a-zA-Z0-9_-]+)*@[a-z0-9]+([\.-]+[a-z0-9]+)*\.[a-z]{2,4}$/.test(email))){ //https://es.stackoverflow.com/questions/142/validar-un-email-en-javascript-que-acepte-todos-los-caracteres-latinos
            window.alert("El email introducido no es correcto");
            return false;   
        }
    }  

}

function hasNumber(myString) {
    return /\d/.test(myString);
  }
  //https://stackoverflow.com/questions/5778020/check-whether-an-input-string-contains-a-number-in-javascript  

function check_videojuego(){
    var nombre = document.getElementById('Name').value;
    var dev = document.getElementById('Developer').value;
    var prod = document.getElementById('Producer').value;
    var gen = document.getElementById('Genre').value;
    var op_sys = document.getElementById('Operating_System').value;
    var date = document.getElementById('Date_Released').value;

    if (nombre.length == 0){
        window.alert("Ningún campo puede estar vacío");
        return false;
    }
    if (dev.length == 0){
        window.alert("Ningún campo puede estar vacío");
        return false;
    }
    if (prod.length == 0){
        window.alert("Ningún campo puede estar vacío");
        return false;
    }
    if (gen.length == 0){
        window.alert("Ningún campo puede estar vacío");
        return false;
    }
    if (op_sys.length == 0){
        window.alert("Ningún campo puede estar vacío");
        return false;
    }
    if (date.length == 0){
        window.alert("Ningún campo puede estar vacío");
        return false;
    }
}