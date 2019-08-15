<?php
//Incluir la clase de Elemento
include_once('modelo/Elemento.php');

/**
*@author Adriana Ruales
*@author Anderson Ojeda
*@author Daniel Cabrera
*@author Ricardo Guerrero
*@author Veronica Palacios
*/

class controladorElemento{
	private $elemento;


//Instanciar la clase
public function __construct(){
	$this -> elemento = new Elemento();
}

public function index(){
	$resultado = $this -> elemento -> listarElemento();
	return $resultado;
}

/**
*@author Anderson Ojeda
*/

public function crearE ($nombre_Elemento,$cantidad_Elemento,$fecha_Elemento,$foto_Elemento){

	$this -> elemento -> setElemento('nombre_Elemento',$nombre_Elemento);
	$this -> elemento -> setElemento('cantidad_Elemento',$cantidad_Elemento);
	$this -> elemento -> setElemento('fecha_Elemento',$fecha_Elemento);
	$this -> elemento -> setElemento('foto_Elemento',$foto_Elemento);

	$resultado = $this -> elemento -> crearElemento();
	return $resultado;
}

/**
*@author Ricardo Guerrero
*/
public function verE($id_Elemento){
      $this-> elemento-> setElemento('id_Elemento', $id_Elemento);
      $datos = $this-> elemento-> verElemento();
      return $datos;
}

/**
*@author Adriana Ruales
*/
public function editarE($id_Elemento, $nombre_Elemento,$cantidad_Elemento,$fecha_Elemento,$foto_Elemento){

	$this-> elemento -> setElemento('id_Elemento',$id_Elemento);
	$this-> elemento -> setElemento('nombre_Elemento',$nombre_Elemento);
	$this-> elemento -> setElemento('cantidad_Elemento', $cantidad_Elemento);
	$this-> elemento -> setElemento('fecha_Elemento', $fecha_Elemento);
	$this-> elemento -> setElemento('foto_Elemento',$foto_Elemento);
	$this-> elemento -> editarElemento();

}
/**
*@author Daniel Cabrera
*/
public function eliminarE($id_Elemento){
	$this -> elemento -> setElemento('id_Elemento',$id_Elemento);
	$this -> elemento -> eliminarElemento();
}
}


?>
