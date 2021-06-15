function cerrarModal(){
    document.getElementById("myModal").style.display = "none"
  //  document.getElementById("myModal").className = document.getElementById("myModal").className.replace("show", "")
}
     
function abrirModal(name, tag){
    document.getElementById("mensajeError1").innerHTML = name;
    document.getElementById("mensajeError1").className = name;
    document.getElementById("mensajeError2").innerHTML = tag;
    document.getElementById("mensajeError2").className = tag;
    setLang();
    document.getElementById("myModal").style.display = "block"
    //document.getElementById("myModal").className += "show"
}

window.onclick = function(event) {
    if (event.target == document.getElementById("myModal")) {
        cerrarModal();
    }
}  

//Comprueba que atributo no es vacio
function esNoVacio(idelemento){
    var correcto = false;
    valor = document.getElementById(idelemento).value;
    nombre = document.getElementById(idelemento).name;
    longitud = document.getElementById(idelemento).value.length;
    if ((valor == null) || (longitud == 0)){
        abrirModal(nombre, "empty");
        correcto = false;
    } else {
        correcto = true;
    }
    
    if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    } else {
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
    }
}

//Comprueba que atributo es letras y numeros pudiendo estar vacio
function comprobarLetrasNumerosvacio(idelemento, size) {
    var correcto = true;
    valor = document.getElementById(idelemento).value;
    longitud = document.getElementById(idelemento).value.length;
    if((valor == null) || (longitud == 0)){
        document.getElementById(idelemento).style.borderColor = "green";
        return true;
    }

    if (document.getElementById(idelemento).value.length > size) {
        abrirModal(document.getElementById(idelemento).name, "max-size");
        correcto = false;
    }
    var patron = /^[A-zÑñÀ-ú0-9]+$/;
    if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(document.getElementById(idelemento).name, "solo-letras-numeros");
        correcto = false;
    }
    if (correcto){
        document.getElementById(idelemento).style.borderColor = "green";
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
    }
}

//Comprueba que atributo es Dni pudiendo estar vacio
function comprobarLetrasNumerosvacioDNI(idelemento, size) {
    var correcto = true;
    valor = document.getElementById(idelemento).value;
    longitud = document.getElementById(idelemento).value.length;
    if((valor == null) || (longitud == 0)){
        document.getElementById(idelemento).style.borderColor = "green";
        return true;
    }

    if (document.getElementById(idelemento).value.length > size) {
        abrirModal(document.getElementById(idelemento).name, "max-size");
        correcto = false;
    }
    var patron = /^[A-z0-9]+$/;
    if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(document.getElementById(idelemento).name, "solo-letras DNI-numeros");
        correcto = false;
    }
    if (correcto){
        document.getElementById(idelemento).style.borderColor = "green";
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
    }
}

//Comprueba que atributo es letras y numeros
function comprobarLetrasNumeros(idelemento, size) {
    var correcto = true;
    if (document.getElementById(idelemento).value.length > size) {
        abrirModal(document.getElementById(idelemento).name, "max-size");
        correcto = false;
    }
    var patron = /^[A-zÑñÀ-ú0-9]+$/;
    if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(document.getElementById(idelemento).name, "solo-letras-numeros");
        correcto = false;
    }
    if (correcto){
        document.getElementById(idelemento).style.borderColor = "green";
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
    }
}

//Comprueba que atributo es letras 
function comprobarSoloLetras(idelemento, size) {
    var correcto = true;
    if (document.getElementById(idelemento).value.length > size) {
        abrirModal(document.getElementById(idelemento).name, "max-size");
        correcto = false;
    }
    var patron = /^[A-zÑñÀ-ú\u00f1\u00d1]*$/g;
    if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(document.getElementById(idelemento).name, "solo-letras");
        correcto = false;
    }
    if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
    }
}

//Comprueba que atributo es letras, numeros pudiendo y espacios
function comprobarLetrasEspacios(idelemento, size) {
    var correcto = true;
    if (document.getElementById(idelemento).value.length > size) {
        abrirModal(document.getElementById(idelemento).name, "max-size");
        correcto = false;
    }
    var patron = /^[A-zÑñÀ-ú\u00f1\u00d1\s]+$/g;
    if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(document.getElementById(idelemento).name, "solo-letras-espacios");
        correcto = false;
    }
    if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
    }
}

