<?php session_start(); ?>

<?php require_once("inc/bbdd.php");?>
<?php 
$pagina="contacto";
$titulo="Contacto";?>
<?php require_once("inc/encabezado.php");?>
<?php require_once("inc/funciones.php");?>
<?php require_once("enviarCorreo.php");?>

	<main role="main">	<?php 
	function mostrarFormulario($correo,$asunto,$cuerpo){?>
	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="jumbotron">	
		<div class="container">
			<h1>CONTACTO</h1>
			<form action="" method="get">
				<p>
					<label for="correo">Correo:</label><br/>
					<input type="text" name="correo" id="correo" maxlength="50" value="<?php echo "$correo"; ?>"/>
				</p>
				<p>
					<label for="asunto">Asunto:</label><br/>
					<input type="text" name="asunto" id="asunto" maxlength="20" value="<?php echo "$asunto"; ?>"/>
				</p>
				<p>
					<label for="cuerpo">Cuerpo:</label><br/>
					<textarea type="text-area" name="cuerpo" id="cuerpo" rows="5" cols="50" maxlength="500" value="<?php echo "$cuerpo"; ?>"></textarea>
				</p>
			
			<button type="submit" class="btn btn-primary">Enviar</button>
			</form>
		</div> <!-- /container -->
		</div>
	<?php } 
	if(empty($_REQUEST)){ 
		$correo="";
		$asunto="";
		$cuerpo="";
		
		mostrarFormulario($correo,$asunto,$cuerpo);

	}else{
		$asunto=recoge("asunto");
		$cuerpo=recoge("cuerpo");
		$correo=recoge("correo");
		
		$error="";
		//enviarMail($usuario, $asunto, $cuerpo);
		
		if(empty($asunto)){
			$error="$error"."<li>Introduzca el asunto.</li>";
		}
		if(empty($cuerpo)){
			$error="$error"."<li>Introduzca el cuerpo.</li>";
			
		}
		if(empty($correo)){
			$error="$error"."<li>Introduzca el correo.</li>";
			
		}
		
		if($error != ""){
			echo "El mensaje no ha podido ser enviado. Intentelo más tarde.<br/>";
			echo "<font color='red'><ul>$error</ul></font>";
		}
		else{
			$ok=enviarMail($correo, $asunto, $cuerpo);
			
			if($ok){
				echo "<font color='green'>Mensaje enviado correctamente. En breve recibirá una respuesta en su correo.</font>";;
			
			}
		}
		mostrarFormulario($correo,$asunto,$cuerpo);
		
	}
	?>
	
	</main>

<?php require_once("inc/pie.php");?>










