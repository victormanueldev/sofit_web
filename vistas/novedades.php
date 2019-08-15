<?php
  include_once('controlador/ControladorNovedad.php');
  $controladorNovedad = new ControladorNovedad();
  $resultado = $controladorNovedad-> indexNovedad();
?>
<script type="text/javascript">
  document.getElementById('novedades').setAttribute("class", "active");
  document.getElementById('subMenuNovedades').setAttribute("class", "nav collapse in");
  document.getElementById('indexNovedades').setAttribute("class", "active");
</script>
<h3>
  Novedades
</h3>
<div class="row">
    <!-- Card Novedad -->
    <div class="col-lg-12 col-md-6">
      <!-- START panel-->
      <div class="panel panel-danger">
         <div class="panel-heading" style="background-color: #fc704c">
            <div class="row">
               <div class="col-xs-3">
                  <em class="fa fa-bullhorn fa-4x"></em>
               </div>
               <div class="col-xs-9 text-right">
                  <div class="text-lg">Registrar Novedad</div>
                  <p class="m0">Envía una novedad a los administradores del gimnasio</p>
               </div>
            </div>
         </div>
         <a href="?vista=crearNovedad" class="panel-footer bg-dark bt0 clearfix btn-block" style="background-color: #373c38;">
            <span class="pull-left">Registrar Novedad</span>
            <span class="pull-right">
               <em class="fa fa-chevron-circle-right"></em>
            </span>
         </a>
      </div>
      <!-- END panel-->
    </div>
    <!-- END Card Novedad -->
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
       <div class="panel-heading" >
          Listado de Novedades
       </div>
       <div class="panel-body">
          <table id="datatable1" class="table table-striped table-hover">
             <thead>
                <tr>
                   <th>ID</th>
                   <th >Descripción</th>
                   <th >Fecha</th>
                   <th >Hora</th>
                   <th >Enviado por</th>
                   <th >Estado</th>
                </tr>
             </thead>
             <tbody>
               <?php  while($fila = mysqli_fetch_array($resultado)): ?>
              <tr class="gradeX">
                <td><?php echo $fila['id_Novedad']; ?></td>
                <td><?php echo $fila['descripcion_Novedad']; ?></td>
                <td><?php echo $fila['fecha_Novedad']; ?></td>
                <td><?php echo $fila['hora_Novedad']; ?></td>
                <td><?php echo $fila['nombres_Usuario']; ?></td>
                <td>
                  <?php if($fila['estado_Novedad'] != "Enviado") {?>
                   <div class="label label-danger" style="padding: 1.9px 11.5px;">Revisado</div>
                 <?php }else{ ?>
                   <div class="label label-warning" style="padding: 1.9px 13.4px;background-color: #fc704c;">Enviado</div>
                 <?php } ?>
                </td>
              </tr>
            <?php endwhile; ?>
            </tbody>
           </table>
        </div>
    </div>
  </div>
</div>
