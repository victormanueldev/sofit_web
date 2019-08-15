<?php

 include_once('Conexion_rutina.php');
 include_once('categoria.php');


  class Ejercicio
  {
    //Atributos
    private $id_Ejercicio;
    private $nombre_Ejercicio;
    private $foto_Ejercicio;
    private $id_Categoria;
    private $conex;


    function __construct()
    {
      $this-> conex = new ConexionRutina();
    }

    public function setejercicio($atributo, $contenido)
    {
     $this-> $atributo = $contenido;
    }

    public function getejercicio($atributo)
    {
      return $this-> $atributo;
    }

    public function listarEjercicio()
    {
      $sql = "SELECT * FROM ejercicio";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }

    public function crearEjercicio(){
      //Consulta en la Tabla ejercicio 
      $sqlValidador = "SELECT * FROM ejercicio WHERE nombre_Ejercicio = '{$this-> nombre_Ejercicio}'";
      $resultado = $this-> conex->consultaRetorno($sqlValidador);
      //$coincidencias guarda el numero de filas del resulset ($resultado)
      $coincidencias = mysqli_num_rows($resultado);
      if ($coincidencias == 0) {
          $sql = "INSERT INTO ejercicio (
                                      nombre_Ejercicio,
                                      foto_Ejercicio,
                                      id_Categoria)
          VALUES   (
                          '{$this-> nombre_Ejercicio}',
                          '{$this-> foto_Ejercicio}',           
                          '{$this-> id_Categoria}')";
          //Llama al Metodo consultaSimple para Ejecutar la Sentencia SQL
          $this-> conex-> consultaSimple($sql);
        }else {
          return true;
        }
    }   

    public function listarEjercicioCategoria()
    {
      $sql = "SELECT e.id_Ejercicio, e.nombre_Ejercicio,e.foto_Ejercicio, c.nombre_Categoria
      FROM ejercicio e JOIN categoria c ON e.id_Categoria= c.id_Categoria";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }
    public function obtenerEjercicio()
    {
      $sql = "SELECT * FROM ejercicio where id_Ejercicio ='{$this->id_Ejercicio}' ";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }

  }

 ?>