//Comprueba que atributo es letras, numeros y espacios pudiendo estar vacio
function comprobarLetrasEspaciosvacio(idelemento, size) {
    var correcto = true;
    valor = document.getElementById(idelemento).value;
    longitud = document.getElementById(idelemento).value.length;
    if((valor == null) || (longitud == 0)){
        document.getElementById(idelemento).style.borderColor = "green";
        return true;
    }
    if (document.getElementById(idelemento).value.length > size) {
        abrirModal(document.getElementById(idelemento).name, "max-size");
        correcto = false;
    }
    var patron = /^[A-zÑñÀ-ú\u00f1\u00d1\s]+$/g;
    if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(document.getElementById(idelemento).name, "solo-letras-espacios");
        correcto = false;
    }
    if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
    }
}

//Comprueba el atributo es letras o guion
function comprobarLetrasGuiones(idelemento, size) {
    var correcto = true;
    if (document.getElementById(idelemento).value.length > size) {
        abrirModal(document.getElementById(idelemento).name, "max-size");
        correcto = false;
    }
    var patron = /^[-_A-zÑñÀ-ú\u00f1\u00d1]+$/g;
    if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(document.getElementById(idelemento).name, "solo-letras-guiones");
        correcto = false;
    }
    if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
    }
}

//Comprueba que atributo es letras,espacios numeros y caracteres especiales pudiendo estar vacio
function comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio(idelemento, size) {
    var correcto = true;
    
    valor = document.getElementById(idelemento).value;
    longitud = document.getElementById(idelemento).value.length;
    if((valor == null) || (longitud == 0)){
        document.getElementById(idelemento).style.borderColor = "green";
        return true;
    }
    if (document.getElementById(idelemento).value.length > size) {
        abrirModal(document.getElementById(idelemento).name, "max-size");
        correcto = false;
    }
    var patron = /^[.,/&ªºA-z0-9ÑñÀ-ú\s\u00f1\u00d1]+$/g;
    if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(document.getElementById(idelemento).name, "solo-letras-espacios-numeros-especiales");
        correcto = false;
    }
    if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
    }
}

//comprueba email al buscar puede estar vacio
function comprobaremailbuscarvacio(idelemento, size) {
    var correcto = true;
    
    valor = document.getElementById(idelemento).value;
    longitud = document.getElementById(idelemento).value.length;
    if((valor == null) || (longitud == 0)){
        document.getElementById(idelemento).style.borderColor = "green";
        return true;
    }
    if (document.getElementById(idelemento).value.length > size) {
        abrirModal(document.getElementById(idelemento).name, "max-size");
        correcto = false;
    }
    var patron = /^[.@A-z0-9ÑñÀ-ú\s]+$/g;
    if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(document.getElementById(idelemento).name, "solo-caracteres-email");
        correcto = false;
    }
    if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
    }
}

//Comprueba telefono al buscar
function comprobarTelefonobuscar(idelemento, size) {
    var correcto = true;
    
    valor = document.getElementById(idelemento).value;
    longitud = document.getElementById(idelemento).value.length;
    if((valor == null) || (longitud == 0)){
        document.getElementById(idelemento).style.borderColor = "green";
        return true;
    }
    if (document.getElementById(idelemento).value.length > size) {
        abrirModal(document.getElementById(idelemento).name, "max-size");
        correcto = false;
    }
    var patron = /^[-+0-9\s ]+$/g;
    if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(document.getElementById(idelemento).name, "solo-numeros, espacios y caracteres de telefono(+-)");
        correcto = false;
    }
    if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
    }
}

//Comprueba que atributo es letras,espacios numeros y caracteres especiales
function comprobarLetrasEspaciosNumerosCaracteresEspeciales(idelemento, size) {
    var correcto = true;
    if (document.getElementById(idelemento).value.length > size) {
        abrirModal(document.getElementById(idelemento).name, "max-size");
        correcto = false;
    }
    var patron = /^[.,/&ªºA-z0-9ÑñÀ-ú\s\u00f1\u00d1]+$/g;
    if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(document.getElementById(idelemento).name, "solo-letras-espacios-numeros-especiales");
        correcto = false;
    }
    if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
    }
}
  
