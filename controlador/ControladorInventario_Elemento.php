<?php
//Incluir la clase de Inventario_Elemento
include_once('modelo/inventarioElemento.php');

/**
*@author Ricardo Guerrero
*/

class ControladorInventario_Elemento{
	private $inventario_elemento;

	//Instanciar la clase
	public function __construct(){
		$this -> inventario_elemento = new inventario_Elemento();
	}

	public function index(){
		$resultado = $this -> inventario_elemento -> listarInventario_Elemento();
		return $resultado;
	}

	/**
	*@author Ricardo Guerrero
	*/

	public function crearIE ($id_Inventario,$id_Elemento,$total_Elemento_Inventario, $observacion){

		$this -> inventario_elemento -> setInventario_Elemento('id_Inventario',$id_Inventario);
		$this -> inventario_elemento -> setInventario_Elemento('id_Elemento',$id_Elemento);
		$this -> inventario_elemento -> setInventario_Elemento('total_Elemento_Inventario',$total_Elemento_Inventario);
		$this -> inventario_elemento -> setInventario_Elemento('observacion', $observacion);

		$resultado = $this -> inventario_elemento -> crearElementoInventario();
		return $resultado;
	}

	public function validarInventario()
	{
		$resultado = $this-> inventario_elemento-> validarInventarioDia();
		return $resultado;
	}

	public function elementoRegistrado($id_Inventario, $id_Elemento)
	{
		$resultado = $this-> inventario_elemento-> validarElementoRegistrado($id_Inventario, $id_Elemento);
		return $resultado;
	}

}


?>
