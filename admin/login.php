<?php session_start(); ?>
<?php require_once ("inc/encabezado.php"); 
require_once ("inc/funciones.php"); 
require_once ("inc/bbdd.php");?>

<?php 
	function mostrarLogin($usuario){ ?>
	<div class="container">
		<form action="" method="get">
			<h1 class='mt-5'>INICIA SESIÓN</h1>
			<h3>ADMINISTRADOR</h3>
			<div class="form-group">
				<label for="usuario">Usuario</label><br/>
				<input type="usuario" class="form-control" name="usuario" id="usuario" maxlength="24" autofocus value="<?php echo $usuario;  ?>">
			</div>
			 
			<div class="form-group">
				<label for="password">Password</label><br/>
				<input type="password" class="form-control" name="password" id="password">
			</div>
			<button type="submit" class="btn btn-primary">Enviar</button></br>
			<a href='crearUsuario.php'>Crear un usuario.</a>
		</form>
	</div>
<?php } ?>
	<main role="main" class="container">
	
<?php
	if(empty($_REQUEST)){
		$usuario="";
		mostrarLogin($usuario);
	}
	else{
		$usuario=$_REQUEST["usuario"];
		$contrasena=$_REQUEST["password"];
		if($usuario=="admin" and $contrasena=="abc123."){
			$_SESSION["admin"]=$usuario;
			header('Location:productos.php');
		}else{
			mostrarLogin($usuario);
		}
	}	
?>
	</main>

<?php require_once ("inc/pie.php"); ?>
