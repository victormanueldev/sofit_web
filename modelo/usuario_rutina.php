<?php
  include_once('Conexion_rutina.php');

  class Usuario_Rutina
  {
    private $id_Usuario;
    private $id_Rutina;
    private $conex;

    function __construct(){
    $this-> conex = new ConexionRutina();
    }


    public function setUsuarioRutina($atributo, $contenido){
     $this-> $atributo = $contenido;
    }

    public function getUsuarioRutina($atributo){
      return $this-> $atributo;
    }


    public function rutinasUsuario(){

      $sql= "SELECT u.numeroId_Usuario, u.nombres_Usuario,u.apellidos_Usuario, r.nombre_Rutina,r.id_Rutina
        FROM usuario_rutina ur JOIN usuario u on ur.id_Usuario= u.id_Usuario
        JOIN rutina r on ur.id_Rutina=r.id_Rutina ";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }
        public function rutinas(){

      $sql= "SELECT r.id_Rutina, r.nombre_Rutina,u.nombres_Usuario,u.apellidos_Usuario
        FROM usuario_rutina ur JOIN usuario u on ur.id_Usuario= u.id_Usuario
        JOIN rutina r on ur.id_Rutina=r.id_Rutina ";
      $resultado = $this-> conex-> consultaRetorno($sql);
      return $resultado;
    }

    public function eliminarRU(){
      $sql="DELETE FROM usuario_rutina WHERE id_Rutina='{this->id_Rutina}' ";
      $this-> conex-> consultaSimple($sql);

    }
     public function crearUsuarioRutina()
      {
        $sql="INSERT INTO usuario_rutina( id_Usuario ,  id_Rutina )
                    VALUES ({$this-> id_Usuario},
                            {$this-> id_Rutina})";
      $result=$this-> conex-> consultaSimple($sql);
      return true;
      }
      public function validarUsuario()
      {

        $sql="SELECT id_Usuario FROM usuario_rutina WHERE id_Usuario='{this->id_Usuario}'";
        $resultado = $this-> conex-> consultaRetorno($sql);

       $filas=mysqli_num_rows($resultado);
       if ($filas) {
        return true;
     } else {
       return false;
     }
      }
       public function rutinaDeUsuario()
   {

        $sql= "SELECT r.id_Rutina, r.nombre_Rutina,u.nombres_Usuario,u.apellidos_Usuario
                FROM usuario_rutina ur JOIN usuario u on ur.id_Usuario= u.id_Usuario
                JOIN rutina r on ur.id_Rutina=r.id_Rutina WHERE u.id_Usuario={$this-> id_Usuario} ";
        $resultado = $this-> conex-> consultaRetorno($sql);

         $fila= mysqli_num_rows($resultado);

      if ($fila>0) {
        $result= true;
      } else {
        $result=false;
      }
      return $result;

    }


  }
?>
