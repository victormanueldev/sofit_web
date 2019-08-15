<?php
  //Incluir la Clase Conexion
  include_once('Conexion_rutina.php');

 class usuario2_rutina
 {


    private $id_Usuario;
    private $numeroId_Usuario;
    private $nombres_Usuario;
    private $apellidos_Usuario;
    private $conex;

   public function __construct()
   {
     $this-> conex = new ConexionRutina();
   }

   public function setusuario($atributo, $contenido){
     $this-> $atributo = $contenido;
   }


   public function getusuario($atributo){
     return $this-> $atributo;
   }


   public function listarusuario(){

     $sql = "SELECT * FROM Usuario";
     $resultado = $this-> conex-> consultaRetorno($sql);
     return $resultado;
   }


   public function verusuario()
   {
     $sql = " SELECT id_Usuario FROM usuario WHERE  numeroId_Usuario ='{$this->numeroId_Usuario}'";
     $resultado = $this-> conex-> consultaRetorno($sql);

     $exito = mysqli_num_rows($resultado);
     if ($exito>0) {
       return $resultado;
     } else {
        return false;
     }

   }



 }


?>
