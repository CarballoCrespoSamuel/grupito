<?php session_start(); ?>

<?php require_once("inc/bbdd.php");
$pagina="misDatos";
$titulo="Mis Datos";
require_once("inc/encabezado.php");
require_once("inc/configuracion.php");
require_once("inc/funciones.php");?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Email</th>
	  <th scope="col">Password</th>
      <th scope="col">Nombre</th>
	  <th scope="col">Apellidos</th>
      <th scope="col">Direccion</th>
	  <th scope="col">Teléfono</th>
    </tr>
  </thead>
  <tbody>
  	<?php
	$email=$_SESSION["email"];
	$datos=seleccionarEmail($email);
	
	$email=$datos["email"];
	$password=$datos["email"];
	$nombre=$datos["email"];
	$apellidos=$datos["email"];
	$direccion=$datos["email"];
	$teléfono=$datos["email"];	
	
	?>
			<tr>
			  <td><?php echo "$mail";?></td>
			  <td><?php //echo "$pass";?></td>
			  <td><?php echo "$mail" ?></td>
			  <td><?php ?></td>
			  <td><?php ?></td>
			  <td><?php ?></td>
			</tr>
	</tbody>
</table>
<?php require_once("inc/pie.php");?>