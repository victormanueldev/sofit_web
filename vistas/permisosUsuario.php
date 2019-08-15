<?php 
    include_once('controlador/ControladorUsuario.php');
    $controladorUsuario = new ControladorUsuario();
    $resultado = $controladorUsuario-> indexUsuario();
?>
<script type="text/javascript">
  document.getElementById('usuarios').setAttribute("class", "active");
  document.getElementById('subMenuUsuarios').setAttribute("class", "nav collapse in");
  document.getElementById('indexUsuarios').setAttribute("class", "active");
</script>
<h3>
    Listado de Usuarios
</h3>
<!-- START DATATABLE 1 -->
<div class="row">
  <div class="col-lg-12">
     <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
        <div class="panel-heading" >
           Usuario registrados
        </div>
        <div class="panel-body">
           <table id="datatable1" class="table table-striped table-hover">
              <thead>
                 <tr>
                    <th>Identificación</th>
                    <th style="width: 90px; text-align: center;">Foto</th>
                    <th style="width: 90px;">Nombre Completo</th>
                    <th style="width: 90px;">Género</th>
                    <th >Email</th>
                    <th>Cargo</th>
                    <th>Rol</th>
                    <th style="text-align: center;">Permisos</th>
                 </tr>
              </thead>
              <tbody>
                <?php  while($fila = mysqli_fetch_array($resultado)): ?>
               <tr class="gradeX">
                 <td><?php echo $fila['numeroId_Usuario']; ?></td>
                 <td>
                   <div class="media" style="width: 90px;">
                     <img src="<?php echo $fila['foto_Usuario']; ?>" alt="Image" class="img-responsive thumb32">
                  </div>
                 </td>
                 <td><?php echo $fila['nombres_Usuario']." ".$fila['apellidos_Usuario']; ?></td>
                 <td><?php echo $fila['genero_Usuario']; ?></td>
                 <td><?php echo $fila['email']?></td>
                 <td><?php echo $fila['cargo']?></td>
                 <td>
                     <?php if ($fila['id_Rol'] == 1) { ?>
                        <span class="label label-purple" style="background-color: #373c38; padding: .2em 1.3em .3em;">Entrenador</span>
                     <?php }elseif($fila['id_Rol'] == 2){ ?>
                        <span class="label label-purple" style="padding: .2em 2.3em .3em;" >Usuario</span>
                     <?php }else{ ?>
                        <span class="label label-danger">Administrador</span>
                        <?php } ?>
                </td>
                 <td style="text-align: center;">
                    <div class="btn-group">
                        <a href="#" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle">
                            <em class="fa fa-angle-down" style="padding-right: 10px;"></em>Acciones</a>
                        <ul class="dropdown-menu pull-right text-left">
                            <li><a href="?vista=confirmarEdicion&idu=<?php echo $fila["id_Usuario"];?>&e=1">Cambiar a Entrenador</a>
                            </li>
                            <li><a href="?vista=confirmarEdicion&idu=<?php echo $fila["id_Usuario"];?>&e=2">Cambiar a Usuario </a>
                            </li>
                        </ul>
                    </div>
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