<?php

include('security.php');
include('conexion.php');
include('template/headerint.php');
include('archivo.php');

$entidad=$_GET['entidad'];

$busca_entidad = "SELECT entidad FROM entidad WHERE identidad = $entidad";
$recupera_entidad=mysqli_query($conexion,$busca_entidad) or die (mysql_error());
$nombre_entidad = mysqli_fetch_assoc($recupera_entidad);



$query="
	SELECT e.idempresa , e.empresa, t.entidad, m.municipio, l.localidad
	FROM empresa as e, municipio as m, localidad as l, entidad as t
	WHERE e.identidad = $entidad AND
		  e.identidad = t.identidad AND
	      e.idmunicipio = m.idmunicipio AND
		  e.idlocalidad = l.idlocalidad
	ORDER BY m.municipio, l.localidad, e.empresa
";

$resultado=mysqli_query($conexion,$query) or die (mysql_error());
$registros=mysqli_num_rows($resultado);

if ($resultado && $registros > 0) {
	
    $_SESSION['idstate']=$entidad;
    $_SESSION['state']=$nombre_entidad['entidad'];
	
	echo '<h2>Empresas localizadas en el estado de : '.$nombre_entidad['entidad'].'</h2>';
    echo '<h2>Total  : '.$registros.' empresas</h2>';
	
	$csv.='"Turismo de naturaleza(Factores de éxito y fracaso) - TurNatur"'.$csv_end;
    $csv.='"Instituto de Investigaciones Económicas - IIEc"'.$csv_end;
    $csv.='"Universidad Nacional Autónoma de México - UNAM"'.$csv_end.$csv_end;
	$csv.='"Empresas localizadas en el estado de : '.$nombre_entidad['entidad'].$csv_end.$csv_end;
	$csv.='"Municipio"'.$csv_sep.'"Localidad"'.$csv_sep.'"Clave empresa"'.$csv_sep.'"Razon social"'.$csv_end;
	
//	echo $csv;
	echo '
	<div class="CSSTableGenerator" >
		<table><tr>
			<td>Municipio</td>
			<td>Localidad</td>
			<td>Clave empresa</td>
			<td>Raz&oacute;n social</td>

			</tr><tr>';
   
//	mysqli_data_seek($resultado,0); // Coloca el puntero del objeto de los resultados al inicio  
	
   while($row = mysqli_fetch_assoc($resultado)){    

	  echo '<td>'.$row['municipio'].'</td>';
  	  echo '<td>'.$row['localidad'].'</td>';
	  echo '<td>'.$row['idempresa'].'</td>';
	  echo '<td><a href="det_empresa.php?empresa='.$row['idempresa'].'">'.$row['empresa'].'</a></td>';
	  echo '</tr>';
	  
	  $csv.='"'.$row['municipio'].'"'.$csv_sep.'"'.$row['localidad'].'"'.$csv_sep.'"'.$row['idempresa'].'"'.$csv_sep.'"'.$row['empresa'].'"'.$csv_end;
   }
   echo "</table></div>";
   
   
 
}else{
   echo "No se encontraron datos con estas condiciones.";
}
include('cerrar_conexion.php');
include('template/footerint.php');

//Desde aqui
?>
