<?php
if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
require_once('../clases/Transaccion.class.php');
require_once('../logica/funciones.php');

$id_trans=strip_tags($_POST['id_trans']);
$id_usut=strip_tags($_POST['id_usut']);
$id_pubt=strip_tags($_POST['id_pubt']);
$calificacion=strip_tags($_POST['calificacion']);
$comentario=strip_tags($_POST['comentario']);



$conex = conectar();
$d = new Transaccion($id_trans,$id_usut,$id_pubt,'','','',$calificacion,'','',$comentario);
$datos_d=$d->Califica($conex);

	?>
				 <script type="text/javascript">
		 
						window.alert("CALIFICASTE TU COMPRA CON EXITO");
						location.href="../presentacion/usuario_menu.php?id_pub";
				</script>