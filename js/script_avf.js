// JavaScript Document

var aAutentica = $('#sesion a')
var loginForm = $('#login')
var divSesion = $('#sesion')



//alert(prodBox.attr('src'));

$(aAutentica).eq(1).click(function(){
	divSesion.css('display','none');
	loginForm.css('display','inherit');
	divMessage.text(' ');
	divMessage.css('border','0px');
	}
);

var divMessage = $('#messages');
if (divMessage.html() != null){alert(divMessage.html());}

$(document).ready(function(){
	$("#cbx_estado").change(function () {
		$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
		
		$("#cbx_estado option:selected").each(function () {
			id_estado = $(this).val();
			$.post("includes/getMunicipio.php", { id_estado: id_estado }, function(data){
				$("#cbx_municipio").html(data);
			});            
		});
	})
});
			
$(document).ready(function(){
	$("#cbx_municipio").change(function () {
		$("#cbx_municipio option:selected").each(function () {
			id_municipio = $(this).val();
			$.post("includes/getLocalidad.php", { id_municipio: id_municipio }, function(data){
				$("#cbx_localidad").html(data);
			});            
		});
	})
});