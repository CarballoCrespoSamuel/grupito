<?php require_once ("inc/bbdd.php"); ?>
<?php require_once ("inc/encabezado.php"); ?>
<?php require_once ("inc/funciones.php"); 

$idProducto=
$producto=seleccionarProducto($idProducto);

function imprimirFormulario(){ ?>
<form method="post">
	<div class="form-group">
		<label for="idTarea">ID Producto</label>
		<input type="text" class="form-control" id="idTarea" name="idProducto" value="<?php echo  $producto["$idProducto"]; ?>" readonly="readonly"/>
	</div>
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo  $producto["$nombre"]; ?>" />
	</div>
	<div class="form-group">
		<label for="descripcion">IntroDescripción</label>
		<input type="text" class="form-control" id="introDescripcion" name="introDescripcion" value="<?php echo $producto["introDescripcion"]; ?>"/>
	</div>
	<div class="form-group">
		<label for="descripcion">Descripción</label>
		<input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo "$descripcion"; ?>"/>
	</div>
  
	<button type="submit" class="btn btn-primary" name="guardar" value="guardar">Guardar</button>
</form> 
<?php } ?>

<main role="main" class="container">
	<h1 class="mt-5">Actualizar Producto</h1>
	<?php imprimirFormulario(); ?>

</main>

<?php require_once ("inc/pie.php"); ?>