//Comprueba que atributo es email
function comprobarEmail(idelemento, size) {
    var correcto = true;
    if (document.getElementById(idelemento).value.length > size) {
        abrirModal(document.getElementById(idelemento).name, "max-size");
        correcto = false;
    }
    var patron = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    if (!patron.test(document.getElementById(idelemento).value)){ 
        abrirModal(document.getElementById(idelemento).name, "formato-email");
        correcto = false;
    }
    if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
    }
}

//Comprueba que atributo es email pudiendo estar vacio
function comprobarEmailvacio(idelemento, size) {
    var correcto = true;
    valor = document.getElementById(idelemento).value;
    longitud = document.getElementById(idelemento).value.length;
    if((valor == null) || (longitud == 0)){
        document.getElementById(idelemento).style.borderColor = "green";
        return true;
    }
    if (document.getElementById(idelemento).value.length > size) {
        abrirModal(document.getElementById(idelemento).name, "max-size");
        correcto = false;
    }
    var patron = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    if (!patron.test(document.getElementById(idelemento).value)){ 
        abrirModal(document.getElementById(idelemento).name, "formato-email");
        correcto = false;
    }
    if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
    }
}

//Comprueba atributo es telefono
function comprobarTelefono(idelemento) {
    var correcto = true;
    var patron = /^(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}$/;
    valor = document.getElementById(idelemento).value;
    longitud = document.getElementById(idelemento).value.length;
    if((valor == null) || (longitud == 0)){
        document.getElementById(idelemento).style.borderColor = "green";
        return true;
    }
    if (!patron.test(document.getElementById(idelemento).value) || (valor == null) || (longitud == 0)){ 
        abrirModal(document.getElementById(idelemento).name, "formato-telefono");
        correcto = false;
    }
    if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
    }
}

//Comprueba atributo es DNI
function comprobarDNI(idelemento) {
    var correcto = true;
    var patron = /^((([X-Z])|([LM])){1}([-]?)((\d){7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]))$/;
    var empieza = /^(([X-Z])|([LM])){1}([-]?)/;

    valor = document.getElementById(idelemento).value;
    longitud = document.getElementById(idelemento).value.length;
    if((valor == null) || (longitud == 0)){
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    if (!patron.test(document.getElementById(idelemento).value)){ 
        abrirModal(document.getElementById(idelemento).name, "formato-DNI");
        correcto = false;
    }
    if (correcto){    
        
        if  (empieza.test(document.getElementById(idelemento).value)){
            document.getElementById(idelemento).style.borderColor = 'green';
            return true;             
        }
        //Se separan los números de la letra
        var letraDNI = document.getElementById(idelemento).value.substring(8, 9).toUpperCase();
        var numDNI = parseInt(document.getElementById(idelemento).value.substring(0, 8));
        //Se calcula la letra correspondiente al número
        var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
        var letraCorrecta = letras[numDNI % 23];
        if(letraDNI!= letraCorrecta){
            abrirModal(document.getElementById(idelemento).name, "formato-DNI");
            correcto = false;
        } else {
            document.getElementById(idelemento).style.borderColor = 'green';
            return true;          
          }
    }
    else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
    }
}

//Comprobacion es nif
function nif(dni) {
    var numero
    var letr
    var letra
    var expresion_regular_dni
   
    expresion_regular_dni = /^\d{8}[a-zA-Z]$/;
   
    if(expresion_regular_dni.test (dni) == true){
       numero = dni.substr(0,dni.length-1);
       letr = dni.substr(dni.length-1,1);
       numero = numero % 23;
       letra='TRWAGMYFPDXBNJZSQVHLCKET';
       letra=letra.substring(numero,numero+1);
      if (letra!=letr.toUpperCase()) {
         alert('Dni erroneo, la letra del NIF no se corresponde');
       }else{
         alert('Dni correcto');
       }
    }else{
       alert('Dni erroneo, formato no válido');
     }
  }

  //comprueba el tipo de usuario
function comprobarTipo(idelemento) {
    var correcto = true;
    if (idelemento!='estandar' || idelemento!='administrador' ){ 
        abrirModal(document.getElementById(idelemento).name, "formato-tipo");
        correcto = false;
    }
    if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
    }
}

