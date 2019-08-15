<?php
  include_once('Conexion_rutina.php');
	include_once('Carbon.php');

  use Carbon\Carbon;

  /**
  * Esta clase representa la tabla de Rutinas de la BD
  * @author Jerfferson Cordoba
  * ed: 2018-02-22
  **/
  class Rutina
  {

    private $id_Rutina;
    private $nombre_Rutina;
	  private $fecha_Creacion;
	  private $fecha_Actualizacion;
    private $conex;

    public function __construct()
    {
      $this-> conex = new ConexionRutina();
    }

    public function setRutina($atributo, $contenido){
     $this-> $atributo = $contenido;
   }

    public function getRutina($atributo){
      return $this-> $atributo;
    }
    //usado//
    public function listarRutina()
    {
      $sql = "SELECT * FROM rutina WHERE nombre_Rutina='{$this-> nombre_Rutina}'";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }
     public function listarRutinaid()
    {
      $sql = "SELECT * FROM rutina WHERE id_Rutina='{$this-> id_Rutina}'";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }

    public function crearRutina()
    {
      $sql = "SELECT * FROM rutina WHERE nombre_Rutina = '{$this -> nombre_Rutina}'";
      $resultado = $this-> conex-> consultaRetorno($sql);
     //$coincidencias guarda el numero de filas del resulset ($resultado)
      $coincidencias = mysqli_num_rows($resultado);

      if ($coincidencias == 0) {
        $now = Carbon::now();//Retorna la fecha y la hora actual
        $fechaActual = $now->toDateString();//Toma solo la fecha actual
        $sql = "INSERT INTO rutina (nombre_Rutina, fecha_Creacion, fecha_Actualizacion)
                VALUES ('{$this-> nombre_Rutina}', '{$fechaActual}', '{$fechaActual}')";
        //Llama al Metodo consultaSimple para Ejecutar la Sentencia SQL
        $this-> conex-> consultaSimple($sql);
      }else {
         return true;
      }
    }
    public function modificarRutinaNom()
    {
      $now = Carbon::now();//Retorna la fecha y la hora actual
      $fechaActual = $now->toDateString();//Toma solo la fecha actual
      $sql = "UPDATE rutina SET
                nombre_Rutina = '{$this->nombre_Rutina}',
                fecha_Actualizacion = '{$fechaActual}'
                WHERE rutina.id_Rutina = '{$this-> id_Rutina}' ";
      $resultado = $this-> conex-> consultaSimple($sql);
      if ($resultado) {

        return true;
      } else {
        return false;
      }

    }

    public function ejerciciosDeRutina()
    {
      $sql = "SELECT e.id_Ejercicio, e.nombre_Ejercicio, e.foto_Ejercicio, c.nombre_Categoria, re.series, re.repeticiones,re.tiempo, re.dia
      FROM rutina_ejercicio re JOIN ejercicio e ON re.id_Ejercicio= e.id_Ejercicio
      JOIN categoria c ON e.id_Categoria= c.id_Categoria WHERE re.id_Rutina='{$this-> id_Rutina}'";

      $resultado = $this-> conex-> consultaRetorno($sql);
      $exito = mysqli_num_rows($resultado);
      if ($exito>0) {
         return $resultado;
      } else {
        $resultado=false;
        return $resultado;
      }
    }

     public function consultarRutinaNom()
    {
      $sql = "SELECT * FROM rutina WHERE nombre_Rutina = '{$this-> nombre_Rutina}'";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }

    public function eliminarRutina()
    {
      $sql = "DELETE FROM rutina WHERE id_Rutina= '{$this-> id_Rutina}'";
              $this-> conex-> consultaSimple($sql);

    }

    /**
    * Consulta los datos de la rutina de un usuario especifico
    * @author Victor Manuel
    * @param id_Usuario
    * @return ResulSet o Boolean
    **/
    public function rutinaUsaurio($id_Usuario)
    {
      $sql = "SELECT
                e.nombre_Ejercicio,
                e.foto_Ejercicio,
                re.series,
                re.repeticiones,
                re.tiempo,
                re.dia
              FROM rutina_ejercicio re
              JOIN ejercicio e ON re.id_Ejercicio= e.id_Ejercicio
              JOIN categoria c ON e.id_Categoria= c.id_Categoria
              JOIN rutina r ON r.id_Rutina = re.id_Rutina
              JOIN usuario_rutina ur ON ur.id_Rutina = r.id_Rutina
              JOIN usuario u ON u.id_Usuario = ur.id_Usuario
              WHERE u.id_Usuario= $id_Usuario";

      $resultado = $this-> conex-> consultaRetorno($sql);
      $exito = mysqli_num_rows($resultado);
      if ($exito>0) {
         return $resultado;
      } else {
        $resultado=false;
        return $resultado;
      }
    }

    /**
    * Este metodo consulta datos especificos de la rutina del usuario
    * @author Victor Manuel
    * @param id_Usuario
    * @return ResultSet
    **/
    public function consultarDatosRutina($id_Usuario)
    {
      $sql = "SELECT
              r.nombre_Rutina,
              r.fecha_Creacion,
              r.fecha_Actualizacion,
              c.nombre_Categoria
            FROM rutina_ejercicio re
            JOIN ejercicio e ON re.id_Ejercicio= e.id_Ejercicio
            JOIN categoria c ON e.id_Categoria= c.id_Categoria
            JOIN rutina r ON r.id_Rutina = re.id_Rutina
            JOIN usuario_rutina ur ON ur.id_Rutina = r.id_Rutina
            JOIN usuario u ON u.id_Usuario = ur.id_Usuario
            WHERE u.id_Usuario= $id_Usuario LIMIT 1";

      $resultado = $this-> conex-> consultaRetorno($sql);
      $exito = mysqli_num_rows($resultado);
      if ($exito>0) {
         return $resultado;
      } else {
        $resultado=false;
        return $resultado;
      }
    }

    /**
    * Valida si el usuario tiene una rutina asignada
    * @author Victor Manuel
    * @param id_Usuario
    * @return Boolean
    **/
    public function rutinaExiste($id_Usuario)
    {
      $sql = "SELECT ur.id_Rutina FROM usuario_rutina ur
              JOIN usuario u ON u.id_Usuario = ur.id_Usuario
              WHERE ur.id_Usuario = $id_Usuario";

      $resultado = $this-> conex-> consultaRetorno($sql);
      $numrows = mysqli_num_rows($resultado);
      if ($numrows!=0) {
         return true;
      } else {
        return false;
      }
    }
  }
?>
