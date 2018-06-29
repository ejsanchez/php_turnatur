<?php

session_start();

include('conexion.php');
include('template/headerint.php');

// $statement=$_GET['statement'];

//$statement_name = "SELECT description FROM financial_statements WHERE id = $statement";

$query="
	SELECT idempresa, empresa, identidad, idmunicipio, idlocalidad
	FROM empresa;
";

//$resultado_statement=mysqli_query($conexion,$statement_name) or die (mysql_error());

//if ($resultado_statement) {
//    $statementNameRow = mysqli_fetch_assoc($resultado_statement);
//    echo '<div id="ficha">';
//    echo '<h2>'.$statementNameRow['description'].'</h2>';
//    echo '</div>';
//}

$resultado=mysqli_query($conexion,$query) or die (mysql_error());
$registros=mysqli_num_rows($resultado);

if ($resultado && $registros > 0) {

	echo '
	<div class="CSSTableGenerator" >
		<table><tr>
			<td>Clave empresa</td>
			<td>Razón social</td>
			<td>Entidad</td>
			<td>Municipio</td>
			<td>Localidad</td>
			</tr><tr>';
	
//	mysqli_data_seek($resultado,0); // Coloca el puntero del objeto de los resultados al inicio  
	
   while($row = mysqli_fetch_assoc($resultado)){    

//	  echo '<td>'.$row['key_word'].'</td>';

//          $tipo=substr($row['reference'],-2);

//	if ($tipo == "00"){
	  echo '<td>'.$row['idempresa'].'</td>';
	  echo '<td>'.$row['empresa'].'</td>';
	  echo '<td>'.$row['identidad'].'</td>';
	  echo '<td>'.$row['idmunicipio'].'</td>';
  	  echo '<td>'.$row['idlocalidad'].'</td>';
//	}else{
//	  echo '<td>    '.$row['reference'].'</td>';
//	  echo '<td></td>';
//	  echo '<td>'.$row['description_es'].'</td>';
//	}
	  echo '</tr>';
   }
   echo "</table></div>";
}else{
   echo "No se encontraron datos con estas condiciones.";
}

include('cerrar_conexion.php');
include('template/footerint.php');

//Desde aqui
?>
