<?php
if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
require_once('../clases/Publicacion.class.php');
require_once('../logica/funciones.php');
require_once('../presentacion/venta.php');
echo "<script type='text/javascript' src='../jscript/funcionesGenerales.js'></script>";


	$id_pub=strip_tags($_POST['id_pub']);
    $id_usu=strip_tags($_POST['id_usu']); // 




		$conex = conectar();
		$d = new Publicacion($id_pub,$id_usu);
		$datos_d=$d->FinalizaPub($conex);

	?>
	
	
				 <script type="text/javascript">
		 
						window.alert("La publicacion ha sido FINALIZADA.");
						location.href="../presentacion/usuario_menu.php";
				</script>
