<?php
session_start();
$_SESSION["PHPSESSID"]=session_id();
echo "<script type='text/javascript' src='../jscript/funcionesGenerales.js'></script>";


require_once('../logica/funciones.php');
require_once('../clases/Publicacion.class.php');
require_once('../clases/Usuario.class.php');
require_once('../clases/Comenta.class.php');	
require_once('../clases/Transaccion.class.php');
require_once('../clases/Persona.class.php');	
require_once('../clases/Permuta.class.php');

$id_per=strip_tags($_POST['id_per']);
$nick_per=strip_tags($_POST['nick_per']);
$password_per=strip_tags($_POST['password_per']);  

?>



<html>
<head>
   <meta charset="utf-8">
   <title>Mostrar Ventane Modal de forma Automático</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
   <script>
      $(document).ready(function()
      {
         $("#mostrarmodal").modal("show");
      });
    </script>
</head>

<body>






   <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3>Cambiar Password</h3>
           </div>
           <div class="modal-body">

			   <form action="../logica/procesaPassword.php" method="POST">
				<input  type="hidden" name="id_per" value= "<?php echo $id_per; ?>" />
				<input  type="hidden" name="nick_per" value= "<?php echo $nick_per; ?>" />
									
					<div>

								<label for="inputPassword" class="sr-only">Antigua Contraseña</label>
								<input type="password" id="inputPassword" name="old_password_per" class="form-control" placeholder="Password" value="<?php echo $password_per; ?>" ><br>
								
								<label for="inputPassword" class="sr-only">Nueva contraseña</label>
								<input type="password" id="inputPassword" name="new_password_per" class="form-control" placeholder="Nuevo Password" required="" ><br>
								
								<label for="inputPassword" class="sr-only">Verificar contraseña</label>
								<input type="password" id="inputPassword" name="new2_password_per" class="form-control" placeholder="Repite Password" required=""><br>


					</div>
					
					<button class="btn btn-sm btn-warning btn-block" type="submit">CAMBIAR PASSWORD</button>
				</form>
           <div class="modal-footer">
		   
          		<form action="usuario_menu.php" method="POST">

			   <button class="btn btn-sm btn-danger btn-block" type="submit">VOLVER</button>
			   </form>
           </div>
      </div>
   </div>
</div>
</body>
</html>