<?php session_start(); ?>

<h1>INDEX</h1>
<?php
if(isset($_SESSION["admin"])){
?>			
	<?php require_once ("inc/encabezado.php"); ?>
	<?php require_once ("inc/funciones.php"); 
	header('Location:productos.php');
}else{?>
	<a href="login.php">Iniciar sesión</a>
<?php
}
?>

<?php require_once ("inc/pie.php"); ?>