<?php
if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
require_once('../clases/Persona.class.php');
require_once('../logica/funciones.php');

$id_per=strip_tags($_POST['id_per']);
$nick_per=strip_tags($_POST['nick_per']);
$password_per=strip_tags($_POST['new_password_per']);
$new2_password_per=strip_tags($_POST['new2_password_per']);

if ($password_per==$new2_password_per){


$conex = conectar();
$d = new Persona($id_per,'',$nick_per,$password_per);
$datos_d=$d->CambiaPass($conex);

	?>
				 <script type="text/javascript">
		 
						window.alert("CALIFICASTE TU COMPRA CON EXITO");
						location.href="../presentacion/usuario_menu.php?id_pub";
				</script>
<?php
}
else {
?>				
				 <script type="text/javascript">
		 
						window.alert("LAS CONTRASEÑAS NO COINCIDEN");
						location.href="../presentacion/usuario_menu.php?id_pub";
				</script>				
<?php
}
?>