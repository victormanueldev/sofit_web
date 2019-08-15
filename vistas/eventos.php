<?php
  include_once('Controlador/ControladorEvento.php');
  $controlador = new ControladorEvento();
  $resultado = $controlador-> indexEvento();
?>
<script type="text/javascript">
  document.getElementById('eventosA').setAttribute("class", "active");
  document.getElementById('subMenuEventosA').setAttribute("class", "nav collapse in");
  document.getElementById('indexEventos').setAttribute("class", "active");
</script>
<h3>
  Eventos
</h3>
<div class="row">
  <!-- Card Eventos -->
  <div class="col-lg-6 col-md-6">
    <!-- START panel-->
    <div class="panel panel-danger">
       <div class="panel-heading" style="background-color: #fc704c">
          <div class="row">
             <div class="col-xs-3">
                <em class="fa fa-calendar-plus-o fa-5x"></em>
             </div>
             <div class="col-xs-9 text-right">
                <div class="text-lg">Crear un Evento</div>
                <p class="m0">Registra un nuevo evento</p>
             </div>
          </div>
       </div>
       <a href="?vista=crearEvento" class="panel-footer bg-dark bt0 clearfix btn-block" style="background-color: #373c38;">
          <span class="pull-left">Crear evento</span>
          <span class="pull-right">
             <em class="fa fa-chevron-circle-right"></em>
          </span>
       </a>
    </div>
    <!-- END panel-->
  </div>
  <!-- END Card Eventos -->
  <!-- Card Eventos -->
  <div class="col-lg-6 col-md-6">
    <!-- START panel-->
    <div class="panel panel-danger">
       <div class="panel-heading" style="background-color: #fc704c">
          <div class="row">
             <div class="col-xs-3">
                <em class="fa fa-calendar-minus-o fa-5x"></em>
             </div>
             <div class="col-xs-9 text-right">
                <div class="text-lg">Habilitar Evento</div>
                <p class="m0">Cambia el estado de un evento evento</p>
             </div>
          </div>
       </div>
       <a href="?vista=editarEvento" class="panel-footer bg-dark bt0 clearfix btn-block" style="background-color: #373c38;">
          <span class="pull-left">Habilitar evento</span>
          <span class="pull-right">
             <em class="fa fa-chevron-circle-right"></em>
          </span>
       </a>
    </div>
    <!-- END panel-->
  </div>
  <!-- END Card Eventos -->
</div>
<div class="row">
  <?php while ($fila = mysqli_fetch_assoc($resultado)) {
    if ($fila['estado_Evento'] != 0) { ?>
      <!--Card Eventos-->
      <div class="col-lg-6">
          <div class="panel widget">
             <div class="row row-table row-flush">
                <div class="col-xs-4 bg-danger text-center">
                  <img src="<?php echo $fila['foto_Evento'];?>" alt="" width="100%" height="80px">
                </div>
                <div class="col-xs-5">
                   <div class="panel-body text-center">
                      <h4 class="mt0" style="color: #fc704c;"><?php echo $fila['codigo_Evento']; ?></h4>
                      <p class="mb0 text-muted"><?php echo $fila['nombre_Evento']; ?></p>
                   </div>
                </div>
                <div class="col-xs-3">
                   <div class="panel-body text-center" style="padding: 0;">
                      <a href="?vista=actualizarEvento&id_Evento=<?php echo $fila['id_Evento']; ?>">Editar</a>
                      <h5 style="color: #fc704c">Habilitado</h5>
                   </div>
                </div>
             </div>
          </div>

     </div>
     <!-- END Eventos-->
   <?php }else{ ?>
     <!--Card Eventos-->
     <div class="col-lg-6">

         <div class="panel widget">
            <div class="row row-table row-flush">
               <div class="col-xs-4 bg-danger text-center" >
                 <img src="<?php echo $fila['foto_Evento'];?>" alt="" width="100%" height="80px" >
               </div>
               <div class="col-xs-5" style="background-color: #ececec;">
                  <div class="panel-body text-center">
                     <h4 class="mt0" style="color: #373c38;"><?php echo $fila['codigo_Evento']; ?></h4>
                     <p class="mb0 text-muted"><?php echo $fila['nombre_Evento']; ?></p>
                  </div>
               </div>
               <div class="col-xs-3" style="background-color: #ececec;">
                  <div class="panel-body text-center" style="padding: 0;">
                    <a href="?vista=actualizarEvento&id_Evento=<?php echo $fila['id_Evento']; ?>">Editar</a>
                     <h5>Deshabilitado</h5>
                  </div>
               </div>
            </div>
         </div>

    </div>
    <!-- END Eventos-->
 <?php }} ?>
</div>
