<?php require_once("inc/bbdd.php");
$pagina="login";
$titulo="Iniciar Sesión";
require_once("inc/encabezado.php");
require_once("inc/configuracion.php");
require_once("inc/funciones.php");?>

<?php 
function mostrarLogin($usuario){
?>
<main role="main" class="container">
	<form>
	<br/>
	<p>
		<i class="fab fa-google fa-7x">rupito</i>
	</p>
	<br/>

	  <div class="form-group">
		<label for="exampleInputEmail1">Usuario o Correo</label>
		<input class="form-control" name="usuario" id="usuario" aria-describedby="emailHelp" value="<?php echo "$usuario";?>">
	  </div>
	  <div class="form-group">
		<label for="exampleInputPassword1">Contraseña</label>
		<input type="password" class="form-control" id="exampleInputPassword1">
	  </div>
	  <button type="submit" class="btn btn-primary">Enviar</button>
	  <p>¿No tienes cuenta todavía?<a href="registro.php"> Regístrate</a></p>
</form>
</main>
<?php }

if(empty($_REQUEST)){
		$usuario="";
		mostrarLogin($usuario);
	}
	else{
		$usuario=$_REQUEST["usuario"];
		$password=$_REQUEST["password"];
		
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
	}	
?>

<?php require_once("inc/pie.php");?>