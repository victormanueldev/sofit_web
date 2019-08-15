<?php
	include_once('modelo/Conexion.php');
  include_once('controlador/ControladorRegional.php');
  include_once('controlador/ControladorCiudad.php');
  include_once('controlador/ControladorCentro.php');
  include_once('controlador/ControladorPrograma.php');
  include_once ('controlador/ControladorUsuario.php');
  include_once('controlador/ControladorTipoDocumento.php');
  //Instacias de los Controladores
  $conex = new Conexion();
  $controlRegional = new ControladorRegional();
  $controlCiudad = new ControladorCiudad();
  $controlCentro = new ControladorCentro();
  $controlPrograma = new ControladorPrograma();
  $controladorUsuario = new ControladorUsuario();
  $controladorTD = new ControladorTipoDocumento();
  $infoUsuario = $controladorUsuario-> verU($_SESSION['id_Usuario']);
  if (!empty($_POST)) {
    $id_TipoDoc = $_POST['id_TipoDocumento'];
    $nombres = $conex->conexion->real_escape_string($_POST['nombres']);
    $apellidos = $conex->conexion->real_escape_string($_POST['apellidos']);
    $telefonoFijo = $conex->conexion->real_escape_string($_POST['telefono_fijo']);
    $telefonoMovil = $conex->conexion->real_escape_string($_POST['telefono_movil']);
    $email = $conex->conexion->real_escape_string($_POST['email']);
    //Valida si hay un archivo cargado en 
    if (file_exists($_FILES['foto_Usuario']['tmp_name'])) {
      //Proceso de almacenamiento de imagenes
      $archivo =  $_FILES['foto_Usuario']['tmp_name'];
      $destino = "app/img/user/".$_FILES['foto_Usuario']['name'];
      move_uploaded_file($archivo, $destino);
      $_POST['foto_Usuario'] = $destino;
    }else{
      $destino = $infoUsuario['foto_Usuario'];
    }
    
    $regional = $_POST['id_Regional'];
		$ciudad = $_POST['id_Ciudad'];
		$centro = $_POST['id_Centro'];
		$programa = $_POST['id_Programa'];
		$numeroFicha_Usuario = $conex->conexion->real_escape_string($_POST['numeroFicha_Usuario']);
    //Utiliza el Metodo Editar Usuario y envia Parametros
    $controladorUsuario-> editarU(
      $_SESSION['id_Usuario'],
      $nombres,
      $id_TipoDoc,
      $apellidos,
      $telefonoFijo,
      $telefonoMovil,
      $email,
      $ciudad,
      $destino,
      $centro,
      $programa,
      $regional,
      $numeroFicha_Usuario
    );
  echo "<script type='text/javascript'>document.location.href='?vista=editarPerfil';</script>";
  }
?>
<h3>
   Editar Perfil
