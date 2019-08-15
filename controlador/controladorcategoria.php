<?php
  //Incluir la Clase UsuarioBD
  include_once('modelo/categoria.php');
  

  /**
   * @author Victor Manuel
   */
  class Controladorcategoria
  {
    //Atributos
    private $categoria;
  /**
    * Constructor del Controlador de Usuario
    */
    public function __construct()
    {
      $this-> categoria = new categoria();
    }


    /**
    * Permite Visualizar todos los datos de la tabla Usuario
    * @return $resultado (Resultado de la Consulta SQL)
    */
    public function indexCategoria()
    {
      $resultado = $this-> categoria-> listarCategoria();
      return $resultado;

    }
  }

?>
