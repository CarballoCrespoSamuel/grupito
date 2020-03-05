



<?php session_start(); ?>

<?php require_once("inc/bbdd.php");?>
<?php 
$pagina="contacto";
$titulo="Contacto";?>
<?php require_once("inc/encabezado.php");?>
<?php require_once("inc/funciones.php");?>
<?php require_once("../enviarMail/index.php");


	$usuario=$_SESSION["email"];
	$asunto=recoge("asunto");
	$cuerpo=recoge("cuerpo");
	
	
	echo "$usuario - $asunto - $cuerpo";
	//enviarMail($usuario, $asunto, $cuerpo);
	

