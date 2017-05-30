<?php
session_start();
$_SESSION["PHPSESSID"]=session_id();
echo "<script type='text/javascript' src='../jscript/funcionesGenerales.js'></script>";


require_once('../logica/funciones.php');
require_once('../clases/Publicacion.class.php');
require_once('../clases/Usuario.class.php');
require_once('../clases/Comenta.class.php');	
require_once('../clases/Transaccion.class.php');	

$id_pub= strip_tags(trim($_GET['id_pub']));       

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
							<form class="forma-busqueda cf" action="/search.php" method="post">
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
			<div class="container">

				<section class="main row">
					<div class="col-md-4">
						<div class="container">
								<div class="row">
									<?php
										
										$conex = conectar();
										$d = new Publicacion($id_pub);
										$datos_d=$d->consultaUno($conex);
										$cuenta=count($datos_d);
									?>

									<?php
										for ($i=0;$i<$cuenta;$i++)
										{
										?>
											<div class="col-md-3">
											<strong>
											<option value="<?php echo $datos_d[$i][0]?>"  >Id Publicacion :<?php echo $datos_d[$i][0]?></option>
											<option value="<?php echo $datos_d[$i][0]?>"  >Id usuario publico :<?php echo $datos_d[$i][1]?></option>
											<option value="<?php echo $datos_d[$i][0]?>"  >Nombre de publicacion :<?php echo $datos_d[$i][2]?></option>
											<option value="<?php echo $datos_d[$i][0]?>"  >Precio :<?php echo $datos_d[$i][3]?></option>
											<option value="<?php echo $datos_d[$i][0]?>"  >Stock :<?php echo $datos_d[$i][4]?></option>
											<option value="<?php echo $datos_d[$i][0]?>"  >Descripcion de publicacion :<?php echo $datos_d[$i][5]?></option>
											<option value="<?php echo $datos_d[$i][0]?>"  >Imagen 01 :<?php echo $datos_d[$i][6]?></option>
											<option value="<?php echo $datos_d[$i][0]?>"  >Imagen 02 :<?php echo $datos_d[$i][7]?></option>
											<option value="<?php echo $datos_d[$i][0]?>"  >Imagen 03 :<?php echo $datos_d[$i][8]?></option>
											<option value="<?php echo $datos_d[$i][0]?>"  >Estado del articulo :<?php echo $datos_d[$i][9]?></option>
											<option value="<?php echo $datos_d[$i][0]?>"  >Fecha de publicacion :<?php echo $datos_d[$i][10]?></option>
											<option value="<?php echo $datos_d[$i][0]?>"  >Permuta? :<?php echo $datos_d[$i][11]?></option>
											<option value="<?php echo $datos_d[$i][0]?>"  >Categoria :<?php echo $datos_d[$i][12]?></option>
											<option value="<?php echo $datos_d[$i][0]?>"  >Denunciado :<?php echo $datos_d[$i][13]?></option>
											</strong>	
											</div>
									
								<?php
								$id_usup = $datos_d[$i][1];
								
								}
								?>
								</div>
								
						</div>
					</div>
						
									<div class="row" class="col-md-2">
										<?php
											
											$conex = conectar();
											$u = new Usuario($id_usup);
											$datos_u=$u->consultaUno($conex);
											$cuentau=count($datos_u);
										?>
										
											<?php
											for ($i=0;$i<$cuentau;$i++)
											{
											?>
										
										
									Usuario :<?php echo $id_usup?>
									
									<option value="<?php echo $datos_u[$i][0]?>"  >Id Usuario :<?php echo $datos_u[$i][0]?></option>
									<option value="<?php echo $datos_u[$i][0]?>"  >Reputacion :<?php echo $datos_u[$i][1]?></option>
									<option value="<?php echo $datos_u[$i][0]?>"  >Suspendido :<?php echo $datos_u[$i][2]?></option>
									<option value="<?php echo $datos_u[$i][0]?>"  >Rol :<?php echo $datos_u[$i][3]?></option>
									<option value="<?php echo $datos_u[$i][0]?>"  >Premium :<?php echo $datos_u[$i][4]?></option>
									<option value="<?php echo $datos_u[$i][0]?>"  >Id Persona :<?php echo $datos_u[$i][5]?></option>
									
									<?php
									$id_comenpub = $datos_d[$i][0];
									}
									?>
				Usuario :<?php echo $id_comenpub?>
									</div>
									
									<div class="row" class="col-md-2">
											<?php
												
												$conex = conectar();
												$c = new Comenta('','',$id_comenpub);
												$datos_c=$c->consultaTodosPub($conex);
												$cuentac=count($datos_c);
											?>
											<table>
												<?php
												for ($i=0;$i<$cuentac;$i++)
												{
												?>
											
										<ul>	

										<li><option value="<?php echo $datos_c[$i][0]?>"  >Id Comentario :<?php echo $datos_c[$i][0]?></option></li>
										<li><option value="<?php echo $datos_c[$i][0]?>"  >Id Usuario comenta :<?php echo $datos_c[$i][1]?></option></li>
										<li><option value="<?php echo $datos_c[$i][0]?>"  >Id Publicacion comentada :<?php echo $datos_c[$i][2]?></option></li>
										<li><option value="<?php echo $datos_c[$i][0]?>"  >Comentario :<?php echo $datos_c[$i][3]?></option></li>
										<li><option value="<?php echo $datos_c[$i][0]?>"  >COmentario Denunciado :<?php echo $datos_c[$i][4]?></option></li>

										</ul>
										<?php
										
										}
										?>
										</table>
									</div>									
									
									
									
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