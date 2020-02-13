<?php session_start(); ?>

<?php 
require_once("inc/bbdd.php");
require_once("inc/funciones.php");?>

<?php 

$idProducto=recoge("id");
$op=recoge("op");//Para saber la operación que queremos hacer

if($idProducto=="" OR $op==""){
	header("Location:index.php");
}

$producto=seleccionarProducto($idProducto);

if(empty($producto)){
	header("Location:index.php");
}

switch($op){
	case "add":
		if(isset($_SESSION['carrito'][$idProducto])){
			$_SESSION['carrito'][$idProducto]++;
		}else{
			$_SESSION['carrito'][$idProducto]=1;
		}
	break;
	
	case "remove":
		if(isset($_SESSION['carrito'][$idProducto])){
			$_SESSION['carrito'][$idProducto]--;
			if($_SESSION['carrito'][$idProducto]<=0){
				unset($_SESSION['carrito'][$idProducto]);
			}
		}
	break;
	
	case "empty":
		unset($_SESSION['carrito'][$idProducto]);
	break;
	
	default:
		header("Location: index.php");
	
	
//FIN del Switch
}

header("Location: carrito.php");
?>