<?php
	include('security.php');
	include('conexion.php');
	include('template/headerint.php');


	echo "
		<div>
		    <form method='POST' action='consulta1_1.php' id='consulta1'>
			<legend>Consulta para una empresa y un estado financiero en un a&ntilde;o</legend>
			<fieldset class='li1'>
			 <label>Empresa:</label></br>
			 <select name='enterprise_id'>
				<option value=''>Seleccione una opcion</option>
		";
		
	$query="
	SELECT id,ticker_symbol,corporate_name FROM enterprises ORDER BY ticker_symbol
	";

	$resultado=mysqli_query($conexion,$query) or die (mysqli_error());
	$registros=mysqli_num_rows($resultado);
	
	while ($row = mysqli_fetch_assoc($resultado)) {
			echo '<option value="'.$row['id'].'">'.$row['ticker_symbol'].'</option>';
	}
	echo "		</select></br>
				<label>Estado financiero:</label></br>
				<select name='statement'>
					<option value=''>Seleccione una opcion</option>
		";
		
	$sql="
	SELECT id,description FROM financial_statements ORDER BY description
	";
	
	$consulta=mysqli_query($conexion,$sql) or die (mysqli_error());
	$cuentas=mysqli_num_rows($consulta);
	
	while ($reg = mysqli_fetch_assoc($consulta)) {
		echo '<option value="'.$reg['id'].'">'.$reg['description'].'</option>';
	}
	echo "</select></br>";
	

	$limitMIN=1974;	
	$limitMAX="";	
	$fecha = date('Y');
	$nuevafecha = strtotime ( '-1 year' , strtotime ( $fecha ) );
	$nuevafecha = date ( 'Y' , $nuevafecha );
	$limitMAX=$nuevafecha;	

//	echo $limitMIN.'-'.$limitMAX;

	echo "
		<label>A&ntilde;o: </label></br>
        <select name='report_year'>
	       <option value='0'>Seleccione una opcion</option>";
	
	$cont = $limitMIN;

	while($cont<=$limitMAX){
	   echo '<option value="'.$cont.'">'.$cont.'</option>';
	   $cont+=1;
	}

	echo "</select></br>";


	echo "	
	            <button type='submit' value='Enviar'>Enviar</button>
			    <button type='reset' value='Limpiar'>Limpiar</button>
	            </fieldset>
			</form>
		</div>
	";
	
	include("template/footerint.php");
	include("cerrar_conexion.php");
?>
