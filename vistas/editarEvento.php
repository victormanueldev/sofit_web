<?php
  include_once('Controlador/ControladorEvento.php');
  $controlador = new ControladorEvento();
  $resultado = $controlador-> indexEvento();
  if (!empty($_POST)) {
    $controlador-> editarE(
      $_POST['id_Evento'],
      $_POST['estado_Evento']
    );
    echo "<script>window.location.href = '?vista=editarEvento'; </script>";
  }
?>
<script type="text/javascript">
  document.getElementById('eventosA').setAttribute("class", "active");
  document.getElementById('subMenuEventosA').setAttribute("class", "nav collapse in");
  document.getElementById('editarEvento').setAttribute("class", "active");
</script>
<h3>
  Habilitar Eventos
</h3>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
    <div class="panel-heading">
      Listado de Eventos
    </div>
    <!-- START table-responsive-->
    <div class="panel-body">
     <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
           <thead>
              <tr>
                 <th>Código</th>
                 <th>Nombre Evento</th>
                 <th>Fecha</th>
                 <th>Hora</th>
                 <th>Estado</th>
                 <th style="text-align: center">Acción</th>
              </tr>
           </thead>
           <tbody>
             <?php while ($fila = mysqli_fetch_assoc($resultado)) {?>
              <tr>
                <form method="POST" data-parsley-validate="" novalidate="" action="<?php $_SERVER['PHP_SELF']?>">
                 <td><?php echo $fila['codigo_Evento'] ?></td>
                 <td><?php echo $fila['nombre_Evento'] ?></td>
                 <td><?php echo $fila['fecha_Evento'] ?></td>
                 <td><?php echo $fila['hora_Evento'] ?></td>
                 <input type="hidden" name="id_Evento" value="<?php echo $fila['id_Evento']; ?>" >

                 <td>
                   <?php if($fila['estado_Evento'] != 0) {?>
                    <input type="hidden" name="estado_Evento" value="0" >
                    <div class="label label-warning" style="padding: 1.9px 15.6px;background-color: #fc704c;">Habilitado</div>
                  <?php }else{ ?>
                     <input type="hidden" name="estado_Evento" value="1" >
                    <div class="label label-danger">Deshabilitado</div>
                  <?php } ?>
                 </td>
                 <td class="text-center">
                   <button type="submit" class="btn btn-purple" name="enviarE" >
                     Cambiar Estado
                   </button>
                 </td>
              </form>
              </tr>
              <?php } ?>
           </tbody>
        </table>
     </div>
     <!-- END table-responsive-->
    </div>
   </div>
  </div>
</div>
