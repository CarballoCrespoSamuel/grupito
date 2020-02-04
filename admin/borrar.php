<?php require_once ("inc/bbdd.php"); ?>
<?php require_once ("inc/encabezado.php"); ?>
<?php require_once ("inc/funciones.php"); ?>

<main>
	<h1 class="mt-5">Borrar Tarea</h1>
	<?php 
		$idTarea=recoge("idTarea");
		
		if($idTarea==""){
				header("Location: index.php");
				exit();
		}
		$ok=eliminarTarea($idTarea);
		
		if($ok){
			echo "
				<div class='alert alert-success' role='alert'>
					Tarea $idTarea BORRADA correctamente.
				</div>
				";
		}else{
			echo "
				<div class='alert alert-danger' role='alert'>
					ERROR: Tarea NO BORRADA.
				</div>	
				";
		}
		
		echo "<p><a href='index.php' class='btn btn-primary'>Volver al listado</a></p>"; 
	?>
</main>

<?php require_once ("inc/pie.php"); ?>