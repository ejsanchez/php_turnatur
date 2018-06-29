<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf8">
  <title>AVF - IIEc</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Shekhar Sharma">
  <meta name="version" content="1.0.2b">
  <link rel="stylesheet" href="assets/fonts/raphaelicons.css">
  <link rel="stylesheet" href="assets/css/styles.min.css">
  <link rel="stylesheet" href="css/style_avf.css">
  <script src="assets/js/libs/modernizr-2.5.2.min.js"></script>
  <script src="js/jquery-1.10.2.js"></script>
</head>
<!--[if lt IE 7]> <body class="ie6 oldies"> <![endif]-->
<!--[if IE 7]>    <body class="ie7 oldies"> <![endif]-->
<!--[if IE 8]>    <body class="ie8 oldies"> <![endif]-->
<!--[if gt IE 8]><!--><body><!--<![endif]-->
<!--[if lte IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  <header class="clearfix">
      <div class="encabezado_A">
      <div class="container">
        
         <table>
           <tr>
             <td width="240" rowspan="2"><div class="logoscuadro"><a id="logo" href="http://www.unam.mx"><img src="assets/images/unam.png"></img></a></br>
         <a id="logo" href="http://www.iiec.unam.mx"><img src="assets/images/iiec_sim.png"></img></a></div></td>
             <td></td>
             <td align="right" style="padding-bottom:10px"><img src="assets/images/titulo.png"></td>
           </tr>
           <tr>
             <td class="var">
             </td>
             <td align="right"><img src="assets/images/academicos.png"></td>
           </tr>
         </table>
         <div class="encabezado"></div>
      </div>
            </div>
            </div>
  </header>


   <section role="banner">
       
       <article role="main" class="clearfix">
        
<?php    
  include('./menu.php');
?>
           <div class="post">
<?php
    if(isset($_GET['typemess']) and 
       isset($_GET['message'])){
        $typemess = $_GET['typemess'];
        $message = $_GET['message'];
      echo "
        <div id='messages' class=$typemess>$message</div>
      ";
    }
?>            
             <div id="contact_form">

               <form id='creacuenta' name="creacuenta" method='post' class='c-form' action="script/registro.php">
                  <legend>H&aacute;gase usuario del sitio con este registro</legend>
                <fieldset>
                  <table  class="flange"><tr><td>Datos personales</td></tr></table>
                  <p>***  Todos los campos  de esta forma son obligatorios   ***</p>

                  <div id="txtname"> 
                       <label>Nombre:</label>
                       <input id="name" type="text" name="nombre"/>
                  </div>
                  <div id="txtlast_name"> 
                       <label>Apellido paterno:</label>
                       <input id="last_name" type="text" name="apaterno"/>
                  </div>
                  <div id="txtmiddle_name"> 
                       <label>Apellido materno:</label>
                       <input id="middle_name" type="text" name="amaterno"/>
                  </div>
                  <div id="txtphone">
                      <label class="contact_form">Tel&eacute;fono:</label>
                      <input id="phone" type="text" name="telefono"/>
                  </div>                  
                  <div id="txtemail">
                      <label class="contact_form">Correo electr&oacute;nico:</label>
                      <input id="email" type="text" name="correo"  class="contact_input"/>
                  </div>
                  <table  class="flange"><tr><td>Formaci&oacute;n acad&eacute;mica</td></tr></table>
                  <div class='clearfix'></div>  
                  <p>Grado m&aacute;s alto de estudios</p>
                  <div class='inline inst' id="txtlevel">
                      <label>Nivel</label>
                      <select name='nivelAcademico' id="level">  
                        <option value='Pasante'>Pasante o Tesista</option>
                        <option value='Licenciatura'>Licenciatura</option>
                        <option value='Maestr&iacute;a'>Maestr&iacute;a</option>
                        <option value='Doctorado'>Doctorado</option>
                      </select>
                  </div>  
                  <div class='inline inst' id="txtcareer">
                        en:<input type='text' name='carrera' id="career"></br> 
                  </div>
                  <div class='clearfix'></div>  
                  <table  class="flange"><tr><td>Ocupaci&oacute;n y lugar de trabajo</td></tr></table>
                 <p></p>
                  <div  id="txtoccupation">
                     <label>Describa en unas palabras su ocupaci&oacute;n &iquest;a qu&eacute; se dedica?</label>
                     <input type='text' name='ocupacion' id="occupation">
                  </div>                               
                  <div>
                     <label>Mencione la instituci&oacute;n o empresa donde lo hace</label>
                     <input type='text' name='institucion' id="institution">
                  </div>
                  <div><p>
                     <label>La instituci&oacute;n &iquest;es parte de la UNAM? </label></p>
                     <input type='radio' name='unam' id="si" value="1" checked><label for="si">si</label>
                     <input type='radio' name='unam' id="no" value="0"><label for="no">no</label> 
                  </div> <p></p>
                  <div><p>
                     <label>&iquest;A qu&eacute; sector pertenece? </label></p>
                     <input type='radio' name='sector' id="publico" value="publico" checked><label for="publico">P&uacute;blico </label>
                     <input type='radio' name='sector' id="privado" value="privado"><label for="privado">Privado</label>
                  </div><p></p>
                  <div class='inline inst' id="txtobjective">
                     <label>Prop&oacute;sito para consultar el AVF</label>
                     <textarea name='objetive' id="objetive">Describa brevemente el uso que le dará a los datos obtenidos a través de éste acervo</textarea>
                  </div>  
                  <div class='clearfix'></div>  
                  <table  class="flange"><tr><td>Datos de la cuenta</td></tr></table>
                  <p>Por seguridad se sugiere elegir una contraseña de no menos de 6 caracteres y que contenga por lo menos un n&uacute;mero y un s&iacute;mbolo.</p>

                  <div id="txtuser"> 
                       <label>Nombre de usuario:</label>
                       <input id="user" type="text" name="usuario"/>
                  </div>
                  <div id="txtpassword"> 
                       <label>Contraseña:</label>
                       <input id="password" type="password" name="contrasena"/>
                  </div>
                  <div id="txtcpassword"> 
                       <label>Confirme la contrase&ntilde;a:</label>
                       <input id="cpassword" type="password" name="ccontrasena"/>
                  </div>
                  <div id="button">
                      <input id="enviar" type="submit" class="send2" value="Enviar"/><img src="./images/flecha.png" width="26px" height="21px"></img></input>		      
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
          
<?php    
  include('./aside.php');
?>     
       </article>
   </section> <!-- // banner ends -->
  
  <footer role="contentinfo">
      <p>
    <span class="left">Agosto 10,2015<br/>Hecho en M&eacute;xico, 2010-2015 © D.R. Universidad Nacional Autónoma de M&eacute;xico.
Instituto de Investigaciones Económicas. Circuito Mario de la Cueva s/n, Ciudad de la Investigación en Humanidades, Ciudad Universitaria, C.P. 04510, M&eacute;xico, D.F.
Esta p&aacute;gina puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su dirección electrónica. De otra forma requiere permiso previo por escrito de la institución.</span>
      </p>
  </footer>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="assets/js/libs/jquery-1.7.1.min.js"><\/script>')</script>
  <script src="assets/js/script.min.js"></script>
  <script src="js/form.js"></script>
  <script src="js/script_avf.js"></script>

</body>
</html> 
