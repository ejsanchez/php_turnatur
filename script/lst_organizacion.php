<?php
	include('security.php');
	include('conexion.php');
	include('template/headerint.php');

    $empresa=$_GET['empresa'];
	
	$query="
			SELECT idempresa, fecha_vigencia, identidad_juridica, razon_social, responsable, tenencia_tierra, tipo_propiedad, tipo_propietario, num_hectareas, num_total_socios, num_total_hombres, num_total_mujeres, num_participantes, num_socios_activos_hombres, num_socios_activos_mujeres, organizacion_funciones, participacion_indigena, etnia, fecha_registro, fuente, usuario
			FROM empresa_organizacion WHERE idempresa = $empresa
	";
	
    $resultado=mysqli_query($conexion,$query) or die (mysqli_error());
	$registros=mysqli_num_rows($resultado);

	if ($resultado && $registros > 0) {
		$row = mysqli_fetch_assoc($resultado);
			echo "
				<div>
				   <dt>";
			echo '<dd>Clave:'.$row['idempresa'].'</dd>';
			echo '<dd>Raz&oacute;n social:'.$row['empresa'].'</dd>';
			$sql_ubicacion=" 
				SELECT e.entidad, m.municipio, l.localidad FROM entidad as e, municipio as m, localidad as l 
	            WHERE e.identidad = ".$row['identidad']." 
				AND m.idmunicipio = ".$row['idmunicipio']." 
				AND l.idlocalidad = ".$row['idlocalidad']."
			";
			$q_ubicacion=mysqli_query($conexion,$sql_ubicacion) or die (mysqli_error());
			$ubicacion = mysqli_fetch_assoc($q_ubicacion);
			
			echo '<dd>Entidad: '.$ubicacion['entidad'].'</dd>';
			echo '<dd>Municipio: '.$ubicacion['municipio'].'</dd>';
			echo '<dd>Localidad: '.$ubicacion['localidad'].'</dd>';
			
			echo '<dd>Domicilio:'.$row['domicilio'].'</dd>';
			echo '<dd>V&iacute;as de acceso:'.$row['acceso'].'</dd>';
			
			if (empty($row['entrevista'])) {
			    echo '<dd>Entrevista: No en la muestra</dd>'; 
			} else { 
				echo '<dd>Entrevista:'.$row['entrevista'].'</dd>';
			}
			echo '<dd>Tipo de empresa:';
			$sql_tipo_empresa=" 
				SELECT tipo_empresa FROM tipo_empresa 
	            WHERE id_tipo_empresa = ".$row['id_tipo_empresa']." 
			";
			$q_tipo_empresa=mysqli_query($conexion,$sql_tipo_empresa) or die (mysqli_error());
			$tipo_empresa = mysqli_fetch_assoc($q_tipo_empresa);

			echo $tipo_empresa['tipo_empresa'].'</dd>';
//			echo '<dd>Tipo de empresa:'.$row['id_tipo_empresa'].'</dd>';
//			echo '<dd>Identidad anterior:'.$row['bandera_identidad'].'</dd>';
			echo "<dd></dd>
					<dd></dd>			
				   </dt>
				</div>
				";
	}		

	echo '
	<form action="edita_grals.php" method="POST">
	   <input type="hidden" id="idempresa" name="idempresa" value= '.$empresa.'></input><br/>
       <input type="submit" value="Editar registro"></input>
	</form>
	';

echo"       <h2 class='autentifica'>Factores</h2>
             <div>
			 <table>
			<tr>
				<td>
			 <ul>	
			 <li><a href='cuentas.php'>Actividades</a></li>
			 <li><a href='cuentas.php'>Afluencia</a></li>
			 <li><a href='cuentas.php'>Atractivos</a></li>
			 </ul>
			 </td>
			 <td>
			 <ul>
			 <li><a href='cuentas.php'>Certificaciones</a></li>
			 <li><a href='cuentas.php'>Circuitos</a></li>
			 <li><a href='cuentas.php'>Medidas ambientales</a></li>
			 </ul>
			 </td>
			 <td>
			 <ul>
			 <li><a href='cuentas.php'>Organizaci&oacute;n</a></li>
			 <li><a href='cuentas.php'>Paquetes</a></li>
			 <li><a href='cuentas.php'>Premios/Rconocimientos</a></li>
			 </ul>
			 </td>
			 <td>
			 <ul>
			 <li><a href='cuentas.php'>Redes</a></li>
			 <li><a href='cuentas.php'>Clasificaci&oacute;n</a></li>
			 <li><a href='cuentas.php'>Servicios</a></li>
			 <li><a href='cuentas.php'>P&aacute;ginas</a></li>
			 </ul>
			 </td>
			 </ul>
			 </tr>
			 </table> 
		 
            </div>";
	
	include("template/footerint.php");
	include("cerrar_conexion.php");
?>
