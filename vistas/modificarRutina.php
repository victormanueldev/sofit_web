<?php
  include_once('controlador/ControladorRutina.php');
   $controlador = new ControladorRutina();
   $result= $controlador->listarRutinaid($_GET['idr']);

   while ( $filasR = mysqli_fetch_assoc($result) ) {
   $id_Rutina=$filasR['id_Rutina'];
   $nombre_Rutina=$filasR['nombre_Rutina'];

   }
?>
<!--Eliminar Ejercicio-->

<?php

   if(isset($_POST['eliminarEjercicio']))
   {
      $id_Rutina=$_GET['idr'];
      $id_Ejercicio=$_POST['id_Ejercicio'];
      $numeroEjercicios=$controlador->contarEjercicios($id_Rutina);
      if ($numeroEjercicios>1)
      {
         $controlador->eliminarEjercicio($id_Rutina,$id_Ejercicio);
       } else {
         echo "<script>alert('No se puede eliminar Ejercicio');</script>";
       }
   }


 ?>
<!--Modificar rutina-->
<?php
   //modifica  nombre
   if(isset($_POST['modificar_nombre'])){

   $id_Rutina=$_POST['id_Rutina'];
    $nombre_Rutina=$_POST['nombre'];
    $resultado=$controlador->modificarRutinaNom($id_Rutina,$nombre_Rutina);
    if ($resultado==true) {
         echo "<script>alert('Error al modificar');</script>";
      } else {
        echo  "<div class='alert alert-warning alert-dismissable'>";
        echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>Nombre Actualizado</div>";
      }
      }
 ?>
 <script type="text/javascript">
  document.getElementById('modRutinas').setAttribute("class", "active");
  document.getElementById('subMenuRutinasU').setAttribute("class", "nav collapse in");
  document.getElementById('indexRutinasU').setAttribute("class", "active");
</script>
 <h3>

   Modificar Rutina
 </h3>
 <div class="row">
   <div class="col-lg-12">
     <!-- START panel-->
     <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
       <div class="panel-heading">
         Datos de Rutina
       </div>
       <div class="panel-body">
         <!-- START table-responsive-->
         <div class="table-responsive">
           <table class="table table-hover">
             <thead >
               <tr >
                 <th >Atributo</th>
                 <th>Registro Actual</th>
                 <th>Nuevo Registro</th>
                 <th style="text-align: center">Acción</th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <form method="POST" action="">
                   <td>Nombre de rutina</td>
                   <td><?php echo $nombre_Rutina; ?></td>
                   <td>
                     <input class="form-control" type="text" name="nombre" placeholder="Nuevo Nombre" required>
                   </td>
                   <input type="hidden" name="id_Rutina" value="<?php echo $id_Rutina; ?>" >
                   <td>
                     <div style="text-align: center;">
                       <input  button class="btn btn-purple btn-sm" type="submit" name="modificar_nombre" value="Modificar">
                     </div>
                   </td>
                 </form>

               </tr>
             </tbody>
           </table>
         </div>
         <!-- END table-responsive-->
       </div>
     </div>
   </div>
 </div>
<?php
   $resultado= $controlador->consultarEjerciciosDeRutina($_GET['idr']);
   if ($resultado!=false):
?>
<div class="row">
  <div class="col-lg-12">
    <!-- START panel-->
    <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
      <div class="panel-heading">
        Listado de Ejercicios
      </div>
      <div class="panel-body">
        <!-- START table-responsive-->
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Series</th>
                <th>Repeticiones</th>
                <th>Tiempo</th>
                <th>Dia</th>
                <th style="text-align: center;">Acción</th>
              </tr>
            </thead>
            <tbody>
              <?php while ( $fila = mysqli_fetch_assoc($resultado) ):?>
                <tr>
                  <td><?php echo $fila['id_Ejercicio']; ?></td>
                  <td><?php echo $fila['nombre_Ejercicio']; ?></td>
                  <td>
                    <div class="media">
                      <?php echo '<img src="'.$fila['foto_Ejercicio'].'">'?>
                    </div>
                  </di>
                </td>
                <td><?php echo $fila['series']; ?></td>
                <td><?php echo $fila['repeticiones']; ?></td>
                <td><?php echo $fila['tiempo']; ?>"</td>
                <td><?php echo $fila['dia']; ?></td>
                <td class="text-center">
                    <div class="btn-group">
                       <a href="#" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle">
                          <em class="fa fa-angle-down" style="padding-right: 10px;"></em>Acciones</a>
                       <ul class="dropdown-menu pull-right text-left">
                          <li>
                            <a href="?vista=modificarEjercicios&id=<?php echo $fila["id_Ejercicio"];?>&idr=<?php echo $_GET['idr'] ;?>">Modificar</a>
                          </li>
                          <li>
                            <form  method="POST" action="" class="hidden">
                              <input type="hidden" name="id_Ejercicio" value="<?php echo $fila['id_Ejercicio']; ?>" >
                              <input type="hidden" name="id_Rutina" value="<?php echo $id; ?>" >
                              <button id="submit-eliminar" type="submit" name="eliminarEjercicio" value="" class="hidden"></button>
                            </form>
                            <a href="javascript:{}" onclick="document.getElementById('submit-eliminar').click();" class="">Eliminar</a>
                          </li>
                       </ul>
                    </div>
                 </td>
              </tr>
            </tbody>
          <?php endwhile; ?>
        </table>
      </div>
      <!-- END table-responsive-->
    </div>
  </div>
