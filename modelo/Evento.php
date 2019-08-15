<?php
  //Incluir la Clase Conexion
  include_once('Conexion.php');

 /**
  * @author Daniela Camacho, David Sánchez, Eduardo Martínez
  * Ed: 2018-02-20
  **/

 class Evento
 {
   //Atributos de la Tabla Evento
   private $id_Evento;
   private $codigo_Evento;
   private $nombre_Evento;
   private $descripcion_Evento;
   private $hora_Evento;
   private $fecha_Evento;
   private $id_Usuario;
   private $foto_Evento;
   private $estado_Evento;
   private $conex;//Permite Instanciar la Clase Conexion


  /**
  * Constructor de la Clase Evento
  */
   public function __construct()
   {
     $this-> conex = new Conexion();
   }


   //Set & Get
   /**
   * Establece cualquier Atributos de la Clase Evento
   * @param $atributo (Nombre del Atributo)
   * @param $contenido (Valor asignado al Atributo)
   */
   public function setEvento($atributo, $contenido){
     $this-> $atributo = $contenido;
   }


   /**
   * Devuelve cualquier Atributo de la Clase Evento
   * @param $atributo (Nombre del Atributo)
   */
   public function getEvento($atributo){
     return $this-> $atributo;
   }


   /**
   * Lista todos los registros de la tabla Evento
   * @return $resultado (Resultado de la Consulta SQL)
   */
   public function listarEvento()
   {
     $sql = "SELECT * FROM evento";
     $resultado = $this-> conex-> consultaRetorno($sql);
     return $resultado;
   }
   /**
    * Obtiene la id del evento al que se le esta haciendo el control
    * @return $resultado (Resultado de la Consulta SQL)
    */

    public function obtenerEvento($id_AsistenciaEvento)
    {
      $sql = "SELECT e.id_Evento FROM asistenciaevento c
              JOIN evento e ON c.id_Evento = e.id_Evento
              WHERE c.id_AsistenciaEvento = $id_AsistenciaEvento";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }


   //CRUD
   /**
   * Crea un registro en la tabla Evento
   * Valida si el nombre del evento que se va a ingresar no exista en la BD
   *  @return Boolean false (Si existen Conincidencias de numeroDocumento en la tabla Evento)
   */
   public function crearEvento(){
     //Consulta en la Tabla Evento con el nombre del evento que se va a registrar
     $sqlValidador = "SELECT * FROM evento WHERE nombre_Evento = '{$this-> nombre_Evento}'";
     $resultado = $this-> conex->consultaRetorno($sqlValidador);
     //$coincidencias guarda el numero de filas del resulset ($resultado)
     $coincidencias = mysqli_num_rows($resultado);

     if ($coincidencias == 0) {
       $sql = "INSERT INTO evento (codigo_Evento,
                                    nombre_Evento,
                                    descripcion_Evento,
                                    hora_Evento,
                                    fecha_Evento,
                                    id_Usuario,
                                    foto_Evento,
                                    estado_Evento
                                  )
                VALUES ('{$this-> codigo_Evento}',
                        '{$this-> nombre_Evento}',
                        '{$this-> descripcion_Evento}',
                        '{$this-> hora_Evento}',
                        '{$this-> fecha_Evento}',
                        '{$this-> id_Usuario}',
                        '{$this-> foto_Evento}',
                        '{$this-> estado_Evento}'
                      )";
        //Llama al Metodo consultaSimple para Ejecutar la Sentencia SQL
        $this-> conex-> consultaSimple($sql);
     }else {
       return true;
     }
   }


   /**
   * Permite Visualizar toda la informacion de un Evento
   * Requiere el ID de Evento para ver el registro especifico
   * @return $fila (Arreglo Asociativo con el Resultado de la Consulta)
   */
   public function verEvento()
   {
     $sql = "SELECT * FROM evento WHERE id_Evento = '{$this-> id_Evento}'";
     $resultado = $this-> conex-> consultaRetorno($sql);//Guarda el Resultado de la Consulta
     //Guarda una fila del Resulset(Tabla Virtual) en un array asociativo
     $fila = mysqli_fetch_assoc($resultado);

     //Asignacion de Atributos de la Tabla Evento
     $this-> id_Evento=            $fila['id_Evento'];
     $this-> nombre_Evento =       $fila['nombre_Evento'];
     $this-> descripcion_Evento =  $fila['descripcion_Evento'];
     $this-> hora_Evento =         $fila['hora_Evento'];
     $this-> fecha_Evento =        $fila['fecha_Evento'];
     $this-> id_usuario =          $fila['id_Usuario'];
     $this-> foto_Evento =         $fila['foto_Evento'];

     return $fila;
   }


   /**
   * Edita un Registro de la tabla Evento
   * Requiere el ID de Evento para aditar el registro especifico
   */
   public function editarEvento()
   {
     $sql = "UPDATE evento
            SET estado_Evento = '{$this-> estado_Evento}'
            WHERE id_Evento = '{$this-> id_Evento}'";
      $this-> conex-> consultaSimple($sql);
   }


   /**
   * Elimina un registro de la Tabla Evento
   * Requiere el ID de Evento para borrar el registro especifico
   */
   public function eliminarEvento()
   {
     $sql = "DELETE FROM evento WHERE id_Evento = '{$this-> id_Evento}'";
     $this-> conex-> consultaSimple($sql);
   }

   /**
   * Consulta sólo los eventos habilitados para registro de Asistencia
   * @return Resulset
   **/
   public function eventosActivos()
   {
     $sql = "SELECT e.id_Evento, e.nombre_Evento, e.fecha_Evento FROM evento e
             WHERE e.estado_Evento = 1";
     $resultado = $this-> conex-> consultaRetorno($sql);
     return $resultado;
   }

   /**
    * Actualiza informacion del evento
    * ed: 2018-03-17
    */
   public function actualizarEventos()
   {
      $sql = "UPDATE evento
              SET nombre_Evento = '{$this-> nombre_Evento}',
              descripcion_Evento = '{$this-> descripcion_Evento}',
              hora_Evento = '{$this-> hora_Evento}',
              fecha_Evento = '{$this-> fecha_Evento}',
              foto_Evento = '{$this-> foto_Evento}'
              WHERE id_Evento = '{$this-> id_Evento}'";
      $this-> conex-> consultaSimple($sql);
   }
 }
?>
