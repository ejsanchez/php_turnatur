
<?php
session_start();

$csv_end = "  
";  
$csv_sep = ",";  
$csv_dir = "../download/data_";
$csv_user = $_SESSION['user'];
$csv_ext = ".csv";
$csv_file = $csv_dir.$csv_user.$csv_ext;
$csv="";

?>
