<?php

include('security.php');
include('conexion.php');
include('template/headerint.php');
include('archivo.php');

$account=$_POST['account'];
$enterprise=$_POST['enterprise_id'];
$year1=$_POST['report_year1'];
$year2=$_POST['report_year2'];

$query="
	SELECT r.report_year,a.key_word,a.reference, r.amount, e.ticker_symbol,e.corporate_name,a.description_es FROM reports as r, accounts as a, enterprises as e
	WHERE r.enterprise_id = $enterprise
	AND r.account_id = $account
	AND e.id = $enterprise
	AND r.account_id = a.id
	AND r.report_year BETWEEN '$year1' AND '$year2'
";

$resultado=mysqli_query($conexion,$query) or die (mysql_error());
$registros=mysqli_num_rows($resultado);

if ($resultado && $registros > 0) {
    $row = mysqli_fetch_assoc($resultado);

    echo '<div id="ficha">';
    echo '<p>A&ntilde;os: '.$year1.'-'.$year2.'</p>';
    echo '<p>Cuenta: '.$row['description_es'].'</p>';
//    echo '<p>Clave de cotizaci&oacute;n: '.$row['ticker_symbol'].'</p>';
    echo '<p>Raz&oacute;n social: '.$row['corporate_name'].'</p>';
//    echo '<p>P&aacutegina web: <a href="'.$ticker_symbol['web_page'].'">'.$ticker_symbol['web_page'].'</a></p>';
    echo '</div>';

    $csv.='"Acervo de Variables Financieras - AVF"'.$csv_end;
    $csv.='"Instituto de Investigaciones Económicas - IIEc"'.$csv_end;
    $csv.='"Universidad Nacional Autónoma de México - UNAM"'.$csv_end.$csv_end;   
    
    $csv.='"Años: '.$year1.'-'.$year2.'"'.$csv_end;
    $csv.='"Cuenta: '.$row['description_es'].'"'.$csv_end;
    $csv.='"Clave de cotización: '.$row['ticker_symbol'].'"'.$csv_end;
    $csv.='"Razón social: '.$row['corporate_name'].'"'.$csv_end.$csv_end;

    echo "<p>NOTA: Las cantidades son presentadas en valores nominales y en miles de pesos</p>";
    echo "<p>(*) Cuenta no expresada en valores monetarios</p>";
    echo "<p>(**) Cuenta referente a una razón financiera</p>";
    echo "<p>(***) Cuenta expresada en dólares</p>";

    $csv.='"NOTA: Las cantidades son presentadas en valores nominales y en miles de pesos"'.$csv_end;
    $csv.='"(*) Cuenta no expresada en valores monetarios"'.$csv_end;
    $csv.='"(**) Cuenta referente a una razón financiera"'.$csv_end;
    $csv.='"(***) Cuenta expresada en dólares"'.$csv_end.$csv_end;

    echo '
	<div class="CSSTableGenerator" >
        <table class="consultaResultado"><tr>
	<td>A&ntilde;o</td>
	<td>Clave antigua BMV</th>
	<td>Clave nueva BMV &oacute; <br/>Referencia INEGI</th>
	<td>Monto</td>
	</tr>';

    $csv.='"Años"'.$csv_sep.'"Clave antigua"'.$csv_sep.'"Clave nueva ó Referencia INEGI"'.$csv_sep.'"Monto"'.$csv_end.$csv_end;
	
	mysqli_data_seek($resultado,0); // Coloca el puntero del objeto de los resultados al inicio  
	
    while($row = mysqli_fetch_assoc($resultado)){
	  echo '<tr><td>'.$row['report_year'].'</td>';
	  echo '<td>'.$row['key_word'].'</td>';
	  echo '<td>'.$row['reference'].'</td>';
	  echo '<td>'.$row['amount'].'</td></tr>';
	  $csv.='"'.$row['report_year'].'"'.$csv_sep.'"'.$row['key_word'].'"'.$csv_sep.'"'.$row['reference'].'"'.$csv_sep.'"'.$row['amount'].'"'.$csv_end;

    }
   echo "</table></div>";
}else{
   echo "No se encontraron datos con estas condiciones.";
}

include('cerrar_conexion.php');
include('template/footerint.php');

//Desde aqui
?>
