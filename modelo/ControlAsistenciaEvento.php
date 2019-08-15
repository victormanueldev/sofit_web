<?php
  //Incluir la Clase Conexion
  include_once('Conexion.php');


 /**
  * @author Daniela Camacho, David Sánchez, Eduardo Martínez
  */
 class ControlAsistenciaEvento
 {
   //Atributos de la Tabla Asistencia_Evento
   private $id_AsistenciaEvento;
   private $id_Evento;
   private $id_Usuario;
   private $nombresAsistente;
   private $rolAsistente;
   private $calificacion;


   private $conex;//Permite Instanciar la Clase Conexion


  /**
  * Constructor de la Clase ControlAsistenciaEvento
  */
   public function __construct()
   {
     $this-> conex = new Conexion();
   }


   //Set & Get
   /**
   * Establece cualquier Atributos de la Clase ControlAsistenciaEvento
   * @param $atributo (Nombre del Atributo)
   * @param $contenido (Valor asignado al Atributo)
   */
   public function setControlAsistenciaEvento($atributo, $contenido){
     $this-> $atributo = $contenido;
   }


   /**
   * Devuelve cualquier Atributo de la Clase ControlAsistenciaEvento
   * @param $atributo (Nombre del Atributo)
   */
   public function getControlAsistenciaEvento($atributo){
     return $this-> $atributo;
   }


   /**
   * Lista todos los registros de la tabla ControlAsistenciaEvento
   * @return $resultado (Resultado de la Consulta SQL)
   */
   public function listarControlAsistenciaEvento()
   {
     $sql = "SELECT * FROM asistenciaevento";
     $resultado = $this-> conex-> consultaRetorno($sql);
     return $resultado;
   }

   //CRUD
   /**
   * Crea un registro en la tabla ControlAsistenciaEvento
   */
   public function crearControlAsistenciaEvento(){
    //Consulta en la Tabla Evento si el evento esta habilitado para registar la asistencia
    $sqlValidador = "SELECT id_Evento FROM evento WHERE id_Evento = '{$this-> id_Evento}' AND estado_Evento = 1";
    $resultado = $this-> conex->consultaRetorno($sqlValidador);
    //$coincidencias guarda el numero de filas del resulset ($resultado)
    $coincidencias = mysqli_num_rows($resultado);
    if($coincidencias == 1){
      $sql = "INSERT INTO asistenciaevento (id_Evento,
                                            id_Usuario,
                                            nombresAsistente,
                                            rolAsistente,
                                            calificacion)
                                          VALUES ('{$this-> id_Evento}',
                                                  '{$this-> id_Usuario}',
                                                  '{$this-> nombresAsistente}',
                                                  '{$this-> rolAsistente}',
                                                  '{$this-> calificacion}')";

      //Llama al Metodo consultaSimple para Ejecutar la Sentencia SQL
      $this-> conex-> consultaSimple($sql);
      return true;
    }else{
      return false;
    }
  }

   /**
   * Permite Visualizar toda la informacion de un ControlAsistenciaEvento
   * Requiere el ID de Asis_Evento para ver el registro especifico
   * @return $fila (Arreglo Asociativo con el Resultado de la Consulta)
   */
   public function verControlAsistenciaEvento()
   {
     $sql = "SELECT * FROM asistenciaevento WHERE id_AsistenciaEvento = '{$this-> id_AsistenciaEvento}'";
     $resultado = $this-> conex-> consultaRetorno($sql);//Guarda el Resultado de la Consulta
     //Guarda una fila del Resulset(Tabla Virtual) en un array asociativo
     $fila = mysqli_fetch_assoc($resultado);

     //Asignacion de Atributos de la Tabla ControlAsistenciaEvento
     $this-> id_AsistenciaEvento=  $fila['id_AsistenciaEvento'];
     $this-> id_Evento =           $fila['id_Evento'];
     $this-> id_Usuario =          $fila['id_Usuario'];
     $this-> nombresAsistente =    $fila['nombresAsistente'];
     $this-> rolAsistente =        $fila['rolAsistente'];
     $this-> calificacion =        $fila['calificacion'];



     return $fila;
   }


   /**
   * Edita un Registro de la tabla ControlAsistenciaEvento
   * Requiere el ID de Asis_Evento para aditar el registro especifico
   */
   public function editarControlAsistenciaEvento()
   {
     $sql = "UPDATE asistenciaevento
            SET nombresAsistente =          '{$this-> nombresAsistente}',
                rolAsistente =              '{$this-> rolAsistente}',
                calificacion =              '{$this-> calificacion}'
                WHERE id_AsistenciaEvento = '{$this-> id_AsistenciaEvento}'";
      $this-> conex-> consultaSimple($sql);
   }

   public function validarCodigoEvento($codigo_Evento)
   {
     $sql = "SELECT id_Evento, estado_Evento FROM evento WHERE codigo_Evento = '$codigo_Evento'";
     $resultado = $this-> conex-> consultaRetorno($sql);
     $numrows = mysqli_num_rows($resultado);
     $fila = mysqli_fetch_assoc($resultado);
     if ($numrows != 0) {
       return $fila['id_Evento'];
     }else {
       return false;
     }
   }
   /**
   * Elimina un registro de la Tabla ControlAsistenciaEvento
   * Requiere el ID de Asis_Evento para borrar el registro especifico
     *
  * public function eliminarControlAsistenciaEvento()
  * {
  *   $sql = "DELETE FROM ControlAsistenciaEvento WHERE id_Asis_Evento = '{$this-> id_Asis_Evento}'";
   *  $this-> conex-> consultaSimple($sql);
  * }
   */
 }


?>
