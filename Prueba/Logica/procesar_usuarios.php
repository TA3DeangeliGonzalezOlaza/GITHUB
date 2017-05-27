<?php
session_start();
require_once('funciones.php');
require_once('../presentacion/Login.php');
require_once('../clases/Persona.class.php');
echo "<script type='text/javascript' src='../jscript/funcionesGenerales.js'></script>";

//----------------------------Variables por Form

     $ci_per=strip_tags($_POST['ci']); // id usuario
	 $nick_per=strip_tags($_POST['nick']); // cedula
     $pass_per=strip_tags($_POST['pass']); //nombre
     $nom1_per=strip_tags($_POST['nom1']); //apellido
     $nom2_per=strip_tags($_POST['nom2']); //correo
     $ape1_per=strip_tags($_POST['ape1']); //celular
     $ape2_per=strip_tags($_POST['ape2']); //tipo usuario/admin
     $email_per=strip_tags($_POST['mail']); //numero de tarjeta
	 $tel_per=strip_tags($_POST['tel']); //codigo verificador
	 $dir_per=strip_tags($_POST['dir']); // fecha de vencimiento de tarjeta
	// $activo_usu=strip_tags($_POST['ActUsu']); //si esta de baja logica.
	 $modo=strip_tags($_POST['Modo']);
$mensaje="";
$ejecucionOK=true;


//Se conecta a la base
$conex = conectar();
if ($modo == "ALTA")
{
	$login= strip_tags($_POST['nick']);
	$password= strip_tags($_POST['pass']);
	//Se crea un objeto con los datos de los cuadros de texto del formulario
	$u = new Persona('',$ci_per,$nick_per,$pass_per,$nom1_per,$nom2_per,$ape1_per,$ape2_per,$email_per,$tel_per,$dir_per);
	$ejecucionOK=$u->alta($conex);
	if ($ejecucionOK)
	{
			?>
				 <script type="text/javascript">
		 
						window.alert("Los datos de Usuario del Sist. se ingresaron correctamente.");
						location.href="../presentacion/index.php";
				</script>
			<?php

	}
	else
	{
			?>
				 <script type="text/javascript">
		 
						window.alert("Error al ingresar los datos de Usuario.");
		
				</script>
			<?php
   
	} 
}
else
{
	if ($modo == "MOD") {
		$idUsu= trim(strip_tags($_POST['IdUsu']));
		$u = new Persona('',$ci_per,$nick_per,$pass_per,$nom1_per,$nom2_per,$ape1_per,$ape2_per,$email_per,$tel_per,$dir_per);
		$ejecucionOK=$u->modificacion($conex);
		if ($ejecucionOK)
		{
			?>
				 <script type="text/javascript">
		 
						window.alert("Los datos de Usuario del Sist. se modificaron correctamente.");
						location.href="../presentacion/cargamenuusuario.php";
				</script>
			<?php
		
		}
		else
		{
			?>
				 <script type="text/javascript">
		 
						window.alert("Error al modificar los datos de Usuario.");
		
				</script>
			<?php
   
		} 
		
	}
	else 
	{
		if ($modo == "DEL") {
			$idUsu= trim(strip_tags($_POST['IdUsu']));
			$u = new Usuario($idUsu);
			$ejecucionOK=$u->baja($conex);
			if ($ejecucionOK)
			{
			?>
				 <script type="text/javascript">
		 
						window.alert("Los datos de Usuario se eliminaron correctamente.");
						location.href="../presentacion/cargamenuusuario.php";
				</script>
			<?php
		
			}
			else
			{
				?>
					 <script type="text/javascript">
			 
							window.alert("Error al eliminar los datos de Usuario.");
			
					</script>
				<?php
   
			} 
		}
	}
}
//Desconectar de la base de datos
desconectar($conex);


?>
