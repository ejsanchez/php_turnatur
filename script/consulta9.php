<?php
	include('security.php');
	include('conexion.php');
	include('template/headerint.php');

	echo "
		<div>
			<form method='POST' action='consulta9_1.php'>
			  <legend>Varias empresas y varias cuentas en varios a&ntilde;os </legend>
			  <fieldset class='li6'>	
		";
		
	$query="
	SELECT id,ticker_symbol,corporate_name FROM enterprises ORDER BY ticker_symbol
	";
	$resultado=mysqli_query($conexion,$query) or die (mysqli_error());

		echo '<label>Empresa:</label></br>';
		echo '<select name="searchablee[]" class="searchable" multiple="multiple">';

		while ($row = mysqli_fetch_assoc($resultado)) {
				echo '<option value="'.$row['id'].'">'.$row['ticker_symbol'].'</option>';
		}

		echo "</select></br>";


	$sql="
	SELECT a.id, a.description_es, a.reference, f.description
	FROM accounts a, financial_statements AS f
	WHERE description_es IS NOT NULL 
	AND a.financial_statement_id = f.id
	ORDER BY financial_statement_id, a.reference
	";

	$consulta=mysqli_query($conexion,$sql) or die (mysqli_error());

	echo '<label>Cuenta:</label></br>';
	echo '<select name="searchable[]" class="searchable" multiple="multiple">';

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




	echo '<label>Años:</label></br>';
	echo '<select name="searchabley[]" class="searchable" multiple="multiple">';

	$limitMIN=1974;	
	$limitMAX="";	
	$fecha = date('Y');
//	$fecha = date('M');
	$nuevafecha = strtotime ( '-1 year' , strtotime ( $fecha ) );
	$nuevafecha = date ( 'Y' , $nuevafecha );
	$limitMAX=$nuevafecha;	
	
	$cont = $limitMIN;

	while($cont<=$limitMAX){
	   echo '<option value="'.$cont.'">'.$cont.'</option>';
	   $cont+=1;
	}

	echo "</select></br>";
	




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
