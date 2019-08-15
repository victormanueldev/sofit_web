<?php
	//Inclucion de los Controladores
	include_once('modelo/Conexion.php');
	include_once('modelo/Validacion.php');
	include_once('modelo/Carbon.php');
	include_once('controlador/ControladorRegional.php');
	include_once('controlador/ControladorCiudad.php');
	include_once('controlador/ControladorCentro.php');
	include_once('controlador/ControladorPrograma.php');
	//Instacias de los Controladores
	$controlRegional = new ControladorRegional();
	$controlCiudad = new ControladorCiudad();
	$controlCentro = new ControladorCentro();
	$controlPrograma = new ControladorPrograma();
	//Variable de errores
	use Carbon\Carbon;
	$errors = array();
	$conex = new Conexion();
	//Validacion del POST
	if(!empty($_POST)){
		//Obtiene los campos del formulario
		$id_TipoDoc = $_POST['id_TipoDocumento'];
		$numero_documento = $_POST['numero_documento'];
		$nombres_Usuario = $conex->conexion->real_escape_string($_POST['nombres_Usuario']);
		$apellidos_Usuario = $conex->conexion->real_escape_string($_POST['apellidos_Usuario']);
		$genero = $conex->conexion->real_escape_string($_POST['genero_Usuario']);
		$telefono = $conex->conexion->real_escape_string($_POST['telefono_Usuario']);
		$celular = $conex->conexion->real_escape_string($_POST['celular_Usuario']);
		$email = $conex->conexion->real_escape_string($_POST['email']);
		$formatoCarbon = Carbon::parse($_POST['fechaNacimiento_Usuario']);//Cambiar el formato text a date (Carbon)
		$fechaCarbon = $formatoCarbon->toDateString();//Obtener solo la fecha
		$fechaNacimiento = $conex->conexion->real_escape_string($fechaCarbon);
		$password = $conex->conexion->real_escape_string($_POST['password']);
		$confirmar_password = $conex->conexion->real_escape_string($_POST['confirmar_password']);
		$cargo = $conex->conexion->real_escape_string($_POST['cargo']);
		$regional = $_POST['id_Regional'];
		$ciudad = $_POST['id_Ciudad'];
		$centro = $_POST['id_Centro'];
		$programa = $_POST['id_Programa'];
		$numeroFicha_Usuario = $_POST['numeroFicha_Usuario'];
		//Proceso de almacenamiento de imagenes
		$archivo =  $_FILES['foto_Usuario']['tmp_name'];
		$destino = "app/img/user/".$_FILES['foto_Usuario']['name'];
		move_uploaded_file($archivo, $destino);
		$_POST['foto_Usuario'] = $destino;

		//Instancia de la clase Validacion
		$validacion = new Validacion();
		//Validacion de email
		if (!$validacion->isEmail($email)) {
			$errors[] = "Ingrese un correo válido";
		}
		//Valida passwords
		if (!$validacion->validaPassword($password, $confirmar_password)) {
			$errors[] = "Las contraseñas no coinciden";
		}
		//Valida si el usuario existe
		if ($validacion->usuarioExiste($numero_documento)) {
			$errors[] = "Este usuario ya existe";
		}
		//Valida si el email ya existe
		if ($validacion->emailExiste($email)) {
			$errors[] = "El email ya existe";
		}
		//Cuenta los errores
		if (count($errors) == 0) {
			//Encripta la constraseña
			$password_hash = $validacion->hashPassword($password);
			$token = $validacion->generateToken();
			//Registra al usuario
			$registro = $validacion->registraUsuario($id_TipoDoc, $numero_documento, $nombres_Usuario, $apellidos_Usuario, $genero, $telefono, $celular, $email, $fechaNacimiento, $destino, $password_hash, $token, $regional, $ciudad, $centro, $programa, $cargo, $numeroFicha_Usuario);
			if($registro > 0){
				header('Location: login.php');//Redirecciona al Login
			}else {
				$errors[] = "Error al registrar Usuario";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>SOFIT | Registro</title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/ico" sizes="16x16" href="app/img/favicon.ico">
	<link rel="stylesheet" href="app/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="app/css/mycssregistro.css">
	<link rel="stylesheet" href="app/css/bootstrap-datepicker3.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Rubik" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300|Oswald" rel="stylesheet">
<!-- 	<link rel="stylesheet" href="app/css/jquery-ui.min.css">
	<link rel="stylesheet" href="app/css/jquery-ui.structure.css">
	<link rel="stylesheet" href="app/css/jquery-ui.theme.css">
 -->
	
</head>
<body>

<section id="wrapper">
		<div class="login-register">
			<div class="login-box card" style="background-color: #00000080;">
				<div class="card-body">
				  <form class="form-horizontal form-material" id="sa-success" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
					  <div class="col-xs-12 text-center">
						<div class="user-thumb text-center"> <img alt="thumbnail" class="img-circle" width="140" src="app/img/logo_sofit_full.png">
						  <h3 style="font-size:25px; color: white; margin: 0 0 20px;">Registro</h3>
						</div>
					  </div>
					</div>
					<div class="Form form-group">
					  <div class="col-xs-12 col-md-6 col-lg-6" style="padding-right: 40px;">
					  	<label>Tipo de Documento</label>
						<select class="form-control" name="id_TipoDocumento" required="">
							<!-- <option default selected disabled">TIPO ID</option> -->
							<option value="2">Cédula de Ciudadanía</option>
							<option value="1">Tarjeta de Identidad</option>
							<option value="4">Cédula de Extranjería</option>
							<option value="3">Registro Civil</option>
						</select>

						<label>Nombres</label>
						<input class="form-control" type="text" required="" name="nombres_Usuario" id="documento" placeholder="Nombres">

						<label>Teléfono</label>
						<input class="form-control" type="number" required="" name="telefono_Usuario" id="documento" placeholder="Teléfono Fijo">

						<label>Email</label>
						<input class="form-control" type="email" required="" name="email" id="documento" placeholder="Email">

						<label>Contraseña</label>
						<input class="form-control" type="password" required="" name="password" id="documento" placeholder="Contraseña">

						<label>Género</label>
						<select class="form-control" name="genero_Usuario" required="">
							<option value="Masculino">Masculino</option>
							<option value="Femenino">Femenino</option>
						</select>

						<label>Regional</label>
						<select class="form-control" name="id_Regional" required="">
							<?php
								$resulRegional= $controlRegional-> indexRegional();
								while ($fila = mysqli_fetch_array($resulRegional)) {
									echo "<option value='".$fila['id_Regional']."'>";
									echo $fila['nombre_Regional'];
									echo "</option>";
								}
							?>
						</select>

						<label>Ciudad</label>
						<select  class="form-control" name="id_Ciudad" required="">
							<?php
								$resulCiudad = $controlCiudad-> indexCiudad();
								while ($fila = mysqli_fetch_array($resulCiudad)) {
									echo "<option value='".$fila['id_Ciudad']."'>";
									echo utf8_encode($fila['nombre_Ciudad']);
									echo "</option>";
								}
							?>
						</select>
							
						<label>Número de Ficha</label>
						<input class="form-control" type="number" name="numeroFicha_Usuario" id="documento" placeholder="Número de ficha del programa">

						</div>


						<div class="col-xs-12 col-md-6 col-lg-6" style="padding-left: 40px;">

						<label>Número de Identificación</label>
						<input class="form-control" type="number" required="" name="numero_documento" id="documento" placeholder="Número de Identificación">

						<label>Apellidos</label>
						<input class="form-control" type="text" required="" name="apellidos_Usuario" id="documento" placeholder="Apellidos">

						<label>Celular</label>
						<input class="form-control" type="number" name="celular_Usuario" id="documento" placeholder="Teléfono Móvil">

						<label>Fecha de Nacimiento</label>		
						<div class="input-group date" data-provide="datepicker" >
					        <input class="form-control" type="text" required="" placeholder="DD/MM/AAAA" name="fechaNacimiento_Usuario">
					        <div class="input-group-addon">
					        	<span class="fa fa-calendar"></span>					        	
					        </div>
						</div>

						<label>Confirme Contraseña</label>
						<input class="form-control" type="password" required="" name="confirmar_password" id="documento" placeholder="Confirmar contraseña">


						<label>Cargo</label>
						<select class="form-control" name="cargo">
							<option value="Aprendiz">Aprendiz</option>
							<option value="Instructor">Instructor</option>
							<option value="Funcionario">Funcionario</option>
							<option value="Otro">Otro</option>
						</select>

						<label>Programa de Formación</label>
							<select  class="form-control" name="id_Programa" required="">
								<?php
									$resulPrograma = $controlPrograma-> indexPrograma();
									while ($fila = mysqli_fetch_array($resulPrograma)) {
										echo "<option value='".$fila['id_Programa']."'>";
										echo utf8_encode($fila['nombre_Programa']);
										echo "</option>";
									}
								?>
							</select>

						<label>Centro</label>
						<select class="form-control" name="id_Centro" required="">
							<?php
								$resulCentro = $controlCentro-> indexCentro();
								while ($fila = mysqli_fetch_array($resulCentro)) {
									echo "<option value='".$fila['id_Centro']."'>";
									echo utf8_encode($fila['nombre_Centro']);
									echo "</option>";
								}
							?>
						</select>

						<label>Foto de Perfil</label>
						<input type="file" name="foto_Usuario">

						<label style="margin-top: 40px;">
							<input type="checkbox" required> <a href="fpdf/terminosycondiciones.pdf">Acepto los Términos y Condiciones</a>
						</label>
					  </div>
					</div>
					<?php
						$validacion = new Validacion();
						//Imprime todos los errores encontrados
						echo $validacion-> resultBlock($errors);
					?>
				<div class="form-group Form-Boton" style="margin: 30px;">
						<div class="row">
							<div class="col-sm-6">
								<button class="btn">Registrarse</button>
								</form>
							</div>
							<div class="col-sm-6" style="margin-top: 6px;">
								<a href="index.php" class="Form-Boton" style="padding: 0;">Volver al inicio</a>
							</div>
						</div>
						<!-- <a href="index.php" class="btn-return">Volver al inicio</a> -->

					<!-- <div class="form-group Form-Boton" style="margin: 30px;"> -->
					<!-- </div> -->
					</div>
				</div>
			  </div>
		</div>

	</section>

	<script src="app/js/jquery.js"></script>
	<script src="app/js/jquery-ui.min.js"></script>
	<script src="app/js/bootstrap-datepicker.min.js"></script>
	<script src="app/js/bootstrap-datepicker.es.min.js"></script>
	<script src="app/js/jquery.min.js"></script>
	<script src="app/js/bootstrap.min.js"></script>

</body>
</html>