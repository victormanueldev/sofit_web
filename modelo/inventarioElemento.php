<?php
	include_once('modelo/Conexion_rutina.php');
	include_once('modelo/Carbon.php');
	use Carbon\Carbon;

	class inventario_Elemento{


		private $id_Inventario;
		private $id_Elemento;
		private $total_Elemento_Inventario;
		private $observacion;
		private $conex;


	public function __construct(){
		$this -> conex = new ConexionRutina();
	}



	public function setInventario_Elemento($atributo, $contenido){
    	$this-> $atributo = $contenido;
    }

    public function getInventario_Elemento($atributo){
    	return $this-> $atributo;
    }

    public function listarInventario_Elemento(){
     $sql = "SELECT * FROM Inventario";
     $resultado = $this-> conex-> consultaRetorno($sql);
     return $resultado;
   }

    public function crearElementoInventario(){
    	$sql = "INSERT INTO inventario_elemento (id_Inventario,id_Elemento,total_Elemento_Inventario, observacion)
    	VALUES ('{$this-> id_Inventario}','{$this-> id_Elemento}','{$this-> total_Elemento_Inventario}', '{$this-> observacion}')";
    	$this-> conex-> consultaSimple($sql);
    	return true;
    }

	/**
	 * Valida si hay registro de inventarios en el dia
	 * @author Victor Manuel
	 * @return Boolean (true) default
	 */
	public function validarInventarioDia()
	{
		//Obtener los datos de fecha y hora actuales
		date_default_timezone_set('America/Bogota');
		$now = Carbon::now();
		$now-> second = 0;
		$fechaActual = $now->toDateString();
		$horaActual = $now->toTimeString();
		//Obtiene el numero de inventarios del dia
		$sql = "SELECT id_Inventario, fecha_Inventario FROM inventario WHERE fecha_Inventario = '$fechaActual'";
		$resultado = $this-> conex-> consultaRetorno($sql);
		$filas = mysqli_num_rows($resultado);
		//Obtiene el numero de inventarios del dia en la mañana
		$sql2 = "SELECT id_Inventario, fecha_Inventario FROM inventario WHERE hora_Inventario <= '12:00:00' AND fecha_Inventario = '$fechaActual'";
		$resultado2 = $this-> conex-> consultaRetorno($sql2);
		$filas2 = mysqli_num_rows($resultado2);
		//Obtiene el numero de inventarios del dia en la tarde
		$sql3 = "SELECT id_Inventario, fecha_Inventario FROM inventario WHERE hora_Inventario > '12:00:00' AND fecha_Inventario = '$fechaActual'";
		$resultado3 = $this-> conex-> consultaRetorno($sql3);
		$filas3 = mysqli_num_rows($resultado3);
		//Valida si hay mas de 2 inventarios el mismo dia
		if ($filas > 2){
			return false;
		}
		//Valida si hay inventarios en la mañana
		if($filas <= 2 && $filas2 == 1 && $horaActual <= '12:00:00'){
			return false;
		}
		//Valida si hay inventarios en la tarde
		if($filas <= 2 && $filas3  == 1 && $horaActual > '12:00:00'){
			return false;
		}
		//Valida si no hay o solo hay un inventario en el dia
		if ($filas == 0 || $filas <= 1) {
			return true;
		}
		return true;		
	}

	/**
	 * Valida si hay registros elementos en el inventario_elemento
	 * @author Victor Manuel
	 * @return Boolean
	 */
	public function validarElementoRegistrado($id_Inventario, $id_Elemento)
	{
		$sql = "SELECT id_Elemento, id_Inventario FROM inventario_elemento WHERE id_Inventario = $id_Inventario AND id_Elemento = $id_Elemento";
		$resultado = $this-> conex-> consultaRetorno($sql);
		$coincidencias = mysqli_num_rows($resultado);
		if ($coincidencias != 0) {
			return true;
		}else{
			return false;
		}
	}

}
?>
