<?php
  include_once('Modelo/Ciudad.php');
  /**
   * @author Karen Noguera
   */
  class ControladorCiudad
  {
    private $ciudad;

    function __construct()
    {
      $this-> ciudad = new Ciudad();
    }

    public function indexCiudad()
    {
      $resul = $this-> ciudad-> listarCiudad();
      return $resul;
    }

    public function obtenerCiudad($numeroId_Usuario)
    {
      $nombreCiudad = $this-> ciudad-> obtenerNombreCiudad($numeroId_Usuario);
      return $nombreCiudad;
    }
  }



?>
