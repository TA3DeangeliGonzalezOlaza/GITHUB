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
					  <a class="navbar-brand" href="cargamenu.php">PAGINA</a>
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
					<div class="navbar-brand"><label>Bienvenido <?php echo $_SESSION["LOGIN"];?></label></div>
					  <form class="navbar-form navbar-right">
					  
					  
							<div class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
								<img src="../images/engine-icon.png" alt="">
									<!--Cuenta <b class="caret"></b>-->
								</a>
								<ul class="dropdown-menu" style="background:#f0ad4e">
									<li><a href="usuario_menu.php"><b>Mi Cuenta</b></a></li>
									<li><a href="../logica/salir.php"><b>Logout</b></a></li>
								</ul>
								<a href="venta.php" class="btn btn-warning btn-sm">VENDER</a>
							</div>
					  </form>
					  
					</div><!--/.navbar-collapse -->
				  </div>
			</nav>
		</div>
									<?php
										$fechaactual = date("Y-m-d");
										$conex = conectar();
										$d = new Publicacion($id_pub);
										$datos_d=$d->consultaUno($conex);
										$cuenta=count($datos_d);
									?>
									<?php
									for ($i=0;$i<$cuenta;$i++)
									{
									?>
									<?php $id_pub = $datos_d[$i][0]?>
									<?php $id_usup = $datos_d[$i][1]?>
									<?php $nom_pub = $datos_d[$i][2]?>
									<?php $precio = $datos_d[$i][3]?>
									<?php $stock = $datos_d[$i][4]?>
									<?php $descripcion = $datos_d[$i][5]?>
									<?php $imgportada = $datos_d[$i][6]?>
									<?php $img02 = $datos_d[$i][7]?>
									<?php $img03 = $datos_d[$i][8]?>
									<?php $estado = $datos_d[$i][9]?>
									<?php $fecha = $datos_d[$i][10]?>
									<?php $permuta = $datos_d[$i][11]?>
									<?php $categoria = $datos_d[$i][12]?>
									<?php $denunciado = $datos_d[$i][13]?>
									<?php $activo = $datos_d[$i][14]?>
									
									
									
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
									<?php $id_usu = $datos_u[$i][0]?>
									<?php $reputacion = $datos_u[$i][1]?>
									<?php $suspendido = $datos_u[$i][2]?>
									<?php $rol = $datos_u[$i][3]?>
									<?php $premium = $datos_u[$i][4]?>
									<?php $id_per = $datos_u[$i][5]?>									

									<?php
												$id_comenpub = $datos_d[$i][0];	
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
												
										<?php $id_com = $datos_c[$i][0]?>
										<?php $id_usucomenta = $datos_c[$i][1]?>
										<?php $id_pub_comentada = $datos_c[$i][2]?>
										<?php $comentario = $datos_c[$i][3]?>
										<?php $com_denunciado = $datos_c[$i][4]?>
										<?php $respuesta = $datos_c[$i][5]?>
										<?php $respondido = $datos_c[$i][6]?>
										

										
								<?php
								}
								?>
									
									


		
		<div class="jumbotron">
			<div class="container text-center">
			<h1 class="text-danger"><?php echo $nom_pub ?></h1>
			<form action="../logica/procesadenunciapublicacion.php" method="POST">
			
			<button name="id_pub" class="btn btn-sm btn-danger btn-block" type="submit" style='width:150px; height:30px' value="<?php echo $id_pub;?>">Denunciar Publicacion</button>
						
			</form>
			<?php
			if ($activo=="no"){?>
			<H2>FINALIZADA</H2>

			<?php
			}
			
			?>
			
			
			</div>
		</div>
		<div class="jumbotron">
				<div class="container">
					<form action="../Logica/procesacompra.php" method="POST">
						<div class="row col-md-4">
						imagen
						
						</div>
						<div class="row col-md-3">
							<ul>
								<li><h2>$<?php echo $precio ?></h2></li>
								<li>Estado: <?php echo $estado ?></li>
								<li><input type="number" min="1" class="" name="cantidad" value="1"></li>
							</ul>
						</div>
						
						<div class="row col-md-3">
							<ul>
								<li>Stock :<?php echo $stock ?></li>
								<li>Categoria :<?php echo $categoria ?></li>
								
								
								

								<input  type="hidden" name="usuario" value= "<?php echo $_SESSION["ID"]; ?>" />
								<input  type="hidden" name="publicacion" value= "<?php echo $id_pub; ?>" />
								<input  type="hidden" name="fechaactual" value= "<?php echo $fechaactual; ?>" />
								<input  type="hidden" name="precio" value= "<?php echo $precio; ?>" />
								<input  type="hidden" name="nombrepub" value= "<?php echo $nom_pub; ?>" />
								
								<?php
								if (!($_SESSION["ID"]==$id_usup)&&($stock >"0")&&$activo =="si") {?>
								
								
								<li><button class="btn btn-sm btn-DANGER btn-block" type="submit" style='width:80px; height:30px'>COMPRAR</button></li>
								
								
								<?php } ?>
								
								<?php
								if ($_SESSION["ID"]==$id_usup){?>
								
								
								No puedes comprar tu misma publicacion
								
								
								<?php } ?>
								
								
							</form>	
			<!--PERMUTA   -->	
							<form action="../logica/procesapermuta.php" method="POST">
							
							
								<input  type="hidden" name="usuario" value= "<?php echo $_SESSION["ID"]; ?>" />
								<input  type="hidden" name="publicacion" value= "<?php echo $id_pub; ?>" />
								<input  type="hidden" name="fechaactual" value= "<?php echo $fechaactual; ?>" />
								<input  type="hidden" name="nombrepub" value= "<?php echo $nom_pub; ?>" />
							
								<li><?php if ($permuta == "permuta"){ ?>
									
																	<?php
									if (!($_SESSION["ID"]==$id_usup)&&($stock >"0")&&$activo =="si") {?>
									
									
									<li><button class="btn btn-sm btn-warning btn-block" type="submit" style='width:80px; height:30px'>PERMUTA</button></li>
									
									
									<?php } ?>
									
										<?php
										if ($_SESSION["ID"]==$id_usup){?>
										
										
										No puedes Permutar tu misma publicacion
										
										
										<?php } ?>
									
									
									<?php } 
									if ($permuta == "nopermuta") {?>  
									No permuta  
									<?php }?></li>
							</form>	
							
							</ul>
							
						</div>
					
							
							
								
						
					
					<div>
						<div class="row col-xs-6 col-sm-3 col-md-2 sidebar-offcanvas aling-left" id="sidebar">
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
				</div>
		</div>
			<div class="jumbotron">
				<div class="container">
					<form action="">
						<textarea name="descrip" id="" cols="150" rows="3"><?php echo $descripcion ?></textarea>
					</form>
				</div>
			</div>
			
			
		<div class="jumbotron">
			<div class="container">
				<form action="../Logica/procesacomentario.php" method="POST">
				<input  type="hidden" name="usuario" value= "<?php echo $_SESSION["ID"]; ?>" />
				<input  type="hidden" name="publicacion" value= "<?php echo $id_pub; ?>" />
					<textarea name="comenta" id="" cols="150" rows="3"></textarea>
								<?php
								if (!($_SESSION["ID"]==$id_usup)&&$activo =="si"){?>
								
								
								<li><button class="btn btn-lg btn-warning btn-block" type="submit" style='width:120px; height:40px'>Comentar</button></li>
								
								
								<?php } ?>
								
								<?php
								if ($_SESSION["ID"]==$id_usup){?>
								
								
								<br>No puedes comentar tu propia publicacion
								
								
								<?php } ?>
					
					
					
					
					
				</form>
			</div>
		</div>
		
		
		<div class="jumbotron">

			<div class="container">
				<form action="../Logica/procesadenunciacomentario.php" method="POST">
					<div class="row" >
					<?php
					for ($i=0;$i<$cuentac;$i++)
					{
					?>
						<div class="panel panel-default">
							<div class="panel-body">
								<ul>
									<li name="id_comentario"><?php echo $datos_c[$i][0]?></li>
										<li><strong>Comentario : </strong><br><option value="<?php echo $datos_c[$i][0]?>"  ><?php echo $datos_c[$i][3]?></option></li><br>
										<li>Respuesta : <br><option value="<?php echo $datos_c[$i][0]?>"  ><?php echo $datos_c[$i][5]?></option></li>
									</ul>
									<button name="id_comentario" class="btn btn-sm btn-danger btn-block" type="submit" style='width:75px; height:30px' value="<?php echo $datos_c[$i][0]?>">Denunciar</button>
								</div>
							</div>
							<input  type="hidden" name="id_pub" value= "<?php echo $id_pub; ?>" />
					<?php
					}
					?>	
								
							</div>
					</form>
				</form>
			</div>
		</div>






 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
</body>
</html>

								<?php
									
								}
								}
								?>

<?php

?>