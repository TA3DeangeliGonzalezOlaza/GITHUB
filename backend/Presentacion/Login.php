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

		  <form class="form-signin" id="FrmUsuarios" action="../logica/procesar_usuarios.php" method="POST">
		  
		  <input  type="hidden" name="Modo" id="Modo" value= "ALTA" />
			<h2 class="form-signin-heading">Ingresa tus datos</h2>
			<input type="text" id="inputci" name="ci" class="form-control" placeholder="Documento" required="" autofocus="">
			
			<input type="text" id="inputnick" name="nick" class="form-control" placeholder="Nick Name" required="" autofocus="">
			
			<label for="inputPassword" class="sr-only">Contraseña</label>
			<input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required="">
			
			<input type="text" id="inputnom1" name="nom1" class="form-control" placeholder="Nombre" required="" autofocus="">
			
			<input type="text" id="inputnom2" name="nom2" class="form-control" placeholder="Nombre 2" required="" autofocus="">
						
			<input type="text" id="inputape1" name="ape1" class="form-control" placeholder="Apellido" required="" autofocus="">
						
			<input type="text" id="inputape2" name="ape2" class="form-control" placeholder="Apellido 2" required="" autofocus="">
			
			<label for="inputEmail" class="sr-only">Correo</label>
			<input type="email" id="inputEmail" name="mail" class="form-control" placeholder="Email address" required="" autofocus="">
			
			<input type="number" id="inputtel" name="tel" class="form-control" placeholder="Telefono" required="" autofocus="">
			
			<input type="text" id="inputdir" name="dir" class="form-control" placeholder="Direccion" required="" autofocus="">
			
			<button class="btn btn-lg btn-warning btn-block" type="submit">REGISTRAR</button>
		  </form>

		</div>




 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
</body>
</html>