<?php
	include_once('modelo/Conexion.php');
	include_once('modelo/Validacion.php');
	$errors =  array();
	$conex = new Conexion();
	$validacion = new Validacion();
	//Valida el envio del formulario
	if(!empty($_POST)){
		$usuario = $conex->conexion->real_escape_string($_POST['usuario']);
		$password = $conex->conexion->real_escape_string($_POST['password']);
		//Valida si el formulario de login esta vacio
		if($validacion->isNullLogin($usuario, $password)){
			$errors[] = "Debe llenar todos los campos";
		}
		$errors[] = $validacion->login($usuario, $password);//Llama al metodo Login
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sofit | Login</title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/ico" sizes="16x16" href="app/img/favicon.ico">
	<link rel="stylesheet" href="app/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="app/css/mycsslogueo.css">
	<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Rubik" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300|Oswald" rel="stylesheet"> 
</head>
<body>
	
	<section class="Background"> <!-- START CONTENEDOR -->
		<div id="block" data-vide-bg="app/Videos/Crossfit_Motivation_-_Josh_Bridges_1" data-vide-options="position: 0% 50%, muted: true poster:" poster="app/img/Img1.png">			
			<header id="Contenedor">
				<div class="row">
					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
						<div class="Form-Login">
							<h2>Inicio de Sesión</h2>
								  <div class="form-group">
									<!-- <span class="glyphicon glyphicon-user"></span> -->
									<input type="text" class="form-control" placeholder="Número de Identificación o Email" name="usuario">
									<br>
									<!-- <span class="glyphicon glyphicon-user"></span> -->
									<input type="password" class="form-control" placeholder="Contraseña" name="password">
									<br>
									<?php
										$validacion = new Validacion();
										//Imprime todos los errores encontrados
										echo $validacion-> resultBlock($errors);
									?>
									<a href=""><button type="submit" class="Boton">Entrar</button></a>
									<br>
									<div class="Opciones-Login">
										<a href="registro.php">Registrarse</a>
										<a href="recuperar-contrasena.php">¿Olvidaste la contraseña?</a>
									</div>
								</div>
							</div>					
						</div>
					</form>
				</div>
			</div>
		</header>
	</section> <!-- END CONTENEDOR  -->



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="app/js/bootstrap.min.js"></script>
	<script src="app/js/jquery.vide.min.js"></script>
</body>
</html>