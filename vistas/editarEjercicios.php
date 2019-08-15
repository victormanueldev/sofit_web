<?php 
    include_once('controlador/ControladorRutina.php');
   $controlador = new ControladorRutina();


   $result= $controlador->listarEjercicio($_GET['idr'],$_GET['id']);
   
   while ( $filasE = mysqli_fetch_assoc($result) ) 
   {
   $id_Rutina=$filasE['id_Rutina'];
   $id_Ejercicio=$filasE['id_Ejercicio'];
   $series=$filasE['series'];
   $repeticiones=$filasE['repeticiones'];
   $tiempo=$filasE['tiempo'];
   }
 ?>
 <?php
   //modifica  SERIE
   if(isset($_POST['modificarSeries'])){

   $id_Rutina=$_GET['idr'];
   $id_Ejercicio=$_GET['id']; 
   $series=$_POST['series']; 

   $resultado=$controlador->modificarSeries($id_Rutina,$id_Ejercicio,$series);
    if ($resultado==true) {
         echo "<script>alert('Error al modificar');</script>";
      } else {
         
      } 
      }
 ?>
 <?php
   //modifica REPETICIONES
   if(isset($_POST['modificarRepeticiones'])){

   $id_Rutina=$_GET['idr'];
   $id_Ejercicio=$_GET['id']; 
   $repeticiones=$_POST['repeticiones']; 

   $resultado=$controlador->modificarRepeticiones($id_Rutina,$id_Ejercicio,$repeticiones);
    if ($resultado==true) {
            
         echo "<script>alert('Error al modificar');</script>";
      } else {
         
      } 
      }

 ?>
  <?php
   //modifica TIEMPO
   if(isset($_POST['modificarTiempo']))
   {

      $id_Rutina=$_GET['idr'];
      $id_Ejercicio=$_GET['id']; 
      $tiempo=$_POST['tiempo'];  
        
      $resultado=$controlador->modificarTiempo($id_Rutina,$id_Ejercicio,$tiempo);
      if ($resultado==true) 
      {      
         echo "<script>alert('Error al modificar');</script>";
      } else 
      {
            
      } 
   }

 ?>

<div class="col-lg-12">
    <!-- START panel-->
   <div class="panel panel-default">
      <div class="panel-heading">
         <div align=" left "> 
              
               <a type="button" class="btn btn-labeled btn-default" href="?vista=modificarRutina&idr=<?php echo $_GET['idr'];?>">
                  <span class="btn-label">
                     <i class="fa fa-arrow-left"></i>
                  </span>Atras
               </a>
         </div>
         <h4 style="text-align: center;">Modificar Ejercicio</h4>
      </div>
         <div class="panel-body">
            <!-- START table-responsive-->
            <div class="table-responsive">
               <table class="table table-striped table-bordered table-hover">
                  <thead style="text-align: center;">
                     <tr > 
                        <th style="text-align: center;" ></th>
                        <th style="text-align: center;" >Reguistro Actual</th>
                        <th style="text-align: center;" >Nuevo reguistro</th>
                        <th style="text-align: center;" ></th>
                     </tr>
                  </thead>
                     <tbody>
                           <tr>
                              <form method="POST" Action="" >
                                 <td>Series</td>
                                 <td><?php echo $series; ?></td>

                                 <td>
                                    <input style=" width: 100% ; border: 0px; " type="text" name="series" placeholder="Nuevo " required>
                                 </td>
                                
                                 <td>
                                    <input button class="btn btn-success btn-sm" type="submit" name="modificarSeries" value="Modificar">
                                 </td>

                              </form>
                           </tr>
                           <tr>
                              <form method="POST" Action="" >
                                 <td>Repeticiones</td>
                                 <td><?php echo $repeticiones; ?></td>
                                 <td>
                                    <input style=" width: 100%; border: 0px;" type="text" name="repeticiones" placeholder="Nuevo" required>
                                 </td>
                                   
                                 <td>
                                    <input button class="btn btn-success btn-sm" type="submit" name="modificarRepeticiones" value="Modificar">
                                 </td>
                              </form>
                           </tr>
                           <tr>
                              <form method="POST" Action="" >
                                 <td>Tiempo</td>
                                 <td><?php echo $tiempo?></td>
                                 <td>
                                    <input style=" width: 100%; border: 0px;" type="text" name="tiempo" placeholder="Nuevo" required>
                                 </td>
                                   
                                 <td>
                                    
                                    <input button class="btn btn-success btn-sm" type="submit" name="modificarTiempo" value="Modificar">
                                 </td>
                              </form>
                           </tr>
                             
                     </tbody>
            </table>
         </div>
            <!-- END table-responsive-->
      </div>
   </div>
</div>