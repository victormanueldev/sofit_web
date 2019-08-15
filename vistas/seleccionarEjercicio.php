<?php
   include_once('controlador/ControladorRutina.php');
   $controlador = new ControladorRutina();
 //creamos la rutina, iniciomos la session y redirigimos a (agregar ejerciicos) o (crear nuevamente la rutina)

      if(isset($_POST["agregarejercicio"])){
         // si es el primer ejercicio simplemente lo agregamos
         if(empty($_SESSION['rut'])){
            $_SESSION['rut']= array(array( 'ejercicios' => $_POST["id_Ejercicio"]));
         }else{
            // apartie del segundo ejercicio:
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
<!--Script para activar los li del Aside que estan desactivados-->
<script type="text/javascript">
  document.getElementById('rutinas').setAttribute("class", "active");
  document.getElementById('subMenuRutinas').setAttribute("class", "nav collapse in");
  document.getElementById('seleccionarEjercicio').setAttribute("class", "active");
</script>
 <h3>Selección de Ejercicios
 </h3>
 <!-- START DATATABLE 1 -->
<div class="row">
   <div class="col-lg-12">
      <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
         <div class="panel-heading" >
            Listado de Ejercicios
         </div>
         <div class="panel-body">
            <table id="datatable1" class="table table-striped table-hover">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Nombre</th>
                     <th>Categoría</th>
                     <th>Imagen</th>
                     <th>Acción</th>
                  </tr>
               </thead>
               <tbody>
                 <?php
                    $ejercicio = $controlador -> indexEjercicio();
                    while($fila=mysqli_fetch_assoc($ejercicio)):
                  ?>
                <tr class="gradeX">
                   <td><?php echo $fila['id_Ejercicio'];?></td>
                   <td><?php echo $fila['nombre_Ejercicio'];?></td>
                   <td><?php echo $fila['nombre_Categoria'];?> </td>
                   <td><div class="media"><?php echo '<img src="'.$fila["foto_Ejercicio"].'">'?></div></td>
                   <td >
                      <!--td de accion bloquear/ asignar-->
                      <?php
                         $existe = false;
                         if(isset($_SESSION['rut'])){
                            foreach ($_SESSION['rut'] as $c) {
                               if($c["ejercicios"]==$fila['id_Ejercicio']){
                                  $existe=true; break;
                               }
                            }
                         }
                      ?>
                      <?php if(($existe)):?>
                         <form  method="post" action="">
                            <input type="hidden" name="id_Ejercicio" value="<?php echo $fila['id_Ejercicio'] ;?>" >
                            <button class="btn btn-danger" type="submit" name="eliminar">Quitar</button>
                         </form>

                      <?php else :?>
                         <form  method="post" action="">
                            <input type="hidden" name="id_Ejercicio" value="<?php echo $fila['id_Ejercicio'] ;?>" >
                            <button class="btn btn-purple" type="submit" name="agregarejercicio">Añadir</button>
                         </form>
                      <?php endif;?>
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
<div class="row">
  <!--Card Atras-->
  <div class="col-lg-4">
    <a href="index-entrenador.php?vista=crearEjercicio" style="text-decoration: none">
      <div class="panel widget" style="box-shadow: 0 1px 1px rgba(54, 54, 54, 0.21);">
         <div class="row row-table row-flush">
           <div class="col-xs-4 bg-danger text-center">
              <em class="fa fa-plus fa-3x"></em>
           </div>
            <div class="col-xs-8">
               <div class="panel-body text-center">
                  <h4 class="mt0" style="color: #fc704c;">Crear Ejercicio</h4>
               </div>
            </div>
         </div>
      </div>
    </a>
 </div>
 <!-- END Card Atras-->
  <!--Card Avanzar-->
  <div class="col-lg-4 col-lg-offset-4">
    <a href="?vista=asignarRutina" style="text-decoration: none">
      <div class="panel widget">
         <div class="row row-table row-flush">
            <div class="col-xs-8">
               <div class="panel-body text-center">
                  <h4 class="mt0" style="color: #fc704c;">Asignar Rutina</h4>
                
               </div>
            </div>
            <div class="col-xs-4 bg-danger text-center">
               <em class="fa fa-angle-double-right fa-5x"></em>
            </div>
         </div>
      </div>
    </a>
 </div>
 <!-- END Card Avanzar-->
</div>
