<?php session_start(); ?>

<?php require_once("inc/bbdd.php");
$pagina="editarMisDatos";
$titulo="Editar Mis Datos";
require_once("inc/encabezado.php");
require_once("inc/configuracion.php");
require_once("inc/funciones.php");?>

<?php function imprimirFormulario($idUsuario,$email,$nombre,$password,$apellidos,$direccion,$telefono){ ?>
<form method="post">
	<div class="jumbotron">
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
	</div>
		
</form> 
<?php } 

$email=$_SESSION["email"];
$usuario=seleccionarEmail($email);
if(empty($_REQUEST)){
	$password=$usuario["password"];
	$idUsuario=$usuario["idUsuario"];
	$nombre=$usuario["nombre"];
	$apellidos=$usuario["apellidos"];
	$direccion=$usuario["direccion"];
	$telefono=$usuario["telefono"];
	
	imprimirFormulario($idUsuario,$email,$nombre,$password,$apellidos,$direccion,$telefono);
	
	}else{
		$idUsuario=$_REQUEST["idUsuario"];
		$nombre=$_REQUEST["nombre"];
		
		$password=$usuario["password"];
		$apellidos=$_REQUEST["apellidos"];
		$direccion=$_REQUEST["direccion"];
		$telefono=$_REQUEST["telefono"];
		$email=$_REQUEST["email"];
		
		editarUsuarioGrupito($idUsuario,$email,$password,$nombre,$apellidos,$direccion,$telefono);
		header("Location:misDatos.php");
	}
	
	
require_once("inc/pie.php");?>















