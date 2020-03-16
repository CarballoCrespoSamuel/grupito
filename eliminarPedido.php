<?php session_start(); ?>

<?php require_once("inc/bbdd.php");
$pagina="eliminarPedido";
$titulo="eliminarPedido";
require_once("inc/encabezado.php");
require_once("inc/configuracion.php");
require_once("inc/funciones.php");?>

<?php 
	$idPedido=$_REQUEST["idPedido"];
	$email=$_SESSION["email"];
?>
	<div class="container">
<?php
		echo "Su pedido $idPedido";
		eliminarPedido($idPedido);
?>
	</div>
	
<?php require_once("inc/pie.php");?>