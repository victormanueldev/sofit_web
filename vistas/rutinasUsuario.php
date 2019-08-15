<?php
  include_once('controlador/ControladorRutina.php');
  include_once ('controlador/ControladorUsuario.php');
  //Instanciacion de los Controladores
  $controladorUsuario = new ControladorUsuario();
  $controlador = new ControladorRutina();
  //Utilizacion de metodos
  $datosUsuario = $controladorUsuario-> verU($_SESSION['id_Usuario']);
  $rutinaAsignada = $controlador-> rutinaUsuarioExiste($_SESSION['id_Usuario']);
  if ($rutinaAsignada) {
    $rutina = $controlador->rutinaU($_SESSION['id_Usuario']);
    $datosRutina = $controlador->datosRutina($_SESSION['id_Usuario']);
  }
?>
<!--Script para activar los li del Aside que estan desactivados-->
<script type="text/javascript">
  document.getElementById('rutinas').setAttribute("class", "active");
</script>
<h3>
   Rutinas
</h3>
<?php if($rutinaAsignada){ ?>
<div data-toggle="notify" data-onload data-message="&lt;b&gt;¡Hola!&lt;/b&gt; Esta es la rutina de ejercicios asignada" data-options="{&quot;status&quot;:&quot;warning&quot;, &quot;pos&quot;:&quot;bottom-right&quot;}" class="hidden-xs"></div>
<div class="row" >
  <div class="col-lg-12">
    <!-- START panel-->
    <div class="panel panel-danger">
       <div class="panel-heading" style="background-color: #fc704c;">
          <div class="row">
             <div class="col-xs-3">
                <em ><img src="app/img/icon_mancuerna.png" alt=""></em>
             </div>
             <div class="col-xs-9 text-right" style="padding-top: 6px;">
                <div class="text-md" style="font-size: 22px;font-weight: bold;"><?php $filaDatos = mysqli_fetch_assoc($datosRutina); echo $filaDatos['nombre_Rutina']; ?></div>
                <p class="m0">¡Tienes una nueva rutina!</p>
             </div>
          </div>
       </div>
       <a href="#" class="panel-footer bg-dark bt0 clearfix btn-block" style="background-color: #373c38;">
          <span class="pull-left text-sm">Creada: <?php echo $filaDatos['fecha_Creacion'] ?></span>
          <span class="pull-right text-sm">Actualizada: <?php echo $filaDatos['fecha_Actualizacion'] ?></span>
       </a>
    </div>
    <!-- END panel-->
  </div>
</div>
<div class="row" >
  <div class="col-lg-12">
    <!-- START panel-->
    <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
       <div class="panel-heading">Listado de ejercicios
          <a href="#" data-perform="panel-dismiss" data-toggle="tooltip" title="Información" class="pull-right">
             <em class="fa fa-exclamation-circle"></em>
          </a>
       </div>
    </div>
    <!-- END panel-->
 </div>
 <?php while($filas = mysqli_fetch_assoc($rutina)) { ?>
 <!-- Card Ejercicio -->
  <div class="col-lg-4">
    <!-- START widget-->
    <div class="panel widget">
    <div class="panel-heading text-center" style="background-color: #FC704C;color: #fff; font-size: 17px;"><?php echo $filas['nombre_Ejercicio'] ?></div>
       <img src="<?php echo $filas['foto_Ejercicio'] ?>" alt="Image" class="img-responsive" style="width: 100%; height: 250px;">
       <div class="panel-body" style="background-color: #373c38e6;">
          <div class="row row-table text-center text-white" >
             <div class="col-xs-4">
                <p>Repet.</p>
                <h3 class="m0 text-purple"><?php echo $filas['repeticiones'] ?></h3>
             </div>
             <div class="col-xs-4">
                <p>Series</p>
                <h3 class="m0 text-purple"><?php echo $filas['series'] ?></h3>
             </div>
             <div class="col-xs-4">
                <p>Tiempo</p>
                <h3 class="m0 text-purple"><?php echo $filas['tiempo']."'" ?></h3>
             </div>
          </div>
       </div>
    </div>
    <!-- END widget-->
 </div>
 <!-- END Card ejercicio-->
<?php } ?>
</div>
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
             <span>Todavía no tienes una rutina de ejercicios asignada</span>
          </p>
       </div>
    </div>
  </div>
  <!-- END widget-->
  <div class="col-lg-12">
   <!-- START panel-->
   <div class="panel panel-warning">
      <div class="panel-heading" style="background-color: #FC704C;">¡Importante!</div>
      <div class="panel-body text-justify">
         <p>Dirígete a las instalaciones del Gimnasio SENA y pide al instructor que te asigne una rutina.</p>
      </div>
   </div>
   <!-- END panel-->
 </div>
 <?php } ?>
