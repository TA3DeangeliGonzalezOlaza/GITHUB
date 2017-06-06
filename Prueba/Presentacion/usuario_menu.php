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
						

	<div class="jumbotron-fluid">
		<div class="container-fluid">
			<div class="panel panel-default">
			<div class="panel-body">
				<section class="main row">
					<div class="col-md-12">
					<ol class="pre-scrollable">
										<table class="table">
													<tr>

														<th>Nombre</th>
														<th>Precio</th>
														<th>Stock</th>
														<th>Descripcion</th>
														<th>Imagen Portada</th>
														<th>Estado</th>
														<th>Fechad de publicacion</th>
														<th>Acepta Permuta</th>
														<th>Categoria</th>
														<th>Denuncia</th>
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
															<?php $activa = $datos_p[$i][14]?>
				
												
												
													<tr>
															<input  type="hidden" name="id_usu" id="id_usu" value="<?php echo $id_usu;?>" />
															<input  type="hidden" name="id_pub" id="id_pub" value="<?php echo $id_pub;?>" />
															<input  type="hidden" name="img2pub" id="img2pub" value="<?php echo $img02_pub;?>" />
															<input  type="hidden" name="img3pub" id="img3pub" value="<?php echo $img03_pub;?>" />
															
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $nom_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $precio_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $stock_pub ;?></a></td>
									 <td class="pre-scrollable"><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $descripcion_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $img01_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $nuevo_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $fecha_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $acepta_permuta_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $categoria_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $denuncia_pub ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $activa ;?></a></td>
															
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

															
															
																<td><button class="btn btn-sm btn-warning btn-block" type="submit">Modificar</button></td>
	
															</form>

														

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
			</div>
		</div>

		
		
		
	Mis Preguntas	
		
<!--Trae Mis Comentarios -->
						

		<div class="jumbotron-fluid">
			<div class="container-fluid">
			<div class="panel panel-default">
			<div class="panel-body">
				<section class="main row">
					<div class="col-md-12">
					<ol class="pre-scrollable">
										<table class="table">
													<tr>
														<th>N° comentario</th>
														<th>Comentario</th>
														<th>Denunciado?</th>
														<th>Respuesta</th>
														<th>Respondido?</th>

														

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
															<?php $respondido = $datos_p[$i][6]?>


				
												
												
													<tr>
													
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $id_comen ;?></a></td>
									<td class="pre-scrollable"><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $comentario ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $denunciado_com ;?></a></td>
									<td class="pre-scrollable"><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $responde_com ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $respondido ;?></a></td>	
															<td><a href="Cargaarticulo.php?id_pub=<?php echo $id_pubcom; ?>">IR A PUBLICACION</a></td>					
														

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
			</div>
		</div>	
					


		
		
	Mis Respuestas	
		
