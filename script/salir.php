<?php 

include('../archivo.php');

if (file_exists($csv_file)) 
{
  unlink("$csv_file");
}

session_start();
$_SESSION = array();
session_destroy(); 
header("Location: ../index.php");
exit;
?>
