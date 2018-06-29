<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
  <meta charset="latin1_swedish_ci">
  <title>TurNatur - IIEc</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Shekhar Sharma">
  <meta name="version" content="1.0.2b">
  <link rel="stylesheet" href="../assets/fonts/raphaelicons.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css">
<!--  <link rel="stylesheet" href="../css/bootstrap.css">-->
  <link rel="stylesheet" href="../css/style_avf.css">
  <link href="../css/multi-select.css" rel="stylesheet" type="text/css" media="screen" />
  <script src="../assets/js/libs/modernizr-2.5.2.min.js"></script>
</head>
<!--[if lt IE 7]> <body class="ie6 oldies"> <![endif]-->
<!--[if IE 7]>    <body class="ie7 oldies"> <![endif]-->
<!--[if IE 8]>    <body class="ie8 oldies"> <![endif]-->
<!--[if gt IE 8]><!--><body  data-spy="scroll"><!--<![endif]-->
<!--[if lte IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->


  <header class="clearfix">
      <div class="encabezado_A">
      <div class="container">
        
         <table>
           <tr>
             <td style="padding:15px">
			  <a id="logo" href="http://www.unam.mx"><img src="../assets/images/logo_unam.png"  width="110"></img></a>
		     </td>
             <td align="center" style="padding-top:25px"><a id="logo" href="index.php"><img src="../assets/images/titulo.png" ></img></a></td>
             <td align="right" style="padding:17px"><a id="logo" href="http://www.iiec.unam.mx"><img src="../assets/images/LogoIIEcBco.png" width="110"></a></td>
           </tr>
         </table>
         <div class="encabezado"></div>
      </div>
            </div>
            </div>
  </header>

   <section role="banner">
       
       <article role="main" class="clearfix">

         <nav class='clearfix'>
           <ul role='navigation'>
            <li><a href='../index.php'>inicio</a></li>
			<li><a href='../presentacion.php'>presentaci&oacute;n</a></li>
            <li><a href='../aviso.php'>aviso de privacidad</a></li>
            <li><a href='../directorio.php'>directorio</a></li>
		 
<?php
		echo "<li><a href='#'><img src='../images/user-avf.png' width='18px'/>"." ".$_SESSION['user']."</a></li>            
		      <li><a href='salir.php'><img src='../images/salir-avf.png' width='18px'/> Cerrar sesi&oacute;n</a></li>
	   </ul>
        </nav>

         <div class='post'>";

		echo " </ul>
		 </nav>";

    if(isset($_GET['typemess']) and 
       isset($_GET['message'])){
        $typemess = $_GET['typemess'];
        $message = $_GET['message'];
      echo "        <div id='messages' class=$typemess>$message</div>      ";
    }
?>
