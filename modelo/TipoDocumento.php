<?php
  //Incluir la Conexion
  include_once('Conexion.php');

  /**
   * @author Ketsia Romero
   */
  class TipoDocumento
  {
    //Atributos
    private $id_TipoDoc;
    private $desc_TipoDoc;
    private $conex;
    function __construct()
    {
      $this-> conex = new Conexion();
    }


    /**
    * Devuelve cualquier Atributo de la Clase TipoDocumento
    * @param $atributo (Nombre del Atributo)
    */
    public function getTipoDoc($atributo){
      return $this-> $atributo;
    }


    /**
    * Lista todos los registros de la tabla TipoDocumento
    * @return $resultado (Resultado de la Consulta SQL)
    */
    public function listarTipoDoc()
    {
      $sql = "SELECT * FROM TipoDocumento";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }

    public function obtenerTipoDocuemto($numeroId_Usuario)
    {
      $sql = "SELECT t.tipo_Documento FROM Usuario u
              JOIN TipoDocumento t ON u.id_TipoDocumento =  t.id_TipoDocumento
              WHERE u.numeroId_Usuario = $numeroId_Usuario";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }
  }


?>
