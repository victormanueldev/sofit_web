<?php
  /**
   * Esta clase se encarga de redireccionar todas las vistas del sistema
   * @author Victor Manuel
   * ed: 2018-02-19
   */
  class Enrutador
  {

    /**
    * Permite cargar la interfaz correspondiente
    * @param $vista (Nombre del Archivo a redireccionar)
    */
    public function cargarVista($vista)
    {
      switch ($vista) {
        case 'confirmarEdicion':
        include_once('vistas/'.$vista.".php");
          break;
        case 'permisosUsuario':
        include_once('vistas/'.$vista.".php");
          break;
        case 'verNovedad':
        include_once('vistas/'.$vista.".php");
          break;
        case 'bandejaNovedades':
        include_once('vistas/'.$vista.".php");
          break;
        case 'verEventos':
        include_once('vistas/'.$vista.".php");
          break;
        case 'actualizarEvento':
        include_once('vistas/'.$vista.".php");
          break;
        case 'reporteInventario':
        include_once('vistas/'.$vista.".php");
          break;
        case 'reporteAEventos':
        include_once('vistas/'.$vista.".php");
          break;
        case 'reporteAsistencia':
        include_once('vistas/'.$vista.".php");
          break;
        case 'crearDatosAntropometricos':
          include_once('vistas/'.$vista.".php");
          break;
        case 'inicio-entrenador':
          include_once('vistas/'.$vista.".php");
          break;
          case 'inicio-admin':
          include_once('vistas/'.$vista.".php");
          break;
        case 'editarPerfil':
          include_once('vistas/'.$vista.".php");
          break;
        case 'rutinasUsuario':
          include_once('vistas/'.$vista.".php");
          break;
        case 'datosAntropometricosUsuario':
          include_once('vistas/'.$vista.".php");
          break;
        case 'verEpicrisis':
          include_once('vistas/'.$vista.".php");
          break;
        case 'inicio-usuario':
          include_once('vistas/'.$vista.".php");
          break;

        case 'dashboard':
          include_once('vistas/'.$vista.".php");
          break;

        case 'crearInventario':
          include_once('vistas/'.$vista.'.php');
          break;

        case 'inventarioElemento':
          include_once('vistas/'.$vista.'.php');
          break;
          
          case 'verInventario':
          include_once('vistas/'.$vista.'.php');
            break;

    	case 'crearElemento':
             include_once('vistas/'.$vista.'.php');
             break;

    	case 'crearRutina':
          include_once('vistas/'.$vista.'.php');
          break;

        case 'rutinas':
          include_once('vistas/'.$vista.'.php');
          break;

        case 'verRutina':
          include_once('vistas/'.$vista.'.php');
          break;
        case 'modificarRutina':
          include_once('vistas/'.$vista.'.php');
          break;

        case 'eliminar':
          include_once('vistas/'.$vista.'.php');
          break;

        case 'asignarRutina':
          include_once('vistas/'.$vista.'.php');
          break;
        case 'modificarEjercicios':
          include_once('vistas/'.$vista.'.php');
          break;
        case 'editarEjercicios':
          include_once('vistas/'.$vista.'.php');
          break;
        case 'agregarEjercicios':
          include_once('vistas/'.$vista.'.php');
          break;
        case 'guardarEjercicio':
          include_once('vistas/'.$vista.'.php');
          break;
        case 'seleccionarEjercicio':
          include_once('vistas/'.$vista.'.php');
          break;

        case 'registrarEpicrisis':
          include_once('vistas/'.$vista.'.php');
          break;

        case 'EvaluacionAntropometrica':
            include_once('vistas/'.$vista.".php");
          break;

        case 'CrearEvaluacionAntropometrica':
            include_once('vistas/'.$vista.".php");
          break;

        case 'VerEvaluacionAntropometrica':
            include_once('vistas/'.$vista.".php");
          break;

		    case 'editarDatosAntropometricos':
            include_once('vistas/'.$vista.".php");
          break;

		case 'actualizarDatosAntropometricos':
          include_once('vistas/'.$vista.".php");
		  break;

        case 'ejercicios':
          include_once('vistas/'.$vista.'.php');
          break;

        case 'crearEjercicio':
          include_once('vistas/'.$vista.'.php');
          break;

        case 'eventos':
          include_once('vistas/'.$vista.".php");
          break;
		    case'crearEvento':
          include_once('vistas/'.$vista.".php");
          break;

        case 'verEvento':
          include_once('vistas/'.$vista.".php");
          break;

        case 'editarEvento':
          include_once('vistas/'.$vista.".php");
          break;

        case 'asistenciaEvento':
          include_once('vistas/'.$vista.".php");
          break;

        case 'editarAsistenciaEvento':
          include_once('vistas/'.$vista.".php");
          break;

        case 'controlAsistenciaEvento':
          include_once('vistas/'.$vista.".php");
          break;

		case 'novedades':
          include_once('vistas/'.$vista.'.php');
          break;

        case 'crearNovedad':
          include_once('vistas/'.$vista.'.php');
          break;

        case 'editarNovedad':
          include_once('vistas/'.$vista.'.php');
          break;


        case 'error':
          include_once('vistas/error.php');
          break;
      }
    }


    /*
    * Valida que la variable no esta vacia
    * @param $variable (variable URL cargar)
    * @return Boolean true si NO esta vacia

    public function validarGET($variable)
    {
      if (empty($variable)) {
        include_once('index.php');
      }else {
        return true;
      }
    }*/
  }



?>
