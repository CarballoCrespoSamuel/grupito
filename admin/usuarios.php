<?php session_start();
require_once ("inc/encabezado.php"); 
require_once ("inc/funciones.php");
if(isset($_SESSION["usuario"])){ ?>

<?php
else{
?>

<?php 	
}
require_once ("inc/pie.php"); ?>
	
	