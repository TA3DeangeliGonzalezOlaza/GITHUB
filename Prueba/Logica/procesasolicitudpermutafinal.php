<?php
if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
require_once('../clases/Permuta.class.php');
require_once('../logica/funciones.php');

$id_pub1=strip_tags($_POST['idpub1']);
$id_pub2=strip_tags($_POST['idpub2']);
$fecha=strip_tags($_POST['fechap']);
$activa=strip_tags($_POST['activa']);
$id_usu2=strip_tags($_POST['id_usu2']);
$id_usu1=strip_tags($_POST['id_usu1']);


echo $fecha;
echo $id_usu2;
echo $id_usu1;

if ($activa=="si"){


$conex = conectar();
$d = new Permuta('',$id_pub1,$id_pub2,$fecha,'','','',$id_usu2,$id_usu1);
$datos_d=$d->Solicita($conex);

	?>
				 <script type="text/javascript">
		 
						window.alert("TU SOLICITUD DE PERMUTA HA SIDO REALIZADA");
						location.href="../presentacion/Cargaarticulo.php?id_pub=<?php echo $id_pub1; ?>";
				</script>
<?php
}
else{

?>

				 <script type="text/javascript">
		 
						window.alert("NO PUEDES PERMUTAR POR UN ARTICULO FINALIZADO");
						location.href="../presentacion/Cargaarticulo.php?id_pub=<?php echo $id_pub1; ?>";
				</script>



<?php
}
?>