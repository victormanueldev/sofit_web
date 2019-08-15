<?php
	include_once('modelo/Conexion.php');


	class Inventario{


		private $fecha_Inventario;
		private $id_Usuario;
		private $conex;


	public function __construct(){
		$this -> conex = new Conexion();
	}



	public function setInventario($atributo, $contenido){
    	$this-> $atributo = $contenido;
    }

    public function getInventario($atributo){
    	return $this-> $atributo;
    }

    public function listarElemento(){
     $sql = "SELECT * FROM Inventario";
     $resultado = $this-> conex-> consultaRetorno($sql);
     return $resultado;
   }



    public function crearInventario(){
    	$sql = "INSERT INTO Inventario (fecha_Inventario,id_Usuario)
    	VALUES ('{$this-> fecha_Inventario}','{$this-> id_Usuario}')";


    	$this-> conex-> consultaSimple($sql);
    	return true;
    }

	}


	?>
