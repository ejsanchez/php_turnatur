<?php
  include("./config.php");

$conexion=mysqli_connect($host,$user,$password,$dbname)
    or die ("Error: no se pudo establecer la conexion:".mysqli_error($conexion));

if (!$conexion){
	echo "No se pudo conectar";
} 
//else {
//	echo "Estamos dentro...";
//}
?>
