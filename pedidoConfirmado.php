<?php session_start(); ?>

<?php 
$pagina="Confirmado";
$titulo="Confirmado";
require_once("inc/funciones.php");
require_once("inc/bbdd.php");
require_once("inc/encabezado.php");
require_once("inc/funciones.php");



$idUsuario=recoge("idUsuario");
$id=recoge("idProducto");


//$pedido=insertarPedido($idUsuario, $detallePedido, $total);


?>
<div align="center">
	<h1>Enhorabuena! Ha hecho su pedido con éxito!</h1>
	<?php unset($_SESSION["carrito"]); ?>
	<a href="productos.php" class="btn btn-success ml-3">Volver a productos</a>
</div>