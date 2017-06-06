<?php
if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
require_once('../clases/Comenta.class.php');
require_once('../logica/funciones.php');

$respuesta=strip_tags($_POST['respuesta']);
$id_comen=strip_tags($_POST['id_comen']);



$conex = conectar();
$d = new Comenta($id_comen,'','','','',$respuesta);
$datos_d=$d->responde($conex);

	?>
				 <script type="text/javascript">
		 
						window.alert("TU RESPUESTA HA SIDO REALIZADA");
						location.href="../presentacion/usuario_menu.php?id_pub";
				</script>