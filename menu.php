<?php
  echo "<nav class='clearfix'>
        <ul role='navigation'>";

  $scriptname = array_pop(explode('/', $_SERVER['PHP_SELF']));
#  echo $scriptname;

  if ($scriptname == "index.php" || $scriptname == "creacuenta.php") 
  {
    echo "  <li><a href='index.php' class='activePage'>inicio</a></li>
            <li><a href='presentacion.php'>presentaci&oacute;n</a></li>
            <li><a href='aviso.php'>aviso de privacidad</a></li>			
            <li><a href='directorio.php'>directorio</a></li>";  
  }          
  elseif ($scriptname == "presentacion.php") {
        echo " <li><a href='index.php'>inicio</a></li>
            <li><a href='presentacion.php' class='activePage'>presentaci&oacute;n</a></li>
            <li><a href='aviso.php'>aviso de privacidad</a></li>
            <li><a href='directorio.php'>directorio</a></li>"; 
  }
  elseif ($scriptname == "consultas.php") {
        echo "  <li><a href='index.php'>inicio</a></li>
            <li><a href='presentacion.php'>presentaci&oacute;n</a></li>
            <li><a href='aviso.php'>aviso de privacidad</a></li>
            <li><a href='directorio.php'>directorio</a></li>"; 
  }
  elseif ($scriptname == "aviso.php") {
        echo "  <li><a href='index.php'>inicio</a></li>
            <li><a href='presentacion.php'>presentaci&oacute;n</a></li>
            <li><a href='aviso.php' class='activePage'>aviso de privacidad</a></li>
            <li><a href='directorio.php'>directorio</a></li>"; 
  }
  elseif ($scriptname == "directorio.php" || $scriptname == "jbasave.php" || $scriptname == "ebravo.php" || $scriptname == "vjimenez.php" || $scriptname == "esanchez.php") {
        echo "  <li><a href='index.php'>inicio</a></li>
            <li><a href='presentacion.php'>presentaci&oacute;n</a></li>
            <li><a href='aviso.php'>aviso de privacidad</a></li>
            <li><a href='directorio.php' class='activePage'>directorio</a></li>"; 
  }


 session_start();

 if (!isset($_SESSION['autorizado']))
  {
    $_SESSION['autorizado'] = FALSE;
  }
  
 if ($_SESSION['autorizado'])
  {
  echo "<li><a href='#'><img src='images/user-avf.png' width='18px'/>"." ".$_SESSION['user']."</a></li>";
  echo "<li><a href='script/salir.php'><img src='images/salir-avf.png' width='18px'/> Cerrar sesi&oacute;n</a></li>";
  }

  echo " </ul></nav>";

?>	      

      
