<?php
  include_once ("./controlador/ControladorElemento.php");
  include_once("controlador/controladorInventario.php");
  include_once("controlador/controladorInventario_Elemento.php");
  $controladorI = new controladorInventario();
  $Controlador = new ControladorElemento();
  $resultado = $Controlador->index();
  $controladorIE = new  ControladorInventario_Elemento();
  
  if (isset($_POST['enviarE']) ) {
    if(empty($_SESSION['elementoRegistrado'])){
      $_SESSION['elementoRegistrado'] = array(array('elemento' => $_POST['idElemento']));
    }else{
      $elementos = $_SESSION['elementoRegistrado'];
      $existe = false;
      foreach ($elementos as $elem) {
        if ($elem['elemento'] == $_POST['idElemento']) {
          $existe = true;
          break;
        }
      }
      if($existe){
        print "<script>alert('Error: Elemento Registrado!');</script>";
      }else{
        array_push($elementos, array('elemento'=>$_POST['idElemento']));
        $_SESSION['elementoRegistrado'] = $elementos;
      }
    }
    $idElemento = $_POST['idElemento'];
    $cantidad_E=$_POST['cantidad_E'];
    $observacion = $_POST['observacion'];
  	//Tenga en cuenta los parametros del metodo crearIE(idInventario, IdElemento, TotalElemento)
    $controladorIE-> crearIE ($_GET['id_Inventario'],$idElemento,$cantidad_E, $observacion);
    $elementoRegistrado = $controladorIE-> elementoRegistrado($_GET['id_Inventario'], $idElemento);
  }
?>
<script type="text/javascript">
  document.getElementById('inventario').setAttribute("class", "active");
  document.getElementById('subMenuInventario').setAttribute("class", "nav collapse in");
  document.getElementById('crearInventario').setAttribute("class", "active");
</script>
<h3>
  Control de Elementos
</h3>

<div class="row">
  <?php if ($_GET['id_Inventario'] > 0) { ?>
    <div class="col-lg-12">
      <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
        <div class="panel-heading">Listado de Elementos</div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th style="text-align: center">ID</th>
                  <th style="text-align: center">Nombre</th>
                  <th style="text-align: center">Cantidad</th>
                  <th style="text-align: center">Fecha</th>
                  <th style="text-align: center">Foto</th>
                  <th style="text-align: center">Cantidad Disponible</th>
                  <th style="text-align: center">Observación</th>
                  <th style="text-align: center">Permisos</th>
                </tr>
              </thead>
              <tbody>
                <?php  while($fila = mysqli_fetch_array($resultado)): ?>
                  <tr>
                    <form method="POST" data-parsley-validate="" novalidate="" action="<?php $_SERVER['PHP_SELF']?>">
                      <td><?php echo $fila['id_Elemento'];  ?> </td>
                      <td><?php echo $fila['nombre_Elemento']; ?></td>
                      <td><?php echo $fila['cantidad_Elemento']; ?></td>
                      <td><?php echo $fila['fecha_Elemento']; ?></td>
                      <td>
                        <div class="media"><?php echo '<img class="img-responsive thumb64" src="'.$fila["foto_Elemento"].'">'?></div>
                      </td>
                      <td>
                        <div class="form-group">
                          <div class="col-sm-12">
                            <input type="number" min="1" data-parsley-type="number" class="form-control" name="cantidad_E">
                            <!--En este input, es donde se guarda el ID y se puede enviar por POST. El display None es para que este oculto en la interfaz-->
                            <input type="text" class="form-control" name="idElemento" value="<?php echo  $fila['id_Elemento'];  ?>" style="display: none;">
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <div class="col-sm-12">
                            <input type="text" data-parsley-type="text" class="form-control" name="observacion">
                          </div>
                        </div>
                      </td>
                      <td>
                        <?php 
                          $existe = false;
                          if(isset($_SESSION['elementoRegistrado'])){
                            foreach ($_SESSION['elementoRegistrado'] as $elem) {
                              if ($elem['elemento']==$fila['id_Elemento']) {
                                $existe=true; 
                                break;
                              }
                            }
                          }
                        ?>
                        <?php if ($existe) { ?>
                          <button type="submit" class="btn btn-danger" name="enviarE" disabled>
                            Guardado
                          </button>
                        <?php } else{?>
                          <button type="submit" class="btn btn-purple" name="enviarE" style="padding: 7px 23px;">
                            Guardar
                          </button>
                        <!--El boton es de type submit, sino no se reconoce como form-->                       
                        <?php }?>
                       
                      </form>
                    </td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
      <!--Card Atras-->
  <div class="col-lg-3">
  <?php if (!isset($_SESSION['elementoRegistrado'])) {?> 
    <a href="#" style="text-decoration: none">
  <?php }else {?> 
    <a href="?vista=crearInventario" style="text-decoration: none">
  <?php }?>
      <div class="panel widget" style="box-shadow: 0 1px 1px rgba(54, 54, 54, 0.21);">
         <div class="row row-table row-flush">
           <div class="col-xs-4 bg-danger text-center">
              <em class="fa fa-angle-double-left fa-3x"></em>
           </div>
            <div class="col-xs-8">
               <div class="panel-body text-center">
                  <h4 class="mt0" style="color: #fc704c;">Terminar</h4>
               </div>
            </div>
         </div>
      </div>
    </a>
 </div>
 <!-- END Card Atras-->
  <?php }else{ ?>
    <div class="col-lg-12">
    <!-- START panel-->
    <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
       <div class="panel-heading">Ya existen registros de inventario(s) el dia de hoy.
          <a href="#" data-perform="panel-dismiss" data-toggle="tooltip" title="Cerrar" class="pull-right">
             <em class="fa fa-close"></em>
          </a>
       </div>
    </div>
  </div>
  <!--Card Atras-->
  <div class="col-lg-3">
    <a href="?vista=crearInventario" style="text-decoration: none">
      <div class="panel widget" style="box-shadow: 0 1px 1px rgba(54, 54, 54, 0.21);">
         <div class="row row-table row-flush">
           <div class="col-xs-4 bg-danger text-center">
              <em class="fa fa-angle-double-left fa-3x"></em>
           </div>
            <div class="col-xs-8">
               <div class="panel-body text-center">
                  <h4 class="mt0" style="color: #fc704c;">Atrás</h4>
               </div>
            </div>
         </div>
      </div>
    </a>
 </div>
 <!-- END Card Atras-->
  <?php } ?>
</div>
