<?php session_start();
require_once ("inc/bbdd.php"); ?>
<?php require_once ("inc/encabezado.php"); ?>
<?php require_once ("inc/funciones.php");

if(isset($_SESSION["admin"])){ ?>
<main>
	<div class="container">
	<?php 
		$idProducto=$_REQUEST["idProducto"];
		eliminarProducto($idProducto);
		header("Location:productos.php");
	?>
	</div>
</main>
<?php 
}else{?>
	<h1>
		Inicia sesión ADMINISTRADOR para continuar. <a href="login.php">Iniciar sesión</a>
	</h1>	
<?php 
}
?>
<?php require_once ("inc/pie.php"); ?>