//Comprueba si el atributo validacion es correcto -si o no
function comprobarValidado(idelemento) {
    var correcto = true;
    if((valor == null) || (longitud == 0)){
        document.getElementById(idelemento).style.borderColor = "green";
        return true;
    }
    if (idelemento!='Si' || idelemento!='No' ){ 
        abrirModal(document.getElementById(idelemento).name, "formato-validado");
        correcto = false;
    }
    if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
    }
}

//Comprueba numeros
function comprobarNumeros(idelemento) {
    var correcto = true;
    var patron = /^\d*$/;
    if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(document.getElementById(idelemento).name, "solo-numeros");
        correcto = false;
    }
    if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
    }
}

//Comprueba numeros solamente
function comprobarSoloNumeros(idelemento, size) {
    var correcto = true;
    var patron = /^\d*$/;
    if (document.getElementById(idelemento).value.length > size) {
        abrirModal(document.getElementById(idelemento).name, "max-size");
        correcto = false;
    }
    if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(document.getElementById(idelemento).name, "solo-numeros");
        correcto = false;
    }
    if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
    }
}

//Encripta
function encriptar(){
    document.getElementById('contrasenha').value = hex_md5(document.getElementById('contrasenha').value);
    return true;
}

//Comprueba longitud minima atributo    
function comprobarLongitudMinima(idelemento, size){
    var correcto = false;
    longitud = document.getElementById(idelemento).value.length;
    if (longitud < size){
        abrirModal(document.getElementById(idelemento).name, "min-size");
        correcto = false;
    } else {
        correcto = true;
    }
    if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
    }
}

//Comprueba longitud maxima atributo    
function comprobarLongitudMaxima(idelemento, size){
    var correcto = false;
    longitud = document.getElementById(idelemento).value.length;
    if (longitud > size){
        abrirModal(document.getElementById(idelemento).name, "max-size");
        correcto = false;
    } else {
        correcto = true;
    }
    if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
    }
    else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
    }
}

//Comprueba atributos logearse
function comprobar_login(){
    if(
        esNoVacio('username') && comprobarLetrasNumeros('username',30) && comprobarLongitudMinima('username', 3) && comprobarLongitudMaxima('username', 30) &&
        esNoVacio('contrasenha')&& comprobarLongitudMinima('contrasenha', 3) && comprobarLongitudMaxima('contrasenha', 100)
    ){
        encriptar();
        return true;
    } else {
        return false;
    }
}

//Comprueba registro
function comprobar_registro() {
    if (
        esNoVacio('username') && comprobarLetrasNumeros('username',30) && comprobarLongitudMinima('username', 3) && comprobarLongitudMaxima('username', 30) &&
        esNoVacio('nombre') && comprobarLetrasEspacios('nombre',60) && comprobarLongitudMaxima('nombre', 20) && comprobarLongitudMinima('nombre', 2) &&
        esNoVacio('apellidos') && comprobarLetrasEspacios('apellidos',60)  && comprobarLongitudMaxima('apellidos', 200)  && comprobarLongitudMinima('apellidos', 3)&&
        esNoVacio('contrasenha')&& comprobarLongitudMinima('contrasenha', 3) && comprobarLongitudMaxima('contrasenha', 100) &&
        esNoVacio('email') && comprobarEmail('email',100) &&
        comprobarLongitudMaxima('descripcion', 255) && comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio('descripcion', 255) &&
        comprobarTelefono('telefono',9) &&
        comprobarDNI('DNI') 
    ) {
        encriptar();
        return true;
    } else return false;
}

//Comprueba los atributo de un usuario 
function comprobar_usuario() {
    if (
        
        esNoVacio('nombre') && comprobarLetrasEspacios('nombre',60) && comprobarLongitudMaxima('nombre', 20) && comprobarLongitudMinima('nombre', 2) &&
        esNoVacio('apellidos') && comprobarLetrasEspacios('apellidos',60)  && comprobarLongitudMaxima('apellidos', 200) && comprobarLongitudMinima('apellidos', 3) &&
        esNoVacio('contrasenha')&& comprobarLongitudMinima('contrasenha', 3) && comprobarLongitudMaxima('contrasenha', 100) &&
        esNoVacio('email') && comprobarEmail('email',100) && comprobarLongitudMaxima('email', 100) &&
        comprobarLongitudMaxima('descripcion', 255) && comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio('descripcion', 255) &&
        comprobarTelefono('telefono',9) &&
        comprobarDNI('DNI') 
    ) {
        return true;
    } else return false;
}

