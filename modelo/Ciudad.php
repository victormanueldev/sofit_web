<?php
  //Incluir la Conexion
  include_once('Conexion.php');
  /**
   * @author Karen Noguera
   */
  class Ciudad
  {
    //Atributos
    private $id_Ciudad;
    private $nombre_Ciudad;
    private $conex;


    function __construct()
    {
      $this-> conex = new Conexion();
    }

    /**
    * Devuelve cualquier Atributo de la Clase Ciudad
    * @param $atributo (Nombre del Atributo)
    */
    public function getCiudad($atributo){
      return $this-> $atributo;
    }


    /**
    * Lista todos los registros de la tabla Ciudad
    * @return $resultado (Resultado de la Consulta SQL)
    */
    public function listarCiudad()
    {
      $sql = "SELECT * FROM Ciudad";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }

    /**
    * Obtiene el Nombre de la Ciudad de un Usuario especifico
    * @return $resultado (Resultado de la Consulta SQL)
    */
    public function obtenerNombreCiudad($numeroId_Usuario)
    {
      $sql = "SELECT c.nombre_Ciudad FROM Usuario u
              JOIN Ciudad c ON u.id_Ciudad = c.id_Ciudad
              WHERE u.numeroId_Usuario = $numeroId_Usuario";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }
  }

 ?>
