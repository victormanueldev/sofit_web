<?php
  $db=new mysqli('localhost','root','','bd_sofit');
  include_once ('controlador/ControladorUsuario.php');
  $controladorUsuario = new ControladorUsuario();
  $datosUsuario = $controladorUsuario-> verU($_SESSION['id_Usuario']);
  $id_Usuario = $_SESSION['id_Usuario'];
  $consulta= $db->query("SELECT e.*, u.cargo FROM evaluacionantropometrica e
                        JOIN usuario u ON e.id_Usuario = u.id_Usuario
                        WHERE e.id_Usuario = $id_Usuario");
  $fila = mysqli_fetch_array($consulta);
  //Nombre de cada Item de la Evaluacion Antropometrica
  $nombreItem[1] = "Grupo Sanguíneo y RH";
  $nombreItem[2] = "Estatura (cm)";
  $nombreItem[3] = "Peso (Kg)";
  $nombreItem[4] = "Brazo Izquierdo (cm)";
  $nombreItem[5] = "Brazo Derecho (cm)";
  $nombreItem[6] = "Pecho (cm)";
  $nombreItem[7] = "Pierna Derecha (cm)";
  $nombreItem[8] = "Pierna Izquierda (cm)";
  $nombreItem[9] = "Pantorrilla Izquierda (cm)";
  $nombreItem[10] = "Pantorrilla Derecha (cm)";
  $nombreItem[11] = "Cintura (cm)";
  $nombreItem[12] = "Cuello (cm)";
  $nombreItem[13] = "Glúteos (cm)";
  $nombreItem[14] = "Antebrazo Izquierdo (cm)";
  $nombreItem[15] = "Antebrazo Derecho (cm)";
  $nombreItem[16] = "IMC";
  $nombreItem[17] = "Clasificación";
?>
<!--Script para activar los li del Aside que estan desactivados-->
<script type="text/javascript">
  document.getElementById('antropometrica').setAttribute("class", "active");
</script>
<h3>
   Datos Antropométricos
</h3>
<!--<div data-toggle="notify" data-onload data-message="&lt;b&gt;Bienvenid@!&lt;/b&gt; Nos alegra tenerte de vuelta" data-options="{&quot;status&quot;:&quot;danger&quot;, &quot;pos&quot;:&quot;bottom-right&quot;}" class="hidden-xs"></div>-->
<div class="row" >
  <?php if (isset($fila[0])) { //Valida si el usuario cuenta con la evaluacion antropometrica ?>
   <div class="col-lg-12">
      <!-- START widget-->
      <div class="panel widget">
         <div style="background-image: url('app/img/bg5.jpg')" class="panel-body text-center bg-center">
            <div class="row row-table">
               <div class="col-xs-12 text-white">
                  <img src="<?php echo $datosUsuario['foto_Usuario']; ?>" alt="Image" class="img-thumbnail img-circle thumb128">
                  <h3 class="m0"><?php echo $datosUsuario['nombres_Usuario']." ".$datosUsuario['apellidos_Usuario']; ?></h3>
                  <p class="m0"><?php echo $datosUsuario['cargo']; ?></p>
               </div>
            </div>
         </div>
         <div class="panel-body text-center bg-gray-darker">
            <div class="row row-table">
               <div class="col-xs-12">
                  <a href="#" class="text-white">
                     <em class="fa fa-universal-access fa-2x"></em>
                  </a>
               </div>

            </div>
         </div>

         <div class="list-group">
           <?php for ($i=1; $i <= 17; $i++) { ?>
             <?php if($i == 17){ ?>
               <a href="#" class="list-group-item" style="background-color: #373c38;color: #fff;">
                  <span class="label pull-right" style="color: #FC704C;font-size: 18px;padding: 1px 2px;"><?php echo $fila[17]; ?></span>
                  <?php echo $nombreItem[17]; ?></a>
              <?php }else{ ?>
                <a href="#" class="list-group-item" >
                  <span class="label pull-right" style="color: #FC704C;font-size: 15px;"><?php echo $fila[$i]; ?></span>
                  <?php echo $nombreItem[$i]; ?></a>
              <?php } ?>
            <?php } ?>
         </div>
      </div>
      <!-- END widget-->
   </div>
 <?php }else{ ?>
   <!-- START widget-->
   <div class="col-lg-12">
     <div class="panel widget">
        <div class="panel-body bg-purple text-center">
           <p>
              <img src="<?php echo $datosUsuario['foto_Usuario']; ?>" alt="" class="img-circle thumb64">
           </p>
           <p>
              <strong><?php echo $datosUsuario['nombres_Usuario']; ?></strong>
              <span>No cuentas con la Evaluación Antropométrica</span>
           </p>
        </div>
     </div>
   </div>
   <!-- END widget-->
   <div class="col-lg-12">
    <!-- START panel-->
    <div class="panel panel-warning">
       <div class="panel-heading" style="background-color: #FC704C;">¡Importante!</div>
       <div class="panel-body text-justify">
          <p>Dirígete a las instalaciones del Gimnasio SENA y pide al instructor que registre tus datos antropométricos en el sistema.</p>
       </div>
    </div>
    <!-- END panel-->
  </div>
  <?php } ?>
</div>
