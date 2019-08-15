<?php
/**
* @author jefferson
*/
class ConexionRutina
{
  //Atributos
  private $host;//Servidor
  private $user;//Usuario de MySQL
  private $pass;//Contraseña de MySQL
  private $bd;//Nombre de la BD
  private $conexion;//Guarda la Conexion

  //Metodos
  public function __construct()
  {
    //Asignacion de Valores de los Atributos de Configuracion de MySQL
    $this-> host = "localhost";
    $this-> user = "root";
    $this-> pass = "";
    $this-> bd = "bd_sofit";

    //Envia los 4 Parametros en la funcion mysqli_connect
    $this-> conexion = mysqli_connect($this-> host, $this-> user, $this-> pass, $this-> bd);
    if (mysqli_connect_errno()) {//Se ejecuta si hay algun problema con los datos de conexion
      echo "Fallo al Conectar con la Base de Datos";
      exit();
    }
   }


  /**
  * Realiza cualquier sentencia sql
  * @param $sql (Sentencia SQL)
  */
  public function consultaSimple($sql){
    mysqli_query($this-> conexion, $sql);
  }


  /**
  * Retorna el resultado de la Consulta sql
  * @param String $sql (Sentencia SQL)
  * @return ResultSet $consulta (ResulSet)
  */
  public function consultaRetorno($sql){
    $consulta = mysqli_query($this-> conexion, $sql);
    return $consulta;
  }
}

 ?>
