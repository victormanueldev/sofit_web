<?php 
    include_once('controlador/ControladorUsuario.php');
    $controladorUsuario = new ControladorUsuario();
    $fila = $controladorUsuario-> verU($_GET['idu']);

    if(isset($_POST['convertirEntrenador'])){
        $id_Usuario = $_GET['idu'];
        $id_Rol = 1;
        $controladorUsuario-> cambiarRolUsuario($id_Usuario, $id_Rol);
        echo  "<div class='alert alert-warning alert-dismissable'>";
        echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>El Usuario ha cambiado su rol a Entrenador. <a href='?vista=permisosUsuario' class='alert-link'> Regresar al listado de Usuarios</a>.</div>";;
    }
    if(isset($_POST['convertirUsuario'])){
        $id_Usuario = $_GET['idu'];
        $id_Rol = 2;
        $controladorUsuario-> cambiarRolUsuario($id_Usuario, $id_Rol);
        echo  "<div class='alert alert-warning alert-dismissable'>";
        echo "<button type='button' data-dismiss='alert' aria-hidden='true' class='close'>×</button>El Usuario ha cambiado su rol a Usuario. <a href='?vista=permisosUsuario' class='alert-link'> Regresar al listado de Usuarios</a>.</div>";;
    }
?>
<script type="text/javascript">
  document.getElementById('usuarios').setAttribute("class", "active");
  document.getElementById('subMenuUsuarios').setAttribute("class", "nav collapse in");
  document.getElementById('indexUsuarios').setAttribute("class", "active");
</script>
<h3>
    Cambiar Permisos
</h3>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-right-color: #fff;border-bottom-color: #fff;">
        <div class="panel-heading">¿Está seguro que desea cambiar el rol de este usuario?</div>
        <div class="panel-body">
            <div class="table-responsive table-hover">
            <table class="table">
                <thead>
                <tr>
                    <th>Identificación</th>
                    <th style="width: 90px; text-align: center;">Foto</th>
                    <th >Nombre Completo</th>
                    <th style="width: 90px;">Género</th>
                    <th >Email</th>
                    <th>Cargo</th>
                    <th>Rol Actual</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
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
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        <div class="panel-footer">
            <div class="clearfix">
                <div class="pull-left">
                    <a  href="?vista=permisosUsuario" class="btn btn-default" style="margin-top: 7px;">Cancelar</a>
                </div>
                    <div class="pull-right">
                        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                            <?php if($_GET['e'] == 1){?>
                                
                                <input type="submit" class="btn btn-purple" name="convertirEntrenador" style="margin-top: 7px;" value="Convertir a Entrenador">
                            <?php }else{ ?>
                                
                                <input type="submit" class="btn btn-purple" name="convertirUsuario" style="margin-top: 7px;" value="Convertir a Usuario">
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>