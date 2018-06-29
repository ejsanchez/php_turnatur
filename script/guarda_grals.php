<?php
	include('security.php');
	include('conexion.php');
	include('template/headerint.php');

//    var_dump($_POST);
	
	$generales = $_POST;
 
//    echo $generales;
 	
    $idempresa=$generales['idempresa'];
	$empresa=$generales['razon_soc'];
	$domicilio=$generales['domicilio'];
	$acceso=$generales['acceso'];
	$id_tipo_empresa=$generales['tipo_empresa'];
	

	
	$sql = "UPDATE empresa SET 
			idempresa=$idempresa,
			empresa='$empresa',
			domicilio='$domicilio',
			acceso='$acceso',
			id_tipo_empresa=$id_tipo_empresa
	        WHERE idempresa=$idempresa";
	
//	echo $sql;
			
    if ($conexion->query($sql) === TRUE) {
        echo "Registro actualizado";
    	$message='Los datos de la empresa se han actualizado';
		header ("Location: ./det_empresa.php?empresa=$idempresa&typemess='message'&message=$message");
    } else {
        echo "Error al intentar registrar: " . $conexion->error;
		header ("Location: ./det_empresa.php?empresa=$idempresa&typemess='error'&message=$message");
    }
    
	include("template/footerint.php");
	include("cerrar_conexion.php");
?>