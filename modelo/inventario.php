<?php
	include_once('modelo/Conexion_rutina.php');
  include_once('modelo/Carbon.php');
  use Carbon\Carbon;

	class Inventario{


		private $fecha_Inventario;
    private $hora_Inventario;
		private $id_Usuario;
		private $conex;
    private $id_Inventario;



	public function __construct(){
		$this -> conex = new ConexionRutina();
	}



	public function setInventario($atributo, $contenido){
    	$this-> $atributo = $contenido;
    }

    public function getInventario($atributo){
    	return $this-> $atributo;
    }

    public function listarInventario(){
     $sql = "SELECT I.*, U.id_Usuario, U.nombres_Usuario, U.foto_Usuario, U.apellidos_Usuario FROM inventario I JOIN usuario U ON I.id_Usuario = U.id_Usuario";
     $resultado = $this-> conex-> consultaRetorno($sql);
     return $resultado;
   }



    public function crearInventario(){
      $sql = "INSERT INTO Inventario (fecha_Inventario, hora_Inventario, id_Usuario)
                VALUES ('{$this-> fecha_Inventario}', '{$this-> hora_Inventario}','{$this-> id_Usuario}')";
      $this-> conex-> consultaSimple($sql);
      return true;
    }

public function verInventarioBasico()
{
  $sql = "SELECT i.*, u.nombres_Usuario, u.apellidos_Usuario FROM inventario i 
          INNER JOIN usuario u on I.id_Usuario = U.id_Usuario
          WHERE id_Inventario = '{$this -> id_Inventario}'";
  $resultado = $this -> conex -> consultaRetorno($sql);//Guarda el Resultado de la Consulta
  return $resultado;
}

public function verInventario(){

 $sql = "SELECT E.nombre_Elemento, U.nombres_Usuario, U.apellidos_Usuario ,IE.total_Elemento_Inventario, IE.observacion, I.id_Inventario, I.fecha_Inventario, I.hora_Inventario, E.id_Elemento 
        FROM inventario_elemento IE   
        INNER JOIN elemento E on IE.id_Elemento = E.id_Elemento 
        INNER JOIN inventario I on I.id_Inventario = IE.id_Inventario 
        INNER JOIN usuario U on I.id_Usuario = U.id_Usuario 
        WHERE IE.id_Inventario = '{$this -> id_Inventario}'";

      $resultado = $this -> conex -> consultaRetorno($sql);//Guarda el Resultado de la Consulta
       //Guarda una fila del Resulset(Tabla Virtual) en un array asociativo
     // $fila = mysqli_fetch_assoc($resultado);

      //Asignacion de Atributos de la Tabla Elemento
   //   $this ->  = $fila[''];
    //  $this -> id_Elemento= $fila ['id_Elemento'];
     // $this -> Total_Elemento_Inventario = $fila ['Total_Elemento_Inventario'];

      return $resultado;
}

public function idInventario(){

$sql = "SELECT MAX(id_Inventario) FROM inventario";
$resultado = $this -> conex -> consultaRetorno($sql);
return $resultado;
}

public function eliminarInventario()
{
	$sql = "DELETE FROM inventario WHERE id_Inventario = '{$this-> id_Inventario}'";
	$this-> conex-> consultaSimple($sql);
}



}

	?>
