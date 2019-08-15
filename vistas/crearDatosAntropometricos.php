<?php
  include_once ('controlador/ControladorUsuario.php');
  include_once('modelo/Conexion.php');
  $conex = new Conexion();
  $controladorUsuario = new ControladorUsuario();
  //include_once('controlador/Enrutador.php');
  if(!empty($_POST)){
    //Obtener los datos del formulario
    $numeroId_Usuario = $_POST['numeroId_Usuario'];
    $result = $controladorUsuario-> obtenerId($numeroId_Usuario);
    $existe = mysqli_num_rows($result);
    $imc = $_POST['imc'];
    //Valida que exista el numero de documento ingresado
    if ($existe != 0) {
      //Valida que el IMC este calculadp
      if ($imc == "NaN") {
        echo "<div class='alert alert-danger alert-dismissable'>";
        echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>Error al calcular el IMC, por favor ingresa una estatura y peso válidos.</a></div>";
      }else{
        $tipo_Rh= $conex->conexion->real_escape_string($_POST['tipo_Rh']);
        $estatura=$_POST['estatura'];
        $peso=$_POST['peso'];
        $medidaBrazoIzquierda=$_POST['medidaBrazoIzquierda'];
        $medidaBrazoDerecha=$_POST['medidaBrazoDerecha'];
        $medidaPecho=$_POST['medidaPecho'];
        $medidaPiernaDerecha=$_POST['medidaPiernaDerecha'];
        $medidaPiernaIzquierda=$_POST['medidaPiernaIzquierda'];
        $medidaPantorrillaIzquierda=$_POST['medidaPantorrillaIzquierda'];
        $medidaPantorrillaDerecha=$_POST['medidaPantorrillaDerecha'];
        $medidaCintura=$_POST['medidaCintura'];
        $medidaCuello=$_POST['medidaCuello'];
        $gluteos=$_POST['gluteos'];
        $antebrazoIzquierdo=$_POST['antebrazoIzquierdo'];
        $antebrazoDerecho=$_POST['antebrazoDerecho'];
        $imc = $conex->conexion->real_escape_string($_POST['imc']);
        //Obtiene el ID de usuario con el Numero de Docuento
        $id_Usuario = $controladorUsuario-> obtenerId($numeroId_Usuario);
        $fila = mysqli_fetch_array($id_Usuario);
        //Validacion de la clasificacion
        if($imc < 16.00){
          $clasificacion = $conex->conexion->real_escape_string("Delgadez Severa");
        }elseif ($imc >= 16.01 && $imc <= 16.99) {
          $clasificacion = $conex->conexion->real_escape_string("Delgadez Moderada");
        }elseif ($imc >= 17.00 && $imc <= 18.49) {
          $clasificacion = $conex->conexion->real_escape_string("Delgadez Aceptable");
        }elseif ($imc >= 18.50 && $imc <= 24.99) {
          $clasificacion = $conex->conexion->real_escape_string("Normal");
        }elseif ($imc >= 25.00 && $imc <= 29.99) {
          $clasificacion = $conex->conexion->real_escape_string("Sobrepeso");
        }elseif ($imc >= 30.00 && $imc <= 34.99) {
          $clasificacion = $conex->conexion->real_escape_string("Obesidad Tipo I");
        }elseif ($imc >= 35.00 && $imc <= 40.00) {
          $clasificacion = $conex->conexion->real_escape_string("Obesidad Tipo II");
        }else {
          $clasificacion = $conex->conexion->real_escape_string("Obesidad Tipo III");
        }
        
        $sql = "INSERT INTO evaluacionantropometrica(
                  tipo_Rh,
                  estatura, peso,
                  medidaBrazoIzquierda,
                  medidaBrazoDerecha,
                  medidaPecho,
                  medidaPiernaDerecha,
                  medidaPiernaIzquierda,
                  medidaPantorrillaIzquierda,
                  medidaPantorrillaDerecha,
                   medidaCintura,
                   medidaCuello,
                   gluteos,
                   antebrazoIzquierdo,
                   antebrazoDerecho,
                   imc,
                   clasificacion,
                   id_Usuario
                ) VALUES (
                  '$tipo_Rh',
                  '$estatura',
                  '$peso',
                  '$medidaBrazoIzquierda',
                  '$medidaBrazoDerecha',
                  '$medidaPecho',
                  '$medidaPiernaDerecha',
                  '$medidaPiernaIzquierda',
                  '$medidaPantorrillaIzquierda',
                  '$medidaPantorrillaDerecha',
                  '$medidaCintura',
                  '$medidaCuello',
                  '$gluteos',
                  '$antebrazoIzquierdo',
                  '$antebrazoDerecho',
                  '$imc',
                  '$clasificacion',
                  '$fila[0]'
                )";
        //Ejecucion del SQL
        $conex-> consultaSimple($sql);
        echo "<div data-toggle='notify' data-onload data-message='&lt;b&gt;¡Evaluación Antropométrica guardada con éxito!&lt;/b&gt;' data-options='{&quot;status&quot;:&quot;warning&quot;, &quot;pos&quot;:&quot;top-right&quot;}' class='hidden-xs'></div>";
      }
    }else{
      echo "<div class='alert alert-danger alert-dismissable'>";
      echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>El Número de identificación no coincide con nuestros registros.</a></div>";
    }
  }

