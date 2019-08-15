<?php
  include_once('controlador/ControladorNovedad.php');
  require('modelo/Carbon.php');
	use Carbon\Carbon;
	//Definir la Zona horaria
	date_default_timezone_set('America/Bogota');
	//Instanciacion de Carbon)
	$carbon = new Carbon();
  $controladorNovedad = new ControladorNovedad();
  if (!empty($_POST)) {
    $descripcion_Novedad = $_POST['descripcion_Novedad'];
    $dt = Carbon::now();
    $fecha_Novedad = $dt-> toDateString();
    $hora_Novedad = $dt-> toTimeString();
    $estado_Novedad = "Enviado";
    $asunto = $_POST['asunto_Novedad'];
    $controladorNovedad-> crearNovedad(
      $asunto,
      $descripcion_Novedad,
      $estado_Novedad,
      $fecha_Novedad,
      $hora_Novedad,
      $_SESSION['id_Usuario']
    );

    echo  "<div class='alert alert-warning alert-dismissable'>";
    echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>La novedad fue enviada exitosamente. <a href='?vista=novedades' class='alert-link'> Regresar a Novedades</a>.</div>";
  }

?>
<script type="text/javascript">
  document.getElementById('novedades').setAttribute("class", "active");
  document.getElementById('subMenuNovedades').setAttribute("class", "nav collapse in");
  document.getElementById('crearNovedad').setAttribute("class", "active");
</script>
<h3>
  Registro de Novedades
</h3>
<div class="row">
  <div class="col-lg-12">
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" data-parsley-validate="" novalidate="">
        <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-right-color: #fff;border-bottom-color: #fff;">
          <div class="panel-body ">
            <!--Asunto -->
          <div class="form-group col-lg-6" style="padding: 0px 15px;">
               <label class="control-label">Asunto de la Novedad *</label>
               <input type="text" name="asunto_Novedad" required class="form-control">
            </div>
            <!--Descripcion -->
            <div class="form-group col-lg-6" style="padding: 0px 15px;">
               <label class="control-label">Descripción de la Novedad *</label>
               <input type="text" name="descripcion_Novedad" required class="form-control">
            </div>
          </div>
          <div class="panel-footer">
            <div class="clearfix">
              <div class="pull-left">
                  <div class="required">* Campos requeridos</div>
              </div>
              <div class="pull-right">
                <button type="submit" class="btn btn-purple">Registrar</button>
              </div>
            </div>
          </div>
        </div>
    </form>
  </div>
</div>
