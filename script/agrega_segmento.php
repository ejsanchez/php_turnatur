<?php
	include('security.php');
	include('conexion.php');
	include('template/headerint.php');


    $idempresa=$_POST['idempresa'];
	$empresa=$_POST['empresa'];
//	 echo $idempresa, $empresa;
	
	echo '<h2>'.$empresa.'</h2>';
	echo '
		<div>
		    <form method="POST" action="guarda_segmento.php" id="nvo_segmento">
			<legend>Agregar segmento</legend>
	        <input type="hidden" id="idempresa" name="idempresa" value= '.$idempresa.'></input><br/>
	        <input type="hidden" id="empresa" name="empresa" value="'.$empresa.'"></input><br/>						
			<fieldset class="li1">
		';

	$query="SELECT idsegmento_turistico, segmento_turistico
			FROM segmento_turistico";
	
    $resultado=mysqli_query($conexion,$query) or die (mysqli_error());
	$registros=mysqli_num_rows($resultado);

	if ($resultado && $registros > 0) {
		while($row = mysqli_fetch_assoc($resultado)){
        echo '<label><input type="radio" name="idsegmento" value="'.$row['idsegmento_turistico'].'">'.$row['segmento_turistico'].'</label></br>';
        }
	}	
		
//  Para limpiar el form:<button type='reset' value='Limpiar'>Limpiar</button>
	echo "	
	            <button type='submit' value='Enviar'>Guardar</button>
	            </fieldset>
			</form>
		</div>
	";
	
	include("template/footerint.php");
	include("cerrar_conexion.php");
?>
