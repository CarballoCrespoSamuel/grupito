<?php session_start();
require_once ("inc/bbdd.php");
$pagina="usuarios";
$titulo="usuarios";
require_once ("inc/encabezado.php"); 
require_once ("inc/funciones.php");

if(isset($_SESSION["admin"])){ 
	$usuarios=seleccionarUsuariosGrupito();
	$numUsuarios=count($usuarios);
	$usuariosPagina=5;
	$paginas=ceil($numUsuarios/$usuariosPagina); //Función CEIL para redondear a la alza
	$pagina=recoge("pagina");
	
	
	if($pagina==false or $pagina<=1 or $pagina>$paginas){ //Si no existe la variable $pagina, si el número 
		$pagina=1;										//de página es negativo o estamos en una página mayor de las que hay
	}else{
		
	}

	$inicio=($pagina-1)*$usuariosPagina;
	$usu=seleccionarUsuariosPaginarGrupito($inicio, $usuariosPagina);

?>
	<div class="container">

		<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">IDUsuario</th>
				<th scope="col">Email</th>
				<th scope="col">Nombre</th>
				<th scope="col">Apellidos</th>
				<th scope="col">Dirección</th>
				<th scope="col">Teléfono</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
	<?php
	foreach($usu as $usuario){
		$idUsuario=$usuario["idUsuario"];
		$email=$usuario["email"];
		$password=$usuario["password"];
		$nombre=$usuario["nombre"];
		$apellidos=$usuario["apellidos"];
		$direccion=$usuario["direccion"];
		$telefono=$usuario["telefono"];
		?>
			<tr>
				<th scope="row"><?php echo "$idUsuario"; ?></th>
				<td><?php echo "$email"; ?></td>
				<td><?php echo "$nombre"; ?></td>
				<td><?php echo "$apellidos"; ?></td>
				<td><?php echo "$direccion"; ?></td>
				<td><?php echo "$telefono"; ?></td>
				<td><a href="<?php echo "editarUsuario.php?idUsuario="."$idUsuario"?>" class='btn btn-primary' role='alert'>Editar</a></td>
				<td><a href="eliminarUsuarios.php?idUsuario=<?php echo $idUsuario;?>" onClick="return confirmarBorrar('¿Realmente quieres borrar el usuario?');" class='btn btn-danger' role='alert'>Borrar</a></td>
			</tr>
	<?php
	}?>
		</tbody>
		
	</div>
	
	
	</table>

	<nav aria-label="nav">
	<ul class="pagination"> 
		<li class="page-item<?php if(1==$pagina){echo " disabled";}?>"><a class="page-link" href="todosUsuarios.php?pagina=<?php echo $pagina-1; ?>">Anterior</a></li>
		<?php 
		for($i=1;$i<=$paginas;$i++){?>
			<li class="page-item <?php if($i==$pagina){echo " active";}?>"><a class="page-link" href="todosUsuarios.php?pagina=<?php echo "$i"; ?>" >  <?php echo "$i"; ?></a></li>
		<?php
		}
		?>
		<li class="page-item<?php if($pagina==$paginas){echo " disabled";}?>"><a class="page-link" href="todosUsuarios.php?pagina=<?php echo $pagina+1; ?>">Siguiente</a></li>
	</ul>
	</nav>
<?php
}else{ 
?>
	<p>
		Inicia sesión ADMINISTRADOR para continuar. <a href="login.php">Iniciar sesión</a>
	</p>		
<?php 			
}
 require_once ("inc/pie.php"); ?>