?>
<script type="text/javascript">
  document.getElementById('datosAntropometricos').setAttribute("class", "active");
</script>
<script src="app/js/angular.js"></script>
<h3>
   Evaluación Antropométrica
</h3>
<div class="row" >
  <div class="col-lg-12" >
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" data-parsley-validate="" novalidate="">
      <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-right-color: #fff;border-bottom-color: #fff;">
       <div class="panel-body" ng-app="imc" ng-controller="imcController">
         <div class="form-group" style="padding: 0px 15px;">
            <label class="control-label">Número de Identificación del Usuario *</label>
            <input type="text" name="numeroId_Usuario" required class="form-control">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Grupo Sanguíneo y RH *</label>
            <input type="text" name="tipo_Rh" required class="form-control"  placeholder="Ej: O+">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Estatura (mts)*</label>
            <input type="text" name="estatura" required class="form-control"  placeholder="Ej: 1.78" ng-model="estatura" maxlength="4">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Peso (Kg) *</label>
            <input type="text" name="peso" required class="form-control"  placeholder="Ej: 75" ng-model="peso" maxlength="2">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Brazo Derecho (cm) *</label>
            <input type="text" name="medidaBrazoDerecha" required class="form-control"  placeholder="Ej: 75" maxlength="2">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Brazo Izquierdo (cm) *</label>
            <input type="text" name="medidaBrazoIzquierda" required class="form-control"  placeholder="Ej: 75" maxlength="2">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Pecho (cm) *</label>
            <input type="text" name="medidaPecho" required class="form-control"  placeholder="Ej: 75" maxlength="2">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Pierna Derecha (cm) *</label>
            <input type="text" name="medidaPiernaDerecha" required class="form-control" placeholder="Ej: 75" maxlength="2">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Pierna Izquierda (cm) *</label>
            <input type="text" name="medidaPiernaIzquierda" required class="form-control"  placeholder="Ej: 75" maxlength="2">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Pantorrilla Derecha (cm) *</label>
            <input type="text" name="medidaPantorrillaDerecha" required class="form-control" placeholder="Ej: 75" maxlength="2">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Pantorrilla Izquierda (cm) *</label>
            <input type="text" name="medidaPantorrillaIzquierda" required class="form-control"  placeholder="Ej: 75" maxlength="2">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Cintura (cm) *</label>
            <input type="text" name="medidaCintura" required class="form-control"  placeholder="Ej: 75" maxlength="2">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Cuello (cm) *</label>
            <input type="text" name="medidaCuello" required class="form-control"  placeholder="Ej: 75" maxlength="2">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Glúteos (cm) *</label>
            <input type="text" name="gluteos" required class="form-control" placeholder="Ej: 75" maxlength="2">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Antebrazo Derecho (cm) *</label>
            <input type="text" name="antebrazoDerecho" required class="form-control"  placeholder="Ej: 75" maxlength="2">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Antebrazo Izquierdo (cm) *</label>
            <input type="text" name="antebrazoIzquierdo" required class="form-control" placeholder="Ej: 75" maxlength="2"s>
         </div>
         <div class="form-group text-center">
            <label class="control-label text-md" style="color: #fc704c;">IMC: <?php $imc = "{{ peso/(estatura*estatura) }}"; echo $imc; ?></label>
            <input type="hidden" name="imc" value="<?php echo $imc ?>">
         </div>
       </div>
       <div class="panel-footer">
          <div class="clearfix">
            <div class="pull-left">
                <div class="required">* Campos requeridos</div>
            </div>
             <div class="pull-right">
                <button type="submit" class="btn btn-purple" style="margin-top: 7px;">Registrar</button>
             </div>
          </div>
       </div>
      </div>
    </form>
  </div>
</div>
<script>
  var app = angular.module('imc', []);
  app.controller('imcController', function($scope){
      var estatura = $scope.estatura = document.getElementById('estatura');
      var peso = $scope.peso = document.getElementById('peso');
  });
</script>
