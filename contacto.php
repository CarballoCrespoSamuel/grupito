<?php session_start(); ?>

<?php require_once("inc/bbdd.php");?>
<?php 
$pagina="contacto";
$titulo="Contacto";?>
<?php require_once("inc/encabezado.php");?>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Contacto</h1>
      <h2>Formulario de contacto.</h2>
	    <ul class="list-group">
		  <li class="list-group-item"><strong>Nombre:</strong>  Samuel Crespo Carballo</li>
		  <li class="list-group-item"><strong>Correo:</strong> samuel@correo.com</li>
		  <li class="list-group-item"><strong>Dirección:</strong> C/Lorem Ipsum nº23</li>
		  <li class="list-group-item"><strong>Teléfono:</strong>+34 123456789</li>
		</ul>
    </div>
		
  </div>

  <div class="container">
	<a href="productos.php" class="btn btn-success ml-3">Volver a productos</a>
    <hr>
  </div> <!-- /container -->
</main>

<?php require_once("inc/pie.php");?>