<?php
	if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
	echo "<script type='text/javascript' src='../jscript/funcionesGenerales.js'></script>";
	
require_once('../logica/funciones.php');
require_once('../clases/Publicacion.class.php');	

$busqueda=strip_tags($_POST['keywords']);
	
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
					  <a class="navbar-brand" href="cargamenu.php">VendoYA.com</a>
					  <div class="navbar-brand">
							<form class="forma-busqueda cf" action="cargabusqueda.php" method="post">
								<label for="search_box">
								<span> </span>
								</label>
								<input name="keywords" id="search_box" type="text" placeholder="" >
								<input type="hidden" name="action" value="do_search" class="boton44"/>
							</form>
					  
					  </div>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
					<div class="navbar-brand"><label>Bienvenido <?php echo $_SESSION["LOGIN"];?> Resultado de "<?php echo $busqueda ?>"</label></div>
					  <form class="navbar-form navbar-right">
					  
					  
							<div class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
								<img src="../images/engine-icon.png" alt="">
									<!--Cuenta <b class="caret"></b>-->
								</a>
								<ul class="dropdown-menu" style="background:#f0ad4e">
									<li><a href="usuario_menu.php"><b>Mi Cuenta</b></a></li>
									<li class="divider"></li>
									<li class="divider"></li>
									<li><a href="../logica/salir.php"><b>Logout</b></a></li>
								</ul>
								<a href="venta.php" class="btn btn-warning btn-sm">VENDER</a>
							</div>
					  </form>
					  
					</div><!--/.navbar-collapse -->
				  </div>
			</nav>
		</div>

		<div class="jumbotron">
			<div class="container">

				<section class="main row">
					<div class="col-md-9">
					<ul class="pre-scrollable" class="claseLista">
					
						<li class="intem-resultado">
							<div class="container">
								<div class="row">
									<?php
										$conex = conectar();
										$d = new Publicacion('','',$busqueda);
										$datos_d=$d->BuscarPublicacion($conex);
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
												<a href="Cargaarticulo.php?id_pub=<?php echo $datos_d[$i][0] ?>" value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][2]?></a>
											</strong>
											</div>
											<div class="col-md-2">
												<strong>
												<option value="<?php echo $datos_d[$i][0]?>"  >PRECIO $<?php echo $datos_d[$i][3]?></option>
												</strong>
											</div>
											<div class="col-md-4">
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


						
					</ul>
					
					
					</div>
					<div>
						<div class="col-xs-6 col-sm-3 col-md-2 sidebar-offcanvas aling-left" id="sidebar">
						  <div class="list-group"><b>
						 	<a href="cargamenucategoria.php?categoria=ARTE" class="list-group-item">ARTE</a>
							<a href="cargamenucategoria.php?categoria=TECNOLOGIA" class="list-group-item">TECNOLOGIA</a>
							<a href="cargamenucategoria.php?categoria=MODA" class="list-group-item">MODA</a>
							<a href="cargamenucategoria.php?categoria=HOGAR" class="list-group-item">HOGAR</a>
							<a href="cargamenucategoria.php?categoria=VEHICULOS" class="list-group-item">VEHICULOS</a>
							<a href="cargamenucategoria.php?categoria=MUSICA" class="list-group-item">MUSICA</a>
							<a href="cargamenucategoria.php?categoria=DEPORTE" class="list-group-item">DEPORTE</a>
							<a href="cargamenucategoria.php?categoria=PASATIEMPOS" class="list-group-item">PASATIEMPOS</a>
							<a href="cargamenucategoria.php?categoria=OTROS" class="list-group-item">OTROS</a>
							</b>
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




