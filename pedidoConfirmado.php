<?php session_start(); ?>

<?php 
require_once("inc/bbdd.php");
$pagina="Confirmado";
$titulo="Confirmado";
require_once("inc/encabezado.php");
require_once("inc/configuracion.php");
require_once("inc/funciones.php");

if(isset($_SESSION["carrito"])){
	$total=0;
	foreach($_SESSION['carrito'] as $id => $cantidad){
			$producto=seleccionarProducto($id);
			$nombre=$producto["nombre"];
			$precioOferta=$producto["precioOferta"];
			$subtotal=$precioOferta*$cantidad;

			$total=$total+$subtotal;
			?>
			<!--<li class="list-group-item"><?php echo "<strong>$nombre</strong> "."($cantidad unidades)" ; ?></li>-->		
			
		<?php 

	}
	$email=$_SESSION["email"];
	$mail=seleccionarEmail($email);
	$idUsuario=$mail["idUsuario"];
	$precio=$subtotal;
	$detallePedido=$_SESSION["carrito"];

	$idPedido=insertarPedido($idUsuario, $detallePedido, $total);

	?>
	<div class="jumbotron">
	<div class="container">
		<h1>Enhorabuena! Ha hecho su pedido con éxito!</h1>
		<?php unset($_SESSION["carrito"]); ?>
		<a href="productos.php" class="btn btn-success">Volver a productos</a>
	</div>
	</div>

<?php }
	else{
		header("Location:productos.php");
	}
	
require_once("inc/pie.php");?>