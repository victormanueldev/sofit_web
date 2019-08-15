<?php 
	include_once('controlador/ControladorRutina.php');
    $controlador = new ControladorRutina();
 ?>
 <?php
   $resultado= $controlador->consultarEjerciciosDeRutina($_GET['idr']);
   if ($resultado!=false):
?> 
<h3> 
	Ejercicios de rutina
</h3>
    <div class="row">
	<?php while($filas = mysqli_fetch_assoc($resultado)) { ?>
	<!-- Card Ejercicio -->
	<div class="col-lg-4">
		<!-- START widget-->
		<div class="panel widget">
		<div class="panel-heading text-center" style="background-color: #FC704C;color: #fff; font-size: 17px;"><?php echo $filas['nombre_Ejercicio'] ?></div>
		<img src="<?php echo $filas['foto_Ejercicio'] ?>" alt="Image" class="img-responsive" style="width: 100%; height: 250px;">
		<div class="panel-body" style="background-color: #373c38e6;">
			<div class="row row-table text-center text-white" >
				<div class="col-xs-4">
					<p>Repet.</p>
					<h3 class="m0 text-purple"><?php echo $filas['repeticiones'] ?></h3>
				</div>
				<div class="col-xs-4">
					<p>Series</p>
					<h3 class="m0 text-purple"><?php echo $filas['series'] ?></h3>
				</div>
				<div class="col-xs-4">
					<p>Tiempo</p>
					<h3 class="m0 text-purple"><?php echo $filas['tiempo']."'" ?></h3>
				</div>
			</div>
		</div>
		</div>
		<!-- END widget-->
	</div>
	<!-- END Card ejercicio-->
<?php } ?>
	</div>
</div>
<?php else:?>
<div>
      <h3>No hay ejercicios en la Rutina</h3>
      
      <a href="index.php?cargar=agregarEjercicio">agregar Ejercicios</a>
   </div>
<?php endif; ?>