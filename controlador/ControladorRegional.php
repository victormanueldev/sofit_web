<?php
  include_once('Modelo/Regional.php');

  /**
   * @author Dayana Murillo
   */
  class ControladorRegional
  {
    private $regional;
    function __construct()
    {
      $this-> regional = new Regional();
    }

    /**
    * Permite Visualizar todos los datos de la tabla Regional
    * @return $resultado (Resultado de la Consulta SQL)
    */
    public function indexRegional()
    {
      $resultado = $this-> regional-> listarRegional();
      return $resultado;
    }

    public function obtenerRegional($numeroId_Usuario)
    {
      $nombreRegional = $this-> regional-> obtenerNombreRegional($numeroId_Usuario);
      return $nombreRegional;
    }
  }

?>
