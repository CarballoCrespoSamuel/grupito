<?php require_once("inc/encabezado.php");?>
<?php require_once("inc/bbdd.php");?>
<?php require_once("inc/configuracion.php");?>
<?php require_once("inc/funciones.php");?>

<?php $productos = seleccionarTodasOfertas();?>
<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Todas nuestras ofertas!</h1>
    </div>
  </div>

  <div class="container">
   
	
	<?php mostrarProductos($productos); ?>
	
	
    <hr>
  </div> <!-- /container -->
</main>
<?php require_once("inc/pie.php");?>