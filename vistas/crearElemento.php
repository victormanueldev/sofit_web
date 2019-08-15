<?php
   include_once('controlador/ControladorElemento.php');
   include_once('modelo/Carbon.php');
   use Carbon\Carbon;
   $controlador = new ControladorElemento();
   $resultado = $controlador->index();
   //Valida el POST
   if (!empty($_POST)) {
     $archivo =  $_FILES['foto_Elemento']['tmp_name'];
     $destino = "app/img/elementos/".$_FILES['foto_Elemento']['name'];
     move_uploaded_file($archivo, $destino);
     $_POST['foto_Elemento'] = $destino;
     //Convierte la fecha en formato carbon
     $dt = Carbon::parse($_POST['fecha_Elemento']);
     $resul = $controlador->crearE(
       $_POST['nombre_Elemento'],
       $_POST['cantidad_Elemento'],
       $dt,
       $destino
     );
     echo "<script>window.location.href ='?vista=crearElemento';</script>";
    }
?>
<script type="text/javascript">
  document.getElementById('inventario').setAttribute("class", "active");
  document.getElementById('subMenuInventario').setAttribute("class", "nav collapse in");
  document.getElementById('crearElemento').setAttribute("class", "active");
</script>
<h3>
  Registro Elementos
</h3>
<div class="row">
  <div class="col-lg-12">
  <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-right-color: #fff;border-bottom-color: #fff;">
    <div class="panel-heading">Crear Elemento</div>
    <div class="panel-body">
      <form method="POST" enctype="multipart/form-data" data-parsley-validate="" novalidate="">
        <div class="form-group col-lg-6">
           <label class="control-label">Nombre del Elemento *</label>
           <input type="text" name="nombre_Elemento" required class="form-control"  placeholder="Mancuerna">
        </div>
        <div class="form-group col-lg-6">
           <label class="control-label">Imagen del Elemento</label>
           <input type="file" name="foto_Elemento" data-classbutton="btn btn-default" data-classinput="form-control inline" class="filestyle form-control">
        </div>
        <div class="form-group col-lg-6">
          <label class="control-label">Fecha Registro Elemento *</label>
          <div class="datetimepicker input-group date col-lg-12">
            <input type="text" class="form-control" name="fecha_Elemento">
            <span class="input-group-addon ">
              <span class="fa fa-calendar"></span>
            </span>
          </div>
        </div>
        <div class="form-group col-lg-6">
          <label class="control-label">Cantidad Elemento *</label>
          <input type="number" placeholder="Cantidad Elemento" class="form-control" name="cantidad_Elemento">
        </div>
    </div>
    <div class="panel-footer">
       <div class="clearfix">
         <div class="pull-left">
             <div class="required">* Campos requeridos</div>
         </div>
          <div class="pull-right">
             <button type="submit" class="btn btn-purple" name="crearElemento" style="margin-top: 7px;">Guardar</button>
          </div>
       </div>
    </div>
    </form>
  </div>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-right-color: #fff;border-bottom-color: #fff;">
      <div class="panel-heading"><h3>Elementos Registrados</h3></div>
      <div class="panel-body">
        <div class="table-responsive table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Foto</th>
                <th>Fecha</th>
                <th>Cantidad</th>
              </tr>
            </thead>
            <tbody>
              <?php  while($fila = mysqli_fetch_array($resultado)): ?>
                <tr>
                  <td><?php echo $fila['id_Elemento']; ?></td>
                  <td><?php echo $fila['nombre_Elemento']; ?></td>
                  <td><img src="<?php echo $fila['foto_Elemento']; ?>"  width="70" height="60"></td>
                  <td><?php echo $fila['fecha_Elemento']; ?></td>
                  <td><?php echo $fila['cantidad_Elemento']; ?></td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
