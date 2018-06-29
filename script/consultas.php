<?php
include('security.php');
include('template/headerint.php');
include('archivo.php');

if (file_exists($csv_file)) 
{
  unlink("$csv_file");
}

echo "
<h2>Consultas</h2>

<table id='menuconsultas'>
  <tr>
    <td><img src='../images/001_1e1e1a.png' width='69px'><a href='consulta1.php'>Una empresa y un estado financiero en un a&ntilde;o </a></td>	
    <td><img src='../images/005_1e1cVa.png' width='69px'><a href='consulta5.php'>Una empresa y una cuenta en varios a&ntilde;os</a></td>	
  </tr>
  <tr>
    <td><img src='../images/002_1e1c1a.png' width='69px'><a href='consulta2.php'>Una empresa y una cuenta en un a&ntilde;o </a></td>	
    <td><img src='../images/006_VeVc1a.png' width='69px'><a href='consulta6.php'>Varias empresas y cuentas en un a&ntilde;o </a></td>
  </tr>
  <tr>
    <td><img src='../images/003_Ve1c1a.png' width='69px'><a href='consulta3.php'>Varias empresas y una cuenta en un a&ntilde;o </a></td>	
    <td><img src='../images/007_Ve1cVa.png' width='69px'><a href='consulta7.php'>Varias empresas y una cuenta en varios a&ntilde;os</a></td>
  </tr>
  <tr>	
    <td><img src='../images/004_1eVc1a.png' width='69px'><a href='consulta4.php'>Una empresa y varias cuentas en un a&ntilde;o </a></td>	
    <td><img src='../images/008_1eVcVa.png' width='69px'><a href='consulta8.php'>Una empresa y varias cuentas en varios a&ntilde;os</a></td>	
  </tr>

";

if ($_SESSION['role']==1){
	echo "
  <tr>	
    <td colspan='2'><img src='../images/008_1eVcVa.png' width='69px'><a href='consulta9.php'>Varias empresas y varias cuentas en varios a&ntilde;os</a></td>	
  </tr>
	";
}

echo "</table>";

include('template/footerint.php');
?>
