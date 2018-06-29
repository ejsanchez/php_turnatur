<?php
//Generamos el csv de todos los datos  
//$handle = @fopen($csv_file, "w") or die("Open failed: '$php_errormsg'");

if ($csv!="") {
   if (!$handle = fopen($csv_file, "w")) {  
      echo "No se pudo generar el archivo".$csv_file;  
      exit;  
   } 
   if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
      echo "No se puede escribir el archivo";  
      exit;  
   }
   fclose($handle);
}

$cerrar = mysqli_close($conexion);

if ($cerrar) {
}else{
   echo "No se pudo cerrar la conexion.";
}
?>
