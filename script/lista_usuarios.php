<?php
include('security.php');
include('conexion.php');
include('template/headerint.php');

$query='
	SELECT id,user_name,password,first_name,last_name,middle_name,
	role,email,phone_number,career,occupation,academy_level,
	institution,es_unam,institution_sector,objetive,join_date,status
	FROM users WHERE role=2
';

$resultado=mysqli_query($conexion,$query) or die (mysqli_error());
$registros=mysqli_num_rows($resultado);
echo "<h2>Usuarios registrados en AVF</h2>
";

echo '<h3>Usuarios registrados en total: '.$registros.' </h3>';


echo '<div class="CSSTableGenerator" >
<table>
<tr>
<td>Nombre</td>
<td>Instituci&oacute;n</td>
<td>Carrera</td>
<td>Ocupaci&oacute;n</td>
<td>Registrado en:</td>
</tr>';

while ($row = mysqli_fetch_assoc($resultado)) {
	echo '<tr>';
//        echo '<td>'.$row['id'].'</td>';
//        echo '<td rowspan=2>'.$row['user_name'].'</td>';
        echo '<td><h3>Usuario: '.$row['user_name'].'</h3><br/>'.$row['first_name'].' '.$row['last_name'].' '.$row['middle_name'].'<br/>'.$row['email'].'</td>';
        echo '<td>SECTOR '.$row['institution_sector'].':<br/>'.$row['institution'].'</td>';
        echo '<td>'.$row['academy_level'].' EN:<br/>'.$row['career'].'</td>';
        echo '<td>'.$row['occupation'].'</td>';

        echo '<td>'.$row['join_date'].'<br/>Status: ';
        if ($row['status']==0){
            echo 'Bloqueado</td>';
        }elseif($row['status']==1){
            echo 'Aceptado</td>';
        }elseif($row['status']==2){
            echo 'Rechazado</td>';
        }elseif($row['status']==3){
            echo 'Expirado</td>';
        }
/*
        echo '<td><form action="acepta.php" method="post">
		 <input type="hidden" name="userid" value="'.$row['id'].'"></input>';
        echo '<input type="submit" value="Aceptar" class="send"></input>
              </form></td>';
*/
        echo '</tr><tr><td colspan=5> OBJETIVO:<br/>'.$row['objetive'].'</td></tr>';
}

echo "</table></div>";

include('cerrar_conexion.php');
include('template/footerint.php');
?>
