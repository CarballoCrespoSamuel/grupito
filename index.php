<?php require_once("inc/encabezado.php");?>
<?php require_once("inc/bbdd.php");?>
<?php require_once("inc/configuracion.php");?>

<?php $productos = seleccionarOfertasPortada(NUMOFERTAS);?>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Bienvenido a Mi Grupito!</h1>
      <p >La tienda con las mejores ofertas de internet que podrás compartir con tu amigos.</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Nuestras ofertas »</a></p>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
<div class="row row-cols-1 row-cols-md-3">
<?php foreach($productos as $producto){ ?>
  <div class="col mb-4">
    <div class="card">
      <img src="imagenes/spa.jpg" class="card-img-top" alt="Invernalia">
      <div class="card-body">
        <h5 class="card-title"><?php echo $producto["nombre"]; ?></h5>
        <p class="card-text"><?php echo $producto["introDescripcion"] ?></p>
		<a href="#" class="btn btn-success">Ahora <?php echo $producto["precioOferta"]; ?></a>
		<span class="card-text text-danger float-right"><del>Antes <?php echo $producto["precio"]; ?><del></span>
      </div>
    </div>
  </div> 
<?php } ?>
</div> <!-- col rows -->

    <hr>

  </div> <!-- /container -->

</main>

<?php require_once("inc/pie.php");?>