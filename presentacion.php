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
      echo "
        <div id='messages' class=$typemess>$message</div>
      ";
    }
?>

<h2>PRESENTACI&Oacute;N</h2>

<p>
"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
</p>

<h2>DESCRIPCI&Oacute;N DEL PROYECTO</h2>

<p>

"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
</p>

<p>
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
Esta p&aacute;gina puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su direcci&oacute;n electr&oacute;nica. De otra forma requiere permiso previo por escrito de la instituci&oacute;n.</span>
      </p>
  </footer>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="assets/js/libs/jquery-1.7.1.min.js"><\/script>')</script>
  <script src="assets/js/script.min.js"></script>
  <script src="js/script_avf.js"></script>
</body>
</html>
