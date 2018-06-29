<?php
	include('security.php');
	include('conexion.php');
	include('template/headerint.php');

	echo "
		<div>
			<form method='POST' action='consulta8_1.php'>
			  <legend>Una empresa y varias cuentas en varios a&ntilde;os </legend>
			  <fieldset class='li8'>	
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
	echo "		</select></br>	";

		
	$sql="
	SELECT a.id, a.description_es, a.reference, f.description
	FROM accounts a, financial_statements AS f
	WHERE description_es IS NOT NULL 
	AND a.financial_statement_id = f.id
	ORDER BY financial_statement_id, a.reference
	";

	$consulta=mysqli_query($conexion,$sql) or die (mysqli_error());

	echo '<label>Cuenta:</label></br>';
	echo '<select name="searchable[]" class="searchable" multiple="multiple" style="width">';

	$statement = "";
	$statementAnterior = "";

	while ($reg = mysqli_fetch_assoc($consulta)) {
		$statement = $reg['description'];
		if ($statement != $statementAnterior){
			$statementAnterior = $statement;
			echo '<optgroup label="'.$statement.'">';
		}
		echo '<option value="'.$reg['id'].'">'.$reg['description_es'].'</option>';
	}
	mysqli_data_seek($consulta,0); 
	echo "</select></br>";
	
	$limitMIN=1974;	
	$limitMAX="";	
	$fecha = date('Y');
	$nuevafecha = strtotime ( '-1 year' , strtotime ( $fecha ) );
	$nuevafecha = date ( 'Y' , $nuevafecha );
	$limitMAX=$nuevafecha;	
	
	echo "
	<label>A&ntilde;o inicio: </label></br>
    <select name='report_year1'>
	<option value='0'>Seleccione una opcion</option>";

	$cont = $limitMIN;

	while($cont<=$limitMAX){
	   echo '<option value="'.$cont.'">'.$cont.'</option>';
	   $cont+=1;
	}

	echo "</select></br>";
	
	echo "
	<label>A&ntilde;o fin: </label><br/>
    <select name='report_year2'>
	<option value='0'>Seleccione una opcion</option>";
	$cont = $limitMIN;

	while($cont<=$limitMAX){
	   echo '<option value="'.$cont.'">'.$cont.'</option>';
	   $cont+=1;
	}

	echo "</select></br>";

	echo "	            <button type='submit' value='Enviar'>Enviar</button>
			    <button type='reset' value='Limpiar'>Limpiar</button>
	            </fieldset>
			</form>
		</div>
	";
	
	include("template/footerint.php");
	include("cerrar_conexion.php");
?>
