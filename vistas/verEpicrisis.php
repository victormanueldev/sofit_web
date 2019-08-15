<?php
  include_once('controlador/ControladorEpicrisis.php');
  include_once ('controlador/ControladorUsuario.php');
  $controladorUsuario = new ControladorUsuario();
  $datosUsuario = $controladorUsuario-> verU($_SESSION['id_Usuario']);

  //Instancia el Controlador de Epicrisis
  $controlador = new ControladorEpicrisis();
  $resultado = $controlador-> indexEpicrisisUsuario($_SESSION['id_Usuario']);
  $fila = mysqli_fetch_array($resultado);
  //Array de Nombres de enfermedades
  $nombreEmfermedad[1] = "Hipertensión";
  $nombreEmfermedad[2] = "Enfermedad Cardiaca";
  $nombreEmfermedad[3] = "Cáncer";
  $nombreEmfermedad[4] = "Sida";
  $nombreEmfermedad[5] = "Hepatitis";
  $nombreEmfermedad[6] = "Epilepsia";
  $nombreEmfermedad[7] = "Alergias";
  $nombreEmfermedad[8] = "Asma";
  $nombreEmfermedad[9] = "Convulsiones";
  $nombreEmfermedad[10] = "Coagulantes";
  $nombreEmfermedad[11] = "Hipoglicemia";
  $nombreEmfermedad[12] = "Embarazo";
  $nombreEmfermedad[13] = "Diabetes";
  $cont = 0;
  //Recorre el resultado de la consulta y valida si tiene algun antecedente
  for ($i=1; $i <= 13; $i++) {
    if ($fila[$i] == 1) {//Presenta antecedente
      $cont+=1;
      }
    }
?>
<!--Script para activar los li del Aside que estan desactivados-->
<script type="text/javascript">
  document.getElementById('epicrisis').setAttribute("class", "active");
</script>
<h3>
   Epicrisis
</h3>
<div class="row">
<?php if (isset($fila[0])) { //Valida si el usuario lleno el formulario de epicrisis?>
  <?php if ($cont == 0) { //No presenta antecedentes ?>
    <!--Card Estado-->
    <div class="col-lg-12 col-md-6">
      <!-- START panel-->
      <div class="panel panel-green">
        <div class="panel-heading" style="background-color: #fc704c;">
          <div class="row">
            <div class="col-xs-3">
              <em class="fa fa-heartbeat fa-5x"></em>
            </div>
            <div class="col-xs-9 text-right">
              <div class="text-lg">Apto</div>
              <p class="m0">Sus antecedentes médicos son favorables para iniciar con el entrenamiento</p>
            </div>
          </div>
        </div>
        <a href="?vista=rutinasUsuario" class="panel-footer bg-dark bt0 clearfix btn-block" style="background-color: #373c38">
          <span class="pull-left">Ver rutinas</span>
          <span class="pull-right">
            <em class="fa fa-tasks"></em>
          </span>
        </a>
      </div>
      <!-- END panel-->
    </div>
    <!--END Card Estado-->
    <?php }else { //Presenta antecedentes?>
      <!--Card Estado NO Apto-->
      <div class="col-lg-12 col-md-6">
        <!-- START panel-->
        <div class="panel panel-danger">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <em class="fa fa-heartbeat fa-5x"></em>
              </div>
              <div class="col-xs-9 text-right">
                <div class="text-lg">No Apto</div>
                <p class="m0">Sus antecedentes médicos no son favorables para iniciar con el entrenamiento</p>
              </div>
            </div>
          </div>
        </div>
        <!-- END panel-->
      </div>
      <!--END Card Estado No Apto-->
      <div class="col-lg-12">
        <!-- START panel-->
        <div class="panel panel-danger">
           <div class="panel-heading" style="background-color: #373c38">¡Importante!</div>
           <div class="panel-body text-justify">
              <p>Acércate a las instalaciones del Gimanasio SENA y pide una asesoría al instructor de turno, antes de empezar cualquier entrenamiento.</p>
           </div>

           <div class="panel-footer">
             <a href="#">Leer Reglamento</a>
           </div>
        </div>
        <!-- END panel-->
     </div>
    <?php } ?>

    <?php for ($i=1; $i <= 13 ; $i++) { //Recorre la consulta ?>
    <!--Card Enfermedades-->
    <div class="col-lg-12 col-md-4">
        <div class="panel b0 oh">
           <div class="panel-heading mb-xl">
            <?php if ($fila[$i] == 0) { //Sin antecedentes ?>
              <div class="pull-right label label-success fa-lg" style="margin-top: 10px;background-color: #fc704c;"><em class="fa fa-check fa-1x"></em></div>
              <div class="panel-title"><?php echo $nombreEmfermedad[$i]; ?></div>
              <span class="circle circle-green ml0" style="background-color: #fc704c"></span>
              <small class="text-muted">Sin antecedentes</small>
              <?php } else { //Con antecedentes?>
                <div class="pull-right label label-success fa-lg" style="margin-top: 10px;background-color: #373c38;padding-right: 13px;padding-left: 13px;padding-bottom: 6.5px;"><em class="fa fa-close fa-1x"></em></div>
                <div class="panel-title"><?php echo $nombreEmfermedad[$i]; ?></div>
                <span class="circle circle-danger ml0" style="background-color: #373c38"></span>
                <small class="text-muted">Antecedente Encontrado</small>
                <?php } ?>
           </div>
        </div>
     </div>
     <!--END Card Enfermedades-->
     <?php } ?>
  <?php }else { ?>
    <!-- START widget-->
    <div class="col-lg-12">
      <div class="panel widget">
         <div class="panel-body bg-purple text-center">
            <p>
               <img src="<?php echo $datosUsuario['foto_Usuario']; ?>" alt="" class="img-circle thumb64">
            </p>
            <p>
               <strong><?php echo $datosUsuario['nombres_Usuario']; ?></strong>
               <span>Todavía no has completado el formulario de Epicrisis.</span>
            </p>
         </div>
      </div>
    </div>
    <!-- END widget-->
    <!--Card Epicrisis-->
    <div class="col-lg-6">
      <a href="?vista=registrarEpicrisis" class="">
       <!-- START widget-->
       <div class="panel widget">
          <div class="row row-table row-flush">
             <div class="col-xs-4 bg-danger text-center" style="background-color: #373c38">
                <em class="fa fa-heartbeat fa-3x"></em>
             </div>
             <div class="col-xs-8">
                <div class="panel-body text-center">
                   <h4 class="mt0" style="color: #373c38;">+ 15 Pts</h4>
                   <p class="mb0 text-muted">Llena la ficha de Epicrisis</p>
                </div>
             </div>
          </div>
       </div>
       </a>
       <!-- END widget-->
    </div>
    <!--END Card Epicrisis-->
  <?php } ?>
</div>
