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
$nombrepub=strip_tags($_POST['nombrepub']);


$preciofinal=$precio*$cantidad;
$comision=$preciofinal*0.05;



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
			<nav class="navbar navbar-inverse navbar-fixed-top">
				  <div class="container">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					  </button>
					  <a class="navbar-brand" href="../presentacion/cargamenu.php">VendoYA.com</a>
					  <div class="navbar-brand">
							<form class="forma-busqueda cf" action="../presentacion/cargabusqueda.php" method="post">
								<label for="search_box">
								<span> </span>
								</label>
								<input name="keywords" id="search_box" type="text" placeholder="" >
								<input type="hidden" name="action" value="do_search" class="boton44"/>
							</form>
					  
					  </div>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
					<div class="navbar-brand"><label>Bienvenido <?php echo $_SESSION["LOGIN"];?></label></div>
					  <form class="navbar-form navbar-right">
					  
					  
							<div class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
								<img src="../images/engine-icon.png" alt="">
									<!--Cuenta <b class="caret"></b>-->
								</a>
								<ul class="dropdown-menu" style="background:#f0ad4e">
									<li><a href="../presentacion/usuario_menu.php"><b>Mi Cuenta</b></a></li>
									<li><a href="../logica/salir.php"><b>Logout</b></a></li>
								</ul>
								<a href="../presentacion/venta.php" class="btn btn-warning btn-sm">VENDER</a>

							</div>
					  </form>
					  
					</div><!--/.navbar-collapse -->
				  </div>
			</nav>
		</div>

		<div class="jumbotron">
			<div class="container">

				<section class="main row">
					<div class="col-md-9 text-center">
					<div class="panel panel-default">
					<div class="panel-body">
					<h2><strong><?php echo $_SESSION["LOGIN"];?>,estas a punto de comprar el artículo: <strong class="text-primary"><?php echo $nombrepub; ?></strong></strong></h2>
					</div>					
					</div>
					</div>
				</section>
			</div>
		</div>
		<div class="jumbotron">
			<div class="container">

				<section class="main row">
					<div class="col-md-6">
					<div class="panel panel-default">
					<div class="panel-body">
					<h3><strong>Precio por unidad: $<?php echo $precio; ?></strong></h3>
					<h3><strong>Cantidad <?php echo $cantidad; ?></strong></h3>
					<h2><strong>Total de compra:  <strong class="text-danger">$<?php echo $preciofinal; ?></strong></strong></h2>
					</div>					
					</div>
					</div>
					<div class="col-md-6">
					<div class="panel panel-default">
					<div class="panel-body">
					<a href="../presentacion/Cargaarticulo.php?id_pub=<?php echo $id_pub; ?>" class="btn btn-danger btn-lg ">CANCELAR</a>
					
					<form action="../logica/procesacomprafinal.php" method="POST">
					
								<input  type="hidden" name="usuario" value= "<?php echo $id_usu; ?>" />
								<input  type="hidden" name="publicacion" value= "<?php echo $id_pub; ?>" />
								<input  type="hidden" name="fechaactual" value= "<?php echo $fecha; ?>" />
								<input  type="hidden" name="precio" value= "<?php echo $precio; ?>" />
								<input  type="hidden" name="cantidad" value= "<?php echo $cantidad; ?>" />
								
								
					<button class="btn btn-lg btn-warning btn-block" type="submit">COMPRAR</button>
					</form>
					</div>
					</div>	
					</div>
				</section>
			</div>
		</div>
		
		
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
</body>
</html>

	
