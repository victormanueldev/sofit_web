<?php
  include_once('Modelo/Usuario.php');

  /**
   * @author Victor Manuel
   */
  class ControladorUsuario
  {
    private $usuario;
    function __construct()
    {
      $this-> usuario = new Usuario();
    }

    /**
    * Permite Visualizar todos los datos de la tabla Usuario
    * @return $resultado (Resultado de la Consulta SQL)
    */
    public function indexUsuario()
    {
      $resultado = $this-> usuario-> listarUsuario();
      return $resultado;
    }

    /**
    * Permite Visualizar la informacion del Usuario
    * @param $id (ID del Usuario a Visualizar)
    * @return $datos (Array Asociativo con la informacion del registro)
    */
    public function verU($id_Usuario)
    {
      $this-> usuario-> setUsuario('id_Usuario', $id_Usuario);
      $datos = $this-> usuario-> verUsuario();
      return $datos;
    }

    /**
    * Permite Editar un Usuario desde la Vista(Registrar)
    * @param $numeroId_Usuario (Identificacion del Usuario)
    * @param $nombres_Usuario (Nombres del Usuario)
    * @param $id_TipoDoc (Tipo de Identificacion del Usuario)
    * @param $apellidos_Usuario (Apellidos del Usuario)
    * @param $telefono_Usuario (Telefono del Usuario)
    * @param $cedula_Usuario (Telfono Movil del Usuario)
    * @param $email_Usuario (Email del Usuario)
    * @param $id_Ciudad (Ciudad del Usuario)
    * @param $foto_Usuario (Foto del Usuario)
    * @param $id_Centro (Centro de Formacion del Usuario)
    * @param $id_Programa (Programa de Formacion del Usuario)
    * @param $id_Regional (Regional SENA del Usuario)
    * @param $numeroFicha_Usuario (Numero de Ficha del Usuario
    */
    public function editarU($id_Usuario, $nombres_Usuario, $id_TipoDoc, $apellidos_Usuario, $telefono_Usuario, $celular_Usuario, $email_Usuario, $id_Ciudad, $foto_Usuario, $id_Centro, $id_Programa, $id_Regional, $numeroFicha_Usuario)
    {
      $this-> usuario-> setUsuario('id_Usuario', $id_Usuario);
      $this-> usuario-> setUsuario('nombres_Usuario', $nombres_Usuario);
      $this-> usuario-> setUsuario('id_TipoDoc', $id_TipoDoc);
      $this-> usuario-> setUsuario('apellidos_Usuario', $apellidos_Usuario);
      $this-> usuario-> setUsuario('telefono_Usuario', $telefono_Usuario);
      $this-> usuario-> setUsuario('celular_Usuario', $celular_Usuario);
      $this-> usuario-> setUsuario('email_Usuario',$email_Usuario);
      $this-> usuario-> setUsuario('id_Ciudad', $id_Ciudad);
      $this-> usuario-> setUsuario('foto_Usuario', $foto_Usuario);
      $this-> usuario-> setUsuario('id_Centro', $id_Centro);
      $this-> usuario-> setUsuario('id_Programa', $id_Programa);
      $this-> usuario-> setUsuario('id_Regional', $id_Regional);
      $this-> usuario-> setUsuario('numeroFicha_Usuario', $numeroFicha_Usuario);

      $this-> usuario-> editarUsuario();
    }

    /**
    * Desactiva un Usuario del Sistema por irregularidad de Asistencia al Gimnasio
    * @param $estado_Usuario (Estado del Usuario en el gimnasio)
    * @param $numeroId_Usuario (Identificacion del Usuario)
    *
    */
    public function desactivarU($numeroId_Usuario, $estado_Usuario)
    {
      $this-> usuario-> setUsuario('numeroId_Usuario', $numeroId_Usuario);
      $this-> usuario-> setUsuario('estado_Usuario', $estado_Usuario);

      $this-> usuario-> desactivarUsuario();
    }

    public function evaluacionU($id_Usuario)
    {
      $existeEvaluacion = $this-> usuario-> evaluacionUsuario($id_Usuario);
      return $existeEvaluacion;
    }

    public function asistenciaU($id_Usuario)
    {
      $asistenciaRegistrada = $this-> usuario-> asistenciaUsuario($id_Usuario);
      return $asistenciaRegistrada;
    }

    public function obtenerId($numeroId_Usuario)
    {
      $id_Usuario = $this-> usuario-> obtenerIdUsuario($numeroId_Usuario);
      return $id_Usuario;
    }

    public function obtenerDoc($id_Usuario)
    {
      $numeroId_Usuario = $this-> usuario-> obtenerDocUsuario($id_Usuario);
      return $numeroId_Usuario;
    }

    public function cambiarRolUsuario($id_Usuario, $id_Rol)
    {
      $this-> usuario-> setUsuario('id_Usuario', $id_Usuario);
      $this-> usuario-> setUsuario('id_Rol', $id_Rol);
      $this-> usuario-> cambiarRol();
    }
}

?>
