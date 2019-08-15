<?php
  include_once('Conexion.php');

  /**
   * @author Dayana Murillo
   */
  class Programa
  {
    private $id_Programa;
    private $nombre_Programa;
    private $conex;

    function __construct()
    {
      $this-> conex = new Conexion();
    }


    /**
    * Devuelve cualquier Atributo de la Clase Programa
    * @param $atributo (Nombre del Atributo)
    */
    public function getPrograma($atributo){
      return $this-> $atributo;
    }


    /**
    * Lista todos los registros de la tabla Programa
    * @return $resultado (Resultado de la Consulta SQL)
    */
    public function listarPrograma()
    {
      $sql = "SELECT * FROM Programa";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }



    public function obtenerNombrePrograma($numeroId_Usuario)
    {
      $sql = "SELECT p.nombre_Programa FROM Usuario u
              JOIN Programa p ON u.id_Programa = p.id_Programa
              WHERE u.id_Usuario = $numeroId_Usuario";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }
  }


?>
