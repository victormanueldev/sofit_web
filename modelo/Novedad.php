<?php
  include_once('Conexion.php');

  /**
*@author Valentina Rodriguez/Daniel Lopez
*/
class novedad
{

private $id_Novedad;
private $asunto_Novedad;
private $descripcion_Novedad;
private $estado_Novedad;
private $fecha_Novedad;
private $hora_Novedad;
private $id_Usuario;


  public function __construct()
    {
      $this-> conex = new Conexion();  //Creamos un constructor y este constructor vamos a colocar la instaciacion de nuestra conexion
    }

  public function setNovedad($atributo, $contenido){
     $this-> $atributo = $contenido;
   }


public function getNovedad($atributo){
      return $this-> $atributo;       //Este metodo nos retorna un atributo
    }




//CREACION DE CRUD
public  function listarNovedad()  //Mediante este metodo lo que hacemos es mostrar nuestros datos de la BD
{
$sql="SELECT n.*, u.nombres_Usuario, u.foto_Usuario, u.apellidos_Usuario FROM novedad n
      JOIN usuario u ON n.id_Usuario = u.id_Usuario
      ORDER BY n.fecha_Novedad DESC";
$resultado= $this-> conex-> consultaRetorno($sql);

return $resultado;
}

public function crearNovedad()
{
$sqlValidador="SELECT * FROM novedad WHERE id_Novedad = '{$this-> id_Novedad}'"; //Es la que nos valida si existe un registro con el mismo id
$resultado=$this-> conex-> consultaRetorno($sqlValidador);

$coincidencia=mysqli_num_rows($resultado);


if ($coincidencia==0)
{
$sql="INSERT INTO novedad (
                          asunto_Novedad,
                          descripcion_Novedad,
                          estado_Novedad,
                          fecha_Novedad,
                          hora_Novedad,
                          id_Usuario
                             )

      VALUES            (
                        '{$this-> asunto_Novedad}',
                        '{$this-> descripcion_Novedad}',
                        '{$this-> estado_Novedad}',
                        '{$this-> fecha_Novedad}',
                        '{$this-> hora_Novedad}',
                        '{$this-> id_Usuario}'
                          )";


             $this-> conex-> consultaSimple($sql);
     }else {
       return true;
     }


}

 public function verNovedad()
   {
     $sql = "SELECT * FROM novedad WHERE id_Novedad = '{$this-> id_Novedad}'";
     $resultado = $this-> conex-> consultaRetorno($sql);//Guarda el Resultado de la Consulta
     //Guarda una fila del Resulset(Tabla Virtual) en un array asociativo
     $fila = mysqli_fetch_assoc($resultado);

     //Asignacion de Atributos de la Tabla Usuario
     $this-> id_Novedad =      $fila['id_Novedad'];
     $this-> asunto_Novedad =  $fila['asunto_Novedad'];
     $this-> desc_Novedad =    $fila['descripcion_Novedad'];
     $this-> estado_Novedad =  $fila['estado_Novedad'];
     $this-> fecha_Novedad =   $fila['fecha_Novedad'];
     $this-> hora_Novedad =    $fila['hora_Novedad'];


     return $fila;
   }

 public function editarNovedad()
   {
$sql = "UPDATE novedad
              SET estado_Novedad = '{$this-> estado_Novedad}'
              WHERE id_Novedad =   '{$this-> id_Novedad}'";
      $this-> conex-> consultaSimple($sql);
   }


public function cantidadEstado()
{
  $sql = "SELECT count(estado_Novedad) FROM novedad WHERE estado_Novedad = 'Revisado'";
  $resul1 = $this-> conex-> consultaRetorno($sql);
  $fila = mysqli_fetch_array($resul1);

  $sql2 = "SELECT count(estado_Novedad) FROM novedad WHERE estado_Novedad = 'Enviado'";
  $resul2 = $this-> conex-> consultaRetorno($sql2);
  $fila2 = mysqli_fetch_array($resul2);

  $sql3 = "SELECT count(id_Novedad) FROM novedad";
  $resul3 = $this-> conex-> consultaRetorno($sql3);
  $fila3 = mysqli_fetch_array($resul3);

  $resultado = [
    "cantidad_Novedad" => $fila3[0],
    "cantidad_Revisado" => $fila[0],
    "cantidad_Enviado" => $fila2[0]
  ];
  
  return $resultado;
}

}




?>
