<?php
    include_once('controlador/ControladorEvento.php');
    require('modelo/Carbon.php');
    use Carbon\Carbon;
    date_default_timezone_set('America/Bogota');
    $carbon = new Carbon();
    $controladorEvento = new ControladorEvento();
    $infoEvento = $controladorEvento-> verE($_GET['id_Evento']);

    if (!empty($_POST)) {
        $id_Evento = $_GET['id_Evento'];
        $nombreE = $_POST['nombre_Evento'];
        $dt = Carbon::parse($_POST['dt_Evento']);
        $fechaE = $dt-> toDateString();
        $horaE = $dt-> toTimeString();
        $descE = $_POST['descripcion_Evento'];
        if (file_exists($_FILES['foto_Evento']['tmp_name'])) {
            $archivo =  $_FILES['foto_Evento']['tmp_name'];
            $destino = "app/img/".$_FILES['foto_Evento']['name'];
            move_uploaded_file($archivo, $destino);
            $_POST['foto_Evento'] = $destino;
          }else{
            $destino = $infoEvento['foto_Evento'];
          }
          $controladorEvento-> actualizarE($id_Evento, $nombreE, $descE, $horaE, $fechaE, $destino);
        echo "<div class='alert alert-warning alert-dismissable'>";
        echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>El Evento fue actualizado exitosamente. <a href='?vista=eventos' class='alert-link'> Regresar a Eventos</a>.</div>";
    }

?>
<script type="text/javascript">
  document.getElementById('eventosA').setAttribute("class", "active");
  document.getElementById('subMenuEventosA').setAttribute("class", "nav collapse in");
</script>
<h3>
  Modificar Evento
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
            <label class="control-label">Nombre del evento *</label>
            <input type="text" name="nombre_Evento" required class="form-control" value="<?php echo $infoEvento['nombre_Evento']?>">
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
          <!--Descripcion del Evento-->
          <div class="form-group col-lg-6">
            <label class="control-label">Descripción del evento *</label>
            <input type="" name="descripcion_Evento" required class="form-control" value="<?php echo $infoEvento['descripcion_Evento']?>" maxlength="100">
          </div>
		  </div>
          <div class="panel-footer">
            <div class="clearfix">
              <div class="pull-right">
                <button type="submit" class="btn btn-purple">Actualizar</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>