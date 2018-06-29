// JavaScript Document

var nombre = $('#name');
var apaterno = $('#last_name');
var correo = $('#email');
var telefono = $('#phone');
var carrera = $('#career');
var ocupacion = $('#occupation');
var institucion = $('#institution');
var usuario = $('#user');
var contrasena = $('#password');
var ccontrasena = $('#cpassword');


$('#enviar').click(function(e){
  validar();
  e.preventDefault();
//  alert('hola');
  });

function validar(){
  var enviar = true;
  if(nombre.val() == ''){
    var txtvacio = $('<p class="error"></p>');
    txtvacio.text('Favor de escribir tu nombre');
    $('#txtname').append(txtvacio);
    nombre.css('border','1px solid red');
    enviar = false;
//    alert('hola');
  }
  if(apaterno.val() == ''){
    var txtvacio = $('<p class="error"></p>');
    txtvacio.text('Favor de escribir tu apellido paterno');
    $('#txtlast_name').append(txtvacio);
    apaterno.css('border','1px solid red');
    enviar = false;
//    alert('hola');
  }
  if(telefono.val() == ''){
    var txtvacio = $('<p class="error"></p>');
    txtvacio.text('Favor de escribir un telefono para contactarle');
    $('#txtphone').append(txtvacio);
    telefono.css('border','1px solid red');
    enviar = false;
//    alert('hola');
  }

  if(correo.val() == ''){
    var txtvacio = $('<p class="error"></p>');
    txtvacio.text('Favor de escribir tu correo');
    $('#txtemail').append(txtvacio);
    correo.css('border','1px solid red'); 
    enviar = false;
  }
  if((correo.val().indexOf('@') == -1) || (correo.val().indexOf('.') == -1)){
    var txtvacio = $('<p class="error"></p>'); 
    txtvacio.text('Favor de llenar correctamente tu correo. Ejemplo:[usuario]|@[dominio].[tipo]');
    $('#txtemail').append(txtvacio);    
    correo.css('border','1px solid red');
    enviar= false;
  }
  if(carrera.val() == ''){
    var txtvacio = $('<p class="error"></p>');
    txtvacio.text('Favor de escribir la carrera');
    $('#txtcareer').append(txtvacio);
    carrera.css('border','1px solid red');
    enviar = false;
//    alert('hola');
  }
  if(ocupacion.val() == ''){
    var txtvacio = $('<p class="error"></p>');
    txtvacio.text('Favor de escribir su ocupación');
    $('#txtoccupation').append(txtvacio);
    ocupacion.css('border','1px solid red');
    enviar = false;
//    alert('hola');
  }
  if(institucion.val() == ''){
    var txtvacio = $('<p class="error"></p>');
    txtvacio.text('Favor de indicar la institución donde colabora');
    $('#txtinstitution').append(txtvacio);
    institucion.css('border','1px solid red');
    enviar = false;
//    alert('hola');
  }
  if(usuario.val() == ''){
    var txtvacio = $('<p class="error"></p>');
    txtvacio.text('Favor de escribir tu nombre');
    $('#txtuser').append(txtvacio);
    usuario.css('border','1px solid red');
    enviar = false;
//    alert('hola');
  }
  if(contrasena.val() == ''){
    var txtvacio = $('<p class="error"></p>');
    txtvacio.text('Favor de escribir tu nombre');
    $('#txtpassword').append(txtvacio);
    contrasena.css('border','1px solid red');
    enviar = false;
//    alert('hola');
  }
  if(ccontrasena.val() == ''){
    var txtvacio = $('<p class="error"></p>');
    txtvacio.text('Favor de escribir tu nombre');
    $('#txtcpassword').append(txtvacio);
    ccontrasena.css('border','1px solid red');
    enviar = false;
//    alert('hola');
  }  
  if (ccontrasena.val() != contrasena.val()){
    var txtvacio = $('<p class="error"></p>');
    txtvacio.text('La contraseña debe coincidir');
    $('#txtcpassword').append(txtvacio);
    ccontrasena.css('border','1px solid red');
    enviar = false;    
  }
  if (enviar == true) {
    $('#creacuenta').submit();
//    alert('Gracias por registrarse en AVF-IIEc');
  }
}

