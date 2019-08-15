<?php
  include_once('modelo/Conexion.php');
  $conex = new Conexion();
  $id_EvaluacionAntropometrica = $_GET['id_ea'];
  $sql = "SELECT ea.*, u.numeroId_Usuario, u.id_Usuario FROM evaluacionantropometrica ea
          JOIN usuario u ON ea.id_Usuario = u.id_Usuario
          WHERE ea.id_EvaluacionAntropometrica = $id_EvaluacionAntropometrica";
  $resultado = $conex-> consultaRetorno($sql);
  $filas = mysqli_fetch_assoc($resultado);

  if(!empty($_POST)){
    $imc=$_POST['imc'];
    if ($imc == "NaN") {
      echo "<div class='alert alert-danger alert-dismissable'>";
      echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>Error al calcular el IMC, por favor ingresa una estatura y peso válidos.</a></div>";
    }else{
        $id_EvaluacionAntropometrica=$_GET['id_ea'];
        $tipo_Rh=$_POST['tipo_Rh'];
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
        
        $id_Usuario=$_POST['id_Usuario'];
        //Clasifica al usuario segun sea su IMC
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
        $sql = "UPDATE evaluacionantropometrica SET tipo_Rh='$tipo_Rh', estatura='$estatura', peso='$peso', medidaBrazoIzquierda='$medidaBrazoIzquierda', medidaBrazoDerecha='$medidaBrazoDerecha', medidaPecho='$medidaPecho', medidaPiernaDerecha='$medidaPiernaDerecha', medidaPiernaIzquierda='$medidaPiernaIzquierda', medidaPantorrillaIzquierda='$medidaPantorrillaIzquierda', medidaPantorrillaDerecha='$medidaPantorrillaDerecha', medidaCintura='$medidaCintura', medidaCuello='$medidaCuello', gluteos='$gluteos', antebrazoIzquierdo='$antebrazoIzquierdo', antebrazoDerecho='$antebrazoDerecho', imc='$imc', clasificacion='$clasificacion', id_Usuario='$id_Usuario' WHERE id_EvaluacionAntropometrica = $id_EvaluacionAntropometrica";
        $conex-> consultaSimple($sql);
        echo  "<div class='alert alert-warning alert-dismissable'>";
        echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>La Evaluación Antropométrica ha sido actualizada con éxito. <a href='?vista=editarDatosAntropometricos' class='alert-link'> Volver al listado de evaluaciones</a>.</div>";
      }
    }
?>
<script type="text/javascript">
  document.getElementById('actMedidas').setAttribute("class", "active");
  document.getElementById('subMenuAntrop').setAttribute("class", "nav collapse in");
  document.getElementById('indexAntrop').setAttribute("class", "active");
</script>
<script src="app/js/angular.js"></script>
<h3>
  Actualizar Datos Antropométricos
</h3>
<div class="row" >
  <div class="col-lg-12" >
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" data-parsley-validate="" novalidate="">
      <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-right-color: #fff;border-bottom-color: #fff;">
       <div class="panel-body" ng-app="imc" ng-controller="imcController">
         <div class="form-group" style="padding: 0px 15px;">
            <label class="control-label">Número de Identificación del Usuario *</label>
            <input type="text" name="numeroId_Usuario" required class="form-control" value="<?php echo $filas['numeroId_Usuario'];?>">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Tipo de RH *</label>
            <input type="text" name="tipo_Rh" required class="form-control"  placeholder="Ej: O+" value="<?php echo $filas['tipo_Rh'];?>">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Estatura (mts)*</label>
            <input type="text" name="estatura" required class="form-control"  placeholder="<?php echo $filas['estatura'];?>" ng-model="estatura" >
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Peso (Kg) *</label>
            <input type="text" name="peso" required class="form-control"  placeholder="<?php echo $filas['peso'];?>" ng-model="peso" maxlength="2" >
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Brazo Derecho (cm) *</label>
            <input type="text" name="medidaBrazoDerecha" required class="form-control"  placeholder="Ej: 75" maxlength="2" value="<?php echo $filas['medidaBrazoDerecha'];?>">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Brazo Izquierdo (cm) *</label>
            <input type="text" name="medidaBrazoIzquierda" required class="form-control"  placeholder="Ej: 75" maxlength="2" value="<?php echo $filas['medidaBrazoIzquierda'];?>">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Pecho (cm) *</label>
            <input type="text" name="medidaPecho" required class="form-control"  placeholder="Ej: 75" maxlength="2" value="<?php echo $filas['medidaPecho'];?>">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Pierna Derecha (cm) *</label>
            <input type="text" name="medidaPiernaDerecha" required class="form-control" placeholder="Ej: 75" maxlength="2"  value="<?php echo $filas['medidaPiernaDerecha'];?>">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Pierna Izquierda (cm) *</label>
            <input type="text" name="medidaPiernaIzquierda" required class="form-control"  placeholder="Ej: 75" maxlength="2"  value="<?php echo $filas['medidaPiernaIzquierda'];?>">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Pantorrilla Derecha (cm) *</label>
            <input type="text" name="medidaPantorrillaDerecha" required class="form-control" placeholder="Ej: 75" maxlength="2"  value="<?php echo $filas['medidaPantorrillaDerecha'];?>">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Pantorrilla Izquierda (cm) *</label>
            <input type="text" name="medidaPantorrillaIzquierda" required class="form-control"  placeholder="Ej: 75" maxlength="2"  value="<?php echo $filas['medidaPantorrillaIzquierda'];?>">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Cintura (cm) *</label>
            <input type="text" name="medidaCintura" required class="form-control"  placeholder="Ej: 75" maxlength="2" value="<?php echo $filas['medidaCintura'];?>">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Cuello (cm) *</label>
            <input type="text" name="medidaCuello" required class="form-control"  placeholder="Ej: 75" maxlength="2" value="<?php echo $filas['medidaCuello'];?>">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Glúteos (cm) *</label>
            <input type="text" name="gluteos" required class="form-control" placeholder="Ej: 75" maxlength="2"  value="<?php echo $filas['gluteos'];?>">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Antebrazo Derecho (cm) *</label>
            <input type="text" name="antebrazoDerecho" required class="form-control"  placeholder="Ej: 75" maxlength="2" value="<?php echo $filas['antebrazoDerecho'];?>">
         </div>
         <div class="form-group col-lg-4">
            <label class="control-label">Medida de Antebrazp Izquierdo (cm) *</label>
            <input type="text" name="antebrazoIzquierdo" required class="form-control" placeholder="Ej: 75" maxlength="2" value="<?php echo $filas['antebrazoIzquierdo'];?>">
         </div>
         <div class="form-group text-center">
            <label class="control-label text-md" style="color: #fc704c;">IMC: <?php $imc = "{{ peso/(estatura*estatura) }}"; echo $imc; ?></label>
            <input type="hidden" name="imc" value="<?php echo $imc ?>">
            <input type="hidden" name="id_Usuario" value="<?php echo $filas['id_Usuario'] ?>">
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
