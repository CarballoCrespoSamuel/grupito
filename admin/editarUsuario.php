<?php session_start();
require_once ("inc/bbdd.php"); ?>
<?php require_once ("inc/encabezado.php"); ?>
<?php require_once ("inc/funciones.php");

if(isset($_SESSION["admin"])){
function imprimirFormulario($idUsuario,$email,$nombre,$password,$apellidos,$direccion,$telefono){ ?>

	<div class="container"> 
		<form method="post">
			<label for="idUsuario">ID Usuario</label>
		
			<input type="text" class="form-control" id="idUsuario" name="idUsuario" value="<?php echo "$idUsuario"; ?>" readonly="readonly"/>
			
			<label for="idTarea">Email</label>
			<input type="text" class="form-control" id="email" name="email" value="<?php echo "$email"; ?>"/>
			
			<label for="nombre">Nombre</label>
			<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo "$nombre"; ?>"/>
			
			<label for="apellidos">Apellidos</label>
			<input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo "$apellidos"; ?>"/>
			
			<label for="direccion">Dirección</label>
			<input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo "$direccion"; ?>"/>
			
			<label for="telefono">Teléfono</label>
			<input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo "$telefono"; ?>"/>
			<br/>
			<button type="submit" class="btn btn-primary" name="guardar" value="guardar">Guardar</button>
	
		</form> 
	</div>
		
<?php } 

	$idUsuario=$_REQUEST["idUsuario"];
	$usuario=seleccionarUsuarioGrupito($idUsuario);
	print_r($usuario);
		$password=$usuario["password"];
		$idUsuario=$usuario["idUsuario"];
		$email=$usuario["email"];
		$nombre=$usuario["nombre"];
		$apellidos=$usuario["apellidos"];
		$direccion=$usuario["direccion"];
		$telefono=$usuario["telefono"];
		
	if(empty($_REQUEST)){

	}else{
		$password=$usuario["password"];
		$idUsuario=$_REQUEST["idUsuario"];
				
		if(isset($_REQUEST["email"])){
			$email=$_REQUEST["email"];
		}else{
			$email=$usuario["email"];
		}
		
		if(isset($_REQUEST["nombre"])){
			$nombre=$_REQUEST["nombre"];
		}else{
			$nombre=$usuario["nombre"];
		}
		
		if(isset($_REQUEST["apellidos"])){
			$apellidos=$_REQUEST["apellidos"];
		}else{
			$apellidos=$usuario["apellidos"];
		}
		
		if(isset($_REQUEST["direccion"])){
			$direccion=$_REQUEST["direccion"];
		}else{
			$direccion=$usuario["direccion"];
		}
		
		if(isset($_REQUEST["telefono"])){
			$telefono=$_REQUEST["telefono"];
		}else{
			$telefono=$usuario["telefono"];
		}
		
		
		editarUsuarioGrupito($idUsuario,$email,$password,$nombre,$apellidos,$direccion,$telefono);
	}
	
	imprimirFormulario($idUsuario,$email,$nombre,$password,$apellidos,$direccion,$telefono);
	
	
	
}else{?>
	<p>
		Inicia sesión ADMINISTRADOR para continuar. <a href="login.php">Iniciar sesión</a>
	</p>		
<?php
}
require_once ("inc/pie.php"); ?>