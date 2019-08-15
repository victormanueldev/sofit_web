<script type="text/javascript">
  document.getElementById('body').setAttribute("class", "aside-collapsed");
  document.getElementById('inicio').setAttribute("class", "active");
</script>
<h3>
   Página Principal
</h3>
<div class="row" >
  <div data-toggle="notify" data-onload data-message="&lt;b&gt;¡Bienvenido&lt;/b&gt; al menú de inicio!" data-options="{&quot;status&quot;:&quot;warning&quot;, &quot;pos&quot;:&quot;bottom-right&quot;}" class="hidden-xs"></div>
  <div class="col-lg-12">
    <!-- START panel-->
    <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
       <div class="panel-heading">Has iniciado sesión como <strong>Entrenador</strong>
          <a href="#" data-perform="panel-dismiss" data-toggle="tooltip" title="Cerrar" class="pull-right">
             <em class="fa fa-close"></em>
          </a>
       </div>
    </div>
  </div>
    <!-- END panel-->
 </div>
 <div class="row" >
  <!-- Card Asistencia -->
  <div class="col-lg-4 col-md-6">
    <!-- START panel-->
    <div class="panel panel-danger anim-running anim-done" data-onload data-toggle="play-animation" data-play="fadeInLeft" data-offset="0" data-delay="100" style="">
       <div class="panel-heading" style="background-color: #fc704c">
          <div class="row">
             <div class="col-xs-3">
                <em class="fa fa-id-card-o fa-4x" style="font-size: 3.7em;"></em>
             </div>
             <div class="col-xs-9 text-right">
                <div class="text-lg">Asistencia</div>
                <p class="m0">Registro de Asistencia al gimansio</p>
             </div>
          </div>
       </div>
       <a href="vistas/registroAsistencia.php" class="panel-footer bg-dark bt0 clearfix btn-block" style="background-color: #373c38;">
          <span class="pull-left">Abrir Asistencia</span>
          <span class="pull-right">
             <em class="fa fa-chevron-circle-right"></em>
          </span>
       </a>
    </div>
    <!-- END panel-->
  </div>
  <!-- END Card Asistencia -->
  <!-- Card Antropometria -->
  <div class="col-lg-4 col-md-6">
   <!-- START panel-->
   <div class="panel panel-danger">
      <div class="panel-heading" style="background-color: #fc704c">
         <div class="row">
            <div class="col-xs-3">
               <em class="fa fa-universal-access fa-4x"></em>
            </div>
            <div class="col-xs-9 text-right">
               <div class="text-lg">Antropometría</div>
               <p class="m0">Datos antropométricos del usuario</p>
            </div>
         </div>
      </div>
      <a href="?vista=crearDatosAntropometricos" class="panel-footer bg-dark bt0 clearfix btn-block" style="background-color: #373c38;">
         <span class="pull-left">Evaluar a un usuario</span>
         <span class="pull-right">
            <em class="fa fa-chevron-circle-right"></em>
         </span>
      </a>
   </div>
   <!-- END panel-->
  </div>
  <!-- END Card Rutinas -->
  <div class="col-lg-4 col-md-6">
    <!-- START panel-->
    <div class="panel panel-danger">
       <div class="panel-heading" style="background-color: #fc704c">
          <div class="row">
             <div class="col-xs-3">
                <em><img src="app/img/icon_mancuerna.png" alt="" style="width: 60px;"></em>
             </div>
             <div class="col-xs-9 text-right">
                <div class="text-lg">Rutinas</div>
                <p class="m0">Asignación de rutinas a usuarios</p>
             </div>
          </div>
       </div>
       <a href="?vista=seleccionarEjercicio" class="panel-footer bg-dark bt0 clearfix btn-block" style="background-color: #373c38;">
          <span class="pull-left">Asignar una nueva rutina</span>
          <span class="pull-right">
             <em class="fa fa-chevron-circle-right"></em>
          </span>
       </a>
    </div>
    <!-- END panel-->
  </div>
