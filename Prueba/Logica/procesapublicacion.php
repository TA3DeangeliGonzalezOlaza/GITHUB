<?php
if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
require_once('../clases/Publicacion.class.php');
require_once('../logica/funciones.php');
require_once('../presentacion/venta.php');
echo "<script type='text/javascript' src='../jscript/funcionesGenerales.js'></script>";



    $id_usu=strip_tags($_POST['id_usu']); // 
	$nom_pub=strip_tags($_POST['nombre']); 
    $precio_pub=strip_tags($_POST['precio']); 
    $stock_pub=strip_tags($_POST['stock']); 
    $descripcion_pub=strip_tags($_POST['descripcion']);
    $img01_pub=strip_tags($_POST['Imagen01']); 
    $img02_pub=strip_tags($_POST['Imagen02']); 
    $img03_pub=strip_tags($_POST['Imagen03']);
	$estado=strip_tags($_POST['estado']); 
	$fecha=strip_tags($_POST['fecha']); 
	$permuta=strip_tags($_POST['permuta']); 
	$categoria=strip_tags($_POST['categoria']); 

		$conex = conectar();
		$d = new Publicacion('',$id_usu,$nom_pub,$precio_pub,$stock_pub,$descripcion_pub,$img01_pub,$img02_pub,$img03_pub,$estado,$fecha,$permuta,$categoria,'');
		$datos_d=$d->alta($conex);

	?>

				 <script type="text/javascript">
		 
						window.alert("La publicacion ha sido ingresada.");
						location.href="../presentacion/cargamenu.php";
				</script>
