<?php

include('conexion.php');

$nombre_usuario = $_POST['nombre_usuario'];
$password_usuario = md5($_POST['password_usuario']);

$query='
	SELECT user_name,password,expiration_date,status,role,first_name,last_name FROM users
	WHERE user_name = "'.$nombre_usuario.'"';

$resultado_query=mysqli_query($conexion,$query) or die (mysql_error());

if ($resultado_query) {
    $resultadoRow = mysqli_fetch_assoc($resultado_query);
//    echo '<div id="ficha">';
//    echo '<h2>'.$resultadoRow['user_name'].'</h2>';
//    echo '<h2>'.$resultadoRow['expiration_date'].'</h2>';
//    echo '<h2>'.$resultadoRow['password'].'</h2>';
//    echo '</div>';
    if ($password_usuario == $resultadoRow['password']){
//        echo 'Contraseña válida';
	$fecha_hoy=date('Y-m-d H:i:s');
        if ($resultadoRow['expiration_date'] <= $fecha_hoy){
            $message='Su permiso de acceso ha expirado. Solicite su reactivación vía e-mail.';
	    header ("Location: ../index.php?typemess='error'&message=$message");  
        }elseif ($resultadoRow['status'] == 0){
            $message='Su solicitud aún no ha sido aprobada, espere su correo de autorización.';
	    header ("Location: ../index.php?typemess='error'&message=$message");  
	}else{
	    session_start();
            $_SESSION['autorizado']=TRUE;
            $_SESSION['user']=$nombre_usuario;
            $_SESSION['role']=$resultadoRow['role'];
            $_SESSION['name']=$resultadoRow['first_name'].' '.$resultadoRow['last_name'];
			$_SESSION['idstate']="";
			$_SESSION['state']="";
            $message='Bienvenido '.$nombre_usuario.'';
//			la fecha de expiracion de su cuenta es '.$resultadoRow['expiration_date'];
			
	    header ("Location: entidades.php?typemess='notice'&message=$message");  
        }
    }else{
	$message='El nombre de usuario o contraseña son inválidos';
	header ("Location: ../index.php?typemess='error'&message=$message");  
    }
}else{
    $message='El nombre de usuario o contraseña son inválidos';
    header ("Location: ../index.php?typemess='error'&message=$message");  
}
include('cerrar_conexion.php');
exit;
?>
