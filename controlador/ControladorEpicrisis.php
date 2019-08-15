<?php

include_once('modelo/Epicrisis.php');

/**
* @author Juan Sebastián García Murillo
*/

class ControladorEpicrisis
{
	//atributos
	private $Epicrisis;

/**
*constructor del Controlador Epicrisis
*/

public function __construct()
{
	$this-> Epicrisis = new Epicrisis();
}

/**
    * Permite Visualizar todos los datos de la tabla Epicrisis
    * @return $resultado (Resultado de la Consulta SQL)
    */
    public function indexEpicrisisUsuario($id_Usuario)
    {
      $resultado = $this-> Epicrisis-> listarEpicrisisUsuario($id_Usuario);
      return $resultado;
    }

    /**
    * Permite Crear una Epicrisis desde la Vista(Registrar)
    * @param $id_Epicrisis (Numero de la Epicrisis del Usuario)
    * @param $hipertension (Enfermedad si la padece o no)
    * @param $enfermedad_Cardiaca (Enfermedad si la padece o no)
    * @param $cancer (Enfermedad si la padece o no)
    * @param $sida (Enfermedad si la padece o no)
    * @param $hepatitis (Enfermedad si la padece o no)
    * @param $epilepsia (Enfermedad si la padece o no)
    * @param $alergias (Enfermedad si la padece o no)
    * @param $asma (Enfermedad si la padece o no)
    * @param $convulsiones (Enfermedad si la padece o no)
    * @param $anticuagulante (Enfermedad si la padece o no)
    * @param $hipoglicemia (Enfermedad si la padece o no)
    * @param $embarazo (Si se encuentra en gestación o no)
    * @param $diabetes (Enfermedad si la padece o no)
    * @param $otro (Otra enfermedad si la padece o no)
    * @return $resultado (Resultado de la Consulta SQL)
    * o False en caso de Error al intentar registrar el Usuario
    */
    public function crearEpicrisis($hipertension, $enfermedad_Cardiaca, $cancer, $sida, $hepatitis, $epilepsia, $alergias, $asma, $convulsiones, $anticuagulante, $hipoglicemia, $embarazo, $diabetes, $otro, $cedula_Usuario)
    {
      //Set de Atributos de la Clase Epicrisis
      #El primer parametro debe ser escrito de la misma forma que el Atributo de la Clase Epicrisis
      $this-> Epicrisis-> setEpicrisis('hipertension', $hipertension);
      $this-> Epicrisis-> setEpicrisis('enfermedad_Cardiaca', $enfermedad_Cardiaca);
      $this-> Epicrisis-> setEpicrisis('cancer',$cancer);
      $this-> Epicrisis-> setEpicrisis('sida', $sida);
      $this-> Epicrisis-> setEpicrisis('hepatitis', $hepatitis);
      $this-> Epicrisis-> setEpicrisis('epilepsia',$epilepsia);
      $this-> Epicrisis-> setEpicrisis('alergias', $alergias);
      $this-> Epicrisis-> setEpicrisis('asma', $asma);
      $this-> Epicrisis-> setEpicrisis('convulsiones', $convulsiones);
      $this-> Epicrisis-> setEpicrisis('anticuagulante', $anticuagulante);
      $this-> Epicrisis-> setEpicrisis('hipoglicemia', $hipoglicemia);
      $this-> Epicrisis-> setEpicrisis('embarazo', $embarazo);
      $this-> Epicrisis-> setEpicrisis('diabetes', $diabetes);
      $this-> Epicrisis-> setEpicrisis('otro', $otro);
      $this-> Epicrisis-> setEpicrisis('cedula_Usuario', $cedula_Usuario);

      $resultado = $this-> Epicrisis-> crearEpicrisis();
      return $resultado;
    }

    /**
    * Permite Visualizar la informacion de la Epicrisis
    * @param $cedula_Usuario (Cedula del Usuario permite ver la información de la Epicrisis)
    * @return $datos (Array Asociativo con la informacion del registro)
    */
    public function verEpicrisis($cedula_Usuario)
    {
      $this-> Epicrisis-> setEpicrisis('cedula_Usuario', $cedula_Usuario);
      $datos = $this-> Epicrisis-> verEpicrisis();
      return $datos;
    }

    /**
    * Permite Crear una Epicrisis desde la Vista(Registrar)
    * @param $id_Epicrisis (Numero de la Epicrisis del Usuario)
    * @param $hipertension (Enfermedad si la padece o no)
    * @param $enfermedad_Cardiaca (Enfermedad si la padece o no)
    * @param $cancer (Enfermedad si la padece o no)
    * @param $sida (Enfermedad si la padece o no)
    * @param $hepatitis (Enfermedad si la padece o no)
    * @param $epilepsia (Enfermedad si la padece o no)
    * @param $alergias (Enfermedad si la padece o no)
    * @param $asma (Enfermedad si la padece o no)
    * @param $convulsiones (Enfermedad si la padece o no)
    * @param $anticuagu (Enfermedad si la padece o no)
    * @param $hipoglicemia (Enfermedad si la padece o no)
    * @param $embarazo (Si se encuentra en gestación o no)
    * @param $diabetes (Enfermedad si la padece o no)
    * @param $otro (Otra enfermedad si la padece o no)
    * @return $resultado (Resultado de la Consulta SQL)
    * o False en caso de Error al intentar registrar el Usuario
    */

    public function editarEpicrisis($hipertension, $enfermedad_Cardiaca, $cancer, $sida, $hepatitis, $epilepsia, $alergias, $asma, $convulsiones, $anticuagulante, $hipoglicemia, $embarazo, $diabetes, $otro)
    {
      $this-> Epicrisis-> setEpicrisis('hipertension', $hipertension);
      $this-> Epicrisis-> setEpicrisis('enfermedad_Cardiaca', $enfermedad_Cardiaca);
      $this-> Epicrisis-> setEpicrisis('cancer',$cancer);
      $this-> Epicrisis-> setEpicrisis('sida', $sida);
      $this-> Epicrisis-> setEpicrisis('hepatitis', $hepatitis);
      $this-> Epicrisis-> setEpicrisis('epilepsia',$epilepsia);
      $this-> Epicrisis-> setEpicrisis('alergias', $alergias);
      $this-> Epicrisis-> setEpicrisis('asma', $asma);
      $this-> Epicrisis-> setEpicrisis('convulsiones', $convulsiones);
      $this-> Epicrisis-> setEpicrisis('anticuagulante', $anticuagulante);
      $this-> Epicrisis-> setEpicrisis('hipoglicemia', $hipoglicemia);
      $this-> Epicrisis-> setEpicrisis('embarazo', $embarazo);
      $this-> Epicrisis-> setEpicrisis('diabetes', $diabetes);
      $this-> Epicrisis-> setEpicrisis('otro', $otro);

      $this-> Epicrisis-> editarEpicrisis();
    }

    /**
    * Elimina un Registro especifico de la Tabla Epicrisis
    * @param $cedula_Usuario (Cedula del Usuario)
    */
    public function eliminarEpicrisis($cedula_Usaurio)
    {
      $this-> Epicrisis-> setEpicrisis('cedula_Usuario', $cedula_Usuario);
      $this-> Epicrisis-> eliminarEpicrisis();
    }

		/**
		* Devuelve el resultado de la consulta de epicrisisUsuario
		* @param $id_Usuario
		* @return Boolean
		**/
		public function epicrisisU($id_Usuario)
		{
			$existeEpicrisis = $this-> Epicrisis-> epicrisisUsuario($id_Usuario);
			return $existeEpicrisis;
		}

  }

?>
