<?php
	include('conexion.php');
	
	$identidad = $_POST['identidad'];
	
	$queryM = "SELECT idmunicipio, municipio FROM municipio WHERE identidad = $identidad ORDER BY municipio";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar Municipio</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idmunicipio']."'>".$rowM['municipio']."</option>";
	}
	
	echo $html;
?>