<!--Trae Mis Respuestas -->
						

		<div class="jumbotron">
			<div class="container-fluid">
				<section class="main row">
					<div class="col-md-12">
					<ol class="pre-scrollable">
										<table class="table">
													<tr>
														<th>ID comentario</th>
														<th>Publicacion</th>
														<th>Comentario</th>
														<th>Respuesta</th>
														<th>Respondido?</th>
														

														

													</tr>										
													<?php
													
														$conex = conectar();
														$e = new Publicacion('',$id_usu);
														$datos_e=$e->consultaPreguntas($conex);
														$cuentae=count($datos_e);

													?>
													
												<?php
												for ($i=0;$i<$cuentae;$i++)
												{
												?>
												
												
															<?php $id_comenpub = $datos_e[$i][0]?>
															<?php $publicacion = $datos_e[$i][1]?>
															<?php $comentario_pub = $datos_e[$i][2]?>
															<?php $respuesta = $datos_e[$i][3]?>
															<?php $respondido = $datos_e[$i][4]?>
												
												
													<tr>
													
															<td><a value="<?php echo $datos_e[$i][0]?>"  ><?php echo $id_comenpub ;?></a></td>
															<td><a value="<?php echo $datos_e[$i][0]?>"  ><?php echo $publicacion ;?></a></td>
															<td><a value="<?php echo $datos_e[$i][0]?>"  ><?php echo $comentario_pub ;?></a></td>
															<td><a value="<?php echo $datos_e[$i][0]?>"  ><?php echo $respuesta ;?></a></td>
															<td><a value="<?php echo $datos_e[$i][0]?>"  ><?php echo $respondido ;?></a></td>
															
															<?php
															if (empty($respuesta)){
															?>
															<td><a href="singin.php" class="btn btn-warning btn-sm">Responder</a></td>
															<?php
															}
															else {
															?>	
															<td>Respondida</td>
															<?php	
															}
															?>
															
														

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




	Mis Ventas	
		
<!--Trae Mis Ventas -->
						

		<div class="jumbotron">
			<div class="container-fluid">
				<section class="main row">
					<div class="col-md-12">
					<ol class="pre-scrollable">
										<table class="table">
													<tr>
														<th>ID Transaccion</th>
														<th>ID Usuario comprador</th>
														<th>ID Publicacion Vendida</th>
														<th>Precio Final</th>
														<th>Fecha</th>
														<th>Cantidad</th>
														<th>Calificacion</th>
														<th>Se pago comision?</th>
														<th>Monto de comision</th>
													
														

													</tr>										
													<?php
													
														$conex = conectar();
														$v = new Publicacion('',$id_usu);
														$datos_v=$v->consultaVentas($conex);
														$cuentav=count($datos_v);

													?>
													
												<?php
												for ($i=0;$i<$cuentav;$i++)
												{
												?>
												
												
															<?php $id_trans = $datos_v[$i][0]?>
															<?php $id_usut = $datos_v[$i][1]?>
															<?php $id_pubt = $datos_v[$i][2]?>
															<?php $precio_finalt = $datos_v[$i][3]?>
															<?php $fechat = $datos_v[$i][4]?>
															<?php $cantidad = $datos_v[$i][5]?>
															<?php $calificaciont = $datos_v[$i][6]?>
															<?php $pago_comision = $datos_v[$i][7]?>
															<?php $comision_monto = $datos_v[$i][8]?>
												
												
													<tr>
													
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $id_trans ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $id_usut ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $id_pubt ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  >$&nbsp<?php echo $precio_finalt ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $fechat ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $cantidad ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $calificaciont ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $pago_comision ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  >$&nbsp<?php echo $comision_monto ;?></a></td>
														

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



	Mis COMPRAS	
		
<!--Trae Mis Compras -->
						

		<div class="jumbotron">
			<div class="container-fluid">
				<section class="main row">
					<div class="col-md-12">
					<ol class="pre-scrollable">
										<table class="table">
													<tr>
														<th>ID Transaccion</th>
														<th>ID Usuario comprador</th>
														<th>ID Publicacion Vendida</th>
														<th>Precio Final</th>
														<th>Fecha</th>
														<th>Cantidad</th>
														<th>Calificacion</th>

													
														

													</tr>										
													<?php
													
														$conex = conectar();
														$t = new Transaccion('',$id_usu);
														$datos_t=$t->consultaCompras($conex);
														$cuentat=count($datos_t);

													?>
													
												<?php
												for ($i=0;$i<$cuentat;$i++)
												{
												?>
												
												
															<?php $id_trans = $datos_t[$i][0]?>
															<?php $id_usut = $datos_t[$i][1]?>
															<?php $id_pubt = $datos_t[$i][2]?>
															<?php $precio_finalt = $datos_t[$i][3]?>
															<?php $fechat = $datos_t[$i][4]?>
															<?php $cantidad = $datos_t[$i][5]?>
															<?php $calificaciont = $datos_t[$i][6]?>
												
												
													<tr>
													
															<td><a value="<?php echo $datos_t[$i][0]?>"  ><?php echo $id_trans ;?></a></td>
															<td><a value="<?php echo $datos_t[$i][0]?>"  ><?php echo $id_usut ;?></a></td>
															<td><a value="<?php echo $datos_t[$i][0]?>"  ><?php echo $id_pubt ;?></a></td>
															<td><a value="<?php echo $datos_t[$i][0]?>"  >$&nbsp<?php echo $precio_finalt ;?></a></td>
															<td><a value="<?php echo $datos_t[$i][0]?>"  ><?php echo $fechat ;?></a></td>
															<td><a value="<?php echo $datos_t[$i][0]?>"  ><?php echo $cantidad ;?></a></td>
															<td><a value="<?php echo $datos_t[$i][0]?>"  ><?php echo $calificaciont ;?></a></td>

														

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