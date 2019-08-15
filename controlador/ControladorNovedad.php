
<?php

include_once('modelo/Novedad.php');
/**
    * @author Daniel Lopez
    */


 class ControladorNovedad
 {

//Atributos
 private $Novedad;


//Construtor del controlador novedad
public function __construct()
{

$this-> Novedad=new Novedad();


}
    /**
    * Permite Visualizar todos los datos de la tabla Novedad
    */
public function indexNovedad()
{
    $resultado= $this-> Novedad-> listarNovedad();
   return $resultado;
}


public function crearNovedad($asunto, $descripcion_Novedad,$estado_Novedad,$fecha_Novedad,$hora_Novedad,$id_Usuario)
{
    //Set de todos lo aributos de la clase novedad
$this-> Novedad-> setNovedad("asunto_Novedad",$asunto);
$this-> Novedad-> setNovedad("descripcion_Novedad",$descripcion_Novedad);
$this-> Novedad-> setNovedad("estado_Novedad",$estado_Novedad);
$this-> Novedad-> setNovedad("fecha_Novedad",$fecha_Novedad);
$this-> Novedad-> setNovedad("hora_Novedad",$hora_Novedad);
$this-> Novedad-> setNovedad("id_Usuario",$id_Usuario);
$resultado=$this-> Novedad-> crearNovedad(); //Llmamamos a nuestra clase novedad donde estan los insert y loretornamos
return $resultado;
}


    /**
    * Permite Visualizar todos los datos de la tabla Novedad
    * Recibe un parametro que es el idnovedad hacemos el set del id novedad y utilzizamos el metodo verNovedad de la clase novedad Es donde esta
    * nuestra sentencia SELECT  * FROM
    */

public function verNovedad($id_Novedad)
    {
      $this-> Novedad-> setNovedad('id_Novedad', $id_Novedad);
      $datos = $this-> Novedad-> verNovedad();
      return $datos;
    }


    public function editarNovedad($id_Novedad,$estado_Novedad)
    {

    $this-> Novedad-> setNovedad('id_Novedad', $id_Novedad);
    $this-> Novedad-> setNovedad('estado_Novedad', $estado_Novedad);
    $this-> Novedad -> editarNovedad();
    }

    public function cantNovedades()
    {
        $resultado= $this-> Novedad-> cantidadEstado();
        return $resultado;
    }

 }

?>
