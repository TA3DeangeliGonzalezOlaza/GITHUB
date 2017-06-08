<?php
	if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
	echo "<script type='text/javascript' src='../jscript/funcionesGenerales.js'></script>";
	
	require_once('../clases/Usuario.class.php');
	require_once('../clases/Publicacion.class.php');	
	require_once('../logica/funciones.php');
	
	
    $id_pub=strip_tags($_POST['idpub']); // 
	$nom_pub=strip_tags($_POST['nombrepub']); 
    $precio_pub=strip_tags($_POST['preciopub']); 
    $stock_pub=strip_tags($_POST['stockpub']); 
    $descripcion_pub=strip_tags($_POST['descpub']);
    $img01_pub=strip_tags($_POST['img1pub']); 
    $img02_pub=strip_tags($_POST['img2pub']); 
    $img03_pub=strip_tags($_POST['img3pub']);
	$estado=strip_tags($_POST['estado']); 
	$permuta=strip_tags($_POST['permuta']); 
	$categoria=strip_tags($_POST['categoria']);
	

		
?>

												<?php
													$conex = conectar();
													$d = new Usuario('','','','','',$_SESSION["ID"]);
													$datos_d=$d->traeUsuario($conex);
													$cuenta=count($datos_d);
													
												?>
													
												<?php
												for ($i=0;$i<$cuenta;$i++)
												{
												?>
													
											
		
													
												<?php

												}
												?>	
										

											   <?php $id_usu=$datos_d[0][0];?>
											ID <?php echo $id_usu;?>

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
					  
					  </div>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
					<div class="navbar-brand"><label>Bienvenido <?php echo $_SESSION["LOGIN"];?> Numero de Id persona<?php echo $_SESSION["ID"];?> # Id usuario<?php echo $id_usu;?></label></div>
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
									<li><a href="../presentacion/index.php"><b>Logout</b></a></li>
								</ul>
								<a href="usuario_menu.php" class="btn btn-warning btn-sm">Volver</a>
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
					
					<!-- PARA FINALIZAR LA PUBLICACION LINCE-->
					<form action="../Logica/procesaFinpublicacion.php" method="POST">
							<form class="form-inline" id="formventa">
							
							<div class="col-lg-offset-8">
								<input  type="hidden" name="id_usu" id="id_usu" value="<?php echo $id_usu;?>" />
								<input  type="hidden" name="id_pub" id="id_pub" value="<?php echo $id_pub;?>" />

								<button class="btn btn-lg btn-danger btn-block" type="submit">FINALIZAR PUBLICACION</button>
							</div>	

							</form>
						</form>
					
					
			<!--FORMULARIO DE ENVIO LINCEEEE -->		
						<form action="../Logica/procesaModpublicacion.php" method="POST">
							<form class="form-inline" id="formventa">
							
							
								<input type="date" name="fecha" value="<?php echo date("Y-m-d");?>" readonly="readonly">
								<input  type="hidden" name="id_usu" id="id_usu" value="<?php echo $id_usu;?>" />
								<input  type="hidden" name="id_pub" id="id_pub" value="<?php echo $id_pub;?>" />
								
								<h2 class="form-signin-heading">Articulo a Modificar</h2>
								<strong>NOMBRE DEL ARTICULO</strong>
								<input type="text" id="inputNompub" name="nombre" class="form-control" placeholder="Nombre" required="" autofocus="" value="<?php echo $nom_pub;?>">
								<strong>PRECIO</strong>
								<input type="number" id="inputPrecio" name="precio" class="form-control" placeholder="Precio" required="" autofocus="" value="<?php echo $precio_pub;?>">
								<strong>STOCK</strong>
								<input type="number" id="inputstock" name="stock" class="form-control" placeholder="Stock" required="" autofocus="" value="<?php echo $stock_pub;?>"> <br>
								
								<strong>ESTADO DEL ARTICULO</strong> &nbsp 

								<select name="estado">
								  <option value="nuevo" <?php if($estado=="nuevo") echo "selected";?>>Nuevo</option>
								  <option value="usado"<?php if($estado=="usado") echo "selected";?>>Usado</option>
								</select> &nbsp 
								
								<strong>Acepta permuta</strong> &nbsp 
								<select name="permuta">
								  <option value="permuta"<?php if($permuta=="permuta") echo "selected";?>>Si</option>
								  <option value="nopermuta"<?php if($permuta=="nopermuta") echo "selected";?>>No</option>
								</select> <br> <br> <br>
								
									<div class="campos inline">
										<label for="imagen">IMAGEN PORTADA</label>
										<input type="file" name="Imagen01" id="inputimg1"/>

										<label for="imagen">IMAGEN Opcional</label>
										<input type="file" name="Imagen02" id="inputimg2" />

										<label for="imagen">IMAGEN Opcional</label>
										<input type="file" name="Imagen03" id="inputimg3" />
									</div>		<br> <br>				

								<strong>CATEGORIA</strong>
								<select name="categoria">
								  <option value="ARTE"<?php if($categoria=="ARTE") echo "selected";?>>ARTE</option>
								  <option value="TECNOLOGIA"<?php if($categoria=="TECNOLOGIA") echo "selected";?>>TECNOLOGIA</option>
								  <option value="MODA"<?php if($categoria=="MODA") echo "selected";?>>MODA</option>
								  <option value="HOGAR"<?php if($categoria=="HOGAR") echo "selected";?>>HOGAR</option>
								  <option value="VEHICULOS"<?php if($categoria=="VEHICULOS") echo "selected";?>>VEHICULOS</option>
								  <option value="MUSICA"<?php if($categoria=="MUSICA") echo "selected";?>>MUSICA</option>
								  <option value="DEPORTE"<?php if($categoria=="DEPORTE") echo "selected";?>>DEPORTE</option>
								  <option value="PASATIEMPOS"<?php if($categoria=="PASATIEMPOS") echo "selected";?>>PASATIEMPOS</option>
								  <option value="OTROS"<?php if($categoria=="OTROS") echo "selected";?>>OTROS</option>							  
								  </select><br><br> <br>
								  
								  <textarea maxlength="400" class="descripcion" rows="6" cols="150" id="inputdesc" name="descripcion" placeholder="descripcion" required="" autofocus="" text="prueba"/><?php echo $descripcion_pub; ?></textarea>
								 <br>
								 <div class="col-md-offset-8">
								<button class="btn btn-lg btn-warning btn-block" type="submit">MODIFICAR</button>
									</div>

							</form>
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

		</div>








 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
</body>
</html>




