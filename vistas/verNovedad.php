<?php
  include_once('controlador/ControladorNovedad.php');
  $controladorNovedad = new ControladorNovedad();
  $resultado = $controladorNovedad-> verNovedad($_GET['idn']);
  if (!empty($_POST)) {
     $id_Novedad = $_GET['idn'];
     $estado_Novedad = $_POST['estado_Novedad'];
     $controladorNovedad-> editarNovedad($id_Novedad, $estado_Novedad);
     echo "<script>window.location.href= '?vista=bandejaNovedades';</script>";
  }
?>
<script type="text/javascript">
  document.getElementById('gNovedades').setAttribute("class", "active");
  document.getElementById('subMenuGNovedades').setAttribute("class", "nav collapse in");
  document.getElementById('bandejaNovedad').setAttribute("class", "active");
</script>
<h3>
    Ver Novedad
</h3>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
            <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                <input type="hidden" name="estado_Novedad" value="Revisado">
               <div class="panel-body">
               <img src="app/img/logo_color.jpg" class="pull-right img-responsive thumb32">
                  <h3 class="mt0">Novedad No. 00<?php echo $resultado['id_Novedad']?></h3>
                  <hr>
                  <div class="row mb-lg">
                     <div class="clearfix hidden-md hidden-lg">
                        <hr>
                     </div>
                     <div class="col-lg-6 col-xs-6 br pv">
                        <div class="row">
                           <div class="col-md-10">
                              <h4><?php echo $resultado['asunto_Novedad']?></h4>
                              <address></address><?php echo $resultado['descripcion_Novedad']?> </div>
                        </div>
                     </div>
                     <div class="clearfix hidden-md hidden-lg">
                        <hr>
                     </div>
                     <div class="col-lg-6 col-xs-12 pv">
                        <div class="clearfix">
                           <p class="pull-left"><strong>Datos</strong></p>
                           <p class="pull-right mr"></p>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">Fecha:</p>
                           <p class="pull-right mr"><?php echo $resultado['fecha_Novedad']?></p>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">Hora:</p>
                           <p class="pull-right mr"><?php echo $resultado['hora_Novedad']?></p>
                        </div>
                     </div>
                  </div>
                  <hr class="hidden-print">
                  <div class="clearfix">
                     <button type="button" onclick="window.print();" class="btn btn-default pull-left">Imprimir</button>
                     <button type="submit" class="btn btn-purple pull-right">Revisar</button>
                  </div>
                  </form>
               </div> 
            </div>
    </div>
</div>