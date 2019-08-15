<?php
include_once('controlador/ControladorRutina.php');
$controlador = new ControladorRutina();
?>

<!--guardar rutina-->
<?php

   if(isset($_POST["guardarDatos"]))
   {
      $id_Ejercicio= $_POST['idEjer'];
      $series = ($_POST['series']);
      $repeticiones = ($_POST['repeticiones']);
      $tiempo = ($_POST['tiempo']);
      $dia = ($_POST['dia']);
      for ($i=0; $i <count($id_Ejercicio); $i++)
      {
         $controlador->crearRutinaEjercicio($_GET['idr'], $id_Ejercicio[$i], $series[$i], $repeticiones[$i], $tiempo[$i], $dia[$i]);
      }
      unset($_SESSION["rut"]);
      unset($_SESSION["registrados"]);
      echo "<script>window.location='?vista=rutinas';</script>";
   }
?>

<?php
if(isset($_SESSION["rut"]) && !empty($_SESSION["rut"])):
?>
<h3>
  Modificar Ejercicios
</h3>
<div class="row">
  <div class="col-lg-12">
    <!-- START panel-->
    <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
      <div class="panel-heading">
        Establecer series, repeticiones, tiempo y dia
      </div>
      <div class="panel-body">
        <!-- START table-responsive-->
        <div  class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead >
              <tr >
                <th style="width: 90px;">ID</th>
                <th style="width: 350px;">Ejercicio</th>
                <th style="width: 150px;">Repeticiones *</th>
                <th style="width: 150px;">Series *</th>
                <th style="width: 150px;">Tiempo *</th>
                <th style="width: 150px;">Dia *</th>
              </tr>
              <form method="POST" action="">
              </thead>
              <?php
              foreach($_SESSION["rut"] as $c):
                $id_ejer=$c['ejercicios'];
                $ejercicios = $controlador->obtenerEjercicio($c['ejercicios']);
                $ejercicio = mysqli_fetch_assoc($ejercicios);
                ?>
                <tbody>
                  <tr>
                    <td><?php echo $c['ejercicios'];?></td>
                    <input type="hidden" name="idEjer[]" value="<?php echo $c['ejercicios']; ?>" >
                    <td><a href="<?php echo $ejercicio['foto_Ejercicio']?>" > <?php echo $ejercicio['nombre_Ejercicio'];?> </a> </td>
                    <td><input class="form-control" value="0" type="number" min="0" max="30" name="series[]"  required></td>
                    <td><input class="form-control" value="0" type="number" min="0" max="30" name="repeticiones[]" placeholder="0" required ></td>
                    <td><input class="form-control" type="text" name="tiempo[]" placeholder="00:00 minutos" required></td>
                    <td>
                      <select class="form-control m-b" required="" name="dia[]">
                        <option value="0">Domingo</option>
                        <option value="1">Lunes</option>
                        <option value="2">Martes</option>
                        <option value="3">Miércoles</option>
                        <option value="4">Jueves</option>
                        <option value="5">Viernes</option>
                        <option value="6">Sábado</option>
                      </select>
                    </td>
                  </tr>
                </tbody>
              <?php endforeach; ?>
            </table>
          </div>
          <!-- END table-responsive-->
        </div>
      <div style="text-align: center; padding: 12px; ">
          <input class="btn btn-purple btn-XM" type="submit" name="guardarDatos" value="Guardar datos">
      </div>
    </div>
  </div>
</div>
<!--Card Atras-->
<div class="col-lg-4">
  <a href="?vista=agregarEjercicios&idr=<?php echo $_GET['idr'] ;?>" style="text-decoration: none">
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
<?php else: ?>

<?php endif; ?>

<?php
   if(isset($_POST["usuarioRutina"]))
   {
      $id_Usuario=$_POST["id_Usuario"];
      $Rutina= $controlador-> obtenerRutinaNom($_SESSION['nomRutina']);

      while($fila=mysqli_fetch_assoc($Rutina))
      {
         $id_Rutina=$fila['id_Rutina'];
      }
      $resultado=$controlador->crearUsuarioRutina( $id_Usuario ,  $id_Rutina);
      if ($resultado) {
         unset($_SESSION["rut"]);
         unset($_SESSION["registrados"]);
         unset($_SESSION['nomRutina']);
         echo "<script> alert('no se ha registrado ')</script>";
      } else {
         unset($_SESSION["rut"]);
         unset($_SESSION["registrados"]);
         unset($_SESSION['nomRutina']);
         echo "<script>  alert('la rutina se ha registrado exitosamente')</script>";
         echo "<script>window.location='?vista=rutinas';</script>";
      }


   }
?>
