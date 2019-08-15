<?php
  include_once('Conexion.php');

  /**
   * @author Karen Noguera
   */
  class Centro
  {
    private $id_Centro;
    private $nombre_Centro;
    private $conex;
    function __construct()
    {
      $this-> conex = new Conexion();
    }

    /**
    * Devuelve cualquier Atributo de la Clase Centro
    * @param $atributo (Nombre del Atributo)
    */
    public function getCentro($atributo){
      return $this-> $atributo;
    }


    /**
    * Lista todos los registros de la tabla Centro
    * @return $resultado (Resultado de la Consulta SQL)
    */
    public function listarCentro()
    {
      $sql = "SELECT * FROM Centro";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }

    public function obtenerNombreCentro($numeroId_Usuario)
    {
      $sql = "SELECT c.nombre_Centro FROM Usuario u
              JOIN Centro c ON u.id_Centro = c.id_Centro
              WHERE u.numeroId_Usuario = $numeroId_Usuario";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }
  }


?>
