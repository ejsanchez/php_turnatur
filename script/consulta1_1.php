<?php

include('security.php');
include('conexion.php');
include('template/headerint.php');
include('template/menu.php');
include('archivo.php');

$enterprise=$_POST['enterprise_id'];
$statement=$_POST['statement'];
$year=$_POST['report_year'];

$pizarra="
	SELECT ticker_symbol, corporate_name,web_page FROM enterprises 
	WHERE id = $enterprise
";

$statement_name = "SELECT description FROM financial_statements WHERE id = $statement";

$query="
	SELECT a.key_word,a.reference, a.description_es, r.amount FROM reports as r, accounts as a
	WHERE r.account_id = a.id
	AND a.financial_statement_id = $statement
	AND r.report_year = '$year'
	AND r.enterprise_id = $enterprise
	ORDER BY a.reference
";

$resultado_statement=mysqli_query($conexion,$statement_name) or die (mysql_error());
$resultado_pizarra=mysqli_query($conexion,$pizarra) or die (mysql_error());

if ($resultado_statement && $resultado_pizarra) {
    $statementNameRow = mysqli_fetch_assoc($resultado_statement);
    $ticker_symbol = mysqli_fetch_assoc($resultado_pizarra);
    echo '<div id="ficha">';
    echo '<h2>'.$statementNameRow['description'].'</h2>';
    echo 'A&ntilde;o: '.$year.'<br/>'.'Clave de cotizaci&oacute;n: '.$ticker_symbol['ticker_symbol'].'</br>';
    echo 'Emisora: '.$ticker_symbol['corporate_name'].'</br>';
//    echo 'Clave de cotizaci&oacute;n: '.$ticker_symbol['ticker_symbol'].'</br>';
//    echo 'P&aacutegina web: <a href="'.$ticker_symbol['web_page'].'">'.$ticker_symbol['web_page'].'</a>';
    echo '</div>';

    $csv.='"Acervo de Variables Financieras - AVF"'.$csv_end;
    $csv.='"Instituto de Investigaciones Económicas - IIEc"'.$csv_end;
    $csv.='"Universidad Nacional Autónoma de México - UNAM"'.$csv_end.$csv_end;   
    
    $csv.='"Estado financiero: '.$statementNameRow['description'].'"'.$csv_end;
    $csv.='"Año: '.$year.'"'.$csv_end;
    $csv.='"Emisora: '.$ticker_symbol['corporate_name'].'"'.$csv_end;   
    $csv.='"Clave de cotización: : '.$ticker_symbol['ticker_symbol'].'"'.$csv_end.$csv_end;   
}

$resultado=mysqli_query($conexion,$query) or die (mysql_error());
$registros=mysqli_num_rows($resultado);



if ($resultado && $registros > 0) {
    echo "<p>NOTA: Las cantidades son presentadas en valores nominales y en miles de pesos</p>";
    echo "<p>(*) Cuenta no expresada en valores monetarios</p>";
    echo "<p>(**) Cuenta referente a una raz&oacute;n financiera</p>";
    echo "<p>(***) Cuenta expresada en d&oacute;lares</p>";

    $csv.='"NOTA: Las cantidades son presentadas en valores nominales y en miles de pesos"'.$csv_end;
    $csv.='"(*) Cuenta no expresada en valores monetarios"'.$csv_end;
    $csv.='"(**) Cuenta referente a una razón financiera"'.$csv_end;
    $csv.='"(***) Cuenta expresada en dólares"'.$csv_end.$csv_end;

    echo '<div class="CSSTableGenerator" >
	<table><tr>
	<td>Clave antigua</td>
	<td>Clave nueva BMV &oacute; <br/>Referencia INEGI</th>
	<td>Cuenta / Subcuenta</td>
	<td>Monto</td>
	</tr><tr>';
        $csv.='"Clave antigua"'.$csv_sep.'"Clave nueva ó Referencia INEGI"'.$csv_sep.'"Cuenta / Subcuenta"'.$csv_sep.'"Monto"'.$csv_end;
	
//	mysqli_data_seek($resultado,0); // Coloca el puntero del objeto de los resultados al inicio  
	
   while($row = mysqli_fetch_assoc($resultado)){    

	  echo '<td>'.$row['key_word'].'</td>';
	  echo '<td>'.$row['reference'].'</td>';
	  echo '<td>'.$row['description_es'].'</td>';
	  echo '<td>'.$row['amount'].'</td>';
	  echo '</tr>';

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
