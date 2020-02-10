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
      <th scope="col">Usuario</th>
	  <th scope="col">Contraseña</th>
      <th scope="col">Correo</th>
	  <th scope="col">Dirección</th>
      <th scope="col">Código Postal</th>
    </tr>
  </thead>
  <tbody>
  	<?php //FOREACH usuarios
	?>
			<tr>
			  <td><?php //echo "$usu";?></td>
			  <td><?php //echo "$pass";?></td>
			  <td><?php ?></td>
			  <td><?php ?></td>
			  <td><?php ?></td>
			  <td><?php ?></td>
			</tr>
	</tbody>
</table>
<?php require_once("inc/pie.php");?>