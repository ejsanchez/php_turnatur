<?php
//Script que verifica que una sesión haya sido iniciada,
//de no existir, evita que las páginas se visualicen. 
session_start();

if (!$_SESSION['autorizado']){//Si no existe una sesión iniciada envía a la página de autencicación
	header ("Location: ../creacuenta.php?typemess='error'&message=Para ingresar tiene que ser un usuario registrado.");
	exit();
}

    if(isset($_GET['typemess']) and 
       isset($_GET['message'])){
        $typemess = "";
        $message = "";
    }

?>
