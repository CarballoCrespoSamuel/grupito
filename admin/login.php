<?php session_start(); ?>
<?php require_once ("inc/encabezado.php"); ?>

<?php 
	function mostrarLogin(){ ?>
		<form action="" method="post">
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
		$_SESSION["usuario"]="$resultado[usuario]";
		header('Location:productos.php');
		
		/*
		//SELECCIONAR LA LINEA DONDE SE ENCUENTRA EL USUARIO Y VERIFICAR QUE LAS CREDENCIALES SON CORRECTAS
		$resultado=seleccionarUsuario($usuario);
		$userOK=password_verify($password, $resultado['Password']);
		if($userOK){
			//Las credenciales son correctas 
			$_SESSION["usuario"]="$resultado[usuario]";
			header('Location: menu.php');?>
		<?php
		}else{
			echo "<h1 class='mt-5'>INICIAR SESIÓN</h1>";
			echo "INCORRECTO. PRUEBE OTRA VEZ.";
			mostrarLogin();
		}
		*/	
	}	
?>
	</main>

<?php require_once ("inc/pie.php"); ?>
