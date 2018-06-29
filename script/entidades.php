<?php

session_start();
$_SESSION['idstate']="";


include('conexion.php');
include('template/headerint.php');


$query="
	SELECT identidad, entidad FROM entidad;
";


$resultado=mysqli_query($conexion,$query) or die (mysql_error());
$registros=mysqli_num_rows($resultado);

if ($resultado && $registros > 0) {

	echo '
	<div class="CSSTableGenerator" >
		<table><tr>
			<td>ID Entidad</td>
			<td>Entidad</td>
			<td># Empresas</td>
			</tr><tr>';
	
   while($row = mysqli_fetch_assoc($resultado)){    

	  echo '<td>'.$row['identidad'].'</td>';
	  echo '<td><a href="lst_empresas.php?entidad='.$row['identidad'].'">'.$row['entidad'].'</a></td>';
	  
	  $query_empresas = "SELECT idempresa FROM empresa WHERE identidad =".$row['identidad'];
	  $cuenta_empresas = mysqli_query($conexion,$query_empresas) or die (mysql_error());
	  $total_empresas=mysqli_num_rows($cuenta_empresas);
	  
	  echo '<td>'.$total_empresas.'</td>';
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
