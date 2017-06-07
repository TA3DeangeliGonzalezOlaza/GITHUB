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
<?php $puntajetotal = "0" ?>

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
						<div class="col-md-10">
						
<!--Trae persona -->	<h2 class="text-center">MENU USUARIO</h2>		
						
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


						</div>
					</div>
					
						<?php
						}
						?>	

				
					
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


						</div>
							<?php
							}
							?>	
					</div>
					
					
					
					

				<h2>Publicaciones</h2>	
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

		
		
		
	<h2>Mis Preguntas</h2>	
		
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
									
									
															<?php
															if ($respondido=="1"){
															?>
															<td><span title="Respondieron" class="glyphicon glyphicon-comment "></span></td>
															<?php
															}
															?>
															<?php
															if ($respondido=="0"){
															?>
															<td><span title="No respondieron aun" class="glyphicon glyphicon-remove"></span></a></td>
															<?php
															}
															?>
									
									
															
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
					


		
		
	<h2>Mis Respuestas</h2>	
		
<!--Trae Mis Respuestas -->
						

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
															<td class="pre-scrollable"><a value="<?php echo $datos_e[$i][0]?>"  ><?php echo $comentario_pub ;?></a></td>
															<td class="pre-scrollable"><a value="<?php echo $datos_e[$i][0]?>"  ><?php echo $respuesta ;?></a></td>
															
															
															<?php
															if ($respondido=="1"){
															?>
															<td><span title="Respondiste" class="glyphicon glyphicon-comment "></span></td>
															<?php
															}
															?>
															<?php
															if ($respondido=="0"){
															?>
															<td><span title="No respondiste" class="glyphicon glyphicon-remove"></span></a></td>
															<?php
															}
															?>
															

															
															<?php
															if (empty($respuesta)){
															?>
															<form action="RespuestaEmergente.php" method="POST">
															

															<input  type="hidden" name="id_comen" value= "<?php echo $id_comenpub; ?>" />
															<input  type="hidden" name="comentario" value= "<?php echo $comentario_pub; ?>" />
	
															
															
															<td><button class="btn btn-sm btn-warning btn-block" type="submit">Responder</button></td>
															</form>
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
			</div>
		</div>	




	<h2>Mis Ventas</h2>	
		
<!--Trae Mis Ventas -->
						

		<div class="jumbotron-fluid">
			<div class="container-fluid">
			<div class="panel panel-default">
			<div class="panel-body"			
				<section class="main row">
					<div class="col-md-12">
					<ol class="pre-scrollable">
										<table class="table">
													<tr>
														<th>N° Transaccion</th>
														<th>N° Usuario comprador</th>
														<th>N° Publicacion Vendida</th>
														<th>Publicacion</th>
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
															<?php $nom_pubv = $datos_v[$i][13]?>
												
												
													<tr>
													
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $id_trans ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $id_usut ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $id_pubt ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $nom_pubv ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  >$&nbsp<?php echo $precio_finalt ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $fechat ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $cantidad ;?></a></td>
															
															
															<?php
															if ($calificaciont=="1"){
															?>
															<td><span title="positivo" class="glyphicon glyphicon-plus "></span></td>
															<?php
															}
															?>
															<?php
															if ($calificaciont=="0"){
															?>
															<td><span title="neutro" class="glyphicon glyphicon-pause"></span></a></td>
															<?php
															}
															?>
															<?php
															if ($calificaciont=="-1"){
															?>
															<td><span title="negativo" class="glyphicon glyphicon-minus"></span></a></td>
															<?php
															}
															?>
															
															<?php $puntajetotal = $puntajetotal + $calificaciont;?>

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
			</div>
		</div>	



	<h2>Mis COMPRAS</h2>	
		
<!--Trae Mis Compras -->
						

		<div class="jumbotron-fluid">
			<div class="container-fluid">
			<div class="panel panel-default">
			<div class="panel-body"	
				<section class="main row">
					<div class="col-md-12">
					<ol class="pre-scrollable">
										<table class="table">
													<tr>
														<th>N° Transaccion</th>
														<th>Tu N° de Usuario</th>
														<th>Nombre Publicacion</th>
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
															<?php $comentariot = $datos_t[$i][9]?>
															<?php $califico = $datos_t[$i][10]?>
															<?php $nom_pubt = $datos_t[$i][13]?>
												
												
													<tr>
													
															<td><a value="<?php echo $datos_t[$i][0]?>"  ><?php echo $id_trans ;?></a></td>
															<td><a value="<?php echo $datos_t[$i][0]?>"  ><?php echo $id_usut ;?></a></td>
															<td><a value="<?php echo $datos_t[$i][0]?>"  ><?php echo $nom_pubt ;?></a></td>
															<td><a value="<?php echo $datos_t[$i][0]?>"  >$&nbsp<?php echo $precio_finalt ;?></a></td>
															<td><a value="<?php echo $datos_t[$i][0]?>"  ><?php echo $fechat ;?></a></td>
															<td><a value="<?php echo $datos_t[$i][0]?>"  ><?php echo $cantidad ;?></a></td>
															
															
															<?php
															if ($calificaciont=="1"){
															?>
															<td><span title="positivo" class="glyphicon glyphicon-plus "></span></td>
															<?php
															}
															?>
															<?php
															if ($calificaciont=="0"){
															?>
															<td><span title="neutro" class="glyphicon glyphicon-pause"></span></a></td>
															<?php
															}
															?>
															<?php
															if ($calificaciont=="-1"){
															?>
															<td><span title="negativo" class="glyphicon glyphicon-minus"></span></a></td>
															<?php
															}
															?>
															
											
															
															
															
															
															<td class="pre-scrollable"><a value="<?php echo $datos_t[$i][0]?>"  ><?php echo $comentariot ;?></a></td>
															
															
															
															
															
															
												<form action="CalificacionEmergente.php" method="POST">
															
															<input  type="hidden" name="id_trans" value= "<?php echo $id_trans; ?>" />
															<input  type="hidden" name="id_usut" value= "<?php echo $id_usut; ?>" />
															<input  type="hidden" name="id_pubt" value= "<?php echo $id_pubt; ?>" />															
															
															<?php if ($califico=="0")
															{
															
															?>
															<td><button class="btn btn-sm btn-warning btn-block" type="submit">CALIFICAR</button></td>
												</form>
															
															<?php
															}
															if ($califico=="1") {
															?>
															<td>Calificada</td>
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
			</div>
		</div>	


		
					
	<h2>Mis PERMUTAS -EN PROCESO-</h2>	
		
<!--Trae Mis Permutas -->
						

		<div class="jumbotron-fluid">
			<div class="container-fluid">
			<div class="panel panel-default">
			<div class="panel-body"			
				<section class="main row">
					<div class="col-md-12">
					<ol class="pre-scrollable">
										<table class="table">
													<tr>
														<th>N° Transaccion</th>
														<th>N° Usuario comprador</th>
														<th>N° Publicacion Vendida</th>
														<th>Publicacion</th>
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
															<?php $nom_pubv = $datos_v[$i][13]?>
												
												
													<tr>
													
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $id_trans ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $id_usut ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $id_pubt ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $nom_pubv ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  >$&nbsp<?php echo $precio_finalt ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $fechat ;?></a></td>
															<td><a value="<?php echo $datos_v[$i][0]?>"  ><?php echo $cantidad ;?></a></td>
															
															
															<?php
															if ($calificaciont=="1"){
															?>
															<td><span title="positivo" class="glyphicon glyphicon-plus "></span></td>
															<?php
															}
															?>
															<?php
															if ($calificaciont=="0"){
															?>
															<td><span title="neutro" class="glyphicon glyphicon-pause"></span></a></td>
															<?php
															}
															?>
															<?php
															if ($calificaciont=="-1"){
															?>
															<td><span title="negativo" class="glyphicon glyphicon-minus"></span></a></td>
															<?php
															}
															?>
															

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
			</div>
		</div>


				<h2>Datos personales</h2>	
<!--Trae Datos -->

	<div class="jumbotron-fluid">
		<div class="container-fluid">
			<div class="panel panel-default">
			<div class="panel-body">
				<section class="main row">
					<div class="col-md-12">
					<ol class="pre-scrollable">
										<table class="table">
													<tr>

														<th>id persona</th>
														<th>cedula</th>
														<th>nick</th>
														<th>nombre1</th>
														<th>nombre2</th>
														<th>apellido1</th>
														<th>apellido2</th>
														<th>email</th>
														<th>telefono</th>
														<th>direccion</th>
														

													</tr>										
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
				

												
													<tr>
															<input  type="hidden" name="id_usu" id="id_usu" value="<?php echo $id_usu;?>" />
															<input  type="hidden" name="id_pub" id="id_pub" value="<?php echo $id_pub;?>" />
															<input  type="hidden" name="img2pub" id="img2pub" value="<?php echo $img02_pub;?>" />
															<input  type="hidden" name="img3pub" id="img3pub" value="<?php echo $img03_pub;?>" />
															
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $id_per ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $ci_per ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $nick_per ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $nom1_per ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $nom2_per ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $ape1_per ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $ape2_per ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $email_per ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $tel_per ;?></a></td>
															<td><a value="<?php echo $datos_p[$i][0]?>"  ><?php echo $dir_per ;?></a></td></br>

													</tr>
													
													
																												
									
														
						</form>				
															
											<form action="CambiaDatosEmergente.php" method="POST">
															
															<input  type="hidden" name="id_per" value= "<?php echo $id_per; ?>" />
															<input  type="hidden" name="nick_per" value= "<?php echo $nick_per; ?>" />
															<input  type="hidden" name="nom1_per" value= "<?php echo $nom1_per; ?>" />
															<input  type="hidden" name="nom2_per" value= "<?php echo $nom2_per; ?>" />
															<input  type="hidden" name="ape1_per" value= "<?php echo $ape1_per; ?>" />
															<input  type="hidden" name="ape2_per" value= "<?php echo $ape2_per; ?>" />
															<input  type="hidden" name="email_per" value= "<?php echo $email_per; ?>" />
															<input  type="hidden" name="tel_per" value= "<?php echo $tel_per; ?>" />
															<input  type="hidden" name="dir_per" value= "<?php echo $dir_per; ?>" />


															
															
																<td><button class="btn btn-sm btn-warning btn-block" type="submit">Cambiar Datos</button></td>
	
											</form>
											<form action="CambiaPassEmergente.php" method="POST">
															
															<input  type="hidden" name="id_per" value= "<?php echo $id_per; ?>" />
															<input  type="hidden" name="nick_per" value= "<?php echo $nick_per; ?>" />
															<input  type="hidden" name="password_per" value= "<?php echo $password_per; ?>" />
															<input  type="hidden" name="nom1_per" value= "<?php echo $nom1_per; ?>" />
															<input  type="hidden" name="nom2_per" value= "<?php echo $nom2_per; ?>" />
															<input  type="hidden" name="ape1_per" value= "<?php echo $ape1_per; ?>" />
															<input  type="hidden" name="ape2_per" value= "<?php echo $ape2_per; ?>" />
															<input  type="hidden" name="email_per" value= "<?php echo $email_per; ?>" />
															<input  type="hidden" name="tel_per" value= "<?php echo $tel_per; ?>" />
															<input  type="hidden" name="dir_per" value= "<?php echo $dir_per; ?>" />


															
															
																<td><button class="btn btn-sm btn-warning btn-block" type="submit">Cambiar Password</button></td>
	
											</form>
													
													
															
													
												<?php
												}
												?>	
										</table>

									<h3>TU REPUTACION:</h3> 

									<?php
									if ($puntajetotal <= "-5"){
									?>
									
				
										<div class="btn-toolbar" role="toolbar">
										  <div class="btn-group">
											<button type="button" class="btn btn-default" style="background-color: #DF3928">-5</button>
											<button type="button" class="btn btn-default">-4</button>
											<button type="button" class="btn btn-default">-3</button>
											<button type="button" class="btn btn-default">-2</button>
											<button type="button" class="btn btn-default">-1</button>
											<button type="button" class="btn btn-default">0</button>
											<button type="button" class="btn btn-default">1</button>
											<button type="button" class="btn btn-default">2</button>
											<button type="button" class="btn btn-default">3</button>
											<button type="button" class="btn btn-default">4</button>
											<button type="button" class="btn btn-default">5</button>
											
										  </div>
								<?php
									}
									?>
									

									
								<?php
								if ($puntajetotal == "-4"){
								?>
									
			
										<div class="btn-toolbar" role="toolbar">
										  <div class="btn-group">
											<button type="button" class="btn btn-default">-5</button>
											<button type="button" class="btn btn-default" style="background-color: #DF7E28">-4</button>
											<button type="button" class="btn btn-default">-3</button>
											<button type="button" class="btn btn-default">-2</button>
											<button type="button" class="btn btn-default">-1</button>
											<button type="button" class="btn btn-default">0</button>
											<button type="button" class="btn btn-default">1</button>
											<button type="button" class="btn btn-default">2</button>
											<button type="button" class="btn btn-default">3</button>
											<button type="button" class="btn btn-default">4</button>
											<button type="button" class="btn btn-default">5</button>
											
										  </div>
								<?php
									}
									?>
									
								<?php
								if ($puntajetotal == "-3"){
								?>
									
				
										<div class="btn-toolbar" role="toolbar">
										  <div class="btn-group">
											<button type="button" class="btn btn-default">-5</button>
											<button type="button" class="btn btn-default">-4</button>
											<button type="button" class="btn btn-default" style="background-color: #DFB828">-3</button>
											<button type="button" class="btn btn-default">-2</button>
											<button type="button" class="btn btn-default">-1</button>
											<button type="button" class="btn btn-default">0</button>
											<button type="button" class="btn btn-default">1</button>
											<button type="button" class="btn btn-default">2</button>
											<button type="button" class="btn btn-default">3</button>
											<button type="button" class="btn btn-default">4</button>
											<button type="button" class="btn btn-default">5</button>
											
										  </div>
								<?php
									}
									?>

								<?php
								if ($puntajetotal == "-2"){
								?>
									
					
										<div class="btn-toolbar" role="toolbar">
										  <div class="btn-group">
											<button type="button" class="btn btn-default">-5</button>
											<button type="button" class="btn btn-default">-4</button>
											<button type="button" class="btn btn-default">-3</button>
											<button type="button" class="btn btn-default" style="background-color: #D4DF28">-2</button>
											<button type="button" class="btn btn-default">-1</button>
											<button type="button" class="btn btn-default">0</button>
											<button type="button" class="btn btn-default">1</button>
											<button type="button" class="btn btn-default">2</button>
											<button type="button" class="btn btn-default">3</button>
											<button type="button" class="btn btn-default">4</button>
											<button type="button" class="btn btn-default">5</button>
											
										  </div>
								<?php
									}
									?>
						
								<?php
								if ($puntajetotal == "-1"){
								?>
									
		
										<div class="btn-toolbar" role="toolbar">
										  <div class="btn-group">
											<button type="button" class="btn btn-default">-5</button>
											<button type="button" class="btn btn-default">-4</button>
											<button type="button" class="btn btn-default">-3</button>
											<button type="button" class="btn btn-default">-2</button>
											<button type="button" class="btn btn-default" style="background-color: #9FDF28">-1</button>
											<button type="button" class="btn btn-default">0</button>
											<button type="button" class="btn btn-default">1</button>
											<button type="button" class="btn btn-default">2</button>
											<button type="button" class="btn btn-default">3</button>
											<button type="button" class="btn btn-default">4</button>
											<button type="button" class="btn btn-default">5</button>
											
										  </div>
								<?php
									}
									?>						
						
						
								<?php
								if ($puntajetotal == "0"){
								?>
									
										<div class="btn-toolbar" role="toolbar">
										  <div class="btn-group">
											<button type="button" class="btn btn-default">-5</button>
											<button type="button" class="btn btn-default">-4</button>
											<button type="button" class="btn btn-default">-3</button>
											<button type="button" class="btn btn-default">-2</button>
											<button type="button" class="btn btn-default">-1</button>
											<button type="button" class="btn btn-default" style="background-color: #28DF39">0</button>
											<button type="button" class="btn btn-default">1</button>
											<button type="button" class="btn btn-default">2</button>
											<button type="button" class="btn btn-default">3</button>
											<button type="button" class="btn btn-default">4</button>
											<button type="button" class="btn btn-default">5</button>
											
										  </div>
								<?php
									}
									?>						
						
						
						
								<?php
								if ($puntajetotal == "1"){
								?>
									
										<div class="btn-toolbar" role="toolbar">
										  <div class="btn-group">
											<button type="button" class="btn btn-default">-5</button>
											<button type="button" class="btn btn-default">-4</button>
											<button type="button" class="btn btn-default">-3</button>
											<button type="button" class="btn btn-default">-2</button>
											<button type="button" class="btn btn-default">-1</button>
											<button type="button" class="btn btn-default">0</button>
											<button type="button" class="btn btn-default" style="background-color: #28DF9F">1</button>
											<button type="button" class="btn btn-default">2</button>
											<button type="button" class="btn btn-default">3</button>
											<button type="button" class="btn btn-default">4</button>
											<button type="button" class="btn btn-default">5</button>
											
										  </div>
								<?php
									}
									?>						
						
						
								<?php
								if ($puntajetotal == "2"){
								?>
									
										<div class="btn-toolbar" role="toolbar">
										  <div class="btn-group">
											<button type="button" class="btn btn-default">-5</button>
											<button type="button" class="btn btn-default">-4</button>
											<button type="button" class="btn btn-default">-3</button>
											<button type="button" class="btn btn-default">-2</button>
											<button type="button" class="btn btn-default">-1</button>
											<button type="button" class="btn btn-default">0</button>
											<button type="button" class="btn btn-default">1</button>
											<button type="button" class="btn btn-default" style="background-color: #28DFC3">2</button>
											<button type="button" class="btn btn-default">3</button>
											<button type="button" class="btn btn-default">4</button>
											<button type="button" class="btn btn-default">5</button>
											
										  </div>
								<?php
									}
									?>						
						
								<?php
								if ($puntajetotal == "3"){
								?>
									
			
										<div class="btn-toolbar" role="toolbar">
										  <div class="btn-group">
											<button type="button" class="btn btn-default">-5</button>
											<button type="button" class="btn btn-default">-4</button>
											<button type="button" class="btn btn-default">-3</button>
											<button type="button" class="btn btn-default">-2</button>
											<button type="button" class="btn btn-default">-1</button>
											<button type="button" class="btn btn-default">0</button>
											<button type="button" class="btn btn-default">1</button>
											<button type="button" class="btn btn-default">2</button>
											<button type="button" class="btn btn-default" style="background-color: #28D4DF">3</button>
											<button type="button" class="btn btn-default">4</button>
											<button type="button" class="btn btn-default">5</button>
											
										  </div>
								<?php
									}
									?>

								<?php
								if ($puntajetotal == "4"){
								?>
									
	
										<div class="btn-toolbar" role="toolbar">
										  <div class="btn-group">
											<button type="button" class="btn btn-default">-5</button>
											<button type="button" class="btn btn-default">-4</button>
											<button type="button" class="btn btn-default">-3</button>
											<button type="button" class="btn btn-default">-2</button>
											<button type="button" class="btn btn-default">-1</button>
											<button type="button" class="btn btn-default">0</button>
											<button type="button" class="btn btn-default">1</button>
											<button type="button" class="btn btn-default">2</button>
											<button type="button" class="btn btn-default">3</button>
											<button type="button" class="btn btn-default" style="background-color: #28B0DF">4</button>
											<button type="button" class="btn btn-default">5</button>
											
										  </div>
								<?php
									}
									?>						
						
								<?php
								if ($puntajetotal >= "5"){
								?>
									

										<div class="btn-toolbar" role="toolbar">
										  <div class="btn-group">
											<button type="button" class="btn btn-default">-5</button>
											<button type="button" class="btn btn-default">-4</button>
											<button type="button" class="btn btn-default">-3</button>
											<button type="button" class="btn btn-default">-2</button>
											<button type="button" class="btn btn-default">-1</button>
											<button type="button" class="btn btn-default">0</button>
											<button type="button" class="btn btn-default">1</button>
											<button type="button" class="btn btn-default">2</button>
											<button type="button" class="btn btn-default">3</button>
											<button type="button" class="btn btn-default">4</button>
											<button type="button" class="btn btn-default" style="background-color: #2868DF">5</button>
											
										  </div>
								<?php
									}
									?>						
						
						
						
						
					</ol>
					
					
					</div>
					
				</section>
			</div>
			</div>
			</div>
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