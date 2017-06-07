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

$id_trans=strip_tags($_POST['id_trans']);
$id_usut=strip_tags($_POST['id_usut']);
$id_pubt=strip_tags($_POST['id_pubt']);  

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
              <h3>Califica tu COMPRA</h3>
           </div>
           <div class="modal-body">

			   <form action="../logica/procesacalificacion.php" method="POST">
				<input  type="hidden" name="id_trans" value= "<?php echo $id_trans; ?>" />
				<input  type="hidden" name="id_usut" value= "<?php echo $id_usut; ?>" />
				<input  type="hidden" name="id_pubt" value= "<?php echo $id_pubt; ?>" />
				
				<div class="btn-toolbar" role="toolbar">
				  <div class="btn-group">
				<strong>CALIFICACION </strong>&nbsp
					<select name="calificacion" id="calificacion">
					<option value="-1">Negativa</option>
					<option value="0" selected>Neutra</option>
					<option value="1">Positiva</option>
					</select>
					<br><br>
					<strong>COMENTARIO </strong><br>
					<textarea name="comentario" id="" cols="60" rows="5" placeholder="deja tu comentario..."></textarea>
				  </div><br><br>
				
				
				
			   <button class="btn btn-sm btn-warning btn-block" type="submit">Enviar Calificacion</button>
			   </form>

                  
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