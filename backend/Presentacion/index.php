<?php
session_start();
$_SESSION["PHPSESSID"]=session_id();
echo "<script type='text/javascript' src='../jscript/funcionesGenerales.js'></script>";


require_once('../logica/funciones.php');
require_once('../clases/Publicacion.class.php');
require_once('../clases/Persona.class.php');
require_once('../clases/Comenta.class.php');
require_once('../clases/Transaccion.class.php');	
      
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
					  <a class="navbar-brand" href="#">BACKEND </a>
					  
					  <div class="navbar-brand">
						<a href="BackUsuario.php" class="btn btn-warning btn-sm">Usuarios</a>
						<a href="BackPersona.php" class="btn btn-warning btn-sm">Personas</a>
						<a href="BackPublicacion.php" class="btn btn-warning btn-sm">Publicaciones</a>
						<a href="BackTransaccion.php" class="btn btn-warning btn-sm">Transacciones</a>
						<a href="BackComenta.php" class="btn btn-warning btn-sm">Comentarios</a>
					  </div>

					</div>
					
					<div id="navbar" class="navbar-collapse collapse">
					
					  <form class="navbar-form navbar-right">
					  
						<!--<div class="form-group">
						  <input type="text" placeholder="Buscar..." class="form-control">
						</div>
						<button type="submit" class="btn btn-danger" >BUSCAR</button>-->
						<!--<button type="submit" class="btn btn-warning btn-sm" >Ingresar</button>-->

		
								<div class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
									<input type="button" value="Estadisticas" class="btn btn-Danger btn-sm">
										<!--Cuenta <b class="caret"></b>-->
									</a>
									<ul class="dropdown-menu" style="background:#f0ad4e">
										<li class="divider">Vendedores</li>
										<li><a href="Estadistica-MaxVenta.php"><b>Mayores vendedores</b></a></li>
										<li><a href="Estadistica-Premium.php"><b>Vendedores premium</b></a></li>
										<li class="divider">Publicaciones</li>
										<li><a href="Estadistica-Pubmasvendidas.php"><b>Publicacion mas vendida</b></a></li>
										<li><a href="#"><b>Publicacion mas comentada</b></a></li>
										<li class="divider">Ventas</li>
										<li><a href="#"><b>Total de ventas al mes</b></a></li>
										<li><a href="#"><b>Total de ventas al año</b></a></li>

									</ul>
										<a href="singin.php" class="btn btn-warning btn-sm">Ingresar</a>
										<a href="Login.php" class="btn btn-warning btn-sm">Registrarse</a>
								</div>	
					
		
					  </form>
					  
					</div><!--/.navbar-collapse -->
				  </div>
			</nav>
		</div>
		
		</div>
		<div class="jumbotron">
		<div class="container">
			<div class="row">
			

		</div>	
	
		</div>








 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
</body>
</html>

<?php

?>