</div>
</div>
<div class="row">
  <!--Card Atras-->
  <div class="col-lg-4">
    <a href="?vista=rutinas" style="text-decoration: none">
      <div class="panel widget" style="box-shadow: 0 1px 1px rgba(54, 54, 54, 0.21);">
         <div class="row row-table row-flush">
           <div class="col-xs-4 bg-danger text-center">
              <em class="fa fa-angle-double-left fa-3x"></em>
           </div>
            <div class="col-xs-8">
               <div class="panel-body text-center">
                  <h4 class="mt0" style="color: #fc704c;">Atrás</h4>
               </div>
            </div>
         </div>
      </div>
    </a>
 </div>
 <!-- END Card Atras-->
 <!--Card Atras-->
 <div class="col-lg-4 col-lg-offset-4">
   <a href="?vista=agregarEjercicios&idr=<?php echo $_GET['idr'] ;?>" style="text-decoration: none">
     <div class="panel widget" style="box-shadow: 0 1px 1px rgba(54, 54, 54, 0.21);">
        <div class="row row-table row-flush">
           <div class="col-xs-8">
              <div class="panel-body text-center">
                 <h4 class="mt0" style="color: #fc704c;">Añadir Ejercicios</h4>
              </div>
           </div>
           <div class="col-xs-4 bg-danger text-center">
              <em class="fa fa-plus fa-3x"></em>
           </div>
        </div>
     </div>
   </a>
</div>

</div>
<?php else:?>
<div class="row">
   <div class="col-lg-12">
     <!-- START panel-->
     <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
        <div class="panel-heading">No hay ejercicios en esta rutina
           <a href="#" data-perform="panel-dismiss" data-toggle="tooltip" title="Cerrar" class="pull-right">
              <em class="fa fa-exclamation-circle"></em>
           </a>
        </div>
     </div>
     <!-- END panel-->
  </div>
  <!--Card Atras-->
  <div class="col-lg-3">
    <a href="index-entrenador.php?vista=rutinas" style="text-decoration: none">
      <div class="panel widget" style="box-shadow: 0 1px 1px rgba(54, 54, 54, 0.21);">
         <div class="row row-table row-flush">
           <div class="col-xs-4 bg-danger text-center">
              <em class="fa fa-angle-double-left fa-3x"></em>
           </div>
            <div class="col-xs-8">
               <div class="panel-body text-center">
                  <h4 class="mt0" style="color: #fc704c;">Atrás</h4>
               </div>
            </div>
         </div>
      </div>
    </a>
 </div>
 <!-- END Card Atras-->
 <div class="col-lg-4 col-lg-offset-5">
  <a href="?vista=agregarEjercicios&idr=<?php echo $_GET['idr'] ;?>" style="text-decoration: none">
 <div class="panel widget" style="box-shadow: 0 1px 1px rgba(54, 54, 54, 0.21);">
    <div class="row row-table row-flush">
       <div class="col-xs-8">
          <div class="panel-body text-center">
             <h4 class="mt0" style="color: #fc704c;">Añadir Ejercicios</h4>
          </div>
       </div>
       <div class="col-xs-4 bg-danger text-center">
          <em class="fa fa-plus fa-3x"></em>
       </div>
    </div>
 </div>
</a>
</div>
</div>
<?php endif; ?>
