<?php
   include_once('controlador/ControladorEjercicio.php');
   include_once('controlador/controladorcategoria.php');
   $controladorCategoria = new ControladorCategoria();
   $Controlador = new ControladorEjercicio();
   $resultado = $Controlador->index();
   if (!empty($_POST)) {
    $archivo =  $_FILES['foto_Ejercicio']['tmp_name'];
    $destino = "app/img/Ejercicios/".$_FILES['foto_Ejercicio']['name'];
    move_uploaded_file($archivo, $destino);
    $_POST['foto_Ejercicio'] = $destino;
    $resul = $Controlador->crearE($_POST['nombre_Ejercicio'],
                 $_POST['foto_Ejercicio'],
                 $_POST['id_Categoria']);
  echo  "<div class='alert alert-warning alert-dismissable'>";
  echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>El Ejercicio se ha guardado con éxito.</div>";
 }
?>
<script type="text/javascript">
  document.getElementById('rutinas').setAttribute("class", "active");
  document.getElementById('subMenuRutinas').setAttribute("class", "nav collapse in");
  document.getElementById('crearEjercicio').setAttribute("class", "active");
</script>
<h3>
  Crear Ejercicio
</h3>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
      <div class="panel-heading">Crear ejercicio</div>
      <div class="panel-body">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
            <div class="form-group col-lg-4">
              <label class="control-label">Nombre del ejercicio</label>
                  <input type="text" placeholder="Nombre ejercicio" class="form-control" name="nombre_Ejercicio" required>
            </div>
            <div class="form-group col-lg-4">
              <label class=" control-label">Imagen del ejercicio</label>
                  <input type="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="filestyle form-control" name="foto_Ejercicio">
            </div>
            <div class="form-group col-lg-4">
                <label class="control-label">Categoría del ejercicio *</label>
                  <select name="id_Categoria" class="form-control m-b" required="">
                    <?php 
                      $categorias = $controladorCategoria-> indexCategoria();
                      while($filas = mysqli_fetch_assoc($categorias)){
                    ?> 
                      <option value="<?php echo $filas['id_Categoria']?>"><?php echo $filas['nombre_Categoria']?></option>
                    <?php }?>
                  </select>
             </div>
		  </div>
        <div class="panel-footer">
          <div class="clearfix">
            <div class="pull-left">
              <div class="required">* Campos requeridos</div>
            </div>
              <div class="pull-right">
                  <button type="submit" class="btn btn-purple">Guardar</button>
              </div>
            </div>
          </div>
		  </form>
        </div>
      </div>
    </div>
</div>