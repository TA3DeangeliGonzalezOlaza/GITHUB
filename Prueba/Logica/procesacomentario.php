<?php
if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
require_once('../clases/Comenta.class.php');
require_once('../logica/funciones.php');

$comenta=strip_tags($_POST['comenta']);
$id_usu=strip_tags($_POST['usuario']);
$id_pub=strip_tags($_POST['publicacion']);



$conex = conectar();
$d = new Comenta('',$id_usu,$id_pub,$comenta);
$datos_d=$d->alta($conex);

	?>
				 <script type="text/javascript">
		 
						window.alert("TU COMENTARIO HA SIDO REALIZADO");
						location.href="../presentacion/Cargaarticulo.php?id_pub=<?php echo $id_pub; ?>";
				</script>