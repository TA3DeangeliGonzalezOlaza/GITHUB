<?php
if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
require_once('../clases/Transaccion.class.php');
require_once('../logica/funciones.php');

$id_usu=strip_tags($_POST['usuario']);
$id_pub=strip_tags($_POST['publicacion']);
$fecha=strip_tags($_POST['fechaactual']);
$precio=strip_tags($_POST['precio']);
$cantidad=strip_tags($_POST['cantidad']);

$preciofinal=$precio*$cantidad;
$comision=$preciofinal*0.05;


$conex = conectar();
$d = new Transaccion('',$id_usu,$id_pub,$preciofinal,$fecha,$cantidad,'','',$comision);
$datos_d=$d->alta($conex);

	?>
	

 <script type="text/javascript">
		 
						window.alert("TU COMPRA HA SIDO REALIZADA");
						location.href="../presentacion/Cargaarticulo.php?id_pub=<?php echo $id_pub; ?>";
				</script>