<?php
//Incluir la clase de Ejercicio
include_once('Modelo/Ejercicio.php');

/**
*@author J

*/

class ControladorEjercicio{
	private $ejercicio;


//Instanciar la clase
public function __construct(){
	$this -> ejercicio = new Ejercicio();
}

public function index(){
	$resultado = $this -> ejercicio -> listarEjercicio();
	return $resultado;
}

/**
*@author j
*/

public function crearE ($nombre_Ejercicio,$foto_Ejercicio,$id_Categoria){

	$this -> ejercicio -> setEjercicio('nombre_Ejercicio',$nombre_Ejercicio);
	$this -> ejercicio -> setEjercicio('foto_Ejercicio',$foto_Ejercicio);
	$this -> ejercicio -> setEjercicio('id_Categoria',$id_Categoria);

	$resultado = $this -> ejercicio -> crearEjercicio();
	return $resultado;
}

/**
*@author j
*/
public function verE($id_Elemento){
      $this-> ejercicio-> setEjercicio('id_Ejercicio', $id_Ejercicio);
      $datos = $this->ejercicio-> verEjercicio();
      return $datos;
}

/**
*@author j
*/
public function editarE($id_Ejercicio,$nombre_Ejercicio,$id_Categoria,$foto_Ejercicio){

	$this -> ejercicio -> setEjercicio('id_Ejercicio', $id_Ejercicio);
	$this -> ejercicio -> setEjercicio('nombre_Ejercicio',$nombre_Ejercicio);
	$this -> ejercicio -> setEjercicio('id_Categoria',$id_Categoria);
    $this -> ejercicio -> setEjercicio('foto_Ejercicio',$foto_Ejercicio);
	$this-> ejercicio -> editarEjercicio();

}
/**
*@author j
*/
public function eliminarE($id_Ejercicio){
	$this -> ejercicio -> setEjercicio('id_Ejercicio',$id_Ejercicio);
	$this -> ejercicio -> eliminarEjercicio();
}
}


?>
