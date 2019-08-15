<?php 
    include_once('controlador/controladorInventario.php');
    $controlador = new controladorInventario();
    $resultado = $controlador->index();
?>
<script type="text/javascript">
  document.getElementById('reportes').setAttribute("class", "active");
  document.getElementById('subMenuReportes').setAttribute("class", "nav collapse in");
  document.getElementById('repInventario').setAttribute("class", "active");
</script>
<h3>
    Inventarios
</h3>
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
                     <button type="button" data-toggle="dropdown" class="btn btn-purple dropdown-toggle btn-block">Acciones
                        <span class="caret"></span>
                     </button>
                     <ul role="menu" class="dropdown-menu">
                        <li><a href="?vista=verInventario&id_Inventario=<?php echo $fila['id_Inventario']; ?>">Ver</a>
                        </li>
                        <li><a href="indexpdf.php?id_Inventario=<?php echo $fila['id_Inventario']; ?>">Descargar PDF</a>
                        </li>
                     </ul>
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