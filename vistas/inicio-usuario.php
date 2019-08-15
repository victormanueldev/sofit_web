<?php
  include_once ('controlador/ControladorUsuario.php');
  include_once('controlador/ControladorEpicrisis.php');
  include_once('controlador/ControladorRutina.php');
  //Instancias de los controladores
  $controladorUsuario = new ControladorUsuario();
  $controladorEpicrisis = new ControladorEpicrisis();
  $controladorRutina = new ControladorRutina();
  //Utilizacion de Metodos del Controlador
  $datosUsuario = $controladorUsuario-> verU($_SESSION['id_Usuario']);
  $epicrisisCompletada = $controladorEpicrisis-> epicrisisU($_SESSION['id_Usuario']);
  $existeEvaluacion = $controladorUsuario-> evaluacionU($_SESSION['id_Usuario']);
  $asistenciaRegistrada = $controladorUsuario-> asistenciaU($_SESSION['id_Usuario']);
  $rutinaAsignada = $controladorRutina-> rutinaUsuarioExiste($_SESSION['id_Usuario']);
  //Controla el progreso de la cuenta
  $progreso = 40;
  if($epicrisisCompletada){
    $progreso+=15;//Suma puntos
  }
  if ($existeEvaluacion) {
    $progreso+=10;
  }
  if ($asistenciaRegistrada) {
    $progreso+=10;
  }
  if ($rutinaAsignada) {
    $progreso+=25;
  }
?>
<!--Script para activar los li del Aside que estan desactivados-->
<script type="text/javascript">
  document.getElementById('inicio').setAttribute("class", "active");
</script>
<h3>
   Página Principal
   <small style="margin-top: 5px;">¡Hola! <strong> <?php echo $datosUsuario['nombres_Usuario']; ?> </strong> </small>
