<?php
   include_once('controlador/ControladorRutina.php');
   $controlador = new ControladorRutina();
 //creamos la rutina, iniciomos la session y redirigimos a (agregar ejerciicos) o (crear nuevamente la rutina)

      if(isset($_POST["agregarejercicio"])){
         // si es el primer ejercicio simplemente lo agregamos
         if(empty($_SESSION['rut'])){
            $_SESSION['rut']= array(array( 'ejercicios' => $_POST["id_Ejercicio"]));
         }else{
            // apartir del segundo ejercicio:
            $ejercicios = $_SESSION['rut'];
            $existe = false;
            // recorremos el array en busqeda del jercicio repetido
            foreach ($ejercicios as $e) {
               // si el ejercicio esta repetido rompemos el ciclo
               if($e["ejercicios"]==$_POST["id_Ejercicio"]){
                  $existe=true;
                  break;
               }
            }
            // si el ejercicio es repetido no hacemos nada, simplemente redirigimos
            if($existe){
               print "<script>alert('Error: ejercicio Repetido!');</script>";
            }else{
               // si el ejercicio no esta repetido entonces lo agregamos a la variable  rut y despues asignamos la variable rut a la variable de sesion
               array_push($ejercicios, array( "ejercicios" =>$_POST["id_Ejercicio"]));
               $_SESSION['rut'] = $ejercicios;
            }
         }
      }

?>

<?php
   if(isset($_POST["eliminar"])){

      if(!empty($_SESSION['rut'])){

         $rut  = $_SESSION['rut'];
         //si hay un solo ejercicio simplemente eliminamos el $_session['rut']
         if(count($rut)==1){
            unset($_SESSION['rut']);

            //si hay mas de uno recorremos el arreglo y si el id q mandamos por get conincide con el del $_session['rut']
            //no se lo agrega el nuevo array
         }else{
            $newrut = array();
            foreach($rut as $r){

               if($r["ejercicios"]!=$_POST["id_Ejercicio"]){
                  $newrut[] = $r;
               }
               //el nuevo array se agrega al $_session['rut']
               $_SESSION['rut'] = $newrut;

            }
         }
      }
   }
?>
<h3>Selección de Ejercicios
</h3>
<!-- START DATATABLE 1 -->
<div class="row">
  <div class="col-lg-12">
    <!-- START panel-->
    <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
      <div class="panel-heading">
        Listado de Ejercicios
      </div>
      <!-- START table-responsive-->
      <div class="panel-body">
        <table id="datatable1" class="table table-striped table-hover">
          <thead>
            <tr class="text-center">
              <th>Id</th>
              <th>Imagen</th>
              <th>Nombre</th>
              <th>Categoria</th>
              <th>
              </tr>
            </thead>
            <tbody>
              <?php
              $ejercicio = $controlador -> indexEjercicio();
              while($fila=mysqli_fetch_assoc($ejercicio)):
                ?>
                <tr>
                  <td><?php echo $fila['id_Ejercicio'];?></td>
                  <td>
                    <div class="media">
                      <?php echo '<img src="'.$fila["foto_Ejercicio"].'">'?>

                    </div>
                  </td>
                  <td><?php echo $fila['nombre_Ejercicio'];?></td>
                  <td><?php echo $fila['nombre_Categoria'];?> </td>
                  <td>
                    <!--td de accion bloquear/ asignar-->
                    <?php
                      $existe = false;
                      $existebd=false;
                      $respuesta = $controlador -> idEjercicio($_GET['idr']);
                      while($d = mysqli_fetch_assoc($respuesta))
                      {
                        if($d['id_Ejercicio']==$fila['id_Ejercicio'] ){
                          $existebd=true; break;
                        }
                      }
                    ?>
                    <?php if(($existebd)):?>

                      <label></label>

                    <?php else :?>
                      <?php

                      if(isset($_SESSION['rut'])){
                        foreach ($_SESSION['rut'] as $c) {
                          if($c["ejercicios"]==$fila['id_Ejercicio'] )
                          {
                            $existe=true; break;
                          }
                        }
                      }
                      ?>
                      <?php if(($existe)):?>
                        <form  method="post" action="">
                          <div style="text-align: center;">
                            <input type="hidden" name="id_Ejercicio" value="<?php echo $fila['id_Ejercicio'] ;?>" >
                            <button class="btn btn-danger" type="submit" name="eliminar">Quitar</button>
                          </div>

                        </form>
                      <?php else :?>
                        <form  method="post" action="">
                          <div style="text-align: center;">
                            <input type="hidden" name="id_Ejercicio" value="<?php echo $fila['id_Ejercicio'] ;?>" >
                            <button class="btn btn-purple" type="submit" name="agregarejercicio">Añadir</button>
                          </div>
                        </form>
                      <?php endif;?>
                    <?php endif;?>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
        <!-- END table-responsive-->
      </div>
      <!-- END panel-->
    </div>
  </div>
<div class="row">
  <!--Card Atras-->
  <div class="col-lg-3">
    <a href="?vista=modificarRutina&idr=<?php echo $_GET['idr'] ;?>" style="text-decoration: none">
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
 <!--Card Avanzar-->
 <div class="col-lg-3 col-lg-offset-6">
   <a href="?vista=guardarEjercicio&idr=<?php echo $_GET['idr'] ;?>" style="text-decoration: none">
     <div class="panel widget" style="box-shadow: 0 1px 1px rgba(54, 54, 54, 0.21);">
        <div class="row row-table row-flush">
           <div class="col-xs-8">
              <div class="panel-body text-center">
                 <h4 class="mt0" style="color: #fc704c;">Avanzar</h4>
              </div>
           </div>
           <div class="col-xs-4 bg-danger text-center">
              <em class="fa fa-angle-double-right fa-3x"></em>
           </div>
        </div>
     </div>
   </a>
</div>
<!-- END Card Avanzar-->
</div>
