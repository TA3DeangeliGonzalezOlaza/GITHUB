<?php
if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
require_once('../clases/Comenta.class.php');
require_once('../logica/funciones.php');

$id_com=strip_tags($_POST['id_comentario']);
$id_pub=strip_tags($_POST['id_pub']);




$conex = conectar();
$d = new Comenta($id_com,'',$id_pub);
$datos_d=$d->DenunciaComentario($conex);

	?>
				 <script type="text/javascript">
		 
						window.alert("TU DENUNCIA SE HA REALIZADO CON EXITO");
						location.href="../presentacion/Cargaarticulo.php?id_pub=<?php echo $id_pub; ?>";
				</script>