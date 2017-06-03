<?php
session_start();
$_SESSION["PHPSESSID"]=session_id();
echo "<script type='text/javascript' src='../jscript/funcionesGenerales.js'></script>";


require_once('../logica/funciones.php');
require_once('../clases/Publicacion.class.php');
require_once('../clases/Usuario.class.php');
require_once('../clases/Comenta.class.php');	
require_once('../clases/Transaccion.class.php');
require_once('../clases/Persona.class.php');	
require_once('../clases/Permuta.class.php');

    

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
		
		
		<?php
			$conex = conectar();
			$d = new Persona($_SESSION["ID"]);
			$datos_d=$d->consultaUno($conex);
			$cuenta=count($datos_d);
		?>
		
	
		<div class="jumbotron">
			<div class="container">
				<div class="sector">
					<div class="main-row">
						<div class="col-md-3">
						
<!--Trae persona -->	Datos persona		
						
						<?php
						for ($i=0;$i<$cuenta;$i++)
						{
						?>
																
																	<?php $id_per = $datos_d[$i][0]?>
																	<?php $ci_per = $datos_d[$i][1]?>
																	<?php $nick_per = $datos_d[$i][2]?>
																	<?php $password_per = $datos_d[$i][3]?>
																	<?php $nom1_per = $datos_d[$i][4]?>
																	<?php $nom2_per = $datos_d[$i][5]?>
																	<?php $ape1_per = $datos_d[$i][6]?>
																	<?php $ape2_per = $datos_d[$i][7]?>
																	<?php $email_per = $datos_d[$i][8]?>
																	<?php $tel_per = $datos_d[$i][9]?>
																	<?php $dir_per = $datos_d[$i][10]?>

																
																
																
																
																<ul>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  >id persona :<?php echo $id_per ;?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  >cedula :<?php echo $ci_per ;?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  >nick :<?php echo $nick_per ;?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  >password :<?php echo $password_per ;?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  >nombre1 :<?php echo $nom1_per ;?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  >nombre2 :<?php echo $nom2_per ;?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  >apellido1 :<?php echo $ape1_per ;?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  >apellido2 :<?php echo $ape2_per ;?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  >email :<?php echo $email_per ;?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  >telefono :<?php echo $tel_per ;?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  >direccion :<?php echo $dir_per ;?></option></li>

																</ul>
						</div>
					</div>
					
						<?php
						}
						?>	

Datos usuario						
					
<!--Trae Usuario-->
				
				
					<div class="row">
						<div class="col-md-3">
								<?php
									$conex = conectar();
									$u = new Usuario('','','','','',$id_per);
									$datos_u=$u->datosUsuario($conex);
									$cuentau=count($datos_d);
								?>
									
						<?php
						for ($i=0;$i<$cuentau;$i++)
						{
						?>
																
																	<?php $id_usu = $datos_u[$i][0]?>
																	<?php $reputacion_usu = $datos_u[$i][1]?>
																	<?php $suspendido = $datos_u[$i][2]?>
																	<?php $rol = $datos_u[$i][3]?>
																	<?php $premium = $datos_u[$i][4]?>
																	<?php $id_personau = $datos_u[$i][5]?>

																
																
																<ul>
																	<li><option value="<?php echo $datos_u[$i][0]?>"  >id usuario :<?php echo $id_usu ;?></option></li>
																	<li><option value="<?php echo $datos_u[$i][0]?>"  >reputacion :<?php echo $reputacion_usu ;?></option></li>
																	<li><option value="<?php echo $datos_u[$i][0]?>"  >suspendido :<?php echo $suspendido ;?></option></li>
																	<li><option value="<?php echo $datos_u[$i][0]?>"  >rol :<?php echo $rol ;?></option></li>
																	<li><option value="<?php echo $datos_u[$i][0]?>"  >premium :<?php echo $premium ;?></option></li>
																	<li><option value="<?php echo $datos_u[$i][0]?>"  >id personau :<?php echo $id_personau ;?></option></li>


																</ul>
						</div>
							<?php
							}
							?>	
					</div>
				Publicaciones	
