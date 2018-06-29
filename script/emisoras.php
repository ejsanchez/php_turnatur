<?php

session_start();

include('conexion.php');
include('template/headerint.php');


$query=" 
	SELECT e.ticker_symbol,e.corporate_name FROM enterprises as e
	ORDER BY e.ticker_symbol
";

$resultado=mysqli_query($conexion,$query) or die (mysql_error());
$registros=mysqli_num_rows($resultado);

echo '<div class="CSSTableGenerator" >
	<table><tr>
		<td>Clave de pizarra</td>
		<td>Raz&oacute;n social</td>
		</tr>';


while($row = mysqli_fetch_assoc($resultado)){    
  echo '<tr><td>'.$row['ticker_symbol'].'</td>';
  echo '<td>'.$row['corporate_name'].'</td>';
echo '</tr>';

}


echo "</table></div>";


include('cerrar_conexion.php');
include('template/footerint.php');

//Desde aqui
?>
