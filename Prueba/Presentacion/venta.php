<?php
	if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
	echo "<script type='text/javascript' src='../jscript/funcionesGenerales.js'></script>";
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
					  <a class="navbar-brand" href="#">PAGINA</a>
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
					<div class="navbar-brand"><label>Bienvenido <?php echo $_SESSION["LOGIN"];?></label></div>
					  <form class="navbar-form navbar-right">
					  
					  
							<div class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
								<img src="../images/engine-icon.png" alt="">
									<!--Cuenta <b class="caret"></b>-->
								</a>
								<ul class="dropdown-menu" style="background:#f0ad4e">
									<li><a href="#"><b>Mi Cuenta</b></a></li>
									<li class="divider"></li>
									<li><a href="#"><b>Cambiar Email</b></a></li>
									<li><a href="#"><b>Cambiar Password</b></a></li>
									<li class="divider"></li>
									<li><a href="../presentacion/index.php"><b>Logout</b></a></li>
								</ul>
								<a href="venta.php" class="btn btn-warning btn-sm">VENDER</a>
								<a href="cargamenu.php" class="btn btn-warning btn-sm">Volver</a>
							</div>
					  </form>
					  
					</div><!--/.navbar-collapse -->
				  </div>
			</nav>
		</div>
		<div class="jumbotron">
			<div class="container">
				<section class="main row">
					<div class="col-md-12">
						<form class="form-inline">
							<h2 class="form-signin-heading">Articulo a vender</h2>
							NOMBRE DEL ARTICULO
							<input type="text" id="inputNompub" class="form-control" placeholder="Nombre" required="" autofocus="">
							PRECIO
							<input type="number" id="inputPrecio" class="form-control" placeholder="Precio" required="" autofocus="">
							STOCK
							<input type="number" id="inputstock" class="form-control" placeholder="Stock" required="" autofocus="">
							Nuevo &nbsp <input type="checkbox" id="inputnuevo" placeholder="Email address" required="" autofocus="" value="nuevo">
							
							Permuta &nbsp <input type="checkbox" id="inputnuevo" placeholder="Email address" required="" autofocus="" value="permuta">

							
								<div class="campos inline">
									<label for="imagen">IMAGEN PORTADA</label>
									<input type="file" name="Imagen01" id="inputimg1" />

									<label for="imagen">IMAGEN Opcional</label>
									<input type="file" name="Imagen02" id="inputimg2" />

									<label for="imagen">IMAGEN Opcional</label>
									<input type="file" name="Imagen03" id="inputimg3" />
								</div>						
							<!--<input type="text" id="inputimg1" class="form-control" placeholder="Imagen01" required="">
							<input type="text" id="inputimg2" class="form-control" placeholder="Imagen02" required="" autofocus="">							
							<input type="text" id="inputimg3" class="form-control" placeholder="Imagen03" required="" autofocus=""><br>-->


							
							<select>
							  <option value="ARTE">ARTE</option>
							  <option value="TECNOLOGIA">TECNOLOGIA</option>
							  <option value="MODA">MODA</option>
							  <option value="HOGAR">HOGAR</option>
							  <option value="VEHICULOS">VEHICULOS</option>
							  <option value="MUSICA">MUSICA</option>
							  <option value="DEPORTE">DEPORTE</option>
							  <option value="PASATIEMPOS">PASATIEMPOS</option>
							  <option value="OTRAS">OTRAS</option>							  
							  </select><br>
							  
							  <textarea maxlength="400" class="descripcion" rows="6" cols="150" id="inputdesc" placeholder="descripcion" required="" autofocus=""/></textarea>
							 
							<button class="btn btn-lg btn-warning btn-block" type="submit">Publicar</button>
						</form>
					
					
					
					</div>
					
					<div>
						<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">

						</div>
					</div>
				</section>
			</div>
		</div>
		<div class="jumbotron">
		<div class="container">
			<div class="row">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, repellat, sunt, rerum sit ab est consequuntur quo id optio minima repellendus debitis omnis quidem nihil ullam saepe nisi nulla. Similique.
		
		<div class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
			<img src="../images/engine-icon.png" alt="">
				<!--Cuenta <b class="caret"></b>-->
			</a>
			<ul class="dropdown-menu" style="background:#f0ad4e">
				<li><a href="#"><b>Mi Cuenta</b></a></li>
				<li class="divider"></li>
				<li><a href="#"><b>Cambiar Email</b></a></li>
				<li><a href="#"><b>Cambiar Password</b></a></li>
				<li class="divider"></li>
				<li><a href="#"><b>Logout</b></a></li>
			</ul>
		</div>
		</div>	
	
		</div>








 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
</body>
</html>




