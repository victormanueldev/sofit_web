<?php
  include_once('Controlador/ControladorEvento.php');
  $controlador = new ControladorEvento();
  $resultado = $controlador-> indexEvento();
?>
<script type="text/javascript">
  document.getElementById('eventos').setAttribute("class", "active");
  document.getElementById('subMenuEventos').setAttribute("class", "nav collapse in");
  document.getElementById('verEvento').setAttribute("class", "active");
</script>
<h3>
    Listado de Eventos
</h3>
<div class="row">
    <?php while($fila = mysqli_fetch_assoc($resultado)) {?>
    <div class="col-lg-6" >
        <!-- START widget-->
        <div class="panel widget">
            <div class="row row-table row-flush">
                <div class="col-xs-5">
                    <picture class="lateral-picture">
                        <img src="<?php echo $fila['foto_Evento']?>" alt="Imagen" style="width: 200px;height: 300px;">
                    </picture>
                </div>
                <div class="col-xs-7 align-middle p-lg">
                    <div class="pull-right">
                        <?php if($fila['estado_Evento'] != 0) {?>
                        <span  class="label label-purple">Habilitado</span>
                        <?php }else{ ?>
                        <span class="label label-purple" style="background-color: #373c38;">Deshabilitado</span>
                        <?php } ?>
                    </div>
                    <p>
                        <span class="text-lg"><?php echo $fila['codigo_Evento']?></span></p>
                    <p>
                        <strong><?php echo $fila['nombre_Evento']?></strong>
                    </p>
                    <p><?php echo $fila['descripcion_Evento']?>.</p>
                    <p><strong>Fecha: </strong><?php echo $fila['fecha_Evento']?></p>    
                    <p><strong>Hora: </strong><?php echo $fila['hora_Evento']?></p>    
                </div>
            </div>
        </div>
        <!-- END widget-->
    </div>
    <?php } ?>
</div>