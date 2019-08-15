<?php
include_once('controlador/ControladorRutina.php');
$controlador = new ControladorRutina();




   if(!empty($_POST))
   {
      $numeroId_Usuario=$_POST['cedula'];
      $resultado=$controlador->verusuario($numeroId_Usuario);
      if ($resultado)
      {
         while($fila=mysqli_fetch_assoc($resultado))
         {
            $id_Usuario=$fila['id_Usuario'];
         }

         $existe=$controlador->usuarioConrutina($id_Usuario);

         if ($existe)
         {
            echo "<div class='alert alert-danger alert-dismissable'>";
            echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>Este usuario ya tiene una rutina asignada, por favor modifícala.</div>";

         } else {

            # si no exite rutina...
            $resultado=$controlador->crearRutina($_POST['nombreRutina']);
            $rutina=$controlador->listarRutina($_POST['nombreRutina']);
            foreach ($rutina as $valor)
            {
               $id_Rutina= $valor['id_Rutina'];

            }

            $id_Ejercicio= $_POST['idEjer'];
            $series = ($_POST['series']);
            $repeticiones = ($_POST['repeticiones']);
            $tiempo = ($_POST['tiempo']);
            $dia = ($_POST['dia']);

            for ($i=0; $i <count($id_Ejercicio); $i++)
            {
               $controlador->crearRutinaEjercicio($id_Rutina, $id_Ejercicio[$i], $series[$i], $repeticiones[$i], $tiempo[$i], $dia[$i]);
            }

            $respuesta=$controlador->crearUsuarioRutina( $id_Usuario ,  $id_Rutina);
            if ($respuesta) {
                unset($_SESSION["rut"]);
                unset($_SESSION["registrados"]);
                //echo "<script>window.location='?vista=asignarRutina';</script>";
                echo  "<div class='alert alert-warning alert-dismissable'>";
                echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>La rutina se ha guardado correctamente.</div>";
            } else {
              echo  "<div class='alert alert-danger alert-dismissable'>";
              echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>Error inesperado en la Base de Datos.</div>";
            }

         }

      } else {
        echo  "<div class='alert alert-danger alert-dismissable'>";
        echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>Este usuario no está registrado.</div>";
      }

   }
?>
<script type="text/javascript">
  document.getElementById('rutinas').setAttribute("class", "active");
  document.getElementById('subMenuRutinas').setAttribute("class", "nav collapse in");
  document.getElementById('asignarRutina').setAttribute("class", "active");
</script>
<?php
   if(isset($_SESSION["rut"]) && !empty($_SESSION["rut"])){
?>
<h3>
  Especificar datos de rutina
</h3>
<div class="row">
  <form method="POST" action=""  data-parsley-validate="" novalidate="" class="">
  <div class="col-lg-12">
      <!-- START panel-->
     <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
         <div class="panel-heading" >
            Datos de Usuario
         </div>
        <div class="panel-body">
          <div class="form-group col-lg-6">
             <label class="">Número de documento del usuario *</label>
             <input type="text" class="form-control" name="cedula" required="">
          </div>
           <div class="form-group col-lg-6">
              <label>Nombre rutina *</label>
               <input type="text"  name="nombreRutina" class="form-control" required>
           </div>
        </div>
     </div>
  </div>
  <div class="col-lg-12">
    <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
       <div class="panel-heading" >
          Establecer series, repeticiones, tiempo y dia
       </div>
       <div class="panel-body">
         <div class="table-responsive">
          <table class="table table-hover">
             <thead>
                <tr>
                   <th style="width: 90px;">ID</th>
                   <th style="width: 350px;">Ejercicio</th>
                   <th style="width: 150px;">Repeticiones *</th>
                   <th style="width: 150px;">Series *</th>
                   <th style="width: 150px;">Tiempo *</th>
                   <th style="width: 150px;">Dia *</th>
                </tr>

             </thead>
             <tbody>
               <?php
               foreach($_SESSION["rut"] as $c):
                     $id_ejer=$c['ejercicios'];
                     $ejercicios = $controlador->obtenerEjercicio($c['ejercicios']);
                     $ejercicio = mysqli_fetch_assoc($ejercicios);
               ?>
                 <tr>
                       <td><?php echo $c['ejercicios'];?></td>
                       <input type="hidden" name="idEjer[]" value="<?php echo $c['ejercicios']; ?>" >
                       <td>
                         <a href="#"> <?php echo $ejercicio['nombre_Ejercicio'];?></a>
                       </td>
                       <td>
                         <input class="form-control" value="0" type="number" min="0" max="30" name="repeticiones[]" placeholder="0" required >
                       </td>
                       <td>
                         <input class="form-control" value="0" type="number" min="0" max="30" name="series[]"  required>
                       </td>
                       <td>
                         <input class="form-control" type="text" name="tiempo[]" placeholder="00" required>
                       </td>
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
                   <?php endforeach; ?>
              </tbody>
            </table>
          </div><br>
          <div class="required">* Campos requeridos</div>
       </div>

       <div class="panel-footer">
         <div style="text-align: center;">
             <!--<input type="submit" class="btn btn-primary btn-purple" name="guardarDatos" value="Guardar datos">-->
             <button type="submit" class="btn btn-purple">Guardar Rutina</button>
         </div>
       </div>
    </div>
  </div>
  </form>
</div>
<?php  }else{ ?>
    <!-- START panel-->
    <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
       <div class="panel-heading">No hay ejercicios seleccionados, selecciona al menos uno
          <a href="#" data-perform="panel-dismiss" data-toggle="tooltip" title="Cerrar" class="pull-right">
             <em class="fa fa-close"></em>
          </a>
       </div>
    </div>
<?php } ?>
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
