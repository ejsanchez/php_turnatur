<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
  <meta charset="utf8">
  <title>TurNatur - IIEc</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Shekhar Sharma">
  <meta name="version" content="1.0.2b">
  <link rel="stylesheet" href="assets/fonts/raphaelicons.css">
  <link rel="stylesheet" href="assets/css/styles.min.css">
  <link rel="stylesheet" href="css/style_avf.css">
  <script src="assets/js/libs/modernizr-2.5.2.min.js"></script>
</head>
<!--[if lt IE 7]> <body class="ie6 oldies"> <![endif]-->
<!--[if IE 7]>    <body class="ie7 oldies"> <![endif]-->
<!--[if IE 8]>    <body class="ie8 oldies"> <![endif]-->
<!--[if gt IE 8]><!--><body><!--<![endif]-->
<!--[if lte IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
<div id="fb-root"></div>
<div id="fb-root"></div>

  <header class="clearfix">
      <div class="encabezado_A">

	  
      <div class="container">
        
         <table>
           <tr>
             <td style="padding:15px">
			  <a id="logo" href="http://www.unam.mx"><img src="assets/images/logo_unam.png"  width="110"></img></a>
		     </td>
             <td align="center" style="padding-top:25px"><a id="logo" href="index.php"><img src="assets/images/titulo.png" ></img></a></td>
             <td align="right" style="padding:17px"><a id="logo" href="http://www.iiec.unam.mx"><img src="assets/images/LogoIIEcBco.png" width="110"></a></td>
           </tr>
         </table>
         <div class="encabezado"></div>
      </div>
            </div>
            </div>
  </header>


   <section role="banner">
     
       <article role="main" class="clearfix">
<?php    
  include('./menu.php');
?>


          <div class="post">
		  

<?php
    if(isset($_GET['typemess']) and 
       isset($_GET['message'])){
        $typemess = $_GET['typemess'];
        $message = $_GET['message'];
        echo "<div id='messages' class=$typemess>$message</div>";
    }
?>

             <h2>TURNATUR. Turismo de naturaleza. Factores de éxito y fracaso </h2>
             <strong>
			 <p>Producto resultado del proyecto de investigación "Las empresas comunitarias de factores de exito y fracaso" con apoyo del Fondo Sectorial para l Investigación, el Desarrollo y la Innovación Tecnológica en Turismo.</p>
             <p>SECTUR_CONACYT 148201. </p>
			 <p>Responsable: Dr. Gustavo López Pardo.</p>
			 </strong>
          </div>
<?php 
  include('./aside.php');
?>		   
       </article>
       
   </section> <!-- // banner ends -->
   
  <footer role="contentinfo">
      <p>
		<span class="left">Agosto,2018<br/>Hecho en M&eacute;xico, 2018 © D.R. Universidad Nacional Aut&oacute;noma de M&eacute;xico.
Instituto de Investigaciones Econ&oacute;micas. Circuito Mario de la Cueva s/n, Ciudad de la Investigaci&oacute;n en Humanidades, Ciudad Universitaria, C.P. 04510, M&eacute;xico, D.F.
Esta p&aacute;gina puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su direcci&oacute;n electr&oacute;nica. De otra forma requiere permiso previo por escrito de la instituci&oacute;n.</span>
      </p>
  </footer>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="assets/js/libs/jquery-1.7.1.min.js"><\/script>')</script>
  <script src="assets/js/script.min.js"></script>
  <script src="js/script_avf.js"></script>
  <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
  <script language="javascript">
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
		</script>
</body>
</html>
