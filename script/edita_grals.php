<?php
	include('security.php');
	include('conexion.php');
	include('template/headerint.php');


    $empresa=$_POST['idempresa'];
	
	echo "
		<div>
		    <form method='POST' action='guarda_grals.php' id='generales'>
			<legend>Editar empresa</legend>
			<fieldset class='li1'>
		";

	$query="
			SELECT idempresa, empresa, identidad, idmunicipio, idlocalidad, domicilio, acceso, entrevista, id_tipo_empresa, bandera_identidad
			FROM empresa WHERE idempresa = $empresa
	";
	
    $resultado=mysqli_query($conexion,$query) or die (mysqli_error());
	$registros=mysqli_num_rows($resultado);

	if ($resultado && $registros > 0) {
		$row = mysqli_fetch_assoc($resultado);
			echo '<label for="idempresa">Clave:</label>';
			echo '<input type="text" name="idempresa" id="idempresa" readonly value= "'.$row['idempresa'].' "/><br/>';
			echo '<label for="razon_soc">Raz&oacute;n social:</label>';
			echo '<input type="text" size="80" name="razon_soc" id="razon_soc" value= "'.$row['empresa'].' "/><br/>';	
/*			
			echo '<dd>Entidad: '.$row['entidad'].'</dd>';
			echo '<dd>Municipio: '.$row['municipio'].'</dd>';
			echo '<dd>Localidad: '.$row['localidad'].'</dd>';
*/
			$sql_ubicacion=" SELECT identidad, entidad FROM entidad ";
			$q_ubicacion=mysqli_query($conexion,$sql_ubicacion) or die (mysqli_error());
//			$ubicacion = mysqli_fetch_assoc($q_ubicacion);
			
			echo '<label for="cbx_estado">Estado : </label><select disabled name="cbx_estado" id="cbx_estado">';
			echo '<option value="0">Seleccione un estado</option>';
			
			while($estado = $q_ubicacion->fetch_assoc()) {
				echo '<option value="'.$estado['identidad'].'"';
				if ($row['identidad'] == $estado['identidad']){
					echo " selected ";
				}
					echo '>'.$estado['entidad'].'</option>';
			}
			
			echo '</select><br/>';

			echo '<label for="cbx_municipio">Municipio : </label><select disabled name="cbx_municipio" id="cbx_municipio">';
			$identidad=$row['identidad'];
			$sql_municipio="SELECT idmunicipio, municipio FROM municipio  
							WHERE identidad = $identidad
							ORDER BY municipio ASC";
			$q_municipio=mysqli_query($conexion,$sql_municipio) or die (mysqli_error());
			
			echo '<option value="0">Seleccione un municipio</option>';
			
			while($municipio = $q_municipio->fetch_assoc()) {
				echo '<option value="'.$municipio['idmunicipio'].'"';
				if ($row['idmunicipio'] == $municipio['idmunicipio']){
					echo " selected ";
				}
					echo '>'.$municipio['municipio'].'</option>';
			}
			
			echo '</select><br />';
			echo '<label for="cbx_localidad">Localidad : </label><select  disabled name="cbx_localidad" id="cbx_localidad">';
			$municipio=$row['idmunicipio'];
			$sql_localidad="SELECT idlocalidad, localidad FROM localidad
							WHERE idmunicipio = $municipio
							ORDER BY localidad ASC";
			$q_localidad=mysqli_query($conexion,$sql_localidad) or die (mysqli_error());
			
			echo '<option value="0">Seleccione una localidad</option>';
			
			while($localidad = $q_localidad->fetch_assoc()) {
				echo '<option value="'.$localidad['idlocalidad'].'"';
				if ($row['idlocalidad'] == $localidad['idlocalidad']){
					echo " selected ";
				}
					echo '>'.$localidad['localidad'].'</option>';
			}			
			echo '</select><br/>';
			
			echo '<label for="domicilio">Domicilio:</label>';
			echo '<input size="85" type="text" name="domicilio" id="domicilio" value= "'.$row['domicilio'].'"/><br/>';
			echo '<label for="acceso">V&iacute;as de acceso:</label><br/>';
			echo '<textarea name="acceso" id="acceso" rows="6" cols="85">'.$row['acceso'].'"</textarea><br/>';
			
			if ($row['entrevista']==1) {
			    echo '<label>Entrevista: Disponible</label><br/>'; 
			} else { 
				echo '<label>Entrevista: No disponible, no es parte de la muestra</label><br/>';
			}

			$sql_tipo_empresa=" 
				SELECT id_tipo_empresa, tipo_empresa FROM tipo_empresa  
			";
			$q_tipo_empresa=mysqli_query($conexion,$sql_tipo_empresa) or die (mysqli_error());	
		
			echo '
				<label for="tipo_empresa">Tipo de empresa:</label>
				<select name="tipo_empresa" id="id_tipo_empresa]">';
			
			while($row_te = mysqli_fetch_assoc($q_tipo_empresa)){    
			    if ($row['id_tipo_empresa']== $row_te['id_tipo_empresa']){
					echo '<option value="'.$row_te['id_tipo_empresa'].'" selected>'.$row_te['tipo_empresa'].'</option>';
				}else{
					echo '<option value="'.$row_te['id_tipo_empresa'].'">'.$row_te['tipo_empresa'].'</option>';
				}
			}
			echo '</select><br/>';
	}		
//  Para limpiar el form:<button type='reset' value='Limpiar'>Limpiar</button>
	echo "	
	            <button type='submit' value='Enviar'>Guardar</button>
	            </fieldset>
			</form>
		</div>
	";
	
	include("template/footerint.php");
	include("cerrar_conexion.php");
?>
