<?php

  include_once('modelo/rutina.php');
  include_once('modelo/ejercicio.php');
  include_once('modelo/ruti_ejer.php');
  include_once('modelo/Usuario_rutina.php');
  include_once('modelo/usuario2_rutina.php');
  include_once('modelo/categoria.php');
  /**
  * Esta clase me permite utilizar todos los metodos de todas las clases (modelo)
  * que esten relacionadas en el modulo de rutinas
  * @author Jerfferson Cordoba
  * ed: 2018-02-22
  **/
  class ControladorRutina
  {
    //Atributos
    private $rutina;
    private $ejercicio;
    private $ruti_Ejer;
    private $Usuario_rutina;
    private $Usuario;
    private $categoria;

    public function __construct()
    {
      $this-> rutina         = new Rutina();
      $this-> ejercicio      = new Ejercicio();
      $this-> ruti_Ejer      = new ruti_Ejer();
      $this-> Usuario_rutina = new Usuario_Rutina();
      $this-> Usuario        = new usuario2_rutina();
      $this-> categoria      = new categoria();
    }

    public function indexRutina(){
      $resultado = $this-> Usuario_rutina-> rutinasUsuario();
      return $resultado;
    }

    public function eliminarRU(){

    }

    public function listarRutina($id_Rutina){
      $this-> rutina-> setRutina('id_Rutina',$id_Rutina);
      $resultado= $this-> rutina->listarRutina();
      return $resultado;

    }
    public function ejercicioRutina($id_Rutina){
      $this-> ruti_Ejer-> setRutiejer('id_Rutina',$id_Rutina);
      $resultado= $this-> ruti_Ejer-> ejercicioRutina();
      return $resultado;

    }

    public function crearRutina($nombre){
      $this-> rutina-> setRutina('nombre_Rutina',$nombre);

      $resultado= $this-> rutina-> crearRutina();
      return $resultado;

    }
    public function indexEjercicio()
    {
      $resultado = $this-> ejercicio-> listarEjercicioCategoria();
      return $resultado;
    }
     public function obtenerRutinaNom($nombre_Rutina)
    {
     $this-> rutina-> setRutina('nombre_Rutina', $nombre_Rutina);
     $resultado = $this-> rutina->consultarRutinaNom();
     return $resultado;
    }
    public function verusuario($numeroId_Usuario)
     {
      $this-> Usuario->setusuario('numeroId_Usuario', $numeroId_Usuario);
       $resultado = $this-> Usuario -> verusuario($numeroId_Usuario);
       return $resultado;
     }

    public function crearRutinaEjercicio($id_Rutina, $id_Ejercicio, $series, $repeticiones, $tiempo, $dia)
     {
        $this-> ruti_Ejer->setRutiejer('id_Rutina', $id_Rutina);
        $this-> ruti_Ejer->setRutiejer('id_Ejercicio', $id_Ejercicio);
        $this-> ruti_Ejer->setRutiejer('series', $series);
        $this-> ruti_Ejer->setRutiejer('repeticiones', $repeticiones);
        $this-> ruti_Ejer->setRutiejer('tiempo', $tiempo);
        $this-> ruti_Ejer->setRutiejer('dia', $dia);

      $resultado = $this-> ruti_Ejer->crearRutinaEjercicio();
      return $resultado;
     }
     public function obtenerEjercicio($id_Ejercicio)
    {
     $this-> ejercicio-> setejercicio('id_Ejercicio', $id_Ejercicio);
     $resultado = $this-> ejercicio->obtenerEjercicio();
     return $resultado;
    }
     public function crearUsuarioRutina( $id_Usuario ,  $id_Rutina)
     {
      $this-> Usuario_rutina->setUsuarioRutina('id_Usuario', $id_Usuario);
      $this-> Usuario_rutina->setUsuarioRutina('id_Rutina', $id_Rutina);
      $resultado = $this-> Usuario_rutina->crearUsuarioRutina();
      return $resultado;
     }
     public function consultarEjerciciosDeRutina($id_Rutina)
     {
      $this-> rutina -> setRutina('id_Rutina',$id_Rutina);
      $resultado= $this-> rutina -> ejerciciosDeRutina();
      return $resultado;
     }
      public function modificarRutinaNom($id_Rutina,$nombre_Rutina)
    {
     $this-> rutina-> setRutina('id_Rutina', $id_Rutina);
     $this-> rutina-> setRutina('nombre_Rutina', $nombre_Rutina);
     $resultado = $this-> rutina->modificarRutinaNom();
     return $resultado;
    }
     public function modificarRutinaDes($id_Rutina,$descripcion_Rutina)
    {
     $this-> rutina-> setRutina('id_Rutina', $id_Rutina);
     $this-> rutina-> setRutina('descripcion_Rutina', $descripcion_Rutina);
     $resultado = $this-> rutina->modificarRutinaDes();
     return $resultado;
    }
    public function usuarioConrutina($id_Usuario)
    {
      $this-> Usuario_rutina->setUsuarioRutina('id_Usuario', $id_Usuario);
      $resultado = $this-> Usuario_rutina -> rutinaDeUsuario();
      return $resultado;
    }

    /**
    * Utiliza el metodo de Consultar Rutina de un usuario especifico
    * @author Victor Manuel
    * @param id_Usuario
    * @return reultset o Boolen
    **/
    public function rutinaU($id_Usuario)
    {
      $resultado = $this-> rutina-> rutinaUsaurio($id_Usuario);
      return $resultado;
    }

    /**
    * Utiliza el metodo de Consultar dtos especificos Rutina de un usuario
    * @author Victor Manuel
    * @param id_Usuario
    * @return reultset o Boolen
    **/
    public function datosRutina($id_Usuario)
    {
      $resultado = $this-> rutina-> consultarDatosRutina($id_Usuario);
      return $resultado;
    }

    /**
    * Utiliza el metodo para validar si el usuario tiene asignada una rutina
    **/
    public function rutinaUsuarioExiste($id_Usuario)
    {
      $resultado = $this-> rutina-> rutinaExiste($id_Usuario);
      return $resultado;
    }

    public function cantidadEjercicios($id_Rutina)
    {
      $this-> ruti_Ejer->setRutiejer('id_Rutina',$id_Rutina);

      $resultado = $this-> ruti_Ejer->cantidadEjercicios();
      return $resultado;

    }

    public function listarRutinaid($id_Rutina)
    {
     $this-> rutina ->setRutina('id_Rutina', $id_Rutina);
     $resultado = $this-> rutina  -> listarRutinaid();
     return $resultado;

    }

    public function contarEjercicios($id_Rutina)
    {
      $this-> ruti_Ejer->setRutiejer('id_Rutina',$id_Rutina);

      $resultado = $this-> ruti_Ejer->contarEjercicios();
      return $resultado;

    }

    public function eliminarEjercicio($id_Rutina,$id_Ejercicio)
   {
       $this-> ruti_Ejer->setRutiejer('id_Rutina', $id_Rutina);
       $this-> ruti_Ejer->setRutiejer('id_Ejercicio', $id_Ejercicio);

       $resultado = $this-> ruti_Ejer->eliminarEjercicio();
       return $resultado;
   }

   public function listarEjercicio($id_Rutina,$id_Ejercicio)
    {

        $this-> ruti_Ejer->setRutiejer('id_Rutina', $id_Rutina);
        $this-> ruti_Ejer->setRutiejer('id_Ejercicio', $id_Ejercicio);

        $resultado = $this-> ruti_Ejer->listarEjercicios();
        return $resultado;
    }

    public function modificarSeries($id_Rutina,$id_Ejercicio,$series)
    {
        $this-> ruti_Ejer->setRutiejer('id_Rutina', $id_Rutina);
        $this-> ruti_Ejer->setRutiejer('id_Ejercicio', $id_Ejercicio);
         $this-> ruti_Ejer->setRutiejer('series', $series);

        $resultado = $this-> ruti_Ejer->modificarSeries();
        return $resultado;
    }

    public function modificarRepeticiones($id_Rutina,$id_Ejercicio,$repeticiones)
    {
        $this-> ruti_Ejer->setRutiejer('id_Rutina', $id_Rutina);
        $this-> ruti_Ejer->setRutiejer('id_Ejercicio', $id_Ejercicio);
         $this-> ruti_Ejer->setRutiejer('repeticiones', $repeticiones);

        $resultado = $this-> ruti_Ejer->modificarRepeticiones();
        return $resultado;
    }

    public function modificarTiempo($id_Rutina,$id_Ejercicio,$tiempo)
    {
        $this-> ruti_Ejer->setRutiejer('id_Rutina', $id_Rutina);
        $this-> ruti_Ejer->setRutiejer('id_Ejercicio', $id_Ejercicio);
         $this-> ruti_Ejer->setRutiejer('tiempo', $tiempo);

        $resultado = $this-> ruti_Ejer->modificarTiempo();
        return $resultado;
    }

    public function modificarDia($id_Rutina,$id_Ejercicio,$dia)
    {
      $this-> ruti_Ejer->setRutiejer('id_Rutina', $id_Rutina);
      $this-> ruti_Ejer->setRutiejer('id_Ejercicio', $id_Ejercicio);
      $this-> ruti_Ejer->setRutiejer('dia', $dia);

      $resultado = $this-> ruti_Ejer->modificarDias();
      return $resultado;
    }

    public function idEjercicio($id_Rutina)
    {
      $this-> ruti_Ejer-> setRutiejer('id_Rutina',$id_Rutina);
      $resultado= $this-> ruti_Ejer-> idEjercicio();
      return $resultado;

    }

  }
?>
