<?php session_start();
require_once ("inc/bbdd.php");
$pagina="productos";
$titulo="productos";
require_once ("inc/encabezado.php"); 
require_once ("inc/funciones.php");
?>



<?php 
if(isset($_SESSION["admin"])){ 
	
	$productos=seleccionarTodosProductos();
	$numProductos=count($productos);
	$productosPagina=3;
	$paginas=ceil($numProductos/$productosPagina); //Función CEIL para redondear a la alza
	$pagina=recoge("pagina");
	
	
	if($pagina==false or $pagina<=1 or $pagina>$paginas){ //Si no existe la variable $pagina, si el número 
		$pagina=1;										//de página es negativo o estamos en una página mayor de las que hay
	}else{
			
	}

	$inicio=($pagina-1)*$productosPagina;
	$productos=seleccionarProductosPaginar($inicio, $productosPagina);

?>
<main role="main" class="container">

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">MiniDescripción</th>
      <th scope="col">Descripción</th>
	  <th></th>
	  <th></th>
	  <th></th>
	  <th></th>
	  <th scope="col">Imágen</th>
	  <th scope="col">Precio</th>
	  <th scope="col">Oferta</th>
	  <th scope="col">Online</th>
    </tr>
  </thead>
  <tbody>
	<?php
	foreach($productos as $producto){
		$idProducto=$producto['idProducto'];
		$nombre=$producto['nombre'];
		$introDescripcion=$producto['introDescripcion'];
		$descripcion=$producto['descripcion'];
		$imagen=$producto['imagen'];
		$precio=$producto['precio'];
		$precioOferta=$producto['precioOferta'];
		$online=$producto['online'];
	?>
	
		<tr>
			<td><strong><?php echo "$nombre";?></strong></td>
			<td><?php echo "$introDescripcion";?></td>
			<td colspan="5"><?php echo "$descripcion";?></td>
			<td><img src='imagenes\<?php echo "$imagen";?>' width='300' height='150'></td>
			<td><strike><?php echo "$precio";?>€</strike></td>
			<td><?php echo "$precioOferta";?>€</td>
			<td><?php echo "$online";?></td>
			<td><a href="<?php echo "actualizar.php?idProducto="."$idProducto"?>" class='btn btn-primary' role='alert'>Editar</a></td>
			<td><a href="borrar.php?idProducto=<?php echo $idProducto;?>" onClick="return confirmarBorrar('¿Realmente quieres borrar el producto?');" class='btn btn-danger' role='alert'>Borrar</a></td>
		</tr>
	<?php 
	}
	?>
  </tbody>
 </table>
 
 
<p>
<nav aria-label="nav">
  <ul class="pagination"> 
    <li class="page-item<?php if(1==$pagina){echo " disabled";}?>"><a class="page-link" href="productos.php?pagina=<?php echo $pagina-1; ?>">Anterior</a></li>
	<?php 
	for($i=1;$i<=$paginas;$i++){?>
		<li class="page-item <?php if($i==$pagina){echo " active";}?>"><a class="page-link" href="productos.php?pagina=<?php echo "$i"; ?>" >  <?php echo "$i"; ?></a></li>
	<?php
	}
	?>
    <li class="page-item<?php if($pagina==$paginas){echo " disabled";}?>"><a class="page-link" href="productos.php?pagina=<?php echo $pagina+1; ?>">Siguiente</a></li>
  </ul>
</nav>
</p>
</main>
<?php 
}else{ 
?>
	<p>
		Inicia sesión ADMINISTRADOR para continuar. <a href="login.php">Iniciar sesión</a>
	</p>		
<?php 			
}
require_once ("inc/pie.php"); ?>
	
	