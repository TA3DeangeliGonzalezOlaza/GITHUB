<?php
if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
require_once('../clases/Publicacion.class.php');
require_once('../logica/funciones.php');

$id_pub=strip_tags($_POST['id_pub']);




$conex = conectar();
$d = new Publicacion($id_pub);
$datos_d=$d->DenunciaPublicacion($conex);

	?>
				 <script type="text/javascript">
		 
						window.alert("TU DENUNCIA HACIA ESTA PUBLICACION SE HA REALIZADO CON EXITO");
						location.href="../presentacion/Cargaarticulo.php?id_pub=<?php echo $id_pub; ?>";
				</script>