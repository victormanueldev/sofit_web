<div>
  <div class="col-sm-12">
                     <!-- START panel-->
      <div class="panel panel-default">
         <div style="text-align: center;"><h2>Crear una nueva rutina</h2> </div>
            <div class="panel-body">
               <form role="form" action="" method="POST">
                  <div class="form-group">
                     <label>Nombre rutina</label>
                     <input type="text"  name="nombre" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>Descripcion</label>
                     <textarea name="descripcion" class="form-control" required></textarea><br></div>
                  <input type="submit" class="btn btn-sm btn-success" name="Guardar" value="Guardar">
               </form>
            </div>
      </div>
   </div>

<?php  
   include_once('controlador/ControladorRutina.php');
   $controlador = new ControladorRutina();   
 //creamos la rutina, iniciomos la session y redirigimos a (agregar ejerciicos) o (crear nuevamente la rutina)  

   if(isset($_POST['Guardar'])){
         $_SESSION['nomRutina']=$_POST['nombre'];

         $resultado=$controlador->crearRutina($_POST['nombre'], $_POST['descripcion']);
      if ($resultado) {
         unset($_SESSION['nomRutina']);
         echo "<script>alert('Usted esta siendo redireccionado a la pagina principal')</script>";     
      } else {
         echo "<script>alert('Rutina Creada exitosamente')</script>";
         echo "<script>window.location='?vista=selecionarEjercicio';</script>";
      }     
           
   }
?>

 

