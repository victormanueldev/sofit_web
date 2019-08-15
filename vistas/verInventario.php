<?php
    include_once('controlador/controladorInventario.php');
    $controlador = new controladorInventario();
	if(isset($_GET['id_Inventario'])){
    $id_Inventario = $_GET['id_Inventario'];
    $resultado1 = $controlador-> verIB($id_Inventario);
	$datos = mysqli_fetch_assoc($resultado1);
	$resultado2 = $controlador-> verIn($id_Inventario);
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
    <div class="col-lg-12">
      <!-- START panel-->
     <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
         <div class="panel-heading" >
            Información del Inventario
         </div>
        <div class="panel-body">
          <div class="form-group col-lg-3">
             <label class="">No. Inventario</label>
             <input type="text" class="form-control" name="cedula" value="<?php echo $datos['id_Inventario']?>">
          </div>
          <div class="form-group col-lg-3">
             <label class="">Nombre de Encargado</label>
             <input type="text" class="form-control" name="cedula" value="<?php echo $datos['nombres_Usuario']?>">
          </div>
          <div class="form-group col-lg-3">
             <label class="">Fecha de registro</label>
             <input type="text" class="form-control" name="cedula" value="<?php echo $datos['fecha_Inventario']?>">
          </div>
          <div class="form-group col-lg-3">
             <label class="">Hora de registro</label>
             <input type="text" class="form-control" name="cedula" value="<?php echo $datos['hora_Inventario']?>">
          </div>
        </div>
     </div>
  </div>
    <div class="col-lg-12">
        <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
            <div class="panel-heading" >
                Control de Elementos
            </div>
            <div class="panel-body">
            <div class="table-responsive">
          <table class="table table-hover">
             <thead>
                <tr>
                   <th style="width: 90px;">ID</th>
                   <th style="width: 350px;">Nombre Elemento</th>
                   <th style="width: 150px;">Cantidad</th>
                   <th style="width: 150px;">Observación</th>
                   
                </tr>
             </thead>
             <tbody>
               <?php while ($fila = mysqli_fetch_assoc($resultado2)) { ?>
                 <tr>
                     <td><?php echo $fila['id_Elemento']; ?></td>
                     <td><?php echo $fila['nombre_Elemento']; ?></td>
                     <td><?php echo $fila['total_Elemento_Inventario']; ?></td>
                     <td><?php echo $fila['observacion']; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
            </div>
        </div>
    </div>
</div>