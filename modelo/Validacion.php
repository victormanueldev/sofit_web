<?php
/**
 * Esta clase permite la validación de campos. es la encargada del login y
 * el restablecimiento de la contraseña
 * @editor Victor Manuel
 * 2018/02/17
 */
class Validacion
{



	/**
	* Valida si los campos del formulario del registro estan vacios
	* @param Datos del Formulario de registro
	* @return Boolean
	**/
	public function isNull($nombre, $user, $pass, $pass_con, $email){
		if(strlen(trim($nombre)) < 1 || strlen(trim($user)) < 1 || strlen(trim($pass)) < 1 || strlen(trim($pass_con)) < 1 || strlen(trim($email)) < 1)
		{
			return true;
			} else {
			return false;
		}
	}

	/**
	* Valida si los campos del formulario del registro estan vacios
	* @param Datos del Formulario de registro
	* @return Boolean
	**/
	public function isNullAsistencia($numero_documento){
		if(strlen(trim($numero_documento)) < 1 )
		{
			return true;
			} else {
			return false;
		}
	}

	/**
	* Valida si el Email del usuario es de tipo email
	* @param Email del usuario
	* @return Boolean
	**/
	public function isEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
			} else {
			return false;
		}
	}

 	/**
	* Valida si los campos de contraseña coinciden
	* @param password, confirmar_password
	* @return Boolean
	**/
	public function validaPassword($var1, $var2)
	{
		if (strcmp($var1, $var2) !== 0){
			return false;
			} else {
			return true;
		}
	}

	/**
	* Permite establecer campos con valores max o min
	* @param valorMinimo, valorMaxino y valor
	* @return Boolean
	**/
	public function minMax($min, $max, $valor){
		if(strlen(trim($valor)) < $min)
		{
			return true;
		}
		else if(strlen(trim($valor)) > $max)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	* Valida si el usuario existe en la base de datos
	* @param numero_documento Usuario
	* @return Boolean
	**/
	public function usuarioExiste($numero_documento)
	{
		global $mysqli;
		$mysqli = new mysqli('localhost', 'root', '', 'bd_sofit');
		$stmt = $mysqli->prepare("SELECT id_Usuario FROM usuario WHERE numeroId_Usuario = ? LIMIT 1");
		$stmt->bind_param("d", $numero_documento);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();

		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}

	/**
	* Valida si el email a registrar, ya existe en la BD
	* @param email
	* @return Boolean
	**/
	public function emailExiste($email)
	{
		global $mysqli;
		$mysqli = new mysqli('localhost', 'root', '', 'bd_sofit');
		$stmt = $mysqli->prepare("SELECT id_Usuario FROM usuario WHERE email = ? LIMIT 1");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();

		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}

	/**
	* Genera el Token del usuario (para restablecimiento de contraseña)
	* @return token
	**/
	public function generateToken()
	{
		$gen = md5(uniqid(mt_rand(), false));
		return $gen;
	}

	/**
	* Encripta la contraseña
	* @param contrasña
	* @return contraseña encriptada
	**/
	public function hashPassword($password)
	{
		$hash = password_hash($password, PASSWORD_DEFAULT);
		return $hash;
	}

	/**
	* Cuenta todos los errores que se ha producido desde la vista,
	* y los retorna con un alert (HTML/Bootstrap)
	* @param errores (array)
	* @return div alert
	**/
	public function resultBlock($errors){
		if(count($errors) > 0)
		{
			echo "<div id='error' class='alert alert-danger' role='alert'>
			<ul style='text-align: left'>";
			foreach($errors as $error)
			{
				echo "<li>".$error."</li>";
			}
			echo "</ul>";
			echo "</div>";
		}
	}

	/**
	* Registra al usuario en la BD
	* @param Campos del formulario de registro
	* @return id insertado o 0 en caso de no registrar al usuario
	**/
	public function registraUsuario($id_TipoDoc,$numeroId_Usuario, $nombres_Usuario, $apellidos_Usuario, $genero_Usuario, $telefono_Usuario, $celular_Usuario, $email, $fechaNacimiento_Usuario, $foto_Usuario, $password_hash, $token, $id_Regional, $id_Ciudad, $id_Centro, $id_Programa, $cargo, $numeroFicha_Usuario){

		global $mysqli;
		$stmt = $mysqli->prepare("INSERT INTO Usuario ( id_TipoDocumento,
														numeroId_Usuario,
														nombres_Usuario,
														apellidos_Usuario,
														genero_Usuario,
														telefono_Usuario,
														celular_Usuario,
														email,
														fechaNacimiento_Usuario,
														foto_Usuario,
														password,
														token,
														id_Regional,
														id_Ciudad,
														id_Centro,
														id_Programa,
														cargo,
														numeroFicha_Usuario)
														VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
								);
		$stmt->bind_param(
			'idssssssssssiiiisi',
			$id_TipoDoc,
			$numeroId_Usuario,
			$nombres_Usuario,
			$apellidos_Usuario,
			$genero_Usuario,
			$telefono_Usuario,
			$celular_Usuario,
			$email,
			$fechaNacimiento_Usuario,
			$foto_Usuario,
			$password_hash,
			$token,
			$id_Regional,
			$id_Ciudad,
			$id_Centro,
			$id_Programa,
			$cargo,
			$numeroFicha_Usuario
		);

		if ($stmt->execute()){
			return $mysqli->insert_id;
			} else {
			return 0;
		}
	}

	/**
	* Envia un Email al usuario
	* @param email, nombre del usuario, asunto del mail y el cuerpo del mail
	* @return Boolean
	**/
	public function enviarEmail($email, $nombre, $asunto, $cuerpo){

		require_once 'PHPMailer/PHPMailerAutoload.php';//Libreria para enviar Emails por PHP

		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = '587';
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);

		$mail->Username = 'victormalsx@gmail.com';
		$mail->Password = '3103195394sax';

		$mail->setFrom('noreply@sofitweb.com', 'Sistema de Usuarios');
		$mail->addAddress($email, $nombre);

		$mail->Subject = $asunto;
		$mail->Body    = $cuerpo;
		$mail->IsHTML(true);

		if($mail->send())
		return true;
		else
		return false;
	}

	public function validaIdToken($id, $token){
		global $mysqli;

		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE id = ? AND token = ? LIMIT 1");
		$stmt->bind_param("is", $id, $token);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;

		if($rows > 0) {
			$stmt->bind_result($activacion);
			$stmt->fetch();

			if($activacion == 1){
				$msg = "La cuenta ya se activo anteriormente.";
				} else {
				if(activarUsuario($id)){
					$msg = 'Cuenta activada.';
					} else {
					$msg = 'Error al Activar Cuenta';
				}
			}
			} else {
			$msg = 'No existe el registro para activar.';
		}
		return $msg;
	}

	function activarUsuario($id)
	{
		global $mysqli;

		$stmt = $mysqli->prepare("UPDATE usuarios SET activacion=1 WHERE id = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		$stmt->close();
		return $result;
	}

	/**
	* Valida si los campos del formulario de Login estan vacios
	* @param numero_documento y password
	* @return Boolean
	**/
	public function isNullLogin($usuario, $password){
		if(strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	* Realiza el login del usuario en el sistema
	* @param numero_documento y password
	* @return errores
	**/
	public function login($usuario, $password)
	{
		global $mysqli;
		$mysqli = new mysqli('localhost', 'root', '', 'bd_sofit');
		$stmt = $mysqli->prepare("SELECT id_Usuario, id_Rol, password FROM usuario WHERE numeroId_Usuario = ? || email = ? LIMIT 1");
		$stmt->bind_param("ds", $usuario, $usuario);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;

		if($rows > 0) {

			if($this-> isActivo($usuario)){//Verifica si el usuario esta activo

				$stmt->bind_result($id, $id_tipo, $passwd);
				$stmt->fetch();

				$validaPassw = password_verify($password, $passwd);//Verifica si los password coinciden

				if($validaPassw){

					$this->lastSession($id);//Fecha y hora en la que se realiza el login
					if ($id_tipo == 1) {
						session_start();//Inicia la sesion
						$_SESSION["id_Usuario"] = $id;
						$_SESSION["rol"] = $id_tipo;
						header('Location: ../SofitWeb_1.3/index-entrenador.php');//Redirecciona a los diferentes index
					}else if($id_tipo == 2){
						session_start();//Inicia la sesion
						$_SESSION["id_Usuario"] = $id;
						//$_SESSION["rol"] = $id_tipo;
						header('Location: ../SofitWeb_1.3/index-usuario.php');//Redirecciona a los diferentes index
					}else {
						session_start();//Inicia la sesion
						$_SESSION["id_Usuario"] = $id;
						$_SESSION["rol"] = $id_tipo;
						header('Location: ../SofitWeb_1.3/index-admin.php');//Redirecciona a los diferentes index
					}

					} else {

					$errors = "La contrase&ntilde;a es incorrecta";
				}
				} else {
				$errors = 'El usuario no esta activo';
			}
			} else {
			$errors = "El nombre de usuario o email no existe";
		}
		return $errors;
	}

	/**
	* Actualiza la fecha y la hora por cada login del usuario
	* @param Id del usuario
	**/
	public function lastSession($id)
	{
		global $mysqli;
		$mysqli = new mysqli('localhost', 'root', '', 'bd_sofit');
		$stmt = $mysqli->prepare("UPDATE usuario SET last_session=NOW(), token_password='', password_request=1 WHERE id_Usuario = ?");
		$stmt->bind_param('d', $id);
		$stmt->execute();
		$stmt->close();
	}

	/**
	* Verifica si el usuario esta activo
	* @param numero_documento del usuario
	**/
	public function isActivo($usuario)
	{
		global $mysqli;

		$stmt = $mysqli->prepare("SELECT activacion FROM usuario WHERE numeroId_Usuario = ? || email = ? LIMIT 1");
		$stmt->bind_param('ds', $usuario, $usuario);
		$stmt->execute();
		$stmt->bind_result($activacion);
		$stmt->fetch();

		if ($activacion == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	* Genera el token de la contraseña
	* @param id del usuario
	* @return token
	**/
	public function generaTokenPass($user_id)
	{
		global $mysqli;
		$mysqli = new mysqli('localhost', 'root', '', 'bd_sofit');
		$token = $this-> generateToken();

		$stmt = $mysqli->prepare("UPDATE usuario SET token_password=?, password_request=1 WHERE id_Usuario = ?");
		$stmt->bind_param('ss', $token, $user_id);
		$stmt->execute();
		$stmt->close();

		return $token;
	}

	/**
	* Obtiene cualquier valor de la tabla usuario
	* @param columna, columna de condición y el valor del campo
	* @return campo o null
	**/
	public function getValor($campo, $campoWhere, $valor)
	{
		global $mysqli;
		$mysqli = new mysqli('localhost', 'root', '', 'bd_sofit');
		$stmt = $mysqli->prepare("SELECT $campo FROM usuario WHERE $campoWhere = ? LIMIT 1");
		$stmt->bind_param('s', $valor);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;

		if ($num > 0)
		{
			$stmt->bind_result($_campo);
			$stmt->fetch();
			return $_campo;
		}
		else
		{
			return null;
		}
	}

	/**
	* Obiente el password_request del usuario
	* @param id del usuario
	* @return Boolean
	**/
	public function getPasswordRequest($id)
	{
		global $mysqli;
		$mysqli = new mysqli('localhost', 'root', '', 'bd_sofit');
		$stmt = $mysqli->prepare("SELECT password_request FROM usuario WHERE id_Usuario = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$stmt->bind_result($_id);
		$stmt->fetch();

		if ($_id == 1)
		{
			return true;
		}
		else
		{
			return null;
		}
	}

	/**
	* Verfica el token del password para el restablecimiento de la contraseña
	* @param id del usuarios y token
	* @return Boolean
	**/
	function verificaTokenPass($user_id, $token){

		global $mysqli;
		$mysqli = new mysqli('localhost', 'root', '', 'bd_sofit');
		$stmt = $mysqli->prepare("SELECT activacion FROM usuario WHERE id_Usuario = ? AND token_password = ? AND password_request = 1 LIMIT 1");
		$stmt->bind_param('is', $user_id, $token);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;

		if ($num > 0)
		{
			$stmt->bind_result($activacion);
			$stmt->fetch();
			if($activacion == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	/**
	* Actualiza la contraseña del usuario
	* @param nueva_constraseña, id del usuario y token del usuario
	* @return Boolean
	**/
	public function cambiaPassword($password, $user_id, $token){

		global $mysqli;
		$mysqli = new mysqli('localhost', 'root', '', 'bd_sofit');
		$stmt = $mysqli->prepare("UPDATE usuario SET password = ?, token_password='', password_request=0 WHERE id_Usuario = ? AND token_password = ?");
		$stmt->bind_param('sis', $password, $user_id, $token);

		if($stmt->execute()){
			return true;
			} else {
			return false;
		}
	}
}
