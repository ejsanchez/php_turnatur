          </div>
	  <div role='complementary2'>
            <div class='autentifica'>             
                 <h2 class='autentifica'>Herramientas</h2>
<?php
echo '         <p>';
//echo $_SESSION['name'];
echo "
               </p>
               <ul>
                 <li><a href='entidades.php'>Lista de estados</a></li>";
				 
  if (!empty($_SESSION['idstate'])){
	echo "<li><a href='lst_empresas.php?entidad=".$_SESSION['idstate']."'>Empresas en ".$_SESSION['state']."</a></li>";
  }				 

  if ($_SESSION['role']==1){
	echo "<li><a href='lista_usuarios.php'>Lista de usuarios</a></li>";
  }

//  include('../archivo.php');
  $csv_file="";
  if (file_exists($csv_file)) 
  {
    echo '<li><a href="'.$csv_file.'">Descargar </a></li>';
  }
?>

               </ul>
            </div>


			</div>
       </article>
   </section> <!-- // banner ends -->
   
  <footer role="contentinfo">
      <p>
		<span class="left">Agosto,2018<br/>Hecho en M&eacute;xico, 2018 &copy; D.R. Universidad Nacional Aut&oacute;noma de M&eacute;xico.
Instituto de Investigaciones Econ&oacute;micas. Circuito Mario de la Cueva s/n, Ciudad de la Investigaci&oacute;n en Humanidades, Ciudad Universitaria, C.P. 04510, M&eacute;xico, D.F.
Esta p&aacute;gina puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su direcci&oacute;n electr&oacute;nica. De otra forma requiere permiso previo por escrito de la instituci&oacute;n.</span>
      </p>
  </footer>
  <script src="../js/jquery.js" type="text/javascript"></script>  
  <script src="../js/jquery.quicksearch.js" type="text/javascript"></script> 
  <script src="../js/jquery.multi-select.js" type="text/javascript"></script> 
  <script src="../js/application.js" type="text/javascript"></script> 
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../assets/js/libs/jquery-1.7.1.min.js"><\/script>')</script>
  <script src="../assets/js/script.min.js"></script>
  <script src="../js/script_avf.js"></script>
  <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
  <script language="javascript">
	$(document).ready(function(){
		$("#cbx_estado").change(function () {
			
			$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
		
			$("#cbx_estado option:selected").each(function () {
				identidad = $(this).val();
				$.post("getMunicipio.php", { identidad: identidad }, function(data){
					$("#cbx_municipio").html(data);
				});            
			});
		})
	});
			
	$(document).ready(function(){
		$("#cbx_municipio").change(function () {
			$("#cbx_municipio option:selected").each(function () {
				idmunicipio = $(this).val();
				$.post("getLocalidad.php", { idmunicipio: idmunicipio }, function(data){
					$("#cbx_localidad").html(data);
				});            
			});
		})
	});
		</script>
</body>
</html>