</div>
<div class="row" >
  <!-- END Card Rutinas -->
  <!-- Card Inventario -->
  <div class="col-lg-4 col-md-6">
    <!-- START panel-->
    <div class="panel panel-danger">
       <div class="panel-heading" style="background-color: #fc704c">
          <div class="row">
             <div class="col-xs-3">
                <em class="fa fa-list-alt fa-4x" style="font-size: 4.3em;"></em>
             </div>
             <div class="col-xs-9 text-right">
                <div class="text-lg">Inventario</div>
                <p class="m0">Control de los elementos del gimnasio</p>
             </div>
          </div>
       </div>
       <a href="?vista=crearInventario" class="panel-footer bg-dark bt0 clearfix btn-block" style="background-color: #373c38;">
          <span class="pull-left">Realizar el inventario</span>
          <span class="pull-right">
             <em class="fa fa-chevron-circle-right"></em>
          </span>
       </a>
    </div>
    <!-- END panel-->
  </div>
  <!-- END Card Inventario -->
  <!-- Card Eventos -->
  <div class="col-lg-4 col-md-6">
    <!-- START panel-->
    <div class="panel panel-danger">
       <div class="panel-heading" style="background-color: #fc704c">
          <div class="row">
             <div class="col-xs-3">
                <em class="fa fa-calendar fa-4x"></em>
             </div>
             <div class="col-xs-9 text-right">
                <div class="text-lg">Eventos</div>
                <p class="m0">Ver todos los eventos</p>
             </div>
          </div>
       </div>
       <a href="?vista=verEventos" class="panel-footer bg-dark bt0 clearfix btn-block" style="background-color: #373c38;">
          <span class="pull-left">Ver Eventos</span>
          <span class="pull-right">
             <em class="fa fa-chevron-circle-right"></em>
          </span>
       </a>
    </div>
    <!-- END panel-->
  </div>
  <!-- END Card Eventos -->
  <!-- Card Novedades -->
  <div class="col-lg-4 col-md-6">
    <!-- START panel-->
    <div class="panel panel-danger">
       <div class="panel-heading" style="background-color: #fc704c">
          <div class="row">
             <div class="col-xs-3">
                <em class="fa fa-bullhorn fa-4x"></em>
             </div>
             <div class="col-xs-9 text-right">
                <div class="text-lg">Novedades</div>
                <p class="m0">Control de novedades del gimnasio</p>
             </div>
          </div>
       </div>
       <a href="?vista=novedades" class="panel-footer bg-dark bt0 clearfix btn-block" style="background-color: #373c38;">
          <span class="pull-left">Registrar un novedad</span>
          <span class="pull-right">
             <em class="fa fa-chevron-circle-right"></em>
          </span>
       </a>
    </div>
    <!-- END panel-->
  </div>
  <!-- END Card Novedades -->
</div>
<div class="row">
  <div class="col-lg-12">
    <!-- START panel-->
    <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
       <div class="panel-heading">Modificación de datos de usuarios
          <a href="#" data-perform="panel-dismiss" data-toggle="tooltip" title="Cerrar" class="pull-right">
             <em class="fa fa-close"></em>
          </a>
       </div>
    </div>
    <!-- END panel-->
 </div>
  <!--Card Epicrisis -->
  <div class="col-lg-6">
    <a href="?vista=rutinas" class="" style="text-decoration: none;">
     <!-- START widget-->
     <div class="panel widget">
        <div class="row row-table row-flush">
           <div class="col-xs-4 bg-danger text-center" >
              <em class="fa fa-cog fa-4x"></em>
           </div>
           <div class="col-xs-8">
              <div class="panel-body text-center">
                 <h4 class="mt0" style="color: #fc704c;">Modificar Rutinas</h4>
                 <p class="mb0 text-muted">Modifica rutinas de usuarios</p>
              </div>
           </div>
        </div>
     </div>
     </a>
     <!-- END widget-->
  </div>
  <div class="col-lg-6">
    <a href="?vista=editarDatosAntropometricos" class="" style="text-decoration: none;">
     <!-- START widget-->
     <div class="panel widget">
        <div class="row row-table row-flush">
           <div class="col-xs-4 bg-danger text-center" >
              <em  class="fa fa-refresh fa-4x"></em>
           </div>
           <div class="col-xs-8">
              <div class="panel-body text-center">
                 <h4 class="mt0" style="color: #fc704c;">Actualizar Medidas</h4>
                 <p class="mb0 text-muted">Actualiza evaluaciones antrop.</p>
              </div>
           </div>
        </div>
     </div>
     </a>
     <!-- END widget-->
  </div>
</div>
