<?php
  include_once('controlador/ControladorRutina.php');
  $controlador = new ControladorRutina();
?>
<?php

  if (isset($_POST['eliminarEjercicio'])) {
    $controlador->eliminarRU($_POST['id_Rutina']);

  }

 ?>

<?php
$rutina=$controlador->indexRutina();
$filas = mysqli_num_rows($rutina);

if ($filas):

?>
<script type="text/javascript">
  document.getElementById('modRutinas').setAttribute("class", "active");
  document.getElementById('subMenuRutinasU').setAttribute("class", "nav collapse in");
  document.getElementById('indexRutinasU').setAttribute("class", "active");
</script>
<div>
  <!-- START DATATABLE 1 -->
  <div class="row">
     <div class="col-lg-12">
        <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
           <div class="panel-heading">
             Lista de Rutinas
           </div>
           <div class="panel-body">
              <table id="datatable1" class="table table-striped table-hover">
                 <thead>
                    <tr>
                       <th>Numero de Identificación</th>
                       <th>Nombre</th>
                       <th>Rutina</th>
                       <th>Ejercicios</th>
                       <th>Acción</th>
                    </tr>
                 </thead>
                 <tbody>
                  <?php
                    while ( $Rdatos=mysqli_fetch_assoc($rutina)):
                        $id=$Rdatos['id_Rutina'];
                      ?>
                    <tr class="gradeX">
                       <td><?php echo $Rdatos['numeroId_Usuario']; ?></td>
                       <td><?php echo $Rdatos['nombres_Usuario']," ",$Rdatos['apellidos_Usuario'] ;?></td>
                       <td><?php echo $Rdatos['nombre_Rutina']; ?></td>
                         <td>
                          <?php
                          $numero=$controlador->cantidadEjercicios($id);
                             $ejer=mysqli_fetch_row($numero);
                                 echo $ejer[0];
                          ?>
                        </td>
                      <td class="text-center">
                          <div class="btn-group">
                             <a href="#" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle">
                                <em class="fa fa-angle-down" style="padding-right: 10px;"></em>Acciones</a>
                             <ul class="dropdown-menu pull-right text-left">
                                <li><a href="?vista=verRutina&idr=<?php echo $Rdatos["id_Rutina"];?>">Ver</a>
                                </li>
                                <li><a href="?vista=modificarRutina&idr=<?php echo $Rdatos["id_Rutina"];?>">Modificar </a>
                                </li>
                             </ul>
                          </div>
                       </td>
                    </tr>
                    <?php endwhile;?>
                 </tbody>
              </table>
           </div>
        </div>
     </div>
  </div>
</div>
<?php else :?>

  <h2 >No hay rutinas</h2>

<?php endif;?>

</div>
