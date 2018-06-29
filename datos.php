<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
  <meta charset="utf8">
  <title>AVF - IIEc</title>
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
             <td width="240" rowspan="2"><div class="logoscuadro"><a id="logo" href="http://www.unam.mx"><img src="assets/images/unam.png"></img></a></br>
         <a id="logo" href="http://www.iiec.unam.mx"><img src="assets/images/iiec_sim.png"></img></a></div></td>
             <td></td>
             <td align="right" style="padding-bottom:10px"><img src="assets/images/titulo.png"></td>
           </tr>
           <tr>
             <td class="var">
             </td>
             <td align="right"><img src="assets/images/academicos.png"></td>
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
      echo "
        <div id='messages' class=$typemess>$message</div>
      ";
    }
?>

             <h2>Para empezar</h2>
            
<p>
              <ol>
                <li>Reg&iacute;strese</li>
                <li>La vigencia de su cuenta es de un mes, con posibilidad de renovaci&oacute;n</li>
                <li>Haga sus consultas considerando que:<br/>
 		  <ul>



			<li>Los datos son consolidados y acumulados al 4o. trimestre de cada año</li>
			<li>Las cantidades, tal cual son proporcionados por la BMV, son presentadas en valores nominales y en miles de pesos</li>
			<li>La muestra de empresas del periodo de 1974 a 1996 presenta un n&uacute;mero de cuentas menor a las contempladas en el cat&aacute;logo actualizado de la BMV</li>
			<li>La informaci&oacute;n se actualiza cada a&ntilde;o cuando est&aacute;n disponibles los estados consolidados.</li>
		  </ul>
		</li>
		<li>Si lo desea, descargue los resultados en un archivo compatible con una hoja de c&aacute;lculo</li>
              </ol>
</p>

           </div>

<?php    
  include('./aside.php');
?>	   
       </article>
       
   </section> <!-- // banner ends -->
   
  <footer role="contentinfo">
      <p>
		<span class="left">Agosto 10,2015<br/>Hecho en M&eacute;xico, 2010-2015 © D.R. Universidad Nacional Aut&oacute;noma de M&eacute;xico.
Instituto de Investigaciones Econ&oacute;micas. Circuito Mario de la Cueva s/n, Ciudad de la Investigaci&oacute;n en Humanidades, Ciudad Universitaria, C.P. 04510, M&eacute;xico, D.F.
Esta p&aacute;gina puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su direcci&oacute;n electr&oacute;nica. De otra forma requiere permiso previo por escrito de la instituci&oacute;n.</span>
      </p>
  </footer>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="assets/js/libs/jquery-1.7.1.min.js"><\/script>')</script>
  <script src="assets/js/script.min.js"></script>
  <script src="js/script_avf.js"></script>
</body>
</html>
