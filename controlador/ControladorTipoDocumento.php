<?php
  include_once('modelo/TipoDocumento.php');

  /**
   * @author Ketsia Romero
   */
  class ControladorTipoDocumento
  {
    private $tipoDocumento;
    function __construct()
    {
      $this-> tipoDocumento = new TipoDocumento();
    }

    /**
    * Permite Visualizar todos los datos de la tabla Tipo Documento
    * @return $resultado (Resultado de la Consulta SQL)
    */
    public function IndexTipoDoc()
    {
      $resultado = $this-> tipoDocumento-> listarTipoDoc();
      return $resultado;
    }

    public function ObtenerTipoDoc($numeroId_Usuario)
    {
      $tipoDoc = $this-> tipoDocumento-> obtenerTipoDocuemto($numeroId_Usuario);
      return $tipoDoc;
    }

  }

?>
