<?php session_start(); ?>

<?php require_once("inc/bbdd.php");
$pagina="logout";
$titulo="Cerrar Sesión";
require_once("inc/encabezado.php");
require_once("inc/configuracion.php");
require_once("inc/funciones.php");

	unset($_SESSION["email"]);
	header('Location: login.php');?>

<?php require_once("inc/pie.php");?>