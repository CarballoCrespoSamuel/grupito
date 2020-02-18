<?php session_start(); ?>

<?php require_once("inc/bbdd.php");
$pagina="confirmarPedido";
$titulo="Confirmar Pedido";
require_once("inc/encabezado.php");
require_once("inc/configuracion.php");
require_once("inc/funciones.php");

$total=0;
?>
<main role="main">
<div align="center">
<ul class="list-group list-group-flush">
<?php
foreach($_SESSION['carrito'] as $id => $cantidad){
		$producto=seleccionarProducto($id);
		
		$nombre=$producto["nombre"];
		$precioOferta=$producto["precioOferta"];
		$subtotal=$precioOferta*$cantidad;

		$total=$total+$subtotal;
		?>
		<li class="list-group-item"><?php echo "<strong>$nombre</strong> "."($cantidad unidades)" ; ?></li>		
		
	<?php 

	}?>
	</ul>
	
		<p>
			<?php echo "<h1>Va a realizar el pedido de:  $total €</h1>";?>
			<a href="pedidoConfirmado.php" class="btn btn-success ml-3">Confirmar Pedido</a>
		</p>
	</div>
</main>
	