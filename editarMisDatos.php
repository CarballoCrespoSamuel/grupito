<?php session_start(); ?>

<?php require_once("inc/bbdd.php");
$pagina="editarMisDatos";
$titulo="Editar Mis Datos";
require_once("inc/encabezado.php");
require_once("inc/configuracion.php");
require_once("inc/funciones.php");?>

<?php function imprimirFormulario($idUsuario,$email,$nombre,$apellidos,$direccion,$telefono){ ?>
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

if(empty($_REQUEST)){
	
	$usuario=seleccionarEmail($email);
	
	$idUsuario=$usuario["idUsuario"];
	$nombre=$usuario["nombre"];
	$apellidos=$usuario["apellidos"];
	$direccion=$usuario["direccion"];
	$telefono=$usuario["telefono"];
	
	imprimirFormulario($idUsuario,$email,$nombre,$apellidos,$direccion,$telefono);
	
	}else{
		$idUsuario=recoge("idUsuario");
		$nombre=recoge("nombre");
		$apellidos=recoge("apellidos");
		$direccion=recoge("direccion");
		$telefono=recoge("telefono");
		$email=recoge("email");
		
		editarUsuarioGrupito($idUsuario,$email,$nombre,$apellidos,$direccion,$telefono);
	}
	
	
	//NO FUNCIONA
require_once("inc/pie.php");?>















