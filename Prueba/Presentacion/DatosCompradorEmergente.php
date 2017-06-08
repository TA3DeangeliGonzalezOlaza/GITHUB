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


$nom1_per=strip_tags($_POST['nom1_per']);
$ape1_per=strip_tags($_POST['ape1_per']);
$email_per=strip_tags($_POST['email_per']);
$tel_per=strip_tags($_POST['tel_per']);
$dir_per=strip_tags($_POST['dir_per']);   

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
              <h3>Datos Personales del COMPRADOR</h3>
           </div>
           <div class="modal-body">

				<input  type="hidden" name="id_per" value= "<?php echo $id_per; ?>" />

									
					<div>

			<h2 class="form-signin-heading">Datos de comprador</h2>

			NOMBRE: <br>
			<input type="text" id="inputnom1" name="nom1" class="form-control" placeholder="Nombre" required="" autofocus="" value="<?php echo $nom1_per; ?> &nbsp <?php echo $ape1_per; ?>"readonly>

			EMAIL: <br>
			<label for="inputEmail" class="sr-only">Correo</label>
			<input type="email" id="inputEmail" name="mail" class="form-control" placeholder="Email address" required="" autofocus="" value="<?php echo $email_per; ?>"readonly>
			TELEFONO: <br>
			<input type="number" id="inputtel" name="tel" class="form-control" placeholder="Telefono" required="" autofocus="" value="<?php echo $tel_per; ?>"readonly>
			DIRECCION: <br>
			<input type="text" id="inputdir" name="dir" class="form-control" placeholder="Direccion" required="" autofocus="" value="<?php echo $dir_per; ?>"readonly>
<br><br>
					</div>
					
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