<?php session_start(); ?>
<?php require_once ("inc/bbdd.php");
$pagina="crearUsuario";
$titulo="Registro";
require_once ("inc/encabezado.php");
require_once ("inc/funciones.php");



	function formularioCrearUsuario($email){ ?>
		<form action="" method="post">
			<div class="form-group">
				<label for="email">Email</label><br/>
				<input type="email" class="form-control" name="email" id="email" maxlength="24"  autofocus>
			</div>
			<div class="form-group">
				<label for="password">Contraseña</label><br/>
				<input type="password" class="form-control" name="password" id="password">
			</div>
			<div class="form-group">
				<label for="repePassword">Repetir Contraseña</label><br/>
				<input type="password" class="form-control" name="repePassword" id="repePassword">
			</div>
			
			<div class="form-group">
				<label for="nombre">Nombre</label><br/>
				<input type="nombre" class="form-control" name="nombre" id="nombre" maxlength="24" autofocus>
			</div>
			<div class="form-group">
				<label for="apellidos">Apellidos</label><br/>
				<input type="apellidos" class="form-control" name="apellidos" id="apellidos" maxlength="24" autofocus>
			</div>
			<div class="form-group">
				<label for="direccion">Dirección</label><br/>
				<input type="direccion" class="form-control" name="direccion" id="direccion" maxlength="24" autofocus>
			</div>
			<div class="form-group">
				<label for="telefono">Telefono</label><br/>
				<input type="telefono" class="form-control" name="telefono" id="telefono" maxlength="24" autofocus>
			</div>
			
			<input type="submit" name="recaptcha_response" id="recaptcha_response">
			
			<button type="submit" class="btn btn-primary">Enviar</button></br>
			<a href="login.php"> Iniciar Sesión </a>		
		</form>
<?php } ?>
<main role="main" class="container">
<?php 
$idUsuario="";
$email="";
$password="";
$apellidos="";
$nombre="";
$direccion="";
$telefono="";

$errores="";

if(empty($_REQUEST)){
	echo "<h1>¡REGÍSTRATE!</h1>";
	formularioCrearUsuario($email);
}
else{
	$email=$_REQUEST["email"];
	$password=$_REQUEST["password"];
	$repePassword=$_REQUEST["repePassword"];
	
	$nombre=$_REQUEST["nombre"];
	$direccion=$_REQUEST["direccion"];
	$apellidos=$_REQUEST["apellidos"];
	$telefono=$_REQUEST["telefono"];
	

	
 
		$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify'; 
		$recaptcha_secret = CLAVE_SECRETA; 
		$recaptcha_response = recoge('recaptcha_response'); 
		$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response); 
		$recaptcha = json_decode($recaptcha); 
 
	if($recaptcha->score < 0.7){
 
		$errores = $errores."<li>DETECTADO ROBOT.</li>";
 
		}
	
	echo "<h1>CREAR USUARIO</h1>";
	if(empty ($password) or empty($email) or empty($repePassword)){
		echo "ERROR. Debe introducir todos los datos.";
		formularioCrearUsuario($email);
	}else{
		if($password==$repePassword){
			$passwordEncriptada=password_hash($password, PASSWORD_DEFAULT);
			insertarUsuarioGrupito($email,$passwordEncriptada,$nombre,$apellidos,$direccion,$telefono);
			header("Location:login.php");
		}else{
			echo "ERROR. Las contraseñas no coinciden. ";
			formularioCrearUsuario($email);
		}
	}
	
	
	
	
	

}?>
</main>

<?php require_once ("inc/pie.php"); ?>
