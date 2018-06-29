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

             <h2>Antecedentes</h2>
            
              <p><strong>2003</strong>: Es elaborado por los acad&eacute;micos responsables el <i>Sistema de informaci&oacute;n de grupos empresariales en M&eacute;xico</i> (SIGEM) como uno de los resultados del proyecto de investigaci&oacute;n Restructuraci&oacute;n de los grupos empresariales en M&eacute;xico, cuyo coordinador responsable fue el Dr. Jorge Basave con el apoyo de la Direcci&oacute;n General de Apoyo al Personal Acad&eacute;mico de la UNAM (DGSCA) a trav&eacute;s del Programa de Apoyo a Proyectos de Investigaci&oacute;n e Innovaci&oacute;n Tecnol&oacute;gica (PAPIIT) y de la Direcci&oacute;n de C&oacute;mputo para la Administraci&oacute;n Acad&eacute;mica de la DGSCA (actualmente DGCTIC). </p>

              <p>La base de datos del SIGEM se nutre de la informaci&oacute;n sobre emisoras no financieras proporcionada por el Departamento de Informaci&oacute;n y Estad&iacute;stica de la BMV acorde con un Contrato de licencia de uso y de intercambio de servicios interinstitucional UNAM-BMV firmado en 1996. </p>
               
              <p>Se incorporaron al SIGEM datos para 1974-1987 de un proyecto de investigaci&oacute;n previo, uno de cuyos productos fue publicado como Los grupos financieros empresariales en M&eacute;xico 1974-1987. Indicadores financieros, de los autores: Jorge Basave, Carlos Morera, Ricardo Reyes y Carlos Strassburger; IIEc/UNAM; 1995. Estos datos fueron registrados tal como aparecen en los anuarios.</p>

              <p>Datos de variables seleccionadas para empresas seleccionadas que cubren los años entre 1988 y 1995 fueron obtenidos de los Anuarios Estad&iacute;sticos de la BMV en el marco del proyecto Reestructuraci&oacute;n de los grupos empresariales en M&eacute;xico.</p> 

              <p>El objetivo del SIGEM fue elaborar un sistema de informaci&oacute;n capaz de funcionar como una fuente de informaci&oacute;n funcional y f&aacute;cil de consultar por investigadores y tesistas de la UNAM (ver SIGEM; Manual del usuario; 2003).</p>
              <div id="flashContent">
                <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="500" height="300" id="intro" align="middle">
                  <param name="movie" value="assets/pelicula/intro.swf" />
                  <param name="quality" value="high" />
                  <param name="bgcolor" value="#003468" />
                  <param name="play" value="true" />
                  <param name="loop" value="true" />
                  <param name="wmode" value="window" />
                  <param name="scale" value="showall" />
                  <param name="menu" value="true" />
                  <param name="devicefont" value="false" />
                  <param name="salign" value="" />
                  <param name="allowScriptAccess" value="sameDomain" />
                  <!--[if !IE]>-->
                  <object type="application/x-shockwave-flash" data="assets/pelicula/intro.swf" width="500" height="300">
                    <param name="movie" value="intro.swf" />
                    <param name="quality" value="high" />
                    <param name="bgcolor" value="#003468" />
                    <param name="play" value="true" />
                    <param name="loop" value="true" />
                    <param name="wmode" value="window" />
                    <param name="scale" value="showall" />
                    <param name="menu" value="true" />
                    <param name="devicefont" value="false" />
                    <param name="salign" value="" />
                    <param name="allowScriptAccess" value="sameDomain" />
                  <!--<![endif]-->
                    <a href="http://www.adobe.com/go/getflash">
                      <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
                    </a>
                  <!--[if !IE]>-->
                  </object>
                  <!--<![endif]-->
                </object>
              </div>
              <p><strong>2007/2008</strong>: Se diseñ&oacute; una nueva versi&oacute;n del sistema de codificaci&oacute;n, clasificaci&oacute;n, registro y consulta que incorpore a la base de datos del SIGEM los datos de emisoras financieras, mismos que requieren un manejo contable diferenciado del anteriormente creado para entidades industriales y comerciales. Adicionalmente, con la nueva versi&oacute;n se robustecen la estabilidad, seguridad y el rendimiento del sistema aplicando nuevas versiones de aplicaciones del manejador de datos y el manejador de interf&aacute;s (ver SIGEM; 2007 y SIGEM, versi&oacute;n 2.0; 2008). </p>

              <p><strong>2012</strong>: Concluye el Contrato UNAM/BMV y es sustituido por un Convenio de Compra de Servicios de Informaci&oacute;n entre ambas instituciones.</p>

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
