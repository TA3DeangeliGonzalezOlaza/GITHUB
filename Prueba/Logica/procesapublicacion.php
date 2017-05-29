<?php
if (!isset($_SESSION["PHPSESSID"])) {
	session_start(); }
require_once('../clases/Publicacion.class.php');
require_once('../logica/funciones.php');

$idusu= strip_tags(trim($_GET['idusu']));

		$conex = conectar();
		$d = new Publicacion($idusu);
		$datos_d=$d->alta($conex);

	?>
