<?php
	include('security.php');
	include('conexion.php');
	include('template/headerint.php');

//    var_dump($_POST);
	
	$nvo_segmento = $_POST;
 
    $idempresa=$nvo_segmento['idempresa'];
	$empresa=$nvo_segmento['empresa'];
	$idsegmento=$nvo_segmento['idsegmento'];
	$fecha_vigencia=date("Y-m-d H:i:s");
		
	$sql = "INSERT INTO empresa_segmento (idempresa, idsegmento_turistico, fecha_vigencia) 
			VALUES ($idempresa,$idsegmento,$fecha_vigencia)";
			
    if ($conexion->query($sql) === TRUE) {
        echo "Registro guardado";
    	$message='Los datos del nuevo segmento se han actualizado';
		header ("Location: ./det_empresa.php?empresa=$idempresa&typemess='message'&message=$message");
    } else {
        echo "Error al intentar guardar el registro: " . $conexion->error;
		header ("Location: ./det_empresa.php?empresa=$idempresa&typemess='error'&message=$message");
    }
    
	include("template/footerint.php");
	include("cerrar_conexion.php");
?>