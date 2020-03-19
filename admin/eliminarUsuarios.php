<?php session_start();
require_once ("inc/bbdd.php"); ?>
<?php require_once ("inc/encabezado.php"); ?>
<?php require_once ("inc/funciones.php");

if(isset($_SESSION["admin"])){
	$idUsuario=$_REQUEST["idUsuario"];
	echo "Borrar el usuario $idUsuario";
	eliminarUsuario($idUsuario);
	header("Location:todosUsuarios.php");
	
}else{?>
	<p>
		Inicia sesión ADMINISTRADOR para continuar. <a href="login.php">Iniciar sesión</a>
	</p>		
<?php
}

require_once ("inc/pie.php"); ?>