<?php
	include('conexion.php');
	include('template/headerint.php');

	function my_uppercase($str)
	{
		$str = strtoupper($str);
		
		$search = array('Á','É','Í','Ó','Ú','á','é','í','ó','ú');
		$replace = array('A','E','I','O','U','A','E','I','O','U');
		$subject= $str;

		$res=str_replace($search,$replace,$subject);

		return $res;
	}

	if(empty($_POST['usuario']) or empty($_POST['contrasena'])){
	   $message='El nombre de usuario y contraseña no pueden estar vacíos.';
	   header ("Location: ../creacuenta.php?typemess='error'&message=$message");
           exit();
	}

	$select='SELECT user_name,email FROM users WHERE user_name = "'.$_POST['usuario'].'" OR email = "'.$_POST['email'].'"';

    	$busca_usuario = mysqli_query($conexion,  $select);
        $respuesta = mysqli_num_rows($busca_usuario);

	if($respuesta > 0){
	   $message='Lo sentimos el nombre de usuario '.$_POST['usuario'].' o el correo electrónico que capturo ya está siendo utilizado por otro usuario.';
//	   header('Location: '.$_SERVER['HTTP_REFERER']."?typemess='error'&message=$message");
	   header ("Location: ../creacuenta.php?typemess='error'&message=$message");
           exit();
        }else{
	  $hoy=date("Y-m-d H:i:s");
	  $joind=date_create($hoy);
	  $intervalo = new DateInterval('P1M');
	  $expd= date_add($joind, $intervalo);
	  $expirationDate= date_format($expd,"Y-m-d H:i:s");
	  $role=2;
	  $password_typed=$_POST['contrasena'];
	  $pass = md5($password_typed);
	  $nombre_usuario=my_uppercase($_POST['nombre'])." ".my_uppercase($_POST['apaterno'])." ".my_uppercase($_POST['amaterno']);

	  $query="INSERT INTO users(user_name,password,first_name,last_name,middle_name,role,email,phone_number,career,occupation,academy_level,institution,es_unam,
				  institution_sector,objetive,join_date,expiration_date,user_reference,created_at,updated_at,status) 
		VALUES ('".$_POST['usuario']."','".$pass."','".my_uppercase($_POST['nombre'])."','".my_uppercase($_POST['apaterno'])."','".my_uppercase($_POST['amaterno'])."',".$role.",'".$_POST['correo']."',
			    '".$_POST['telefono']."','".my_uppercase($_POST['carrera'])."','".my_uppercase($_POST['ocupacion'])."','".my_uppercase($_POST['nivelAcademico'])."','".my_uppercase($_POST['institucion'])."',
			    '".$_POST['unam']."','".my_uppercase($_POST['sector'])."','".my_uppercase($_POST['objetive'])."','".$hoy."','".$expirationDate."','".$_POST['usuario']."','".$hoy."','".$hoy."',1)";

    	  $resultado = mysqli_query($conexion,  $query);

	  $admores = "SELECT email FROM users WHERE role = 1";
    	  $emails = mysqli_query($conexion,  $admores);

	  if($emails){
		$direcciones = '';
		while ($emailrow = mysqli_fetch_assoc($emails)) {
                    if ($direcciones == ''){
		        $direcciones.= $emailrow['email'];
                    }else{ 
		        $direcciones.= ','.$emailrow['email'];
                    }
		}
                $parau = $direcciones;
                echo $direcciones;
	  }else{
		$parau      = 'esanchez@iiec.unam.mx';
	  }

	  if($resultado){

		$titulou    = 'Nuevo usuario en AVF IIEc-UNAM';
		$mensajeu   = 'Este es un aviso de AVF, ya que un nuevo usuario se ha registrado, favor de revisar los datos del registro y procesar la solicitud.';
		$cabecerasu = 'From: avf@iiec.unam.mx' . "\r\n" .
    				 'Reply-To: esanchez@iiec.unam.mx' . "\r\n" .
   					 'X-Mailer: PHP/' . phpversion();

		mail($parau, $titulou, $mensajeu, $cabecerasu);


		$para      = $_POST['correo'];
		$titulo    = 'Aviso de registro en AVF IIEc-UNAM';
		$mensaje   = 'Este es un aviso de AVF, usted se ha registrado como un nuevo usuario del sistema,'. "\r\n";
		$mensaje  .= 'su solicitud va a ser procesada en breve y recibirá un correo electrónico confirmando su suscripción.'. "\r\n". "\r\n";
		$mensaje  .= 'Los datos que usted registró y con los que podrá tener acceso al sistema son:'. "\r\n". "\r\n";
		$mensaje  .= 'nombre de usuario:'.$_POST['usuario']. "\r\n";
		$mensaje  .= 'password:'.$password_typed. "\r\n". "\r\n";
		$mensaje  .= 'Acervo de Variables Financieras.'. "\r\n". "\r\n";
		$mensaje  .= 'Puede consultar nuestro aviso de privacidad en http://avf.iiec.unam.mx/aviso.php';
		$cabeceras = 'From: avf@iiec.unam.mx' . "\r\n" .
    				 'Reply-To: esanchez@iiec.unam.mx' . "\r\n" .
   					 'X-Mailer: PHP/' . phpversion();

		mail($para, $titulo, $mensaje, $cabeceras);

//		$message='Su registro ha sido exitoso, en breve recibirá el aviso de confirmación y tendrá acceso al sitio.';
		session_start();
            	$_SESSION['autorizado']=TRUE;
            	$_SESSION['user']=$_POST['usuario'];
            	$_SESSION['role']=$role;
            	$_SESSION['name']=$nombre_usuario;

            	$message='Bienvenido a AVF '.$nombre_usuario.' la fecha de expiracion de su cuenta es '.$expirationDate ;
	    	header ("Location: consultas.php?typemess='notice'&message=$message");
//		header ("Location: ../index.php?typemess='notice'&message=$message");
                exit();
	  }else{
		$message='Lo sentimos no pudimos registrarlo.';
		header ("Location: ../creacuenta.php?typemess='error'&message=$message");
                exit();
	  }

	}

	include("template/footerint.php");
	include("cerrar_conexion.php");
?>
