<?php
	include_once('modelo/Conexion.php');

	/**
  	* @author Adriana Ruales
  	* @author Anderson Ojeda
  	* @author Daniel Cabrera
  	* @author Ricardo Guerrero
  	* @author Veronica Palacios
  	*/

 		class Elemento {
		//Atributos tabla inventario
		private $id_Elemento;
		private $nombre_Elemento;
		private $cantidad_Elemento;
		private $fecha_Elemento;
		private $foto_Elemento;
		private $conex;


	public function __construct(){
		$this -> conex = new Conexion();
	}

	public function setElemento($atributo, $contenido){
    	$this-> $atributo = $contenido;
    }

    public function getElemento($atributo){
    	return $this-> $atributo;
    }

    public function listarElemento(){
     $sql = "SELECT * FROM Elemento";
     $resultado = $this-> conex-> consultaRetorno($sql);
     return $resultado;
   }

   /**
   *@author Adriana Ruales
   *Crea un registro de la tbala Elemento
   *Requiere el ID de Elemento para crear el registro especifico
   */

   public function crearElemento(){
    $sqlValidador = "SELECT * FROM Elemento WHERE nombre_Elemento = '{$this-> nombre_Elemento}'";
    $resultado = $this-> conex->consultaRetorno($sqlValidador);
   $coincidencias = mysqli_num_rows($resultado);

   if ($coincidencias != 0) {
   		return false;
   	}else{

        $sql = "INSERT INTO Elemento (nombre_Elemento,
                                     cantidad_Elemento,
                                     foto_Elemento,
                                     fecha_Elemento)
                VALUES ('{$this-> nombre_Elemento}',
                        '{$this-> cantidad_Elemento}',
                        '{$this-> foto_Elemento}',
                        '{$this-> fecha_Elemento}')";

    //Llama al metodo consultasimple para ejecutar la sentencia
     $this-> conex-> consultaSimple($sql);
        return true;
     }
	}

	   /**
	   * @author Daniel Cabrera
	   */
	   public function verElemento(){
	   	$sql = " SELECT * FROM Elemento WHERE id_Elemento = '{$this -> id_Elemento}'";
	   	$resultado = $this -> conex -> consultaRetorno($sql);//Guarda el Resultado de la Consulta
	     //Guarda una fila del Resulset(Tabla Virtual) en un array asociativo
	   	$fila = mysqli_fetch_assoc($resultado);

	   	//Asignacion de Atributos de la Tabla Elemento
	   	$this -> id_Elemento = $fila['id_Elemento'];
	   	$this -> nombre_Elemento = $fila ['nombre_Elemento'];
	   	$this -> cantidad_Elemento = $fila ['cantidad_Elemento'];
	   	$this -> foto_Elemento = $fila ['foto_Elemento'];
	   	$this -> fecha_Elemento = $fila['fecha_Elemento'];

	   	return $fila;
	   }

	  /**
		*@author Ricardo Guerrero
		*Edita un Registro de la tabla Elemento
		*Requiere el ID de Elemento para editar el registro especifico
		*/
		public function editarElemento(){
	     $sql = "UPDATE Elemento
	            SET nombre_Elemento =         '{$this-> nombre_Elemento}',
	                cantidad_Elemento =       '{$this-> cantidad_Elemento}',
	                foto_Elemento =        	  '{$this-> foto_Elemento}',
	                fecha_Elemento =   		  '{$this-> fecha_Elemento}'";
		      $this-> conex-> consultaSimple($sql);
		}

		/**
		*@author Veronica Palacios
		*/
		public function eliminarElemento(){
		     $sql = "DELETE FROM Elemento WHERE id_Elemento = '{$this-> id_Elemento}'";
		     $this-> conex-> consultaSimple($sql);
		}
	}
 ?>
