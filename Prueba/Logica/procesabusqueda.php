<?php
if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
require_once('../clases/Publicacion.class.php');
require_once('../logica/funciones.php');

$busqueda=strip_tags($_POST['keywords']);

echo $busqueda;

$conex = conectar();
$d = new Publicacion('','',$busqueda);
$datos_d=$d->BuscarPublicacion($conex);

	?>
				 <script type="text/javascript">
		 
						window.alert("TU COMENTARIO HA SIDO REALIZADO");
						location.href="../presentacion/Cargaarticulo.php?id_pub=<?php echo $id_pub; ?>";
				</script>