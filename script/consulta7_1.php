<?php

include('security.php');
include('conexion.php');
include('template/headerint.php');
include('archivo.php');

$searchable=$_POST['searchable'];
$account=$_POST['account'];
$year1=$_POST['report_year1'];
$year2=$_POST['report_year2'];

$options='a';
foreach ($searchable as $enterprise_id=>$value) {
			if ($options=='a'){
				$options=$value;
			}
			else{
				$optionsacum = $options;
				$options = $optionsacum . ',' . $value;
			}
        }

//echo $options;

$query="
	SELECT e.ticker_symbol, r.report_year,r.amount FROM reports as r, enterprises as e
	WHERE r.account_id = $account
	AND e.id=r.enterprise_id
	AND r.report_year BETWEEN '$year1' AND '$year2'
	AND (r.enterprise_id IN ($options)) 
";

$statement_name = "
	SELECT f.description, a.description_es, a.key_word, a.reference FROM financial_statements as f, accounts as a
	WHERE a.id = $account
	AND a.financial_statement_id = f.id";

$resultado_statement=mysqli_query($conexion,$statement_name) or die (mysql_error());

if ($resultado_statement) {
    $statementNameRow = mysqli_fetch_assoc($resultado_statement);
    echo '<div id="ficha">';
    echo '<h2>'.$statementNameRow['description'].'</h2>';
    echo '<p>Cuenta: '.$statementNameRow['key_word'].' - '.$statementNameRow['reference'].' - '.$statementNameRow['description_es'].'</p>';
//    echo '<p>A&ntilde;o: '.$year.'</p>';
    $csv.='"Acervo de Variables Financieras - AVF"'.$csv_end;
    $csv.='"Instituto de Investigaciones Económicas - IIEc"'.$csv_end;
    $csv.='"Universidad Nacional Autónoma de México - UNAM"'.$csv_end.$csv_end;   
    
    $csv.='"Estado financiero: '.$statementNameRow['description'].'"'.$csv_end.$csv_end;
    $csv.='"Cuenta: '.$statementNameRow['key_word'].' - '.$statementNameRow['reference'].' - '.$statementNameRow['description_es'].'"'.$csv_end.$csv_end;

    echo '</div>';
}


$resultado=mysqli_query($conexion,$query) or die (mysql_error());
$registros=mysqli_num_rows($resultado);

if ($resultado && $registros > 0) {
    $row = mysqli_fetch_assoc($resultado);
    echo "<p>NOTA: Las cantidades son presentadas en valores nominales y en miles de pesos</p>";
    echo "<p>(*) Cuenta no expresada en valores monetarios</p>";
    echo "<p>(**) Cuenta referente a una razón financiera</p>";
    echo "<p>(***) Cuenta expresada en dólares</p>";

    $csv.='"NOTA: Las cantidades son presentadas en valores nominales y en miles de pesos"'.$csv_end;
    $csv.='"(*) Cuenta no expresada en valores monetarios"'.$csv_end;
    $csv.='"(**) Cuenta referente a una razón financiera"'.$csv_end;
    $csv.='"(***) Cuenta expresada en dólares"'.$csv_end.$csv_end;

	echo '	<div class="CSSTableGenerator" >
	<table class="consultaResultado"><tr>
	<td>A&ntilde;o</th>
	<td>Clave de cotizaci&oacute;n de la emisora</th>
	<td>Monto</th>
	</tr>';

    $csv.='"Año"'.$csv_sep.'"Clave de cotización"'.$csv_sep.'"Monto"'.$csv_end.$csv_end;

	mysqli_data_seek($resultado,0); // Coloca el puntero del objeto de los resultados al inicio  
	
   while($row = mysqli_fetch_assoc($resultado)){    

	  echo '<td>'.$row['report_year'].'</td>';
	  echo '<td>'.$row['ticker_symbol'].'</td>';
	  echo '<td>'.$row['amount'].'</td>';
	  echo '</tr>';

	  $csv.='"'.$row['report_year'].'"'.$csv_sep.'"'.$row['ticker_symbol'].'"'.$csv_sep.'"'.$row['amount'].'"'.$csv_end;

   }
   echo "</table></div>";
}else{
   echo "No se encontraron datos con estas condiciones.";
}


include('cerrar_conexion.php');
include('template/footerint.php');

//Desde aqui
?>
