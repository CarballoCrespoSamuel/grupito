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
<div class="jumbotron">
	<div class="container">
<?php
		echo "Su pedido $idPedido ha sido eliminado.<br/>";
		eliminarPedido($idPedido);
?>
		<a href="misPedidos.php" class="btn btn-primary">Mis pedidos.</a>
		<a href="productos.php" class="btn btn-success">Nuestros productos.</a>
	</div>
</div>
<?php require_once("inc/pie.php");?>