</h3>
<!--<div data-toggle="notify" data-onload data-message="&lt;b&gt;This is notify!&lt;/b&gt; Dismiss with a click or wait for it to disappear." data-options="{&quot;status&quot;:&quot;warning&quot;, &quot;pos&quot;:&quot;bottom-right&quot;}" class="hidden-xs"></div>-->
<div class="row" >
    <!--Card 55% completado-->
     <div class="col-xs-12 col-lg-12">
        <!-- START widget-->
        <div class="panel widget" >
           <div class="panel-body bg-purple text-center">
              <div class="radial-bar radial-bar-<?php echo $progreso; ?> radial-bar radial-bar-danger m0">
                 <img src="<?php echo $datosUsuario['foto_Usuario']; ?>" alt="" class="thumb64">
              </div>
              <p>
                 <strong> <?php echo $progreso; ?> / 100 Pts.</strong><br>
                 <span>Progreso de la cuenta</span>
              </p>
           </div>
        </div>
        <!-- END widget-->
     </div>
     <!--END Card 55% completado-->
   </div>
   <div class="row">
     <?php if ($progreso == 100) { ?>
       <div data-toggle="notify" data-onload data-message="&lt;b&gt;¡Gracias por hacer parte de SOFIT!&lt;/b&gt; Tu cuenta está completa." data-options="{&quot;status&quot;:&quot;warning&quot;, &quot;pos&quot;:&quot;bottom-right&quot;}" class="hidden-xs"></div>
       <!--Card Epicrisis Completada-->
       <div class="col-lg-6">
         <a href="#" style="text-decoration: none">
           <div class="panel widget">
              <div class="row row-table row-flush">
                 <div class="col-xs-4 bg-danger text-center">
                    <em class="fa fa-trophy fa-3x"></em>
                 </div>
                 <div class="col-xs-8">
                    <div class="panel-body text-center">
                       <h4 class="mt0" style="color: #fc704c;">¡FELICITACIONES!</h4>
                       <p class="mb0 text-muted">¡Tu cuenta ha sido Completada!</p>
                    </div>
                 </div>
              </div>
           </div>
         </a>
      </div>
      <!-- END Card Epicrisis Completada-->
       <?php } ?>
     <?php
      //Valida si la epicrisis esta completa y muestra el bloque de HTML
       if ($epicrisisCompletada) {
     ?>
      <!--Card Epicrisis Completada-->
      <div class="col-lg-6">
        <a href="?vista=verEpicrisis" style="text-decoration: none">
          <div class="panel widget">
             <div class="row row-table row-flush">
                <div class="col-xs-4 bg-danger text-center">
                   <em class="fa fa-heartbeat fa-3x"></em>
                </div>
                <div class="col-xs-8">
                   <div class="panel-body text-center">
                      <h4 class="mt0" style="color: #fc704c;">+ 15 Pts</h4>
                      <p class="mb0 text-muted">¡Epicrisis Completada!</p>
                   </div>
                </div>
             </div>
          </div>
        </a>
     </div>
     <!-- END Card Epicrisis Completada-->
     <?php }else { ?><!-- Cierra el If anterior y abre el else y ejecuta el bloque HTML-->
     <!--Card Epicrisis-->
     <div class="col-lg-6">
       <a href="?vista=registrarEpicrisis" class="" style="text-decoration: none">
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
      <?php } ?><!-- Cierra el else-->
      <?php if ($existeEvaluacion) { ?>
        <div class="col-lg-6">
          <a href="?vista=datosAntropometricosUsuario" class="" style="text-decoration: none">
           <!-- START widget-->
           <div class="panel widget">
              <div class="row row-table row-flush">
                 <div class="col-xs-4 bg-danger text-center" >
                    <em class="fa fa-universal-access fa-3x"></em>
                 </div>
                 <div class="col-xs-8">
                    <div class="panel-body text-center">
                       <h4 class="mt0" style="color: #fc704c;">+ 10 Pts</h4>
                       <p class="mb0 text-muted">¡Datos Antropométricos Completados!</p>
                    </div>
                 </div>
              </div>
           </div>
           </a>
           <!-- END widget-->
        </div>
      <?php }else{ ?>
       <div class="col-lg-6">
         <a href="?vista=datosAntropometricosUsuario" class="" style="text-decoration: none">
          <!-- START widget-->
          <div class="panel widget">
             <div class="row row-table row-flush">
                <div class="col-xs-4 bg-danger text-center" style="background-color: #373c38">
                   <em class="fa fa-universal-access fa-3x"></em>
                </div>
                <div class="col-xs-8">
                   <div class="panel-body text-center">
                      <h4 class="mt0" style="color: #373c38;">+ 10 Pts</h4>
                      <p class="mb0 text-muted">Completa los Datos Antropométricos</p>
                   </div>
                </div>
             </div>
          </div>
          </a>
          <!-- END widget-->
       </div>
      <?php } ?>
      <?php if ($rutinaAsignada) { ?>
        <div class="col-lg-6">
          <a href="?vista=rutinasUsuario" class="" style="text-decoration: none">
           <!-- START widget-->
           <div class="panel widget">
              <div class="row row-table row-flush">
                 <div class="col-xs-4 bg-danger text-center" >
                    <em><img src="app/img/icon_mancuerna.png" alt=""></em>
                 </div>
                 <div class="col-xs-8">
                    <div class="panel-body text-center">
                       <h4 class="mt0" style="color: #fc704c;">+ 25 Pts</h4>
                       <p class="mb0 text-muted">¡Tienes una nueva Rutina!</p>
                    </div>
                 </div>
              </div>
           </div>
           </a>
           <!-- END widget-->
        </div>
      <?php } else { ?>
        <div class="col-lg-6">
         <a href="?vista=rutinasUsuario" class="" style="text-decoration: none">
          <!-- START widget-->
          <div class="panel widget">
             <div class="row row-table row-flush">
                <div class="col-xs-4 bg-danger text-center" style="background-color: #373c38">
                   <em ><img src="app/img/icon_mancuerna.png" alt=""></em>
                </div>
                <div class="col-xs-8">
                   <div class="panel-body text-center">
                      <h4 class="mt0" style="color: #373c38;">+ 25 Pts</h4>
                      <p class="mb0 text-muted">Obtén una Rutina de Ejercicios</p>
                   </div>
                </div>
             </div>
          </div>
          </a>
          <!-- END widget-->
        </div>
        <?php } ?>
     <?php  if ($asistenciaRegistrada) { ?>
       <!-- Card Asistencia Evento-->
       <div class="col-lg-6">
         <a href="?vista=asistenciaEvento" class="" style="text-decoration: none">
          <!-- START widget-->
          <div class="panel widget">
             <div class="row row-table row-flush">
                <div class="col-xs-4 bg-danger text-center">
                   <em class="fa fa-street-view  fa-3x"></em>
                </div>
                <div class="col-xs-8">
                   <div class="panel-body text-center">
                      <h4 class="mt0" style="color: #fc704c;">+ 10 Pts</h4>
                      <p class="mb0 text-muted">¡Has asistido a un Evento!</p>
                   </div>
                </div>
             </div>
          </div>
          </a>
          <!-- END widget-->
       </div>
       <!-- END Card Asistecia Evento -->
      <?php }else{ ?>
     <!-- Card Asistencia Evento-->
     <div class="col-lg-6">
       <a href="?vista=asistenciaEvento" class="" style="text-decoration: none">
        <!-- START widget-->
        <div class="panel widget">
           <div class="row row-table row-flush">
              <div class="col-xs-4 bg-danger text-center" style="background-color: #373c38">
                 <em class="fa fa-street-view  fa-3x"></em>
              </div>
              <div class="col-xs-8">
                 <div class="panel-body text-center">
                    <h4 class="mt0" style="color: #373c38;">+ 10 Pts</h4>
                    <p class="mb0 text-muted">Asistir a un Evento lúdico/recreativo</p>
                 </div>
              </div>
           </div>
        </div>
        </a>
        <!-- END widget-->
     </div>
     <!-- END Card Asistecia Evento -->
     <?php } ?>
     <div class="col-lg-6">
       <a href="#" class="" style="text-decoration: none">
        <!-- START widget-->
        <div class="panel widget">
           <div class="row row-table row-flush">
              <div class="col-xs-4 bg-danger text-center" style="background-color: #fc704c">
                 <em class="fa fa-user-plus fa-3x"></em>
              </div>
              <div class="col-xs-8">
                 <div class="panel-body text-center">
                    <h4 class="mt0" style="color: #fc704c;">+ 40 Pts</h4>
                    <p class="mb0 text-muted">¡Registro Completado!</p>
                 </div>
              </div>
           </div>
        </div>
        </a>
        <!-- END widget-->
     </div>
</div>
