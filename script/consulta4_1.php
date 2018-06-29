<?php

include('security.php');
include('conexion.php');
include('template/headerint.php');
include('archivo.php');

$searchable=$_POST['searchable'];
$enterprise=$_POST['enterprise_id'];
$year=$_POST['report_year'];

$options='a';
foreach ($searchable as $account_id=>$value) {
			if ($options=='a'){
				$options=$value;
			}
			else{
				$optionsacum = $options;
				$options = $optionsacum . ',' . $value;
			}
        }

$query='
	SELECT r.report_year,a.key_word,a.reference, a.description_es,f.description, r.amount FROM reports as r, accounts as a, financial_statements as f
	WHERE r.enterprise_id = '.$enterprise.'
	AND a.id = r.account_id
	AND r.report_year = "'.$year.'"
	AND a.financial_statement_id = f.id
	AND (r.account_id IN ('.$options.')) 
	ORDER BY a.financial_statement_id, a.reference';

$pizarra="
	SELECT ticker_symbol, corporate_name,web_page FROM enterprises 
	WHERE id = $enterprise
";

$resultado_pizarra=mysqli_query($conexion,$pizarra) or die (mysql_error());

if ($resultado_pizarra) {
    $ticker_symbol = mysqli_fetch_assoc($resultado_pizarra);
    echo '<div id="ficha">';
    echo '<p>A&ntilde;o: '.$year.'</p>';
    echo '<p>Emisora: '.$ticker_symbol['corporate_name'].'</p>';
//    echo '<p>Clave de cotizaci&oacute;n: '.$ticker_symbol['ticker_symbol'].'</p>';
//    echo '<p>P&aacutegina web: <a href="'.$ticker_symbol['web_page'].'">'.$ticker_symbol['web_page'].'</a></p>';
    echo '</div>';

    $csv.='"Acervo de Variables Financieras - AVF"'.$csv_end;
    $csv.='"Instituto de Investigaciones Económicas - IIEc"'.$csv_end;
    $csv.='"Universidad Nacional Autónoma de México - UNAM"'.$csv_end.$csv_end;   
    
    $csv.='"Año: '.$year.'"'.$csv_end;
    $csv.='"Emisora: '.$ticker_symbol['corporate_name'].'"'.$csv_end;
    $csv.='"Clave de cotización: '.$ticker_symbol['ticker_symbol'].'"'.$csv_end.$csv_end;

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

    echo '<div class="CSSTableGenerator" >
	<table class="consultaResultado">
	<tr>
	<td>Clave antigua BMV</th>
	<td>Clave nueva BMV &oacute; <br/>Referencia INEGI</th>
	<td>Cuenta</td>
	<td>Monto</td>
	</tr>';

   $csv.='"Clave antigua BMV"'.$csv_sep.'"Clave nueva ó Referencia INEGI"'.$csv_sep.'"Cuenta"'.$csv_sep.'"Monto"'.$csv_end.$csv_end;
	
	mysqli_data_seek($resultado,0); // Coloca el puntero del objeto de los resultados al inicio  
	
	$statement = "";
	$statementAnterior = "";

    while($row = mysqli_fetch_assoc($resultado)){
      $statement = $row['description'];
   	  if ($statement != $statementAnterior){
   	  	  $statementAnterior = $statement;
   	  	  echo '<tr><td colspan="4">'.$row['description'].'</td></tr>';
  	  }
	  echo '<tr><td>'.$row['key_word'].'</td>';
	  echo '<td>'.$row['reference'].'</td>';
	  echo '<td>'.$row['description_es'].'</td>';
	  echo '<td>'.$row['amount'].'</td></tr>';

          $csv.='"'.$row['key_word'].'"'.$csv_sep.'"'.$row['reference'].'"'.$csv_sep.'"'.$row['description_es'].'"'.$csv_sep.'"'.$row['amount'].'"'.$csv_end;

    }
   echo "</table></div>";
}else{
   echo "No se encontraron datos con estas condiciones.";
}

include('cerrar_conexion.php');
include('template/footerint.php');

//Desde aqui
?>
