<?php
 session_start();

 #$scriptname = array_pop(explode('/', $_SERVER['PHP_SELF']));

 if (!isset($_SESSION['autorizado']))
  {
    $_SESSION['autorizado'] = FALSE;
  }
  
 if (!$_SESSION['autorizado']){
//    echo $_SESSION['autorizado'];
    echo " <div role='complementary2'>
            <div class='autentifica'>             
            <h2 class='autentifica'>Iniciar sesi&oacute;n</h2>
             <div class='formulario'>
              <form name='login' method='post' action='./script/valida.php' class='var'>
               <table>
		<tr>
                 <td><label for='nombre_usuario'>Usuario</label></td>
                 <td><input name='nombre_usuario' type='text'></td>
                </tr>
                <tr>
	 	 <td><label for='password_usuario'>Contrase&ntilde;a</label></td>
                 <td><input name='password_usuario' type='password'></td>
                </tr>
		<tr><td></td><td><input name='submit' type='submit' value='entrar' class='send2'></td></tr>
		</table>
                  
              </form>
<!--                <p><a href='script/reset.php'>¿olvid&oacute; su contrase&ntilde;a?</a></p> -->
             </div><p></p>

             <div class='send2' width='100%'>
			<a href='creacuenta.php'>crear cuenta</a>
	     </div>

            </div>
          </div>

";
 }else{
echo"     <div role='complementary2'>
            <div class='autentifica'>             
               <h2 class='autentifica'>Herramientas</h2>
               <ul>
                 <li><a href='script/entidades.php'>Nueva consulta</a></li>";
            
	    if ($_SESSION['role']==1){
		echo "<li><a href='script/listausuarios.php'>Lista de usuarios</a></li>";
            }

echo "        </ul>
            </div>



          </div>
";
}
 
?>
