<?php
  include_once('modelo/Conexion.php');
	include_once('modelo/Validacion.php');
  $conex = new Conexion();
	$validacion = new Validacion();;

  $password = $conex->conexion->real_escape_string($_POST['password']);
  $con_password = $conex->conexion->real_escape_string($_POST['con_password']);
  $user_id = $conex->conexion->real_escape_string($_POST['user_id']);
  $token = $conex->conexion->real_escape_string($_POST['token']);

  if($validacion-> validaPassword($password, $con_password)){
    $pass_hash = $validacion-> hashPassword($password);
    if($validacion-> cambiaPassword($pass_hash, $user_id, $token)){
      echo "La contraseña ha cambiado";
    }else {
      echo "Error al modificar password";
    }
  }else {
    echo "Las contraseñas no coinciden";
  }

?>
