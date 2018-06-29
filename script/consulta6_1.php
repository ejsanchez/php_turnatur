<?php

include('security.php');
include('conexion.php');
include('template/headerint.php');
include('archivo.php');

$enterprises=$_POST['searchablee'];
$accounts=$_POST['searchable'];
$year=$_POST['report_year'];

$optionsEN='e';
foreach ($enterprises as $enterprise_id=>$value) {
	if ($optionsEN=='e'){
		$optionsEN=$value;
	}else{
		$optionsacumE = $optionsEN;
		$optionsEN = $optionsacumE . ',' . $value;}
}
$optionsAC='a';
foreach ($accounts as $account_id=>$value) {
	if ($optionsAC=='a'){
		$optionsAC=$value;
	}else{
		$optionsacumAC = $optionsAC;
		$optionsAC = $optionsacumAC . ',' . $value;}
}

$query="
	SELECT e.ticker_symbol, r.report_year,a.key_word,a.reference, a.description_es, r.amount FROM reports as r, accounts as a, enterprises as e
	WHERE a.id = r.account_id
	AND r.enterprise_id = e.id
	AND r.report_year = '$year'
	AND (r.account_id IN ($optionsAC)) 
    	AND (r.enterprise_id IN ($optionsEN))
";

$resultado=mysqli_query($conexion,$query) or die (mysql_error());
$registros=mysqli_num_rows($resultado);

if ($resultado && $registros > 0) {
    $row = mysqli_fetch_assoc($resultado);
    echo "<p>NOTA: Las cantidades son presentadas en valores nominales y en miles de pesos</p>";
    echo "<p>(*) Cuenta no expresada en valores monetarios</p>";
    echo "<p>(**) Cuenta referente a una razón financiera</p>";
    echo "<p>(***) Cuenta expresada en dólares</p>";

	echo '<div class="CSSTableGenerator">
        <table class="consultaResultado">
        <tr>
	<td>Emisora</td>
	<td>A&ntilde;o</td>
	<td>Clave antigua BMV</th>
	<td>Clave nueva BMV &oacute; <br/>Referencia INEGI</th>
	<td>Cuenta</td>
	<td>Monto</td>
	</tr>';

    $csv.='"Acervo de Variables Financieras - AVF"'.$csv_end;
    $csv.='"Instituto de Investigaciones Económicas - IIEc"'.$csv_end;
    $csv.='"Universidad Nacional Autónoma de México - UNAM"'.$csv_end.$csv_end;   
    
    $csv.='"Emisora"'.$csv_sep.'"Año"'.$csv_sep.'"Clave antigua"'.$csv_sep.'"Clave nueva ó Referencia INEGI"'.$csv_sep.'"Cuenta"'.$csv_sep.'"Monto"'.$csv_end.$csv_end;

	mysqli_data_seek($resultado,0); // Coloca el puntero del objeto de los resultados al inicio  
	
   while($row = mysqli_fetch_array($resultado, MYSQLI_NUM)){    

	  foreach($row as $campo){
		echo '<td>'.$campo.'</td>';
		  $csv.='"'.$campo.'"'.$csv_sep;
	  }
	  echo '</tr>';
	$csv.=$csv_end;
   }
   echo "</table></div>";
}else{
   echo "No se encontraron datos con estas condiciones.";
}

include('cerrar_conexion.php');
include('template/footerint.php');

//Desde aqui
?>
