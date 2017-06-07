<?php
	if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
	
require_once('../clases/Transaccion.class.php');
require_once('../clases/Publicacion.class.php');
require_once('../clases/Permuta.class.php');
require_once('../logica/funciones.php');

$id_usu=strip_tags($_POST['usuario']);
$id_pub=strip_tags($_POST['publicacion']);
$fecha=strip_tags($_POST['fechaactual']);
$nombrepub=strip_tags($_POST['nombrepub']);




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
									<li><a href="#"><b>Mi Cuenta</b></a></li>
									<li class="divider"></li>
									<li><a href="#"><b>Cambiar Email</b></a></li>
									<li><a href="#"><b>Cambiar Password</b></a></li>
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
					<div class="col-md-9 text-center">
						<div class="panel panel-default">
							<div class="panel-body">
							<h2><strong><?php echo $_SESSION["LOGIN"];?>&nbsp que articulo deseas PERMUTAR por <strong class="text-primary"><?php echo $nombrepub; ?></strong>?</strong></h2>
							</div>					
						</div>
					</div>
				</section>
			</div>
		</div>
		<div class="jumbotron">
			<div class="container">

				<section class="main row">
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-body">
							<ol class="pre-scrollable">
										<table class="table">
													<tr>

														<th>N° Publicacion</th>
														<th>Nombre</th>
														<th>Precio</th>
														<th>Stock</th>
														<th>Descripcion</th>
														<th>Imagen Portada</th>
														<th>Estado</th>
														<th>Activa</th>
														

													</tr>										
													<?php
													
														$conex = conectar();
														$p = new Publicacion('',$id_usu);
														$datos_p=$p->consultaPublicacionesdeUsuario($conex);
														$cuentap=count($datos_p);

													?>
													
												<?php
												for ($i=0;$i<$cuentap;$i++)
												{
												?>
												
												
															<?php $id_pub1 = $datos_p[$i][0]?>
															<?php $id_usup = $datos_p[$i][1]?>
															<?php $nom_pub = $datos_p[$i][2]?>
															<?php $precio_pub = $datos_p[$i][3]?>
															<?php $stock_pub = $datos_p[$i][4]?>
															<?php $descripcion_pub = $datos_p[$i][5]?>
															<?php $img01_pub = $datos_p[$i][6]?>
															<?php $img02_pub = $datos_p[$i][7]?>
															<?php $img03_pub = $datos_p[$i][8]?>
															<?php $nuevo_pub = $datos_p[$i][9]?>
															<?php $fecha_pub = $datos_p[$i][10]?>
															<?php $acepta_permuta_pub = $datos_p[$i][11]?>
															<?php $categoria_pub = $datos_p[$i][12]?>
															<?php $denuncia_pub = $datos_p[$i][13]?>
															<?php $activa = $datos_p[$i][14]?>
				
												
												
													<tr>
															<input  type="hidden" name="id_usu" id="id_usu" value="<?php echo $id_usup;?>" />
															<input  type="hidden" name="id_pub" id="id_pub" value="<?php echo $id_pub1;?>" />
															<input  type="hidden" name="img2pub" id="img2pub" value="<?php echo $img02_pub;?>" />
															<input  type="hidden" name="img3pub" id="img3pub" value="<?php echo $img03_pub;?>" />
															
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $id_pub1 ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $nom_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $precio_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $stock_pub ;?></a></td>
									 <td class="pre-scrollable"><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $descripcion_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $img01_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $nuevo_pub ;?></a></td>
															<?php
															if ($activa=="si"){
															?>
															<td><span title="Activa" class="glyphicon glyphicon-ok "></span></td>
															<?php
															}
															?>
															<?php
															if ($activa=="no"){
															?>
															<td><span title="Finalizada" class="glyphicon glyphicon-remove"></span></a></td>
															<?php
															}
															?>
															
														
															
															
															<form action="modificaventa.php" method="POST">
															
															<input  type="hidden" name="idpub" value= "<?php echo $id_pub; ?>" />
															<input  type="hidden" name="nombrepub" value= "<?php echo $nom_pub; ?>" />
															<input  type="hidden" name="preciopub" value= "<?php echo $precio_pub; ?>" />
															<input  type="hidden" name="stockpub" value= "<?php echo $stock_pub; ?>" />
															<input  type="hidden" name="descpub" value= "<?php echo $descripcion_pub; ?>" />
															<input  type="hidden" name="img1pub" value= "<?php echo $img01_pub; ?>" />
															<input  type="hidden" name="img2pub" value= "<?php echo $img02_pub; ?>" />
															<input  type="hidden" name="img3pub" value= "<?php echo $img03_pub; ?>" />
															<input  type="hidden" name="estado" value= "<?php echo $nuevo_pub; ?>" />
															<input  type="hidden" name="permuta" value= "<?php echo $acepta_permuta_pub; ?>" />
															<input  type="hidden" name="categoria" value= "<?php echo $categoria_pub; ?>" />

															
															
																<td><button class="btn btn-sm btn-warning btn-block" type="submit">Solicitar</button></td>
	
															</form>

														

													</tr>
															
													
												<?php
												}
												?>	
										</table>

						
					</ol>
							
							
							
							
							
							
							
							</div>					
						</div>
					</div>
			
					<div class="col-md-4">
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

	
