<?php
  include_once('Modelo/Programa.php');
  /**
   * @author Dayana Murillo
   */
  class ControladorPrograma
  {
    private $programa;
    function __construct()
    {
      $this-> programa = new Programa();
    }

    /**
    * Permite Visualizar todos los datos de la tabla Programa
    * @return $resultado (Resultado de la Consulta SQL)
    */
    public function indexPrograma()
    {
      $resultado = $this-> programa-> listarPrograma();
      return $resultado;
    }


    /**
    * Obtiene el nombre del Programa
    * @param $numeroId_Usuario (Numero de Documento del Usuario)
    * @return $nombrePrograma (Nombre del programa del Usuario)
    */
    public function obtenerPrograma($numeroId_Usuario)
    {
      $nombrePrograma = $this-> programa-> obtenerNombrePrograma($numeroId_Usuario);
      return $nombrePrograma;
    }
  }

?>
