<?php session_start(); ?>

<?php require_once("inc/bbdd.php");
$pagina="misDatos";
$titulo="Mis Datos";
require_once("inc/encabezado.php");
require_once("inc/configuracion.php");
require_once("inc/funciones.php");?>


  	<?php
	$email=$_SESSION["email"];
	$datos=seleccionarEmail($email);
	
	$email=$datos["email"];
	$nombre=$datos["nombre"];
	$apellidos=$datos["apellidos"];
	$direccion=$datos["direccion"];
	$telefono=$datos["telefono"];	
	
	?>
	<div class="jumbotron">
	
		<div class="container">
			<h1>Mis Datos</h1>
			
			
			<hr/>
			<ul class="list-group list-group-flush">
			
			<hr/>
				<li class="list-group-item"><strong>Email: </strong> <?php echo $email; ?></li>
				<li class="list-group-item"><strong>Nombre: </strong><?php echo $nombre ;?></li>
				<li class="list-group-item"><strong>Apellidos: </strong> <?php echo $apellidos ;?></li>
				<li class="list-group-item"><strong>Dirección: </strong> <?php echo $direccion ;?></li>
				<li class="list-group-item"><strong>Teléfono: </strong> <?php echo $telefono; ?></li>
			</ul>
			
		</div>
		<br/>
		<div class="container">
			<a href="editarMisDatos.php" class="btn btn-primary ml-3">Editar</a>
			<a href="productos.php" class="btn btn-success ml-3">Volver a productos</a>
		</div>

		
	</div>
	
	

<?php require_once("inc/pie.php");?>