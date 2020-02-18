<!DOCTYPE html>
<html lang="es">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title><?php echo $titulo; ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
	<link href="./css/bootstrap.css" rel="stylesheet">

    <!-- Favicons -->
	<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
	<link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
	<link rel="manifest" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/manifest.json">
	<link rel="mask-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
	<link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon.ico">
	<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#563d7c">



	<?php  if($pagina=="crearUsuario"){?>
   <script src='https://www.google.com/recaptcha/api.js?render=<?php echo CLAVE_SITIO_WEB; ?>'></script>
    <script>
		grecaptcha.ready(function() {
		grecaptcha.execute('<?php echo CLAVE_SITIO_WEB; ?>', {action: 'formulario'})
		.then(function(token) {
		var recaptchaResponse = document.getElementById('recaptchaResponse');
		recaptchaResponse.value = token;
		});});
    </script>

	<?php } ?>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="./css/jumbotron.css" rel="stylesheet">
	
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a class="navbar-brand" href="index.php">MiGrupito</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item <?php if($pagina=="index"){echo "active";}?> ">

			<a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>

		  </li>
		  <li class="nav-item <?php if($pagina=="productos"){echo "active";}?>">
			<a class="nav-link" href="productos.php">Productos</a>
		  </li>
		  <li class="nav-item <?php if($pagina=="contacto"){echo "active";}?>">
			<a class="nav-link" href="contacto.php">Contacto</a>
		  </li>
		</ul>
		
		<ul class="navbar-nav justify-content-en"><!--Para que lo mande al final de la fila, porque lo queremos al otro lado-->
		  <li class="nav-item">
			<a href="carrito.php" class="nav-link"><i class="fas fa-shopping-cart fa-1x"></i></a>
		  </li>
		  
		  <?php 
		if(isset($_SESSION["email"])){ //Para que aparezca una cosa si hay un usuario logeado u otra si no lo hay ?>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['email']; ?></a>
				<div class="dropdown-menu" aria-labelledby="dropdown01">
				<a class="dropdown-item" href="misDatos.php">Mis Datos</a>
				<a class="dropdown-item" href="misPedidos.php">Mis Pedidos</a>
				<a class="dropdown-item" href="logout.php">Cerrar Sesión</a>
				</div>
			</li>
		<?php 
		}else{
		?>
			<li class="nav-item">
				<a  class="btn btn-outline-success my-2 my-sm-0" type="submit" href="login.php">Identifícate</a>
			</li>
		<?php } ?>
		</ul>
		</div>
	</nav>