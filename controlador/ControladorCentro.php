<?php
  include_once('Modelo/Centro.php');
  /**
   * @author Karen Noguera
   */
  class ControladorCentro
  {
    private $centro;

    function __construct()
    {
      $this-> centro = new Centro();
    }

    public function indexCentro()
    {
      $resultado = $this-> centro-> listarCentro();
      return $resultado;
    }

    public function obtenerCentro($numeroId_Usuario)
    {
      $nombreCentro = $this-> centro-> obtenerNombreCentro($numeroId_Usuario);
      return $nombreCentro;
    }
  }



?>
