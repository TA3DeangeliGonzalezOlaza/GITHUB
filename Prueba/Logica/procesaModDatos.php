<?php
if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
require_once('../clases/Persona.class.php');
require_once('../logica/funciones.php');

$id_per=strip_tags($_POST['id_per']);
$nick_per=strip_tags($_POST['nick']);
$nom1=strip_tags($_POST['nom1']);
$nom2=strip_tags($_POST['nom2']);
$ape1=strip_tags($_POST['ape1']);
$ape2=strip_tags($_POST['ape2']);
$mail=strip_tags($_POST['mail']);
$tel=strip_tags($_POST['tel']);
$dir=strip_tags($_POST['dir']);





$conex = conectar();
$d = new Persona($id_per,'',$nick_per,'',$nom1,$nom2,$ape1,$ape2,$mail,$tel,$dir);
$datos_d=$d->CambiaDatos($conex);

?>
				 <script type="text/javascript">
		 
						window.alert("TUS DATOS HAN SIDO MODIFICADOS CON EXITO");
						location.href="../presentacion/usuario_menu.php?id_pub";
				</script>
	
