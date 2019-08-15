<?php
  include_once('controlador/controladorInventario.php');
  include_once('controlador/controladorInventario_Elemento.php');
  include_once('controlador/controladorElemento.php');
  include_once('modelo/Carbon.php');
  //Uso de Carbon
  use Carbon\Carbon;
  //Establece la zona horaria
  date_default_timezone_set('America/Bogota');
  $now = Carbon::now();//Obtiene la fecha y hora actual
  $now-> second = 0;
  $fechaActual = $now->toDateString();
	$horaActual = $now->toTimeString();
  $controladorIE = new ControladorInventario_Elemento();
  $controlador = new controladorInventario();
  $resultado = $controlador->index();//Consulta todos los inventarios existentes
  unset($_SESSION['elementoRegistrado']);
  //Valida el POST
  if (!empty($_POST)) {
    //Obtiene el ID del inventario creado en la fecha Actual
    $validarInventarioDia = $controladorIE-> validarInventario();
    if (!$validarInventarioDia) {
      $id_Usuario = $_POST['id_Usuario'];
      $fechaActual = $_POST['fecha_Inventario'];
      $horaActual = $_POST['hora_Inventario'];
      //$controlador-> crearI($fechaActual,$id_Usuario, $horaActual);
      $id_Inventario = 0;
      echo "<script>window.location='?vista=inventarioElemento&id_Inventario=".$id_Inventario."';</script>";
      }else {
        $id_Usuario = $_POST['id_Usuario'];
        $fechaActual = $_POST['fecha_Inventario'];
        $horaActual = $_POST['hora_Inventario'];
        $resul = $controlador-> crearI($fechaActual,$id_Usuario, $horaActual);
        $id_Inventario = mysqli_fetch_array($controlador-> idIn());
        echo "<script>window.location='?vista=inventarioElemento&id_Inventario=".$id_Inventario[0]."';</script>";
      }
    
  }
?>
<script type="text/javascript">
  document.getElementById('inventario').setAttribute("class", "active");
  document.getElementById('subMenuInventario').setAttribute("class", "nav collapse in");
  document.getElementById('crearInventario').setAttribute("class", "active");
</script>
<h3>
  Inventario
</h3>
<div class="row">
  <!-- Card Asistencia -->
  <div class="col-lg-6 col-md-6">
    <!-- START panel-->
    <div class="panel panel-danger anim-running anim-done" data-onload data-toggle="play-animation" data-play="fadeInLeft" data-offset="0" data-delay="100" style="">
       <div class="panel-heading" style="background-color: #fc704c">
          <div class="row">
             <div class="col-xs-3">
                <em class="fa fa-id-card-o fa-5x"></em>
             </div>
             <div class="col-xs-9 text-right">
                <div class="text-lg">Registrar Inventario</div>
                <p class="m0">Registra el inventario de hoy</p>
             </div>
          </div>
       </div>
       <form id="frm-crear-inv" class="hidden" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
         <input type="text" name="id_Usuario" value="<?php echo $_SESSION['id_Usuario'];?>">
         <input type="text" name="fecha_Inventario" value="<?php echo $fechaActual;?>">
         <input type="text" name="hora_Inventario" value="<?php echo $horaActual;?>">
       </form>
       <a href="javascript:{}" onclick="document.getElementById('frm-crear-inv').submit();" class="panel-footer bg-dark bt0 clearfix btn-block" style="background-color: #373c38;">
          <span class="pull-left">Crear Inventario</span>
          <span class="pull-right">
             <em class="fa fa-chevron-circle-right"></em>
          </span>
       </a>
    </div>
    <!-- END panel-->
  </div>
  <!-- END Card Asistencia -->
  <!-- Card Asistencia -->
  <div class="col-lg-6 col-md-6">
    <!-- START panel-->
    <div class="panel panel-danger anim-running anim-done" data-onload data-toggle="play-animation" data-play="fadeInLeft" data-offset="0" data-delay="100" style="">
       <div class="panel-heading" style="background-color: #fc704c">
          <div class="row">
             <div class="col-xs-3">
                <em class="fa fa-plus-circle fa-5x"></em>
             </div>
             <div class="col-xs-9 text-right">
                <div class="text-lg">Registrar Elemento</div>
                <p class="m0">Registra un nuevo elemento del gimnasio</p>
             </div>
          </div>
       </div>
       <a href="?vista=crearElemento" class="panel-footer bg-dark bt0 clearfix btn-block" style="background-color: #373c38;">
          <span class="pull-left">Crear Elemento</span>
          <span class="pull-right">
             <em class="fa fa-chevron-circle-right"></em>
          </span>
       </a>
    </div>
    <!-- END panel-->
  </div>
  <!-- END Card Asistencia -->
</div>
<!-- START DATATABLE 1 -->
<div class="row">
  <div class="col-lg-12">
     <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
        <div class="panel-heading" >
           Listado de inventarios
        </div>
        <div class="panel-body">
           <table id="datatable1" class="table table-striped table-hover">
              <thead>
                 <tr>
                    <th>ID</th>
                    <th style="width: 90px;">Fecha</th>
                    <th style="width: 90px;">Hora</th>
                    <th style="width: 90px; text-align: center;">Foto</th>
                    <th >Responsable</th>
                    <th style="text-align: center;">Permisos</th>
                 </tr>
              </thead>
              <tbody>
                <?php  while($fila = mysqli_fetch_array($resultado)): ?>
               <tr class="gradeX">
                 <td><?php echo $fila['id_Inventario']; ?></td>
                 <td><?php echo $fila['fecha_Inventario']; ?></td>
                 <td><?php echo $fila['hora_Inventario']; ?></td>
                 <td>
                   <div class="media" style="width: 90px;">
                     <img src="<?php echo $fila['foto_Usuario']; ?>" alt="Image" class="img-responsive thumb32">
                  </div>
                 </td>
                 <td><?php echo $fila['nombres_Usuario']." ".$fila['apellidos_Usuario']; ?></td>
                 <td style="text-align: center;">
                   <div class="btn-group mb-sm">
                   <a class="btn btn-purple" href="?vista=verInventario&id_Inventario=<?php echo $fila['id_Inventario']; ?>">Ver</a>
                  </div>
                 </td>
               </tr>
             <?php endwhile; ?>
             </tbody>
            </table>
         </div>
     </div>
 </div>
</div>
<!--END Datatable 1-->
