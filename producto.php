<?php session_start(); ?>

<?php require_once("inc/funciones.php");?>
<?php require_once("inc/bbdd.php");?>
<?php 
$pagina="productos";
$titulo="Producto";

$idProducto = recoge('idProducto');

$todoProductos=seleccionarTodosProductos();
$cantProds=count($todoProductos);

if($idProducto==0 or $idProducto>$cantProds){
	$idProducto=1;
}
$producto=seleccionarProducto($idProducto);


$nombre=$producto["nombre"];
$introDescripcion=$producto["introDescripcion"];
$descripcion=$producto["descripcion"];
$imagen=$producto["imagen"];
$precio=$producto["precio"];
$precioOferta=$producto["precioOferta"];
$online=$producto["online"];
?>
<?php require_once("inc/encabezado.php");?>
<?php require_once("inc/configuracion.php");?>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
	
      <h1 class="display-3"><?php echo $nombre; ?></h1>
    </div>
  </div>

  <div class="container">
  
	<div class="row col-10 mx-auto">
		<div class="col-6">
			<p><?php echo $descripcion; ?></p>
			<div class="col-12 mx-auto d-flex justify-content-center">
				<a href="procesarCarrito.php?id=<?php echo $idProducto;  ?>&op=add" class="btn btn-success text-justify">Añadir al carrito</a>
			</div><?php //Para que sepa que tiene que hacer la operación de añadir al carrito ?>
		</div>
		<div class="col-6">
			<img src="imagenes/<?php echo $imagen; ?>" alt="<?php echo $nombre?>" class="card-img-top rounded">
		</div>
		<div class="row mt-2 mx-auto">
			<span class="text-danger col-6 text-justify display-4">Antes <del><?php echo $precio; ?>€</del></span> 
		</div>
		<div class="row mt-2 mx-auto">
			<span class="text-success col-6 text-justify display-4">Ahora <?php echo $precioOferta; ?>€</span> 
		</div>
	</div>
	<hr>
  
  </div> <!-- /container -->
</main>
<?php require_once("inc/pie.php");?>