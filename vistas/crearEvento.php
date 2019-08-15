<?php
  include_once('Controlador/ControladorEvento.php');
  require('modelo/Carbon.php');
	use Carbon\Carbon;
	//Definir la Zona horaria
	date_default_timezone_set('America/Bogota');
	//Instanciacion de Carbon)
	$carbon = new Carbon();
  //Instancia el Controlador de Evento
  $controlador = new ControladorEvento();
  $resultado = $controlador-> indexEvento();
  //Validamos si la variable Enviar no esta vacia
	if (!empty($_POST)) {
    //Convierte la variable del POST en formato carbon
    $dt = Carbon::parse($_POST['dt_Evento']);
    $fecha_Evento = $dt-> toDateString();
    $hora_Evento = $dt-> toTimeString();
    //Genera un codigo de 6 caracteres alfanumericos aleatoriamente
    function getRandomCode(){
    $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $su = strlen($an) - 1;
    return substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1);
    }
    //Guarda el codigo generado en una variable
    $codigo_Evento = getRandomCode();
    //Procesamiento del archivo
		$archivo =  $_FILES['foto_Evento']['tmp_name'];//Selecciona el Archivo
    $destino = "app/img/eventos/".$_FILES['foto_Evento']['name'];//Ruta Final de la Imagen
    move_uploaded_file($archivo, $destino);//Guarda el Archivo en la Carpeta del Proyecto
    $_POST['foto_Evento'] = $destino;
		//Enviamos los datos del Formulario al Controlador
		$resul = $controlador -> crearE($codigo_Evento,
                                  $_POST['nombre_Evento'],
			                            $_POST['descripcion_Evento'],
			                            $hora_Evento,
			                            $fecha_Evento,
			                            $_SESSION['id_Usuario'],
                                  $destino,
                                  $_POST['estado_Evento']);

		//Valida que la Sentencia SQL se ejecuto Correctamente
		if (!$resul) {
      echo  "<div class='alert alert-warning alert-dismissable'>";
      echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>El Evento fue creado exitosamente. <a href='?vista=eventos' class='alert-link'> Regresar a Eventos</a>.</div>";
		}else{

		}
	}
?>
<script type="text/javascript">
  document.getElementById('eventosA').setAttribute("class", "active");
  document.getElementById('subMenuEventosA').setAttribute("class", "nav collapse in");
  document.getElementById('crearEvento').setAttribute("class", "active");
</script>
<h3>
  Registrar Evento
</h3>
<div class="row">
  <div class="col-lg-12">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" data-parsley-validate="" novalidate="" method="POST" enctype="multipart/form-data">
      <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
        <div class="panel-heading" >
          Datos del Evento
        </div>
        <div class="panel-body">
          <!--Nombre de Evento-->
          <div class="form-group col-lg-6">
            <label class="control-label">Nombres del evento *</label>
            <input type="text" name="nombre_Evento" required class="form-control" value="">
          </div>
           <!--DT del Evento-->
           <div class="form-group col-lg-6">
            <label class="control-label">Fecha y Hora del evento *</label>
            <div class="datetimepicker input-group date col-lg-12">
              <input type="text" class="form-control" name="dt_Evento" required>
              <span class="input-group-addon ">
                <span class="fa fa-calendar"></span>
              </span>
            </div>
          </div>
          <!--Imagen de evento -->
          <div class="form-group col-lg-6">
           <label class="control-label">Imagen del elemento</label>
           <input type="file" name="foto_Evento" data-classbutton="btn btn-default" data-classinput="form-control inline" class="filestyle form-control">
          </div>
          <!--Estado del Evento-->
          <div class="form-group col-lg-6">
            <label class="control-label">Estado de Evento</label>
            <select name="estado_Evento" class="form-control m-b" required>
              <option value="1">Habilitado</option>
              <option value="0">Deshabilidato</option>
            </select>
          </div>
          <!--Descripcion del Evento-->
          <div class="form-group col-lg-12">
            <label class="control-label">Descripción del evento *</label>
            <input type="" name="descripcion_Evento" required class="form-control" value="" maxlength="100">
          </div>
		  </div>
          <div class="panel-footer">
            <div class="clearfix">
              <div class="pull-right">
                <button type="submit" class="btn btn-purple">Registrar</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
