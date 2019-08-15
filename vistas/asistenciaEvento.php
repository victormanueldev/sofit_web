<?php
  include_once ('controlador/ControladorEvento.php');
  include_once('Controlador/ControladorControlAsistenciaEvento.php');
  include_once ('controlador/ControladorUsuario.php');
  //Instancia el Controlador de Usuario
  $controladorAE = new ControladorControlAsistenciaEvento();
  $controladorE = new ControladorEvento();
  $controladorUsuario = new ControladorUsuario();
  $eventoActivo = $controladorE-> eventosA();
  $datosUsuario = $controladorUsuario-> verU($_SESSION['id_Usuario']);

  if (!empty($_POST)) {
    $existeEvento = $controladorAE-> validarCodigo($_POST['codigo_Evento']);
    if (!$existeEvento) {
      echo "<div class='alert alert-danger alert-dismissable'>";
      echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>El Código del evento no es válido</a>.</div>";
    }else {
      $resul = $controladorAE-> crearCAE(
        $existeEvento,
        $_POST['id_Usuario'],
        $_POST['nombresAsistente'],
        $_POST['rolAsistente'],
        $_POST['calificacion']
      );
      if($resul){
        echo "<div class='alert alert-warning alert-dismissable'>";
        echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>La asistencia al evento ha sido registrada con éxito. </div>";
        
      }else{
        echo "<div class='alert alert-danger alert-dismissable'>";
        echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>La asistencia al evento no ha sido registrada debido a que este evento está inhabilitado.</div>";
      }
    }
  }
?>
<!--Script para activar los li del Aside que estan desactivados-->
<script type="text/javascript">
  document.getElementById('eventos').setAttribute("class", "active");
</script>
<h3>
   Asistencia a Eventos
</h3>
<div class="row" >
  <div class="col-lg-12">
    <!--Formulario de Asistencia-->
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" data-parsley-validate="" novalidate="">
       <!-- START panel-->
       <div class="panel panel-danger">
          <div class="panel-heading" style="background-color: #FC704C;">
             <div class="panel-title">Registrar Asistencia</div>
          </div>
          <div class="panel-body">
            <div class="form-group">
                <label class="control-label">Código del Evento *</label>
                <input type="text" name="codigo_Evento" required class="form-control" >
             </div>
            <input type="hidden" name="id_Usuario" required class="form-control" value="<?php echo $datosUsuario['id_Usuario']; ?>">
            <input type="hidden" name="rolAsistente" required class="form-control" value="<?php echo $datosUsuario['cargo']; ?>">

             <div class="form-group">
                <label class="control-label">Nombres Asistente *</label>
                <input type="text" name="nombresAsistente" required class="form-control" value="<?php echo $datosUsuario['nombres_Usuario']." ".$datosUsuario['apellidos_Usuario']; ?>">
             </div>
             <div class="form-group">
                <label class="control-label">Calificación del Evento *</label>
                  <select name="calificacion" class="form-control m-b" required="">
                    <option value="Excelente">Excelente</option>
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Malo">Malo</option>
                  </select>
             </div>
             <div class="required">* Campos requeridos</div>
          </div>
          <div class="panel-footer">
             <div class="clearfix">
                <div class="pull-right">
                   <button type="submit" class="btn btn-purple">Registrar</button>
                </div>
             </div>
          </div>
       </div>
       <!-- END panel-->
    </form>
    <!-- END Formulario Asistencia-->
 </div>
