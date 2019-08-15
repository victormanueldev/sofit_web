<?php
  include_once('controlador/ControladorNovedad.php');
  $controladorNovedad = new ControladorNovedad();
  $resultado = $controladorNovedad-> indexNovedad();
  $totales = $controladorNovedad-> cantNovedades();
?>
<script type="text/javascript">
  document.getElementById('gNovedades').setAttribute("class", "active");
  document.getElementById('subMenuGNovedades').setAttribute("class", "nav collapse in");
  document.getElementById('bandejaNovedad').setAttribute("class", "active");
</script>
<h3>
    Novedades
</h3>
<div class="row">
    <div class="col-lg-2">
        <!-- START mailbox list-->
        <div class="mb-boxes">
            <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active">
                        <a href="#">
                        <span class="label label-purple pull-right"><?php echo $totales['cantidad_Novedad']?></span>
                        <em class="fa fa-inbox fa-fw fa-lg"></em>
                        <span>Total</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <span class="label label-purple pull-right"><?php echo $totales['cantidad_Enviado']?></span>
                        <em class="fa fa-paper-plane-o fa-fw fa-lg"></em>
                        <span style="color: #656565;">Nuevos</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <span class="label label-purple pull-right"><?php echo $totales['cantidad_Revisado']?></span>
                        <em class="fa fa-envelope-open-o fa-fw fa-lg"></em>
                        <span style="color: #656565;">Revisados</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            </div>
        </div>
        <!-- END mailbox list-->
    </div>
    <div class="col-lg-10">
        <!-- START Mails-->
        <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
            <div class="panel-body">
                <table class="table table-hover mb-mails">
                    <tbody>
                        <?php while($fila = mysqli_fetch_assoc($resultado)){?>
                        
                        <tr class="mb-mail">
                            <td class="text-center">
                                <?php if ($fila['estado_Novedad'] == "Enviado") { ?>
                                    <em class="fa fa-exclamation-circle fa-lg text-purple"></em>
                                <?php }else{?>
                                    <em class="fa fa-check-circle fa-lg text-muted"></em>
                                <?php }?>
                            </td> 
                            <td>
                            <div class="mb-mail-date"><?php echo $fila['fecha_Novedad']." ".$fila['hora_Novedad']?></div>
                            <img src="<?php echo $fila['foto_Usuario']?>" alt="Mail Avatar" class="mb-mail-avatar">
                            <div class="pull-left">
                                <?php if ($fila['estado_Novedad'] == "Enviado") { ?>
                                    <div class="mb-mail-from" style="color: #4e4e4e;"><?php echo $fila['nombres_Usuario']." ".$fila['apellidos_Usuario']?>  <em class="label label-purple" style="margin-left: 20px;">Nuevo</em></div>
                                    <a href="?vista=verNovedad&idn=<?php echo $fila['id_Novedad']?>"><div class="mb-mail-subject" style="color: #4e4e4e;"><?php echo $fila['asunto_Novedad']?> </div></a>
                                <?php }else{?>
                                    <div class="mb-mail-from " style="color: #4e4e4e;font-weight: 400;"><?php echo $fila['nombres_Usuario']." ".$fila['apellidos_Usuario']?></div>
                                    <a href="?vista=verNovedad&idn=<?php echo $fila['id_Novedad']?>"><div class="mb-mail-subject " style="color: #4e4e4e;font-weight: 400;"><?php echo $fila['asunto_Novedad']?></div></a>
                                <?php }?>
                            </div>
                            <div class="mb-mail-preview"><?php echo $fila['descripcion_Novedad']?>.</div>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Mails-->
    </div>
</div>