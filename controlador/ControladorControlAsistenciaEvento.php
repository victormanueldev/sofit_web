<?php
  //Incluir la Clase ControlAsistenciaEvento
  include_once('Modelo/ControlAsistenciaEvento.php');
  include_once('Modelo/Usuario.php');
  include_once('Modelo/Evento.php');
  /**
   * @author Daniela Camacho, Jorge Eduardo Martínez, José David Sánchez
   */
  class ControladorControlAsistenciaEvento
  {
    //Atributos
    private $ControlAsistenciaEvento;
    //private $Usuario;
    private $Evento;

    /**
    * Constructor del Controlador de ControlAsistenciaEvento
    */
    public function __construct()
    {
      $this-> ControlAsistenciaEvento = new ControlAsistenciaEvento();
      //$this-> Usuario = new Usuario();
      $this-> Evento = new Evento();
    }


    /**
    * Permite Visualizar todos los datos de la tabla ControlAsistenciaEvento
    * @return $resultado (Resultado de la Consulta SQL)
    */
    public function indexControlAsistenciaEvento()
    {
      $resultado = $this-> ControlAsistenciaEvento-> listarControlAsistenciaEvento();
      return $resultado;
    }
     /**
    * Permite Visualizar todos los datos de la tabla Usuario
    * @return $resultado (Resultado de la Consulta SQL)
    */
    //public function indexUsuario()
    //{
    //  $resultado = $this-> Usuario-> listarUsuario();
    //  return $resultado;
    //}

    /**
    * Permite Visualizar todos los datos de la tabla evento
    * @return $resultado (Resultado de la Consulta SQL)
    */
    public function indexEvento()
    {
      $resultado = $this-> Evento-> listarEvento();
      return $resultado;
    }



    /**
    * Permite Crear un ControlAsistenciaEvento desde la Vista(Registrar)
    * @param $nombres_Usuario (Nombre de usuario)
    * @param $cedula_Usuario (Cedula del Usuario)
    * @param $rol (rol del Usuario)
    * @param $calificacion_Evento (Calificacion del evento)
    * @param $id_Usuario (Usuario)
    * @param $id_Evento (Evento)
    * @return $resultado (Resultado de la Consulta SQL)
    * o False en caso de Error al intentar registrar el Usuario
    */
    public function crearCAE($id_Evento, $id_Usuario, $nombresAsistente, $rolAsistente, $calificacion)
    {
      //Set de Atributos de la Clase ControlAsistenciaEvento
      #El primer parametro debe ser escrito de la misma forma que el Atributo de la Clase Usuario
      $this-> ControlAsistenciaEvento-> setControlAsistenciaEvento('id_Evento',$id_Evento);
      $this-> ControlAsistenciaEvento-> setControlAsistenciaEvento('id_Usuario', $id_Usuario);
      $this-> ControlAsistenciaEvento-> setControlAsistenciaEvento('nombresAsistente', $nombresAsistente);
      $this-> ControlAsistenciaEvento-> setControlAsistenciaEvento('rolAsistente', $rolAsistente);
      $this-> ControlAsistenciaEvento-> setControlAsistenciaEvento('calificacion',$calificacion);


      $resultado = $this-> ControlAsistenciaEvento-> crearControlAsistenciaEvento();
      return $resultado;
    }


    /**
    * Permite Visualizar la informacion de ControlAsistenciaEvento
    * @param $id (ID de ControlAsistenciaEvento a Visualizar)
    * @return $datos (Array Asociativo con la informacion del registro)
    */
    public function verCAE($id_AsistenciaEvento)
    {
      $this-> ControlAsistenciaEvento-> setControlAsistenciaEvento('id_AsistenciaEvento', $id_AsistenciaEvento);
      $datos = $this-> ControlAsistenciaEvento-> verControlAsistenciaEvento();
      return $datos;
    }

     /**
    * Obtiene la cedula del Usuario especifico
    * @param $cedula_Usuario (Numero de Documento del Usuario)
    * @return
    */
    //public function obtenerUsuario($cedula_Usuario)
    //{
    //  $cedula_Usuario = $this-> Usuario-> obtenerUsuarioC($cedula_Usuario);
    //  return $cedula_Usuario;
    //}

    /**
    * Obtiene el id del Evento
    * @param $cedula_Usuario (Numero de Documento del Usuario)
    * @return $nombreCentro (Nombre de la Centro del Usuario)
    */
    public function obtenerEvento($id_AsistenciaEvento)
    {
      $id_Evento = $this-> Evento -> obtenerEvento($id_AsistenciaEvento);
      return $id_Evento;
    }


    /**
    * Permite Editar ControlAsistenciaEvento desde la Vista(Registrar)
    * @param $nombres_Usuario (Nombre de usuario)
    * @param $rol (rol del Usuario)
    * @param $calificacion_Evento (Calificacion del evento)
    * @param $id_Evento (Evento)
    */
    public function editarCAE($id_AsistenciaEvento, $nombresAsistente, $rolAsistente, $calificacion)
    {
      $this-> ControlAsistenciaEvento-> setControlAsistenciaEvento('id_AsistenciaEvento',$id_AsistenciaEvento);
      $this-> ControlAsistenciaEvento-> setControlAsistenciaEvento('nombresAsistente',$nombresAsistente);
      $this-> ControlAsistenciaEvento-> setControlAsistenciaEvento('rolAsistente',$rolAsistente);
      $this-> ControlAsistenciaEvento-> setControlAsistenciaEvento('calificacion',$calificacion);

      $this-> ControlAsistenciaEvento-> editarControlAsistenciaEvento();
    }


    public function validarCodigo($codigo_Evento)
    {
      $resultado = $this-> ControlAsistenciaEvento-> validarCodigoEvento($codigo_Evento);
      return $resultado;
    }
    
    /**
    * Elimina un Registro especifico de la Tabla ControlAsistenciaEvento
    * @param $id_Asis_Evento (ID del ControlAsistenciaEvento)
    *
    *public function eliminarCAE($id_Asis_Evento)
    *{
    *   $this-> ControlAsistenciaEvento-> setControlAsistenciaEvento('id_Asis_Evento', $id_Asis_Evento);
    *   $this-> ControlAsistenciaEvento-> eliminarControlAsistenciaEvento();
    *}
    */
  }

?>
