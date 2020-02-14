<?php

	set_error_handler("errores"); // Establecemos la funcion que va a tratar los errores
	
	$email=limpiar_campo($_REQUEST['email']);
	if($email==""){
		trigger_error('El email no puede estar vacio');	
	}
	$apellido=limpiar_campo($_REQUEST['clave']);
	if($apellido==""){
		trigger_error('La clave no puede estar vacia');	
	}

	$id=select_id($db, $email, $apellido);
	$_SESSION['customer']=$id;

	entrar($db, $id);
	
?>

<?php
// Funciones utilizadas en el programa

function limpiar_campo($campoformulario) {
    $campoformulario = trim($campoformulario);
    $campoformulario = stripslashes($campoformulario);
    $campoformulario = htmlspecialchars($campoformulario);  
    return $campoformulario;
}

function errores ($error_level, $error_message, $error_file, $error_line, $error_context){
	echo "<b>Codigo error: </b> $error_level - <b> Mensaje: $error_message </b><br>";
	echo "<b>Fichero: $error_file</b><br>";
	echo "<b>Linea: $error_line</b><br>";
	//var_dump($error_context);
	echo "Finalizando script <br>";
	die(); 	
}

function entrar($db, $id){

    $select="SELECT customerId from customer where customerId='$id'";
    $resultado=mysqli_query($db, $select);//el resultado no es valido, hay que tratarlo
	$row=mysqli_fetch_assoc($resultado);
	$idExiste=$row['customerId'];

	if($idExiste){
		
		$_SESSION['id']=$id;
		$_SESSION["carrito"] = array();
		//crear cookie
		$cookie_name = "usuario";
		$cookie_value =$id;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 segundos = 1 día

		header("location: .././controllers/pe_inicio.html");
	}
	else{
		
		trigger_error('El usuario o contraseña no son válidos');
	}
   
}

function select_id($db, $email, $apellido){

	$select="SELECT customerId from customer where Email='$email' and lastName='$apellido'";
    $resultado=mysqli_query($db, $select);//el resultado no es valido, hay que tratarlo
	$row=mysqli_fetch_assoc($resultado);
	$id=$row['customerId'];

	return $id;
}
	

?>