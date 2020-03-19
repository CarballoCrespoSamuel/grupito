<?php session_start(); ?>

<?php
if(isset($_SESSION["admin"])){
?>			
	<?php require_once ("inc/encabezado.php"); ?>
	<?php require_once ("inc/funciones.php"); 
	header('Location:productos.php');
}else{?>
	<h1>INICIA SESIÓN COMO ADMIN</h1>
	<a href="login.php">Iniciar sesión</a>
<?php
}
?>

<?php require_once ("inc/pie.php"); ?>