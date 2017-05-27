<?php
if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
require_once('../clases/Persona.class.php');
require_once('../logica/funciones.php');

//Obtiene los datos ingresados
$login= strip_tags(trim($_POST['nickname']));
$pass = strip_tags(trim($_POST['password']));
//Guardo el login en una variable de sesión
$_SESSION["login"] = $login;

$conex = conectar();
//$u= new Persona ('','',$login,md5($pass));
$u= new Persona ('','',$login,$pass);

$datos_u=$u->coincideLoginPassword($conex);

if (!empty($datos_u)){
	$_SESSION["LOGIN"] =$datos_u[0]["nick_per"];
	$_SESSION["ID"] =$datos_u[0]["id_per"];
		if ($_SESSION["LOGIN"]!="admin"){	
	//die(var_dump($datos_u));
	?>
		 <script type="text/javascript">
			location.href="../presentacion/cargamenu.php";
		</script>
	<?php
	}
	if ($_SESSION["LOGIN"]=="Usuario"){
		?>
		 <script type="text/javascript">
			location.href="../presentacion/cargamenuusuario.php";
		</script>
	<?php
	}
}
else
	{
	//Si el array esta vacio, es que no encontro un registro que coincida el login y la password

	?>
	 <script type="text/javascript">
	 
	   window.alert("El Usuario o Password \n no es correcto.");
	   location.href="../presentacion/index.php";
	 </script>
	  <?php 


	/*
	?>
		 <script type="text/javascript">
			location.href="../presentacion/menu.php";
		</script>
	<?php 
	*/ 

	}
desconectar($conex);
 
?>
