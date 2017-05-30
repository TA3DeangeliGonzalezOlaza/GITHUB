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

	?>



<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="../css/estilos.css">
	
	</head>
<body>
		<div class="container">
			
ID USUARIO: &nbsp <?php echo $id_usu ?><br>
NOMBRE DE PUBLICACION: &nbsp <?php echo $nom_pub?><br>
PRECIO $: &nbsp <?php echo $precio_pub?><br>
STOCK: &nbsp <?php echo $stock_pub?><br>
Descripcion: &nbsp <?php echo $descripcion_pub?><br>
Imagen Portada: &nbsp <?php echo $img01_pub?><br>
Imagen opcional 02: &nbsp<?php echo $img02_pub?><br>
Imagen opcional 03: &nbsp <?php echo $img03_pub?><br>
Estado (nuevo usado): &nbsp <?php echo $estado?><br>
Fecha: &nbsp <?php echo $fecha?><br>
Permuta: &nbsp <?php echo $permuta?><br>
Categoria: &nbsp <?php echo $categoria?><br>









		</div>




 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
</body>
</html>