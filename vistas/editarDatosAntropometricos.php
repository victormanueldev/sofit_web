<?php
  include_once('modelo/Conexion.php');
  $conex = new Conexion();

  $sql = "SELECT u.numeroId_Usuario, u.nombres_Usuario, ea.id_EvaluacionAntropometrica, ea.clasificacion, ea.imc, ea.tipo_Rh FROM evaluacionantropometrica ea
          JOIN usuario u ON ea.id_Usuario = u.id_Usuario";
  $resultado = $conex-> consultaRetorno($sql);
  
?>
<script type="text/javascript">
  document.getElementById('actMedidas').setAttribute("class", "active");
  document.getElementById('subMenuAntrop').setAttribute("class", "nav collapse in");
  document.getElementById('indexAntrop').setAttribute("class", "active");
</script>
<h3>
  Evaluación Antropométrica
</h3>
<!-- START DATATABLE 1 -->
<div class="row">
  <div class="col-lg-12">
     <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
        <div class="panel-heading" >
           Listado de evaluaciones
        </div>
        <div class="panel-body">
           <table id="datatable1" class="table table-striped table-hover">
              <thead>
                 <tr>
                    <th>Documento</th>
                    <th >Nombres</th>
                    <th >Tipo RH</th>
                    <th >IMC</th>
                    <th >Clasificación</th>
                    <th style="text-align: center;">Permisos</th>
                 </tr>
              </thead>
              <tbody>
                <?php  while($fila = mysqli_fetch_array($resultado)): ?>
               <tr class="gradeX">
                 <td><?php echo $fila['numeroId_Usuario']; ?></td>
                 <td><?php echo $fila['nombres_Usuario']; ?></td>
                 <td><?php echo $fila['tipo_Rh']; ?></td>
                 <td><?php echo $fila['imc']; ?></td>
                 <td><?php echo $fila['clasificacion']; ?></td>
                 <td class="text-center">
                   <a href="<?php echo "?vista=actualizarDatosAntropometricos&id_ea=".$fila['id_EvaluacionAntropometrica'];?>" class="btn btn-purple" name="enviarE" >
                     Modificar
                   </a>
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
