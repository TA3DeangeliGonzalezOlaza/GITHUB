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
					  <a class="navbar-brand" href="#">BACKEND ESTADISTICAS</a>
					  <div class="navbar-brand">
						<a href="index.php" class="btn btn-warning btn-sm">Volver</a>					
					  
					  </div>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
					
					  <form class="navbar-form navbar-right">
					  
						<!--<div class="form-group">
						  <input type="text" placeholder="Buscar..." class="form-control">
						</div>
						<button type="submit" class="btn btn-danger" >BUSCAR</button>-->
						<!--<button type="submit" class="btn btn-warning btn-sm" >Ingresar</button>-->
						<a href="singin.php" class="btn btn-warning btn-sm">Ingresar</a>
						<a href="Login.php" class="btn btn-warning btn-sm">Registrarse</a>
		
				
		
					  </form>
					  
					</div><!--/.navbar-collapse -->
				  </div>
			</nav>
		</div>
		<div class="jumbotron">
			<div class="container-fluid">
				<section class="main row">
					<div class="col-md-9">
					<ol class="pre-scrollable">
										<table class="table primary">

													<tr>
														<th>Nombre</th>
														<th>Apellido</th>
														<th>Nick</th>
													</tr>										
												<?php
													$conex = conectar();
													$d = new Persona();
													$datos_d=$d->consultaPremium($conex);
													$cuenta=count($datos_d);
												?>
													
												<?php
												for ($i=0;$i<$cuenta;$i++)
												{
												?>
													<tr>
													
															<td><a value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][0]?></a></td>
															<td><a value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][1]?></a></td>
															<td><a value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][2]?></a></td>

													</tr>
															
													
												<?php
												}
												?>	
										</table>

									
								



						
					</ol>
					
					
					</div>
					
				</section>
			</div>
		</div>
		<div class="jumbotron">
		<div class="container">
			<div class="row">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, repellat, sunt, rerum sit ab est consequuntur quo id optio minima repellendus debitis omnis quidem nihil ullam saepe nisi nulla. Similique.

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