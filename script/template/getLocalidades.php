<?php
	include('conexion.php');
	
	$idmunicipio = $_POST['idmunicipio'];
	
	$query = "SELECT idlocalidad, localidad FROM localidad WHERE idmunicipio = '$idmunicipio' ORDER BY localidad";
	$resultado=$mysqli->query($query);
	
	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['idlocalidad']."'>".$row['localidad']."</option>";
	}
	echo $html;
?>