<?php
  include_once('Conexion_rutina.php');


  class ruti_Ejer
  {
    private $id_Rutina;
    private $id_Ejercicio;
    private $series;
    private $repeticiones;
    private $tiempo;
    private $dia;
    private $conex;

    function __construct(){
      $this-> conex = new ConexionRutina();
    }

    public function setRutiejer($atributo, $contenido){
      $this-> $atributo = $contenido;
    }

    public function getRutiEjer($atributo){
      return $this-> $atributo;
    }
     public function  idEjercicio()
    {
      $sql="SELECT id_Ejercicio FROM rutina_ejercicio WHERE id_Rutina='{$this->id_Rutina}'";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }

    public function ejercicioRutina()
    {
      $sql="SELECT e.id_Ejercicio, e.nombre_Ejercicio, e.foto_Ejercicio, re.series, re.repeticiones, re.tiempo FROM rutina_ejercicio re JOIN ejercicio e ON re.id_Ejercicio=e.id_Ejercicio WHERE id_Rutina='{$this->id_Rutina}'";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }
    public function crearRutinaEjercicio()
    {

          $sql="INSERT INTO rutina_ejercicio (id_Rutina, id_Ejercicio, series, repeticiones, tiempo, dia)
                        VALUES ('{$this-> id_Rutina}',
                              '{$this-> id_Ejercicio}',
                              '{$this-> series}',
                              '{$this-> repeticiones}',
                              '{$this-> tiempo}',
                              '{$this-> dia}')";
          $this-> conex-> consultaSimple($sql);
    }

      public function listarEjercicios(){

      $sql="SELECT * FROM rutina_ejercicio WHERE  id_Rutina='{$this-> id_Rutina }' AND id_Ejercicio ='{$this-> id_Ejercicio }' ";

      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;



     }


     public function modificarSeries()
     {
      $sql=" UPDATE rutina_ejercicio SET series='{$this-> series}' WHERE id_Rutina='{$this-> id_Rutina}' AND id_Ejercicio='{$this-> id_Ejercicio}'";
      $resultado = $this-> conex-> consultaSimple($sql);
      return $resultado;
     }
     public function modificarRepeticiones()
     {
      $sql=" UPDATE rutina_ejercicio SET repeticiones='{$this-> repeticiones}' WHERE id_Rutina='{$this-> id_Rutina}' AND id_Ejercicio='{$this-> id_Ejercicio}'";
      $resultado = $this-> conex-> consultaSimple($sql);
      return $resultado;
     }
     public function modificarTiempo()
     {
      $sql=" UPDATE rutina_ejercicio SET tiempo='{$this-> tiempo }' WHERE id_Rutina='{$this-> id_Rutina}' AND id_Ejercicio='{$this-> id_Ejercicio}'";
      $resultado = $this-> conex-> consultaSimple($sql);
      return $resultado;
     }

     public function modificarDias()
     {
       $sql=" UPDATE rutina_ejercicio SET dia='{$this-> dia }' WHERE id_Rutina='{$this-> id_Rutina}' AND id_Ejercicio='{$this-> id_Ejercicio}'";
       $resultado = $this-> conex-> consultaSimple($sql);
       return $resultado;
     }

     public function eliminarEjercicio()
     {

      $sql=" DELETE FROM rutina_ejercicio WHERE id_Rutina='{$this-> id_Rutina}' AND id_Ejercicio='{$this-> id_Ejercicio}'";
      $resultado = $this-> conex-> consultaSimple($sql);
      return $resultado;
     }

      public function contarEjercicios()
     {
      $sql="SELECT * FROM rutina_ejercicio WHERE id_Rutina='{$this-> id_Rutina}'";
      $resultado = $this-> conex-> consultaRetorno($sql);
      $numerofilas = mysqli_num_rows($resultado);
      return  $numerofilas;

     }
    public function cantidadEjercicios()
     {
      $sql="SELECT COUNT(*) FROM rutina_ejercicio WHERE id_Rutina='{$this-> id_Rutina}'";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return  $resultado;
    }

  }

?>
