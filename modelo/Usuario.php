<?php
  //Incluir la Clase Conexion
  include_once('Conexion.php');

 /**
  * Modelo del Usuario en la Base de Datos
  * @author Victor Manuel
  * 2017/10/22
  * ed: 2018/02/17
  */
 class Usuario
 {
   //Atributos de la Tabla Usuario
   private $id_Usuario;
   private $id_TipoDoc;
   private $numeroId_Usuario;
   private $nombres_Usuario;
   private $apellidos_Usuario;
   private $genero_Usuario;
   private $telefono_Usuario;
   private $celular_Usuario;
   private $email_Usuario;
   private $fechaNacimiento_Usuario;
   private $foto_Usuario;
   private $password;
   private $last_session;
   private $token;
   private $token_password;
   private $password_request;
   private $activacion;
   private $id_Rol;
   private $id_Regional;
   private $id_Ciudad;
   private $id_Centro;
   private $id_Programa;
   private $cargo;
   private $numeroFicha_Usuario;

   private $conex;//Permite Instanciar la Clase Conexion


  /**
  * Constructor de la Clase Usuario
  */
   public function __construct()
   {
     $this-> conex = new Conexion();
   }


   //Set & Get
   /**
   * Establece cualquier Atributos de la Clase Usuario
   * @param $atributo (Nombre del Atributo)
   * @param $contenido (Valor asignado al Atributo)
   */
   public function setUsuario($atributo, $contenido){
     $this-> $atributo = $contenido;
   }


   /**
   * Devuelve cualquier Atributo de la Clase Usuario
   * @param $atributo (Nombre del Atributo)
   */
   public function getUsuario($atributo){
     return $this-> $atributo;
   }


   /**
   * Lista todos los registros de la tabla Usuario
   * @return $resultado (Resultado de la Consulta SQL)
   */
   public function listarUsuario()
   {
     $sql = "SELECT * FROM Usuario";
     $resultado = $this-> conex-> consultaRetorno($sql);
     return $resultado;
   }


   //CRUD
   /**
   * Crea un registro en la tabla Usuario
   * Valida si la cedula que se va a ingresar no exista en la BD
   *  @return Boolean false (Si existen Conincidencias de numeroDocumento en la tabla Usuario)
   */
   public function crearUsuario(){
     //Consulta en la Tabla Usuario con el numeroDocumento a registrar
     $sqlValidador = "SELECT * FROM Usuario WHERE numeroId_Usuario = '{$this-> numeroId_Usuario}'";
     $resultado = $this-> conex->consultaRetorno($sqlValidador);
     //$coincidencias guarda el numero de filas del resulset ($resultado)
     $coincidencias = mysqli_num_rows($resultado);

     if ($coincidencias == 0) {
       $sql = "INSERT INTO Usuario (id_TipoDocumento, numeroId_Usuario, nombres_Usuario, apellidos_Usuario, genero_Usuario, telefono_Usuario, celular_Usuario, email_Usuario, fechaNacimiento_Usuario, foto_Usuario, contrasena_Usuario, activacion, id_Rol, id_Regional, id_Ciudad, id_Centro, id_Programa, numeroFicha_Usuario)
                VALUES ('{$this-> id_TipoDoc}',
                        '{$this-> numeroId_Usuario}',
                        '{$this-> nombres_Usuario}',
                        '{$this-> apellidos_Usuario}',
                        '{$this-> genero_Usuario}',
                        '{$this-> telefono_Usuario}',
                        '{$this-> celular_Usuario}',
                        '{$this-> email_Usuario}',
                        '{$this-> fechaNacimiento_Usuario}',
                        '{$this-> foto_Usuario}',
                        '{$this-> contrasena_Usuario}',
                        '{$this-> activacion}',
                        '{$this-> id_Rol}',
                        '{$this-> id_Regional}',
                        '{$this-> id_Ciudad}',
                        '{$this-> id_Centro}',
                        '{$this-> id_Programa}',
                        '{$this-> numeroFicha_Usuario}')";
        //Llama al Metodo consultaSimple para Ejecutar la Sentencia SQL
        $this-> conex-> consultaSimple($sql);
     }else {
       return true;
     }
   }


   /**
   * Permite Visualizar toda la informacion de un Usuario
   * Requiere el ID de Usuario para ver el registro especifico
   * @return $fila (Arreglo Asociativo con el Resultado de la Consulta)
   */
   public function verUsuario()
   {
     $sql = "SELECT * FROM usuario WHERE id_Usuario = '{$this-> id_Usuario}'";
     $resultado = $this-> conex-> consultaRetorno($sql);//Guarda el Resultado de la Consulta
     //Guarda una fila del Resulset(Tabla Virtual) en un array asociativo
     $fila = mysqli_fetch_assoc($resultado);

     //Asignacion de Atributos de la Tabla Usuario
     $this-> id_Usuario =             $fila['id_Usuario'];
     $this-> numeroId_Usuario =       $fila['numeroId_Usuario'];
     $this-> id_TipoDoc =             $fila['id_TipoDocumento'];
     $this-> nombres_Usuario =        $fila['nombres_Usuario'];
     $this-> apellidos_Usuario =      $fila['apellidos_Usuario'];
     $this-> genero_Usuario =         $fila['genero_Usuario'];
     $this-> telefono_Usuario =       $fila['telefono_Usuario'];
     $this-> celular_Usuario =        $fila['celular_Usuario'];
     $this-> email_Usuario =          $fila['email'];
     $this-> id_Ciudad =              $fila['id_Ciudad'];
     $this-> foto_Usuario =           $fila['foto_Usuario'];
     $this-> id_Centro =              $fila['id_Centro'];
     $this-> id_Programa =            $fila['id_Programa'];
     $this-> id_Rol =                 $fila['id_Rol'];
     $this-> id_Regional =            $fila['id_Regional'];
     $this-> fechaNacimiento_Usuario= $fila['fechaNacimiento_Usuario'];
     $this-> cargo =                  $fila['cargo'];
     $this-> activacion=              $fila['activacion'];
     $this-> numeroFicha_Usuario=     $fila['numeroFicha_Usuario'];

     return $fila;
   }


   /**
   * Edita un Registro de la tabla Usuario
   * Requiere el ID de Usuario para aditar el registro especifico
   */
   public function editarUsuario()
   {
     $sql = "UPDATE usuario
            SET nombres_Usuario =     '{$this-> nombres_Usuario}',
                id_TipoDocumento=     '{$this-> id_TipoDoc}',
                apellidos_Usuario =   '{$this-> apellidos_Usuario}',
                telefono_Usuario =    '{$this-> telefono_Usuario}',
                celular_Usuario =     '{$this-> celular_Usuario}',
                email =               '{$this-> email_Usuario}',
                id_Ciudad =           '{$this-> id_Ciudad}',
                foto_Usuario =        '{$this-> foto_Usuario}',
                id_Centro =           '{$this-> id_Centro}',
                id_Programa =         '{$this-> id_Programa}',
                id_Regional =         '{$this-> id_Regional}',
                numeroFicha_Usuario=  '{$this-> numeroFicha_Usuario}'
            WHERE id_Usuario =  '{$this-> id_Usuario}'";
      $this-> conex-> consultaSimple($sql);
   }


   /**
   * Elimina un registro de la Tabla Estudiante
   * Requiere el ID de Estudiante para borrar el registro especifico
   */
   /*public function desactivarUsuario()
   {
     $sql = "UPDATE Usuario
             SET activacion = '{$this-> activacion}'
             WHERE id_Usuario = '{$this-> id_Usuario}'";
     $this-> conex-> consultaSimple($sql);
   }*/

   /**
   * Inidica que el usuario cuenta con la evaluacion antropometrica
   * @param $id_Usuario
   * @return Boolean
   **/
   public function evaluacionUsuario($id_Usuario)
   {
      $sql = "SELECT e.id_EvaluacionAntropometrica FROM evaluacionantropometrica e
            JOIN usuario u ON e.id_Usuario = u.id_Usuario
            WHERE e.id_Usuario = $id_Usuario";
      $resultado = $this-> conex-> consultaRetorno($sql);
      $numrows = mysqli_num_rows($resultado);
      if($numrows != 0){
        return true;
      } else {
        return false;
      }
   }

   /**
   * Indica si el usuario ha asistido al menos a 1 evento
   * @param $id_Usuario
   * @return Boolean
   **/
   public function asistenciaUsuario($id_Usuario)
   {
     $sql = "SELECT a.id_AsistenciaEvento FROM asistenciaevento a
           JOIN usuario u ON a.id_Usuario = u.id_Usuario
           WHERE a.id_Usuario = $id_Usuario";
     $resultado = $this-> conex-> consultaRetorno($sql);
     $numrows = mysqli_num_rows($resultado);
     if($numrows != 0){
       return true;
     } else {
       return false;
     }
   }

   /**
   * Obiene el numero de ID de usuario mediante el numero de identificacion
   * @param $numeroId_Usuario
   **/
   public function obtenerIdUsuario($numeroId_Usuario)
   {
     $sql = "SELECT id_Usuario, numeroId_Usuario FROM usuario WHERE numeroId_Usuario = $numeroId_Usuario";
     $resultado = $this-> conex-> consultaRetorno($sql);
     return $resultado;
   }

   /**
   * Obiene el numero de documento de usuario mediante el ID
   * @param $numeroId_Usuario
   **/
  public function obtenerDocUsuario($id_Usuario)
  {
    $sql = "SELECT numeroId_Usuario FROM usuario WHERE id_Usuario = $id_Usuario";
    $resultado = $this-> conex-> consultaRetorno($sql);
    return $resultado;
  }

   /**
    * Cambia el rol del Usuario en el sistema
    */
   public function cambiarRol()
   {
    $sql = "UPDATE usuario
            SET id_Rol = '{$this-> id_Rol}'
            WHERE id_Usuario = '{$this-> id_Usuario}'";
    $this-> conex-> consultaSimple($sql);
   }
}
?>
