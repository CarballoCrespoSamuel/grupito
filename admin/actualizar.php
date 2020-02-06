<?php require_once ("inc/bbdd.php"); ?>
<?php require_once ("inc/encabezado.php"); ?>
<?php require_once ("inc/funciones.php"); 

$idProducto=recoge("idProducto");
$producto=seleccionarProducto($idProducto);

print_r($producto);

$idProducto=$producto["idProducto"];
$nombre=$producto["nombre"];
$introDescripcion=$producto["introDescripcion"];
$descripcion=$producto["descripcion"];
$precio=$producto["precio"];
$precioOferta=$producto["precioOferta"];
$imagen=$producto["imagen"];
$online=$producto["online"];


function imprimirFormulario($idProducto,$nombre,$introDescripcion, $descripcion, $precio, $precioOferta,$imagen ,$online){ ?>
<form method="post">
	<div class="form-group">
		<label for="idproducto">ID Producto</label>
		<input type="text" class="form-control" id="idproducto" name="idProducto" value="<?php echo  $idProducto; ?>" readonly="readonly"/>
	</div>
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo  $nombre; ?>" />
	</div>
	<div class="form-group">
		<label for="descripcion">IntroDescripción</label>
		<input type="text" class="form-control" id="introDescripcion" name="introDescripcion" value="<?php echo $introDescripcion; ?>"/>
	</div>
	<div class="form-group">
		<label for="descripcion">Descripción</label>
		<input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo "$descripcion"; ?>"/>
	</div>
	<div class="form-group">
		<label for="imagen">imagen</label>
		<input type="text" class="form-control" id="imagen" name="imagen" value="<?php echo "$imagen"; ?>"/>
	</div>
	<div class="form-group">
		<label for="precio">precio</label>
		<input type="text" class="form-control" id="precio" name="precio" value="<?php echo "$precio"; ?>"/>
	</div>
	<div class="form-group">
		<label for="precioOferta">precioOferta</label>
		<input type="text" class="form-control" id="precioOferta" name="precioOferta" value="<?php echo "$precioOferta"; ?>"/>
	</div>
	<div class="form-group">
		<label for="online">online</label>
		<input type="text" class="form-control" id="online" name="online" value="<?php echo "$online"; ?>"/>
	</div>
  
	<button type="submit" class="btn btn-primary" name="guardar" value="guardar">Guardar</button>
	<button type="submit" class="btn" name="productos" value="productos"><a href="../productos.php">Ver Productos</a></button>

</form> 
<?php } ?>

<main role="main" class="container">
	<h1 class="mt-5">Actualizar Producto</h1>
	<?php
		
	
	if(!isset($_REQUEST['guardar'])){

		$idProducto=recoge("idProducto");
		$producto=seleccionarProducto($idProducto);
		if($idProducto==""){
			header("Location: index.php");
			exit();
		}			
		if(empty($producto)){ //Utilizo EMPTY para saber si el ARRAY viene vacío
			header("Location: productos.php");
			exit();
		}
		
		imprimirFormulario($idProducto,$nombre,$introDescripcion, $descripcion, $precio, $precioOferta,$imagen ,$online);
	
	}else{
		$nombre=recoge("nombre");
		$introDescripcion=recoge("introDescripcion");
		$descripcion=recoge("descripcion");
		$precio=recoge("precio");
		$precioOferta=recoge("precioOferta");
		$imagen=recoge("imagen");
		$online=recoge("online");
		
		$producto=seleccionarProducto($idProducto);
		actualizarProducto($idProducto, $nombre, $introDescripcion, $descripcion,$imagen,$precio,$precioOferta,$online);
		imprimirFormulario($idProducto,$nombre,$introDescripcion, $descripcion, $precio, $precioOferta,$imagen ,$online);
	}
	
	?>
</main>

<?php require_once ("inc/pie.php"); ?>