<!--Trae Publicaciones -->
						

		<div class="jumbotron">
			<div class="container-fluid">
				<section class="main row">
					<div class="col-md-12">
					<ol class="pre-scrollable">
										<table class="table">
													<tr>
														<th># ID Publicacion</th>
														<th># ID Usuario</th>
														<th>Nombre</th>
														<th>Precio</th>
														<th>Stock</th>
														<th>Descripcion</th>
														<th>Imagen Portada</th>
														<th>Imagen extra #1</th>
														<th>Imagen extra #2</th>
														<th>Estado</th>
														<th>Fechad de publicacion</th>
														<th>Acepta Permuta</th>
														<th>Categoria</th>
														<th>Denuncia</th>
														

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
												
												
															<?php $id_pub = $datos_p[$i][0]?>
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
				
												
												
													<tr>
													
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $id_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $id_usup ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $nom_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $precio_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $stock_pub ;?></a></td>
									 <td class="pre-scrollable"><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $descripcion_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $img01_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $img02_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $img03_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $nuevo_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $fecha_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $acepta_permuta_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $categoria_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $denuncia_pub ;?></a></td>
															<td><a href="singin.php" class="btn btn-warning btn-sm">Modificar</a></td>
															<td><a href="Login.php" class="btn btn-warning btn-sm">Sansionar</a></td>
														

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

		
		
		
	Mis comentarios	
		
<!--Trae Mis Comentarios -->
						

		<div class="jumbotron">
			<div class="container-fluid">
				<section class="main row">
					<div class="col-md-12">
					<ol class="pre-scrollable">
										<table class="table">
													<tr>
														<th>ID comentario</th>
														<th>ID Usuario comento</th>
														<th>ID publicacion comentada</th>
														<th>Comentario</th>
														<th>Denunciado?</th>
														<th>Respuesta</th>

														

													</tr>										
													<?php
													
														$conex = conectar();
														$p = new Comenta('',$id_usu);
														$datos_p=$p->consultaComentariosdeUsuario($conex);
														$cuentap=count($datos_p);

													?>
													
												<?php
												for ($i=0;$i<$cuentap;$i++)
												{
												?>
												
												
															<?php $id_comen = $datos_p[$i][0]?>
															<?php $id_usucom = $datos_p[$i][1]?>
															<?php $id_pubcom = $datos_p[$i][2]?>
															<?php $comentario = $datos_p[$i][3]?>
															<?php $denunciado_com = $datos_p[$i][4]?>
															<?php $responde_com = $datos_p[$i][5]?>

				
												
												
													<tr>
													
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $id_comen ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $id_usucom ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $id_pubcom ;?></a></td>
									<td class="pre-scrollable"><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $comentario ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $denunciado_com ;?></a></td>
									<td class="pre-scrollable"><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $responde_com ;?></a></td>
														

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
					
					
					
<!--Trae Transacciones -->
							
					<div class="row">
						<div class="col-md-3">
								<?php
									$conex = conectar();
									$d = new Persona($_SESSION["ID"]);
									$datos_d=$d->consultaUno($conex);
									$cuenta=count($datos_d);
								?>
									
						<?php
						for ($i=0;$i<$cuenta;$i++)
						{
						?>
																<ul>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][0]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][1]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][2]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][3]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][4]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][5]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][6]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][7]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][8]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][9]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][10]?></option></li>

																</ul>
						</div>
							<?php
							}
							?>	
					</div>							

<!--Trae Permutas -->
							
					<div class="row">
						<div class="col-md-3">
								<?php
									$conex = conectar();
									$d = new Persona($_SESSION["ID"]);
									$datos_d=$d->consultaUno($conex);
									$cuenta=count($datos_d);
								?>
									
						<?php
						for ($i=0;$i<$cuenta;$i++)
						{
						?>
																<ul>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][0]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][1]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][2]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][3]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][4]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][5]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][6]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][7]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][8]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][9]?></option></li>
																	<li><option value="<?php echo $datos_d[$i][0]?>"  ><?php echo $datos_d[$i][10]?></option></li>

																</ul>
						</div>
							<?php
							}
							?>	
					</div>						
				</div>
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