</h3>
<div class="row" >
  <div class="col-lg-12">
    <!--Formulario de Editar Perfil-->
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
      <!-- START panel-->
      <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
        <div class="panel-heading">
           <div class="panel-title">Datos Personales</div>
        </div>
        <div class="panel-body">
          <!--Tipo de Documento-->
          <div class="form-group col-lg-6">
             <label class="control-label">Tipo de Documento</label>
                <select name="id_TipoDocumento" class="form-control m-b" required="">
                  <?php
                    $resulTd = $controladorTD-> indexTipoDoc();
                    while ($fila = mysqli_fetch_array($resulTd)) {
                      echo "<option value='".$fila['id_TipoDocumento']."'>";
                      echo $fila['tipo_Documento'];
                      echo "</option>";
                    }
    					    ?>
                </select>
          </div>
          <!--Nombres-->
          <div class="form-group col-lg-6">
             <label class="control-label">Nombres</label>
                <input type="text" name="nombres" required class="form-control" value="<?php echo $infoUsuario['nombres_Usuario']?>">
          </div>
          <!--Apellidos-->
          <div class="form-group col-lg-6">
             <label class="control-label">Apellidos</label>
              <input type="text" name="apellidos" required class="form-control" value="<?php echo $infoUsuario['apellidos_Usuario']?>">
          </div>
          <!--Telefono Fijo-->
          <div class="form-group col-lg-6">
             <label class="control-label">Teléfono Fijo</label>
                <input type="text" name="telefono_fijo" required class="form-control" value="<?php echo $infoUsuario['telefono_Usuario']?>">
          </div>
          <!--Telefono Movil-->
          <div class="form-group col-lg-6">
             <label class="control-label">Teléfono Móvil</label>
                <input type="text" name="telefono_movil" required class="form-control" value="<?php echo $infoUsuario['celular_Usuario']?>">
          </div>
          <!--Email-->
          <div class="form-group col-lg-6">
             <label class="control-label">Email</label>
                <input type="text" name="email" required class="form-control" value="<?php echo $infoUsuario['email']?>">
          </div>
          <!--Regional-->
          <div class="form-group col-lg-6">
            <label class="control-label">Regional</label>
               <select name="id_Regional" class="form-control m-b" required="">
                 <?php
         					$resulRegional= $controlRegional-> indexRegional();
         					while ($fila = mysqli_fetch_array($resulRegional)) {
         						echo "<option value='".$fila['id_Regional']."'>";
         						echo $fila['nombre_Regional'];
         						echo "</option>";
         					}
         				?>
               </select>
          </div>
          <!--Ciudad-->
          <div class="form-group col-lg-6">
            <label class="control-label">Ciudad</label>
               <select name="id_Ciudad" class="form-control m-b" required="">
                 <?php
       						$resulCiudad = $controlCiudad-> indexCiudad();
       						while ($fila = mysqli_fetch_array($resulCiudad)) {
       							echo "<option value='".$fila['id_Ciudad']."'>";
       							echo $fila['nombre_Ciudad'];
       							echo "</option>";
       						}
       					?>s
               </select>
          </div>
          <!--Centro-->
          <div class="form-group col-lg-6">
      			<label>Centro</label>
    				<select class="form-control" name="id_Centro" required="">
    					<?php
    						$resulCentro = $controlCentro-> indexCentro();
    						while ($fila = mysqli_fetch_array($resulCentro)) {
    							echo "<option value='".$fila['id_Centro']."'>";
    							echo $fila['nombre_Centro'];
    							echo "</option>";
    						}
    					?>
    				</select>
    			</div>
          <!--Programa-->
          <div class="form-group col-lg-6" >
      			<label>Programa de Formación</label>
    				<select  class="form-control" name="id_Programa" required="">
    					<?php
    						$resulPrograma = $controlPrograma-> indexPrograma();
    						while ($fila = mysqli_fetch_array($resulPrograma)) {
    							echo "<option value='".$fila['id_Programa']."'>";
    							echo $fila['nombre_Programa'];
    							echo "</option>";
    						}
    					?>
    				</select>
    			</div>
          <!--Numero de Ficha-->
          <div class="form-group col-lg-6">
             <label class="control-label">Número de Ficha</label>
                <input type="text" name="numeroFicha_Usuario" required class="form-control" value="<?php echo $infoUsuario['numeroFicha_Usuario']?>">
          </div>
		  <!--Foto de Perfil-->
          <div class="form-group col-lg-6">
           <label class="control-label">Foto de Perfil</label>
           <input type="file" name="foto_Usuario" accept="image/*" data-classbutton="btn btn-default" data-classinput="form-control inline" class="filestyle form-control">
          </div>
        </div>
        <div class="panel-footer">
            <div class="clearfix">
              <div class="pull-right">
                <button type="submit" class="btn btn-purple">Actualizar</button>
              </div>
            </div>
          </div>
      </div>
      <!-- END panel-->
    </form>
  </dov>
</div>
