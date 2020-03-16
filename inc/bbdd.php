<?php include("configuracion.php"); ?>

<?php 
	//!!Funcion para conectarnos a la BD
	function conectarBD(){
		try{
			$con = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8", USER, PASS);
			
			$con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		}
		catch(PDOException $e){
			echo "ERROR al conectar la BD:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $con;
	}

	//Funcion para desconectar la base de datos
	function desconectarBD($con){
		$con = NULL;
		return $con;
	}

	//Funcion para Insertar Tarea
	function insertarTarea($nombre, $descripcion, $prioridad){
		$con = conectarBD();
		
		try{
			$sql = "INSERT INTO tareas (nombre, descripcion, prioridad) VALUES(:nombre, :descripcion, :prioridad)";

			$stmt = $con->prepare($sql);
			
			$stmt->bindParam(':nombre',$nombre);
			$stmt->bindParam(':descripcion',$descripcion);
			$stmt->bindParam(':prioridad',$prioridad);
			$stmt->execute();
		}
		catch(PDOException $e){
			echo "ERROR al Insertar Tarea:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}

		return $con -> lastInsertID();
	}

	//Funcion para actualizar tarea
	function actualizarTarea($idTarea, $nombre, $descripcion, $prioridad){
		
		$con = conectarBD();
		
		try{
			$sql="UPDATE tareas SET nombre=:nombre, descripcion=:descripcion, prioridad=:prioridad WHERE idTarea=:idTarea";
			//NO PONGAS ESPACIOS CON EL =:
			$stmt=$con->prepare($sql);
			
			
			$stmt->bindParam(':nombre',$nombre);
			$stmt->bindParam(':descripcion',$descripcion);
			$stmt->bindParam(':prioridad',$prioridad);
			$stmt->bindParam(':idTarea',$idTarea);
			$stmt->execute();
		}
		catch(PDOException $e){
			echo "ERROR al actualizar Tarea:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $stmt->rowCount();
	}
	
	//Funcion para borrar tarea 
	function eliminarTarea($idTarea){
		$con=conectarBD();
		
		try{
			//Crear la sentencia
			$sql="DELETE from tareas where idTarea=:idTarea";
			//Preparamos la sentencia y creamos stmt
			$stmt = $con->prepare($sql);
			//Vinculamos los campos
			$stmt->bindParam(':idTarea',$idTarea);
			//Ejecutamos
			$stmt->execute();
		}
		catch(PDOException $e){
			echo "ERROR al eliminar Tarea:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $stmt->rowCount();
	}
	
	
	//Funcion para seleccionar todas las tareas
	function seleccionarTodasTareas(){
		$con=conectarBD();
		try{
			$sql="SELECT * from tareas";
			
			//Hacemos que se ejecute directamente porque no hay que preparar nada
			$stmt=$con->query($sql);
			//Crear un array asociativo 
			$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			echo "ERROR al seleccionar todas las tareas:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $rows;
	}
	
	//Funcion para seleccionar tareas para paginar
	function seleccionarTareasPaginar($inicio, $tareasPagina){
		$con=conectarBD();
		try{
			$sql="SELECT * from tareas LIMIT :inicio, :tareasPagina";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':inicio',$inicio, PDO::PARAM_INT); //Porque necesitamos que sea INT
			$stmt->bindParam(':tareasPagina',$tareasPagina, PDO::PARAM_INT);
			$stmt->execute();
			$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
			
		}
		catch(PDOException $e){
			echo "ERROR al seleccionar tareas para paginar:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $rows;
	}
	
	//Funcion para seleccionar una tarea
	function seleccionarTarea($idTarea){
		$con=conectarBD();
		try{
			$sql="SELECT * from tareas where idTarea=:idTarea";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':idTarea',$idTarea);
			$stmt->execute();
			//Usamos fetch para UNA FILA y fetchAll para VARIAS FILAS
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			echo "ERROR al seleccionar la tarea:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $row;
	}
	
	
	//Función para insertar un usuario con su contraseña
	function insertarUsuario($usuario, $passwordEncriptada){
		$con=conectarBD();
		try{
			$password=password_hash($passwordEncriptada, PASSWORD_DEFAULT);
			$sql="INSERT INTO usuarios(usuario, password) VALUES(:usuario, :password)";
			
			$stmt = $con->prepare($sql);
			
			$stmt->bindParam(':usuario',$usuario);
			$stmt->bindParam(':password',$passwordEncriptada);
			$stmt->execute();
		}
		catch(PDOException $e){
			echo "ERROR al Insertar usuario:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}

	}
	
	//Funcion para seleccionar todos los usuarios
	function seleccionarTodosUsuarios(){
		$con=conectarBD();
		try{
			$sql="SELECT * from usuarios";
			
			//Hacemos que se ejecute directamente porque no hay que preparar nada
			$stmt=$con->query($sql);
			//Crear un array asociativo 
			$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			echo "ERROR al seleccionar todos los usuarios:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $rows;
	}
	
	//Funcion para seleccionar un usuario
	function seleccionarUsuario($usuario){
		$con=conectarBD();
		try{
			$sql="SELECT * from usuarios where usuario=:usuario";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':usuario',$usuario);
			$stmt->execute();
			//Usamos fetch para UNA FILA y fetchAll para VARIAS FILAS
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			echo "ERROR al iniciar sesión:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $row;
	}
	
	//Función para seleccionar a los usuarios de 2 en 2
	function seleccionarUsuariosPaginar($inicio, $usuariosPagina){
		$con=conectarBD();
		try{
			$sql="SELECT * from usuarios LIMIT :inicio, :usuariosPagina";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':inicio',$inicio, PDO::PARAM_INT); //Porque necesitamos que sea INT
			$stmt->bindParam(':usuariosPagina',$usuariosPagina, PDO::PARAM_INT);
			$stmt->execute();
			$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
			
		}
		catch(PDOException $e){
			echo "ERROR al seleccionar usuarios para paginar:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $rows;
	}
	
	
	////////////////////////////////////////////////GRUPITO//////////////////////////////////////////////////////////
	
	
	//Función para paginar los productos
	function seleccionarProductosPaginar($inicio, $productosPagina){
		$con=conectarBD();
		try{
			$sql="SELECT * from productos LIMIT :inicio, :productosPagina";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':inicio',$inicio, PDO::PARAM_INT); //Porque necesitamos que sea INT
			$stmt->bindParam(':productosPagina',$productosPagina, PDO::PARAM_INT);
			$stmt->execute();
			$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
			
		}
		catch(PDOException $e){
			echo "ERROR al seleccionar productos para paginar:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $rows;
	}

	//Función para TODOS los productos
	function seleccionarTodosProductos(){
		$con=conectarBD();
		try{
			$sql="SELECT * from productos";
			
			//Hacemos que se ejecute directamente porque no hay que preparar nada
			$stmt=$con->query($sql);
			//Crear un array asociativo 
			$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			echo "ERROR al seleccionar todos los usuarios:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $rows;
	}
	
	
	//Funcion para productos portada
	function seleccionarOfertasPortada($numOfertas){
		$con=conectarBD();
		try{
			$sql="SELECT * from productos LIMIT :numOfertas";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':numOfertas',$numOfertas, PDO::PARAM_INT); //Porque necesitamos que sea INT
			$stmt->execute();
			$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
			
		}
		catch(PDOException $e){
			echo "ERROR al seleccionar productos para la portada:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $rows;
	}
	
	//Funcion para mostrar todos los productos
	function seleccionarTodasOfertas(){
		$con=conectarBD();
		try{
			$sql="SELECT * from productos";
			$stmt = $con->prepare($sql);
			//$stmt->bindParam(':numOfertas',$numOfertas, PDO::PARAM_INT); //Porque necesitamos que sea INT
			$stmt->execute();
			$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
			
		}
		catch(PDOException $e){
			echo "ERROR al seleccionar todos los productos: ".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $rows;
	}

	//Función para seleccionar un producto concreto
	function seleccionarProducto($idProducto){
		$con=conectarBD();
		try{
			$sql="SELECT * from productos WHERE idProducto=:idProducto";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':idProducto',$idProducto, PDO::PARAM_INT); //Porque necesitamos que sea INT
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			
		}
		catch(PDOException $e){
			echo "ERROR al seleccionar el producto: ".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $row;
	}
	
	
	
	
	//Función para comprobas si un usuario existe antes de insertar un usuario con su contraseña EN GRUPITO
	function comprobarUsuarioGrupito($email){
		$con=conectarBD();
		try{
			$sql="SELECT email from usuarios where email=:email" ;
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':email',$email);
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			echo "ERROR al Insertar usuario:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $row;
	}
	
	
	//Función para insertar un usuario con su contraseña EN GRUPITO
	function insertarUsuarioGrupito($email,$password,$nombre,$apellidos,$direccion,$telefono){
		$con=conectarBD();
		try{
			//$password=password_hash($password, PASSWORD_DEFAULT);
			$sql="INSERT INTO usuarios(email,password,nombre,apellidos,direccion,telefono) VALUES(:email,:password,:nombre,:apellidos,:direccion,:telefono)";
			
			$stmt = $con->prepare($sql);
			
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':password',$password);
			$stmt->bindParam(':nombre',$nombre);
			$stmt->bindParam(':apellidos',$apellidos);
			$stmt->bindParam(':direccion',$direccion);
			$stmt->bindParam(':telefono',$telefono);
			
			$stmt->execute();
		}
		catch(PDOException $e){
			echo "ERROR al Insertar usuario:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
	}
	
	
	//Funcion para seleccionar un usuario GRUPITO
	function seleccionarEmail($email){
		$con=conectarBD();
		try{
			$sql="SELECT * from usuarios where email=:email";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':email',$email);
			$stmt->execute();
			//Usamos fetch para UNA FILA y fetchAll para VARIAS FILAS
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			echo "ERROR al iniciar sesión:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $row;
	}
	
	//Insertar un pedido en la base de datos
	function insertarPedido($idUsuario, $detallePedido, $total){
		$conexion=conectarBD();
		try{
			$conexion -> beginTransaction();//Necesito crear una transaccion por si da error, que pueda hacer ROLLBACK
			$sql="INSERT INTO pedidos(idUsuario, total) VALUES(:idUsuario,:total)";
			$stmt = $conexion -> prepare($sql);
		
			$stmt->bindParam( ':idUsuario',$idUsuario);
			$stmt->bindParam(':total',$total);

			$stmt->execute();
			$idPedido=$conexion->lastInsertId();
			
			
			foreach($detallePedido as $idProducto => $cantidad){
				$producto=seleccionarProducto($idProducto);
				$precio=$producto["precioOferta"];
				$sql2= "INSERT INTO detallePedido(idPedido,idProducto,cantidad, precio) VALUES(:idPedido,:idProducto,:cantidad,:precio)";
				
				$sentencia = $conexion -> prepare($sql2);
		
				$sentencia->bindParam(':idPedido',$idPedido);
				$sentencia->bindParam(':idProducto',$idProducto);
				$sentencia->bindParam(':cantidad',$cantidad);
				$sentencia->bindParam(':precio',$precio);
				
				$sentencia->execute();
				
			}
			$conexion -> commit();
		}
		catch(PDOException $e){
			$conexion -> rollback();
			echo "ERROR al Insertar pedido: ".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $idPedido;
	}
	
	//Eliminar un pedido en la base de datos
	function eliminarPedido($idPedido){
		$conexion=conectarBD();
		try{

			$sql="DELETE FROM detallePedido WHERE idPedido=:idPedido";
			$stmt = $conexion -> prepare($sql);
			$stmt->bindParam( ':idPedido',$idPedido);
			$stmt->execute();

			
			$sql="DELETE FROM pedidos WHERE idPedido=:idPedido";
			$stmt = $conexion -> prepare($sql);	
			$stmt->bindParam( ':idPedido',$idPedido);
			$stmt->execute();
		}
		catch(PDOException $e){
			$conexion -> rollback();
			echo "ERROR al Eliminar pedido: ".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $idPedido;
	}
	
	
	//Funcion para seleccionar pedidos GRUPITO
	function seleccionarPedidos($idUsuario){
		$con=conectarBD();
		try{
			$sql="SELECT * from pedidos where idUsuario=:idUsuario";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':idUsuario',$idUsuario);
			$stmt->execute();
			//Usamos fetch para UNA FILA y fetchAll para VARIAS FILAS
			$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			echo "ERROR al seleccionar pedido:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}
		return $row;
	}
	
	
	
	
	/////////////////
	function editarUsuarioGrupito($idUsuario,$email,$password,$nombre,$apellidos,$direccion,$telefono){
		$con=conectarBD();
		try{
			//$password=password_hash($password, PASSWORD_DEFAULT);
			$sql="UPDATE usuarios SET idUsuario=:idUsuario, email=:email, password=:password, nombre=:nombre, apellidos=:apellidos, direccion=:direccion, telefono=:telefono WHERE idUsuario=:idUsuario";
			
			$stmt = $con->prepare($sql);
			
			$stmt->bindParam(':idUsuario',$idUsuario);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':nombre',$nombre);
			$stmt->bindParam(':password',$password);

			$stmt->bindParam(':apellidos',$apellidos);
			$stmt->bindParam(':direccion',$direccion);
			$stmt->bindParam(':telefono',$telefono);
			
			$stmt->execute();
		}
		catch(PDOException $e){
			echo "ERROR al editar usuario:".$e->getMessage();	
			file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND );
			exit;
		}

	}
	
?>	








