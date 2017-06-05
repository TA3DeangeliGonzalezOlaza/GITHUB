<?php
session_start();
$_SESSION["PHPSESSID"]=session_id();
echo "<script type='text/javascript' src='../jscript/funcionesGenerales.js'></script>";


require_once('../logica/funciones.php');
require_once('../clases/Publicacion.class.php');	
 
 

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
					  <a class="navbar-brand" href="index.php?categoria=Index">PAGINA</a>
					  <div class="navbar-brand">
							<form class="forma-busqueda cf" action="busqueda.php" method="post">
								<label for="search_box">
								<span> </span>
								</label>
								<input name="keywords" id="search_box" type="text" placeholder="" >
								<input type="hidden" name="action" value="do_search" class="boton44"/>
							</form>
					  
					  </div>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
					
					  <form class="navbar-form navbar-right">
						<a href="singin.php" class="btn btn-warning btn-sm">Ingresar</a>
						<a href="Login.php" class="btn btn-warning btn-sm">Registrarse</a>
		
				
		
					  </form>
					  
					</div><!--/.navbar-collapse -->
				  </div>
			</nav>
		</div>
		<div class="jumbotron">
			<div class="container">

				<section class="main row">
					<div class="col-md-9">
					<ol class="pre-scrollable">
					
						<li class="intem-resultado">
							<div class="container">
								<div class="row">
									<?php
										
										$conex = conectar();
										$d = new Publicacion();
										$datos_d=$d->consultaTodos($conex);
										$cuenta=count($datos_d);
									?>
									<?php
										for ($i=0;$i<$cuenta;$i++)
										{
										?>
											<div class="col-md-3">
											imagen
											</div>
											<div class="col-md-3">
											<strong>
												<a href="articulo.php?id_pub=<?php echo $datos_d[$i][0] ?>" value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][2]?></a>
											</strong>
											</div>
											<div class="col-md-2">
												<strong>
												<option value="<?php echo $datos_d[$i][0]?>"  >PRECIO $<?php echo $datos_d[$i][3]?></option>
												</strong>
											</div>
											<div class="col-md-4" id="menu">
												<ul>
													<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][11]?></option></li>
													<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][9]?></option></li>
													<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][19]?></option></li>
												</ul>
												
											</div>
									
										<?php
										}
										?>
								</div>
							</div>
						</li>


						
					</ol>
					
					
					</div>
					<div>
						<div class="col-xs-6 col-sm-3 col-md-2 sidebar-offcanvas aling-left" id="sidebar">
						  <div class="list-group"><b>
						 	<a href="menucategoria.php?categoria=ARTE" class="list-group-item">ARTE</a>
							<a href="menucategoria.php?categoria=TECNOLOGIA" class="list-group-item">TECNOLOGIA</a>
							<a href="menucategoria.php?categoria=MODA" class="list-group-item">MODA</a>
							<a href="menucategoria.php?categoria=HOGAR" class="list-group-item">HOGAR</a>
							<a href="menucategoria.php?categoria=VEHICULOS" class="list-group-item">VEHICULOS</a>
							<a href="menucategoria.php?categoria=MUSICA" class="list-group-item">MUSICA</a>
							<a href="menucategoria.php?categoria=DEPORTE" class="list-group-item">DEPORTE</a>
							<a href="menucategoria.php?categoria=PASATIEMPOS" class="list-group-item">PASATIEMPOS</a>
							<a href="menucategoria.php?categoria=OTROS" class="list-group-item">OTROS</a>
							</b>
						  </div>
						</div>
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