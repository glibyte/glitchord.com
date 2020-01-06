var myInput = document.getElementById("psw");
var number = document.getElementById("number");
var length = document.getElementById("length");
// Cuando el usuario hace clic en el campo de contraseña, muestra el cuadro de mensaje
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}
// Cuando el usuario haga clic fuera del campo de contraseña, oculte el cuadro de mensaje
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}
// Cuando el usuario comienza a escribir algo dentro del campo de contraseña
myInput.onkeyup = function() {
    // Validar numeros
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }
    // Validar longitud
    if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }
}
//cambiar de ventana
var inlo = document.getElementById("c2");
inlo.onclick = function() {
    document.getElementById("id02").style.display = "none";
    document.getElementById("id01").style.display = "block";
}