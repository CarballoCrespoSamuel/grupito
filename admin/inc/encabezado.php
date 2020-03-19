<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Mis Tareas</title>
  </head>
  <body background="fondo.png">
 <script type="text/javascript">
		function confirmarBorrar(){
			var respuesta = confirm("¿Está seguro/a de que quiere borrar?");
			if(respuesta ==true){
				return true;
			}else{
				return false;
			}
		}
	</script>

<div class="jumbotron">
<div class="container">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link" href="crearUsuario.php">Crear Usuario</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="todosUsuarios.php">Ver todos los usuarios</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="productos.php">Ver Productos Admin</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="../productos.php">Ver Productos Usuarios</a>
		</li>	
	</ul>
</div>
</div>