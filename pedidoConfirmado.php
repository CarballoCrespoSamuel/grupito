<?php session_start(); ?>

<?php 
$pagina="Confirmado";
$titulo="Confirmado";
require_once("inc/funciones.php");
require_once("inc/bbdd.php");
require_once("inc/encabezado.php");
require_once("inc/funciones.php");



$idUsuario=recoge("idUsuario");
echo "$idUsuario";
$idProducto="";
$cantidad="";
$subtotal="";

//$pedido=insertarPedido($idUsuario, $detallePedido, $total);


?>
<div align="center">
	<h1>Enhorabuena! Ha hecho el pedido con éxito!</h1>
</div>