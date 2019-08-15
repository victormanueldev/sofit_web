<?php
  //Incluir la Clase Evento
  include_once('Modelo/Evento.php');
  include_once('Modelo/Usuario.php');

  /**
   * @author Daniela Camacho, Jorge Eduardo Martinez, José David Sánchez
   * Ed: 2018-02-20
   */
  class ControladorEvento
  {
    //Atributos
    private $Evento;
    private $Usuario;


    /**
    * Constructor del Controlador de Evento
    */
    public function __construct()
    {
      $this-> Evento = new Evento();
      $this-> Usuario = new Usuario();
    }


    /**
    * Permite Visualizar todos los datos de la tabla Evento
    * @return $resultado (Resultado de la Consulta SQL)
    */
    public function indexEvento()
    {
      $resultado = $this-> Evento-> listarEvento();
      return $resultado;
    }

    public function indexUsuario()
    {
      $resultado = $this-> Usuario-> listarUsuario();
      return $resultado;
    }


    /**
    * Permite Crear un Evento desde la Vista(Registrar)
    * @param $fecha_Evento (Fecha del Evento)
    * @param $hora_Evento (Hora del Evento)
    * @param $nombre_Evento (Nombre del Evento)
    * @param $desc_Evento (Descripción del Evento)
    * @param $encargado_Evento (Encargado del Evento)
    * @param $id_Usuario (Usuario)
    * o False en caso de Error al intentar registrar el Evento
    */
    public function crearE($codigo_Evento, $nombre_Evento, $descripcion_Evento, $hora_Evento, $fecha_Evento, $id_Usuario, $foto_Evento, $estado)
    {
      //Set de Atributos de la Clase Evento
      #El primer parametro debe ser escrito de la misma forma que el Atributo de la Clase Evento
      $this-> Evento-> setEvento('codigo_Evento', $codigo_Evento);
      $this-> Evento-> setEvento('nombre_Evento',$nombre_Evento);
      $this-> Evento-> setEvento('descripcion_Evento', $descripcion_Evento);
      $this-> Evento-> setEvento('hora_Evento', $hora_Evento);
      $this-> Evento-> setEvento('fecha_Evento', $fecha_Evento);
      $this-> Evento-> setEvento('id_Usuario',$id_Usuario);
      $this-> Evento-> setEvento('foto_Evento', $foto_Evento);
      $this-> Evento-> setEvento('estado_Evento', $estado);

      $resultado = $this-> Evento-> crearEvento();
      return $resultado;
    }


    /**
    * Permite Visualizar la informacion del Evento
    * @param $id (ID del Evento a Visualizar)
    * @return $datos (Array Asociativo con la informacion del registro)
    */
    public function verE($id_Evento)
    {
      $this-> Evento-> setEvento('id_Evento', $id_Evento);
      $datos = $this-> Evento-> verEvento();
      return $datos;
    }


    public function obtenerUsuario($id_Evento)
    {
      $numeroId_Usuario = $this-> Usuario-> obtenerUsuario($id_Evento);
      return $numeroId_Usuario;
    }




    /**
    * Permite Editar un Evento desde la Vista(Registrar)
    * @param $fecha_Evento (Fecha del Evento)
    * @param $hora_Evento (Hora del Evento)
    * @param $nombre_Evento (nombre del Evento)
    * @param $desc_Evento (Descripcion del Evento)
    * @param $encargado_Evento (Encargado del Evento)
    * @param $id_Usuario (Usuario)
    */
    public function editarE($id_Evento, $estado_Evento)
    {
      $this-> Evento-> setEvento('id_Evento', $id_Evento);
      $this-> Evento-> setEvento('estado_Evento', $estado_Evento);

      $this-> Evento-> editarEvento();
    }


    /**
    * Elimina un Registro especifico de la Tabla Evento
    * @param $id_Evento (ID del Evento)
    */
    public function eliminarE($id_Evento)
    {
      $this-> Evento-> setEvento('id_Evento', $id_Evento);
      $this-> Evento-> eliminarEvento();
    }

    /**
    * Consulta los eventos activos
    * @return Resulset
    **/
    public function eventosA()
    {
      $resultado = $this-> Evento-> eventosActivos();
      return $resultado;
    }

    /**
     * Recibe los parametros de la vista y los envia al modelo Evento
     * ed: 2018-03-17
     */
    public function actualizarE($id_Evento, $nombre_Evento, $descripcion_Evento, $hora_Evento, $fecha_Evento, $foto_Evento)
    {
      $this-> Evento-> setEvento('id_Evento', $id_Evento);
      $this-> Evento-> setEvento('nombre_Evento', $nombre_Evento);
      $this-> Evento-> setEvento('descripcion_Evento', $descripcion_Evento);
      $this-> Evento-> setEvento('hora_Evento', $hora_Evento);
      $this-> Evento-> setEvento('fecha_Evento', $fecha_Evento);
      $this-> Evento-> setEvento('foto_Evento', $foto_Evento);

      $this-> Evento-> actualizarEventos();
    }

  }

?>