//Comprueba los atributo de un proyecto
function comprobar_proyecto() {
    if (
        
        esNoVacio('nombre') && comprobarLetrasEspacios('nombre',20) && comprobarLongitudMaxima('nombre', 20) && comprobarLongitudMinima('nombre', 2) &&
        comprobarLongitudMaxima('descripcion', 255) && comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio('descripcion', 255) 
    ) {
        return true;
    } else return false;
}

//Comprueba los atributo de un grupo
function comprobar_grupo() {
    if (
        
        esNoVacio('nombre') && comprobarLetrasEspacios('nombre',20) && comprobarLongitudMaxima('nombre', 20) && comprobarLongitudMinima('nombre', 2) &&
        comprobarLongitudMaxima('descripcion', 255) && comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio('descripcion', 255) 
    ) {
        return true;
    } else return false;
}

//Comprueba los atributo de un mensaje
function comprobar_mensaje() {
    if (     
        esNoVacio('titulo') && comprobarLetrasEspacios('titulo',20) && comprobarLongitudMaxima('titulo', 20) && comprobarLongitudMinima('titulo', 2) &&
        comprobarLongitudMaxima('cuerpo', 255) && comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio('cuerpo', 255) 
    ) {
        return true;
    } else return false;
}

//Comprueba los atributo de un mensaje
function comprobar_mensaje_header() {
        return true;
}

//Comprueba los atributo de un mensaje al buscar
function comprobar_mensaje_buscar() {

    if (
        comprobarLetrasEspaciosvacio('titulo',20) && comprobarLongitudMaxima('titulo', 20)  
    ) {
        return true;
    } else return false;
}

//Comprueba los atributo de un usuario al buscar
function comprobar_usuario_buscar() {
    if (
       comprobarLetrasNumerosvacio('username',30)  && comprobarLongitudMaxima('username', 30) &&
        comprobarLetrasEspaciosvacio('nombre',60) && comprobarLongitudMaxima('nombre', 20) &&
        comprobarLetrasEspaciosvacio('apellidos',60)  && comprobarLongitudMaxima('apellidos', 200)  &&
        comprobaremailbuscarvacio('email',100) && comprobarLongitudMaxima('email', 100) &&
        comprobarTelefonobuscar('telefono',9) &&
        comprobarLetrasNumerosvacioDNI('DNI') 
    ) {
        return true;
    } else return false;
}

//Comprobar grupo al bucar
function comprobar_grupo_buscar() {
    if (
        comprobarLetrasEspaciosvacio('nombre',60) && comprobarLongitudMaxima('nombre', 20) 
    ) {
        return true;
    } else return false;
}

//Comprobar actividades al bucar
function comprobar_actividades_buscar() {
    if (
        comprobarLetrasEspaciosvacio('nombre',20) && comprobarLongitudMaxima('nombre', 20) 
    ) {
        return true;
    } else return false;
}

//Comprobar documentacion al bucar
function comprobar_documentacion() {

        return true;
}

//Comprobar actividades

function comprobar_actividades() {
    if (
        esNoVacio('nombre') && comprobarLetrasEspaciosvacio('nombre',20) && comprobarLongitudMaxima('nombre', 20) 
    ) {
        return true;
    } else return false;
}

//Comprobar actividad
function comprobar_actividad() {
    if (
        comprobarLongitudMaxima('descripcion', 255) && comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio('descripcion', 255) &&
        esNoVacio('ecoins') && comprobarNumeros('ecoins') &&
        esNoVacio('nombre') && comprobarLetrasEspaciosvacio('nombre',20) && comprobarLongitudMaxima('nombre', 20) 
    ) {
        return true;
    } else return false;
}

//Comprobar actividad al bucar
function comprobar_actividad_buscar() {
    if (
        comprobarNumeros('ecoins') &&
        comprobarLetrasEspaciosvacio('nombre',30) && comprobarLongitudMaxima('nombre', 20) 
    ) {
        return true;
    } else return false;
}

//Comprobar proyecto al bucar
function comprobar_proyecto_buscar() {
    if (
        comprobarLetrasEspaciosvacio('nombre',60) && comprobarLongitudMaxima('nombre', 20) 
    ) {
        return true;
    } else return false;
}

