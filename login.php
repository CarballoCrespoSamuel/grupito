<?php session_start(); ?>


<?php require_once("inc/bbdd.php");
$pagina="login";
$titulo="Iniciar Sesión";
require_once("inc/encabezado.php");
require_once("inc/configuracion.php");
require_once("inc/funciones.php");?>

<?php 
function mostrarLogin($email){
?>
<main role="main" class="container">
	<form>
	<br/>
	<p>
		<i class="fab fa-google fa-7x">rupito</i>
	</p>
	<br/>

	  <div class="form-group">
		<label for="exampleInputEmail1">Correo</label>
		<input class="form-control" name="email" id="email" aria-describedby="emailHelp" value="<?php echo "$email";?>">
	  </div>
	  <div class="form-group">
		<label for="exampleInputPassword1">Contraseña</label>
		<input type="password" class="form-control" name="pass" id="pass">
	  </div>
	  <button type="submit" class="btn btn-primary">Enviar</button>
	  <p>¿No tienes cuenta todavía?<a href="crearUsuario.php"> Regístrate</a></p>
</form>
</main>
<?php }

if(empty($_REQUEST)){
		if(isset($_SESSION["email"])){
			header('Location: index.php');
		}else{
			$email="";
			mostrarLogin($email);
		}
	}
	else{
		$email=$_REQUEST["email"];
		$pass=$_REQUEST["pass"];
		
		//SELECCIONAR LA LINEA DONDE SE ENCUENTRA EL USUARIO Y VERIFICAR QUE LAS CREDENCIALES SON CORRECTAS
		$resultado=seleccionarEmail($email);
		
		$userOK=password_verify("abc123.",$resultado['password']);
		
		if($userOK){
			//Las credenciales son correctas 
			$_SESSION["email"]=$resultado["email"];
			header('Location: index.php');?>
		<?php
		}else{
			echo "<p>INCORRECTO. PRUEBE OTRA VEZ.</p>";
			mostrarLogin($email);
		}
	}	
?>

<?php require_once("inc/pie.php");?>