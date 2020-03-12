<?php session_start(); ?>
<?php require_once ("inc/encabezado.php"); ?>

<?php 
	function mostrarLogin(){ ?>
		<form action="" method="post">
			<h3>ADMINISTRADOR</h3>
			<div class="form-group">
				<label for="usuario">Usuario</label><br/>
				<input type="usuario" class="form-control" name="usuario" id="usuario" maxlength="24" autofocus>
				<input type="hidden" name="user" value="<?php echo $usuario; ?>" id="user" /> 
			</div>
			 
			<div class="form-group">
				<label for="password">Password</label><br/>
				<input type="password" class="form-control" name="password" id="password">
			</div>
			<button type="submit" class="btn btn-primary">Enviar</button></br>
			<a href="crearUsuario.php"> Crear usuario</a>
		</form>
<?php } ?>
	<main role="main" class="container">
<?php
	if(empty($_REQUEST)){
		echo "<h1 class='mt-5'>INICIAR SESIÓN</h1>";
		mostrarLogin();
	}
	else{
		$usuario=$_REQUEST["usuario"];
		$contrasena=$_REQUEST["password"];
		if($usuario=="admin" and $contrasena=="abc123."){
			$_SESSION["admin"]=$usuario;
		header('Location:productos.php');
		}else{
			header('Location:..\login.php');
		}
	}	
?>
	</main>

<?php require_once ("inc/pie.php"); ?>
