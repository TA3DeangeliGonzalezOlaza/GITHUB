<?php
if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
require_once('../clases/Permuta.class.php');
require_once('../logica/funciones.php');

$id_permuta=strip_tags($_POST['id_permuta']);



$conex = conectar();
$d = new Permuta($id_permuta);
$datos_d=$d->CancelaPermutar($conex);

	?>
				 <script type="text/javascript">
		 
						window.alert("LA PERMUTA HA SIDO CANCELADA");
						location.href="../presentacion/usuario_menu.php";
				</script>
