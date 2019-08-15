<?php
//Incluir la clase de Elemento
include_once('modelo/inventario.php');



class controladorInventario{
	private $inventario;


//Instanciar la clase
public function __construct(){
	$this -> inventario = new Inventario();
}

public function index(){
	$resultado = $this -> inventario -> listarInventario();
	return $resultado;
}



public function crearI ($fecha_Inventario,$id_Usuario, $hora_Inventario){

	$this -> inventario -> setInventario('fecha_Inventario',$fecha_Inventario);
	$this -> inventario -> setInventario('id_Usuario',$id_Usuario);
	$this -> inventario ->setInventario('hora_Inventario', $hora_Inventario);

	$resultado = $this -> inventario ->crearInventario();
	return $resultado;
}

public function verIn($id_Inventario){
	$this -> inventario -> setInventario('id_Inventario',$id_Inventario);
	$resultado = $this -> inventario -> verInventario();
	return $resultado;
}

public function idIn(){
	$resultado = $this -> inventario -> idInventario();
	return $resultado;
}

public function eliminarI($id_Inventario)
{
	$this -> inventario -> setInventario('id_Inventario',$id_Inventario);
	$this-> inventario-> eliminarInventario();
}

public function verIB($id_Inventario)
{
	$this -> inventario -> setInventario('id_Inventario',$id_Inventario);
	$resultado = $this -> inventario -> verInventarioBasico();
	return $resultado;
}

}

 ?>
