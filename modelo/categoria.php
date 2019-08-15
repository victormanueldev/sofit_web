<?php
  include_once('Conexion_rutina.php');

  class categoria
  {
    private $id_categoria;
    private $nombre_Categoria;
    private $conex;
    function __construct()
    {
      $this-> conex = new ConexionRutina();
    }

     public function setCategoria($atributo, $contenido)
    {
     $this-> $atributo = $contenido;
    }
    public function getCategoria($atributo){
      return $this-> $atributo;
    }


    public function listarCategoria()
    {
      $sql = "SELECT * FROM categoria";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }
     public function consultarCategoria()
    {
      $sql = "SELECT * FROM categoria where nombre_Categoria = '{$this -> nombre_Categoria}'";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }


  }


?>
