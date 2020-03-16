<?php session_start(); ?>
<?php require_once ("inc/bbdd.php");
$pagina="crearUsuario";
$titulo="Registro";
require_once ("inc/encabezado.php");
require_once ("inc/funciones.php");



	function formularioCrearUsuario($email, $password, $repePassword, $nombre, $apellidos, $direccion, $telefono){ ?>
		<form action="" method="post">
			<div class="form-group">
				<label for="email">Email*</label><br/>
				<input type="email" class="form-control" name="email" id="email" maxlength="24" value="<?php echo "$email"; ?>" autofocus >
			</div>
			<div class="form-group">
				<label for="password">Contraseña*</label><br/>
				<input type="password" class="form-control" name="password" id="password" value="<?php echo "$password"; ?>">
			</div>
			<div class="form-group">
				<label for="repePassword">Repetir Contraseña*</label><br/>
				<input type="password" class="form-control" name="repePassword" id="repePassword" value="<?php echo "$repePassword"; ?>">
			</div>
			
			<div class="form-group">
				<label for="nombre">Nombre</label><br/>
				<input type="nombre" class="form-control" name="nombre" id="nombre" maxlength="24" value="<?php echo "$nombre"; ?>">
			</div>
			<div class="form-group">
				<label for="apellidos">Apellidos</label><br/>
				<input type="apellidos" class="form-control" name="apellidos" id="apellidos" maxlength="24" value="<?php echo "$apellidos"; ?>">
			</div>
			<div class="form-group">
				<label for="direccion">Dirección</label><br/>
				<input type="direccion" class="form-control" name="direccion" id="direccion" maxlength="24" value="<?php echo "$direccion"; ?>">
			</div>
			<div class="form-group">
				<label for="telefono">Telefono</label><br/>
				<input type="telefono" class="form-control" name="telefono" id="telefono" maxlength="24" value="<?php echo "$telefono"; ?>">
			</div>
						
			<button type="submit" class="btn btn-primary">Enviar</button></br>
			<a href="login.php"> Iniciar Sesión </a>		
		</form>
<?php } ?>
<main role="main" class="container">
<?php 
$idUsuario="";
$email="";
$password="";
$repePassword="";
$apellidos="";
$nombre="";
$direccion="";
$telefono="";

$errores="";

if(empty($_REQUEST)){
	echo "<h1>¡REGÍSTRATE!</h1>";
	formularioCrearUsuario($email, $password, $repePassword, $nombre, $apellidos, $direccion, $telefono);
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
 
	if($recaptcha-> score < 0.7){
 
		$errores = $errores."<li>DETECTADO ROBOT.</li>";
 
	}
	
	echo "<h1>CREAR USUARIO</h1>";
	if(empty ($password) or empty($email) or empty($repePassword)){
		$errores = $errores."<li>ERROR. Debe introducir todos los datos.</li>";
	}else{
		if($password==$repePassword){
			$comprobacion=comprobarUsuarioGrupito($email);
			if($comprobacion==""){
				$passwordEncriptada=password_hash($password, PASSWORD_DEFAULT);
				insertarUsuarioGrupito($email,$passwordEncriptada,$nombre,$apellidos,$direccion,$telefono);
				echo "<strong>USUARIO CREADO CON EXITO!</strong>";
				header("Location:login.php");
			}else{
				$errores = $errores."<li>ERROR. El correo introducido ya está registrado.</li>";
			}
		}else{
			$errores = $errores."<li>ERROR. Las contraseñas no coinciden.</li>";
		}
	}
	echo "<ul>$errores</ul>";	
	formularioCrearUsuario($email, $password, $repePassword, $nombre, $apellidos, $direccion, $telefono);
}?>
</main>

<?php require_once ("inc/pie.php"); ?>
