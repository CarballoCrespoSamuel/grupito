<?php session_start(); ?>

<?php require_once("inc/bbdd.php");
$pagina="misPedidos";
$titulo="Mis Pedidos";
require_once("inc/encabezado.php");
require_once("inc/configuracion.php");
require_once("inc/funciones.php");?>


  	<?php
	
	$usuario=seleccionarEmail($_SESSION["email"]);
	$idUsuario=$usuario["idUsuario"];
	$pedidos=seleccionarPedidos($idUsuario);
	?>
	
	<div class="jumbotron">
		<div class="container">
			<h1>Mis Pedidos</h1>
			<hr />
		<?php
		foreach($pedidos as $pedido){ 
			$idPedido=$pedido['idPedido'];
			$fecha=$pedido['fecha'];
			$total=$pedido['total'];?>
		<p>
			<ul class="list-group list-group-flush">
				<li class="list-group-item"><strong>ID: </strong> <?php echo $idPedido ; ?></li>
				<li class="list-group-item"><strong>Fecha: </strong><?php echo $fecha;?></li>
				<li class="list-group-item"><strong>Precio: </strong> <?php echo $total;?> €</li>
				<a href="eliminarPedido.php" class="btn">Eliminar Pedido</a>
			</ul>
			
		</p>
		<?php 
		} ?>
		</div>
		<div>
			<a href="editarMisDatos.php" class="btn btn-primary ml-3">Editar</a>
			<a href="productos.php" class="btn btn-success ml-3">Volver a productos</a>
		</div>
	</div>


<?php require_once("inc/pie.php");?>