<?php session_start(); ?>
<?php require_once ("inc/encabezado.php"); ?>
<?php 
	function crearUsuario($usuario){ ?>
		<form action="" method="post">
			<div class="form-group">
				<label for="usuario">Usuario</label><br/>
				<input type="usuario" class="form-control" name="usuario" id="usuario" maxlength="24" value="<?php echo $usuario; ?>" autofocus>
			</div>
			<div class="form-group">
				<label for="password">Contraseña</label><br/>
				<input type="password" class="form-control" name="password" id="password">
			</div>
			<div class="form-group">
				<label for="repePassword">Repetir Contraseña</label><br/>
				<input type="password" class="form-control" name="repePassword" id="repePassword">
			</div>
			<button type="submit" class="btn btn-primary">Enviar</button></br>
			<a href="login.php"> Iniciar Sesión </a>		
		</form>
<?php } ?> 
<main role="main" class="container">
<?php
if(empty($_REQUEST)){
	echo "<h1>DARSE DE ALTA</h1>";
	$usuario="";
	crearUsuario($usuario);
}
else{
	$usuario=recoge("usuario");
	$password=recoge("password");
	$repePassword=recoge("repePassword");
	if(empty($usuario) or empty($password)){
		echo "Debe rellenar todos los campos.";
		crearUsuario($usuario);
	}else{
		if($password==$repePassword){
			
		}
	}
}
?>
</main>