<?php
/**
* Esta clase permite la conexion a la BD Mysql
* @author Victor Manuel
* 2017/10/24
* Ed: 2018/02/17
*/

class Conexion 
{
  //Atributos
  private $host;//Servidor
  private $user;//Usuario de MySQL
  private $pass;//Contraseña de MySQL
  private $bd;//Nombre de la BD
  public $conexion;//Guarda la Conexion

  //Metodos
  public function __construct()
  {
    //Asignacion de Valores de los Atributos de Configuracion de MySQL
    $this-> host = "localhost";
    $this-> user = "root";
    $this-> pass = "";
    $this-> bd = "bd_sofit";

    //Envia los 4 Parametros en la funcion mysqli_connect
    $this-> conexion = new mysqli($this-> host, $this-> user, $this-> pass, $this-> bd);
    if (mysqli_connect_errno()) {//Se ejecuta si hay algun problema con los datos de conexion
      echo "Fallo al Conectar con la Base de Datos";
      exit();
    }
   }


  /**
  * Realiza cualquier sentencia sql
  * @param $sql (Sentencia SQL)
  */
  public function consultaSimple($sql)
  {
    $consulta = $this-> conexion->prepare($sql);
    $consulta->execute();
    $consulta->close();
    $this-> conexion->close();
  }


  /**
  * Retorna el resultado de la Consulta sql
  * @param String $sql (Sentencia SQL)
  * @return ResultSet (ResulSet)
  */
  public function consultaRetorno($sql)
  {
    $consulta = $this-> conexion->prepare($sql);
    $consulta->execute();
    $result = $consulta->get_result();
    return $result;
    $consulta->close();
    $this-> conexion->close();
  }
}

?>
