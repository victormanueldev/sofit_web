<?php
    include_once('controlador/ControladorRutina.php');
   $controlador = new ControladorRutina();


   $result= $controlador->listarEjercicio($_GET['idr'],$_GET['id']);

   while ( $filasE = mysqli_fetch_assoc($result) )
   {
   $id_Rutina=$filasE['id_Rutina'];
   $id_Ejercicio=$filasE['id_Ejercicio'];
   $series=$filasE['series'];
   $repeticiones=$filasE['repeticiones'];
   $tiempo=$filasE['tiempo'];
   $dia=$filasE['dia'];
   }
 ?>
 <?php
   //modifica  SERIE
   if(isset($_POST['modificarSeries'])){

   $id_Rutina=$_GET['idr'];
   $id_Ejercicio=$_GET['id'];
   $series=$_POST['series'];

   $resultado=$controlador->modificarSeries($id_Rutina,$id_Ejercicio,$series);
    if ($resultado==true) {
         echo "<script>alert('Error al modificar');</script>";
      } else {
        echo  "<div class='alert alert-warning alert-dismissable'>";
        echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>Series Actualzadas.</div>";
      }
      }
 ?>
 <?php
   //modifica REPETICIONES
   if(isset($_POST['modificarRepeticiones'])){

   $id_Rutina=$_GET['idr'];
   $id_Ejercicio=$_GET['id'];
   $repeticiones=$_POST['repeticiones'];

   $resultado=$controlador->modificarRepeticiones($id_Rutina,$id_Ejercicio,$repeticiones);
    if ($resultado==true) {

         echo "<script>alert('Error al modificar');</script>";
      } else {
        echo  "<div class='alert alert-warning alert-dismissable'>";
        echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>Repeticiones Actualzadas</div>";
      }
      }

 ?>
  <?php
   //modifica TIEMPO
   if(isset($_POST['modificarTiempo']))
   {

      $id_Rutina=$_GET['idr'];
      $id_Ejercicio=$_GET['id'];
      $tiempo=$_POST['tiempo'];

      $resultado=$controlador->modificarTiempo($id_Rutina,$id_Ejercicio,$tiempo);
      if ($resultado==true)
      {
         echo "<script>alert('Error al modificar');</script>";
      } else
      {
        echo  "<div class='alert alert-warning alert-dismissable'>";
        echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>Tiempo Actualizado</div>";
      }
   }

 ?>
 <?php
  //modifica DIA
  if(isset($_POST['modificarDia']))
  {
     $id_Rutina=$_GET['idr'];
     $id_Ejercicio=$_GET['id'];
     $dia=$_POST['dia'];

     $resultado=$controlador->modificarDia($id_Rutina,$id_Ejercicio,$dia);
     if ($resultado==true)
     {
        echo "<script>alert('Error al modificar');</script>";
     } else
     {
       echo  "<div class='alert alert-warning alert-dismissable'>";
       echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>Dia Actualizado</div>";
     }
  }

?>
<h3>
  Modificar Ejercicio
</h3>
<div class="row">
  <div class="col-lg-12">
    <!-- START panel-->
    <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
      <div class="panel-heading">
        Datos del ejercicio
      </div>
      <div class="panel-body">
        <!-- START table-responsive-->
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead style="text-align: center;">
              <tr >
                <th >Atributo</th>
                <th >Registro Actual</th>
                <th >Nuevo registro</th>
                <th style="text-align:center">Acción</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <form method="POST" Action="" >
                  <td>Series</td>
                  <td><?php echo $series; ?></td>
                  <td>
                    <input class="form-control" type="text" name="series" placeholder="00" required>
                  </td>
                  <td>
                    <div style="text-align: center;">
                      <input button class="btn btn-purple btn-sm" type="submit" name="modificarSeries" value="Modificar">
                    </div>
                  </td>
                </form>
              </tr>
              <tr>
                <form method="POST" Action="" >
                  <td>Repeticiones</td>
                  <td><?php echo $repeticiones; ?></td>
                  <td>
                    <input class="form-control" type="text" name="repeticiones" placeholder="00" required>
                  </td>
                  <td>
                    <div style="text-align: center;">
                      <input button class="btn btn-purple btn-sm" type="submit" name="modificarRepeticiones" value="Modificar">
                    </div>
                  </td>
                </form>
              </tr>
              <tr>
                <form method="POST" Action="" >
                  <td>Tiempo</td>
                  <td><?php echo $tiempo?></td>
                  <td>
                    <input class="form-control" type="text" name="tiempo" placeholder="00" required>
                  </td>
                  <td>
                    <div style="text-align: center;">
                      <input button class="btn btn-purple btn-sm" type="submit" name="modificarTiempo" value="Modificar">
                    </div>
                  </td>
                </form>
              </tr>
              <tr>
                <form method="POST" Action="" >
                  <td>Día</td>
                  <td><?php echo $dia ?></td>
                  <td>
                    <select class="form-control m-b" required="" name="dia">
                      <option value="0">Domingo</option>
                      <option value="1">Lunes</option>
                      <option value="2">Martes</option>
                      <option value="3">Miércoles</option>
                      <option value="4">Jueves</option>
                      <option value="5">Viernes</option>
                      <option value="6">Sábado</option>
                    </select>
                  </td>
                  <td>
                    <div style="text-align: center;">
                      <input button class="btn btn-purple btn-sm" type="submit" name="modificarDia" value="Modificar">
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
<div class="row">
  <!--Card Avanzar-->
  <div class="col-lg-3">
    <a href="?vista=modificarRutina&idr=<?php echo $_GET['idr'];?>" style="text-decoration: none">
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
 <!-- END Card Avanzar-->
</div>
