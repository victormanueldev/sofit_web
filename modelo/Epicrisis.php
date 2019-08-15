<?php

include_once('Conexion.php');

/**
* @author Juan Sebastián García Murillo
*/

class Epicrisis
{
	//atributos de la tabla evaluación antropometrica
	private $conex;
	private $id_Epicrisis;
	private $hipertension;
	private $enfermedad_Cardiaca;
	private $cancer;
	private $sida;
	private $hepatitis;
	private $epilepsia;
	private $alergias;
	private $asma;
	private $convulsiones;
	private $anticuagulante;
	private $hipoglicemia;
	private $embarazo;
  private $diabetes;
	private $otro;
  private $cedula_Usuario;

	/**
  * Constructor de la Clase Epicrisis
  */
   public function __construct()
   {
     $this-> conex = new Conexion();
		 $hipertension = 0;
		 $enfermedad_Cardiaca = 0;
		 $cancer = 0;
		 $sida = 0;
		 $hepatitis = 0;
		 $epilepsia = 0;
		 $alergias = 0;
		 $asma = 0;
		 $convulsiones = 0;
		 $anticuagulante = 0;
		 $hipoglicemia = 0;
		 $embarazo = 0;
		 $diabetes = 0;
		 $otro = "";
   }


   //Set & Get
   /**
   * Establece cualquier Atributos de la Clase Usuario
   * @param $atributo (Nombre del Atributo)
   * @param $contenido (Valor asignado al Atributo)
   */
   public function setEpicrisis($atributo, $contenido){
     $this-> $atributo = $contenido;
   }


   /**
   * Devuelve cualquier Atributo de la Clase Epicrisis
   * @param $atributo (Nombre del Atributo)
   */
   public function getEpicrisis($atributo){
     return $this-> $atributo;
   }


   /**
   * Lista todos los registros de la tabla Epicrisis
   * @return $resultado (Resultado de la Consulta SQL)
   */
   public function listarEpicrisisUsuario($id_Usuario)
   {
     $sql = "SELECT * FROM epicrisis e
						 JOIN usuario u ON e.id_Usuario = u.id_Usuario
						 WHERE u.id_Usuario = $id_Usuario";
     $resultado = $this-> conex-> consultaRetorno($sql);
     return $resultado;
   }


   //CRUD
   /**
   * Crea un registro en la tabla Epicrisis
   * Valida si la id_Antemed que se va a ingresar no exista en la BD
   *  @return Boolean false (Si existen Conincidencias de id_Antemed en la tabla Epicrisis)
   */
   public function crearEpicrisis(){
    $sql = "INSERT INTO Epicrisis(hipertension,
                                  enfermedad_Cardiaca,
                                  cancer,
                                  sida,
                                  hepatitis,
                                  epilepsia,
                                  alergias,
                                  asma,
                                  convulsiones,
                                  anticuagulante,
                                  hipoglicemia,
                                  embarazo,
                                  diabetes,
                                  otro,
                                  id_Usuario)
            VALUES ('{$this-> hipertension}',
                    '{$this-> enfermedad_Cardiaca}',
                    '{$this-> cancer}',
                    '{$this-> sida}',
                    '{$this-> hepatitis}',
                    '{$this-> epilepsia}',
                    '{$this-> alergias}',
                    '{$this-> asma}',
                    '{$this-> convulsiones}',
                    '{$this-> anticuagulante}',
                    '{$this-> hipoglicemia}',
                    '{$this-> embarazo}',
                    '{$this-> diabetes}',
                    '{$this-> otro}',
                    '{$this-> cedula_Usuario}')";
        //Llama al Metodo consultaSimple para Ejecutar la Sentencia SQL
        $this-> conex-> consultaSimple($sql);
   }


   /**
   * Permite Visualizar toda la informacion de la Epicrisis del Usuario
   * Requiere la cedula_Usuario para ver el registro especifico
   * @return $fila (Arreglo Asociativo con el Resultado de la Consulta)
   */
   public function verEpicrisis()
   {
     $sql = "SELECT * FROM Epicrisis WHERE cedula_Usuario = '{$this-> cedula_Usuario}'";
     $resultado = $this-> conex-> consultaRetorno($sql);//Guarda el Resultado de la Consulta
     //Guarda una fila del Resulset(Tabla Virtual) en un array asociativo
     $fila = mysqli_fetch_assoc($resultado);

     //Asignacion de Atributos de la Tabla Epicrisis
     $this-> id_Epicrisis =        $fila['id_Epicrisis'];
     $this-> hipertension =        $fila['hipertension'];
     $this-> enfermedad_Cardiaca = $fila['enfermedad_Cardiaca'];
     $this-> cancer =              $fila['cancer'];
     $this-> sida =                $fila['sida'];
     $this-> hepatitis =           $fila['hepatitis'];
     $this-> epilepsia =           $fila['epilepsia'];
     $this-> alergias =            $fila['alergias'];
     $this-> asma =                $fila['asma'];
     $this-> convulsiones =        $fila['convulsiones'];
     $this-> anticuagulante =      $fila['anticuagulante'];
     $this-> hipoglicemia =        $fila['hipoglicemia'];
     $this-> embarazo =            $fila['embarazo'];
     $this-> diabetes =            $fila['diabetes'];
     $this-> otro =                $fila['otro'];
     $this-> cedula_Usuario =      $fila['cedula_Usuario'];

     return $fila;
   }


   /**
   * Edita un Registro de la tabla Epicrisis
   * Requiere el cedula_Usuario para editar el registro especifico
   */
   public function editarUsuario()
   {
     $sql = "UPDATE Epicrisis
            SET hipertension =            '{$this-> hipertension}',
                enfermedad_Cardiaca =     '{$this-> enfermedad_Cardiaca}',
                cancer =                  '{$this-> cancer}',
                sida =                    '{$this-> sida}',
                hepatitis =               '{$this-> hepatitis}',
                epilepsia =               '{$this-> epilepsia}',
                alergias =                '{$this-> alergias}',
                asma =                    '{$this-> asma}',
                convulsiones =            '{$this-> convulsiones}',
                anticuagulante =          '{$this-> anticuagulante}',
                hipoglicemia =            '{$this-> hipoglicemia}',
                embarazo =                '{$this-> embarazo}',
                diabetes =                '{$this-> diabetes}',
                otro =                    '{$this-> otro}'";
      $this-> conex-> consultaSimple($sql);
   }


   /**
   * Elimina un registro de la Tabla Epicrisis
   * Requiere el cedula_Usuario para borrar el registro especifico
   */
   public function eliminarEpicrisis()
   {
     $sql = "DELETE FROM Epicrisis WHERE cedula_Usuario = '{$this-> cedula_Usuario}'";
     $this-> conex-> consultaSimple($sql);
   }

	 /**
	 * Indica que el usuario ya lleno la epicrisis
	 * @param id_usuario
	 * @return Boolean
	 **/
	 public function epicrisisUsuario($id_Usuario)
	 {
	 		$sql = "SELECT id_Epicrisis FROM epicrisis e
							JOIN usuario u ON e.id_Usuario = u.id_Usuario
							WHERE u.id_Usuario = $id_Usuario";
			$resultado = $this-> conex-> consultaRetorno($sql);
			$numrows = mysqli_num_rows($resultado);
			if($numrows != 0){
				return true;
			} else {
				return false;
			}
	 }

}


?>
