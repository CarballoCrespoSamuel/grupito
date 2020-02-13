<?php session_start(); ?>

<?php 
$pagina="Carrito";
$titulo="Carrito";
require_once("inc/funciones.php");
require_once("inc/bbdd.php");
require_once("inc/encabezado.php");
require_once("inc/funciones.php");
?>



<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Tu Carrito!</h1>
      <p >Tus artículos están listos!</p>
      <p><a class="btn btn-primary btn-lg" href="productos.php" role="button">Seguir Comprando »</a></p>
    </div>
  </div>

<?php 
	if(empty($_SESSION['carrito'])){
		$mensaje="Carrito vacío";
		mostrarMensaje($mensaje);
	}else{
		
?>

  <div class="container">

<table class="table table-hover table-dark">
  <thead>
    <tr>
	  <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">Subtotal</th>
    </tr>
  </thead>
  <tbody>
  
    <?php 
	$productos=seleccionarTodosProductos();
	$total=0;
	foreach($_SESSION['carrito'] as $id => $cantidad){
		$producto=seleccionarProducto($id);
		
		$nombre=$producto["nombre"];
		$precioOferta=$producto["precioOferta"];
		$subtotal=$precioOferta*$cantidad;

		?>
		<tr>
			<td scope="col"><a href="producto.php?idProducto=<?php echo $id; ?>" style="color:white"><?php echo $nombre;?></a></td>
			<td scope="col"><a href="procesarCarrito.php?id=<?php echo $id; ?>&op=remove" style="color:red"><i class="fas fa-minus-circle"></i></a><?php echo " $cantidad ";?><a href="procesarCarrito.php?id=<?php echo $id; ?>&op=add" style="color:green"><i class="fas fa-plus-circle"></i></a></td>
			<td scope="col"><?php echo $precioOferta;?>€</td>
			<td scope="col"><?php echo $subtotal;?>€</td>
		</tr>
	<?php 
	$total=$total+$subtotal;
	}?>
  </tbody>
  <tfoot>
	<tr>
		<th scope="row" colspan="3" class="text-right">TOTAL: </th>
		<td><?php echo $total;?>€</td>
	</tr>
  </tfoot>
</table>

		<a href="procesarCarrito.php?id=<?php echo "$id"; ?>&op=empty" class="btn btn-danger">Vaciar Carrito</a>
		<a href="confirmarPedido.php" class="btn btn-success ml-3">Confirmar Pedido</a>
  

   <hr>
  </div> <!-- /container -->
	<?php } ?>
</main>


<?php require_once("inc/pie.php");?>