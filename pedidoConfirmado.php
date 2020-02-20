<?php session_start(); ?>

<?php 
$pagina="Confirmado";
$titulo="Confirmado";
require_once("inc/funciones.php");
require_once("inc/bbdd.php");
require_once("inc/encabezado.php");
require_once("inc/funciones.php");


$total=0;
foreach($_SESSION['carrito'] as $id => $cantidad){
		$producto=seleccionarProducto($id);
		$nombre=$producto["nombre"];
		$precioOferta=$producto["precioOferta"];
		$subtotal=$precioOferta*$cantidad;

		$total=$total+$subtotal;
		?>
		<li class="list-group-item"><?php echo "<strong>$nombre</strong> "."($cantidad unidades)" ; ?></li>		
		
	<?php 

}
$email=$_SESSION["email"];
$mail=seleccionarEmail($email);
$idUsuario=$mail["idUsuario"];
$precio=$subtotal;
$detallePedido=$_SESSION["carrito"];

$idPedido=insertarPedido($idUsuario, $detallePedido, $total);

?>
<div align="center">
	<h1>Enhorabuena! Ha hecho su pedido con éxito!</h1>
	<?php unset($_SESSION["carrito"]); ?>
	<a href="productos.php" class="btn btn-success ml-3">Volver a productos</a>
</div>