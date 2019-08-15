<?php
  session_start();
  include_once('modelo/Validacion.php');
  include_once ('controlador/ControladorUsuario.php');
  include_once('controlador/ControladorPrograma.php');
  //Valida que el usuario haya iniciado sesion
  $validacion = new Validacion();
  if ((!isset($_SESSION['id_Usuario'])) || (!isset($_SESSION['rol']))) {
    header('Location: login.php');//Redirecciona al Login
  }elseif ($_SESSION['rol'] != 3) {
    header('Location: login.php');//Redirecciona al Login
  }
  //Instancas de los Controladores
  $controladorUsuario = new ControladorUsuario();
  $controladorPrograma = new ControladorPrograma();
  //Tra los datos del Modelo
  $datosUsuario = $controladorUsuario-> verU($_SESSION['id_Usuario']);
  $programa = $controladorPrograma-> obtenerPrograma($_SESSION['id_Usuario']);
  $fila = mysqli_fetch_assoc($programa);
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie ie6 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="ie ie7 lt-ie9 lt-ie8"        lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="ie ie8 lt-ie9"               lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie ie9"                      lang="en"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-ie">
<!--<![endif]-->

<head>
   <!-- Meta-->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">
   <title>SOFIT | Adminsitrador</title>
   <!-- Favicon icon -->
	<link rel="icon" type="image/ico" sizes="16x16" href="app/img/favicon.ico">
   <!-- Bootstrap CSS-->
   <link rel="stylesheet" href="app/css/bootstrap.css">
   <!-- Vendor CSS-->
   <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="vendor/animo.js/animate-animo.css">
   <link rel="stylesheet" href="vendor/whirl/dist/whirl.css">
   <!-- START Page Custom CSS-->
   <!-- Data Table styles-->
    <link rel="stylesheet" href="vendor/datatables/media/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="vendor/datatables-colvis/css/dataTables.colVis.css">
    <!--Datepricker CSS-->
    <link rel="stylesheet" href="vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
   <!-- END Page Custom CSS-->
   <!-- App CSS-->
  <link rel="stylesheet" href="app/css/app-admin.css">
  <link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Rubik" rel="stylesheet">
   <!-- Modernizr JS Script-->
   <script src="vendor/modernizr/modernizr.custom.js" type="application/javascript"></script>
   <!-- FastClick for mobiles-->
   <script src="vendor/fastclick/lib/fastclick.js" type="application/javascript"></script>
</head>

<body id="body">
   <!-- START Main wrapper-->
   <div class="wrapper" >
      <!-- START Top Navbar-->
      <nav role="navigation" class="navbar navbar-default navbar-top navbar-fixed-top">
         <!-- START navbar header-->
         <div class="navbar-header">
            <a href="index-admin.php" class="navbar-brand">
               <div class="brand-logo">
                  <img src="app/img/logo.png" alt="App Logo" class="img-responsive">
               </div>
               <div class="brand-logo-collapsed">
                  <img src="app/img/logo-single.png" alt="App Logo" class="img-responsive">
               </div>
            </a>
         </div>
         <!-- END navbar header-->
         <!-- START Nav wrapper-->
         <div class="nav-wrapper" style="background-color: #fc74c;">
            <!-- START Left navbar-->
            <ul class="nav navbar-nav">
               <li>
                  <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                  <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                     <em class="fa fa-navicon" style="color: #fff;"></em>
                  </a>
                  <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                  <a href="#" data-toggle-state="aside-toggled" class="visible-xs">
                     <em class="fa fa-navicon" style="color: #fff;"></em>
                  </a>
               </li>
               <!-- START User avatar toggle-->
               <li>
                  <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                  <a href="#" data-toggle-state="aside-user">
                     <em class="fa fa-user" style="color: #fff;"></em>
                  </a>
               </li>
               <!-- END User avatar toggle-->
               <!-- START Help-->
               <li>
                  <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                  <a href="fpdf/manuales/Manualdeadministrador.pdf">
                     <em class="fa fa-question-circle" style="color: #fff;"></em>
                  </a>
               </li>
               <!-- END Help-->
            </ul>
            <!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class="nav navbar-nav navbar-right">

               <!-- Fullscreen-->
               <li>
                  <a href="#" data-toggle="fullscreen">
                     <em class="fa fa-expand" style="color: #fff;"></em>
                  </a>
               </li>

               <!-- START Contacts button-->
               <li>
                  <a href="#" data-toggle-state="offsidebar-open">
                     <em class="fa fa-cogs" style="color: #fff;"></em>
                  </a>
               </li>
               <!-- END Contacts menu-->
            </ul>
            <!-- END Right Navbar-->
         </div>
         <!-- END Nav wrapper-->
      </nav>
      <!-- END Top Navbar-->
      <!-- START aside-->
      <aside class="aside">
         <!-- START Sidebar (left)-->
         <nav class="sidebar">
            <!-- START user info-->
            <div class="item user-block">
               <!-- User picture-->
               <div class="user-block-picture">
                  <div class="user-block-status">
                     <img src="<?php echo $datosUsuario['foto_Usuario']; ?>" alt="Avatar" width="60" height="60" class="img-thumbnail img-circle thumb64">
                     <div class="circle circle-success circle-lg"></div>
                  </div>
                  <!-- Status when collapsed-->
               </div>
               <!-- Name and Role-->
               <div class="user-block-info" style="padding-top: 10px;">
                  <span class="user-block-name item-text"><?php echo $datosUsuario['nombres_Usuario']; ?></span>
                  <span class="user-block-role"><?php echo $datosUsuario['cargo']; ?></span>
               </div>
            </div>
            <!-- END user info-->
            <ul class="nav">
               <!-- START Menu-->
               <li class="nav-heading">Menú de Navegación</li>
               <li id="inicio">
                  <a href="index-admin.php" title="Inicio" data-toggle="" class="no-submenu">
                     <em class="fa fa-home"></em>
                     <span class="item-text">Inicio</span>
                  </a>
               </li>  
			        <li id="reportes">
                <a href="?vista=seleccionarEjercicio" title="Reportes" data-toggle="collapse-next" class="has-submenu">
                  <em class="fa fa-line-chart"></em>
                  <span class="item-text">Reportes</span>
                </a>
                <!-- START SubMenu item-->
                <ul id="subMenuReportes" class="nav collapse">
                  <li id="repAsistencia">
                      <a href="?vista=reporteAsistencia" title="Seleccionar Ejercicios" data-toggle="" class="no-submenu">
                        <span class="item-text">Asistencia al Gimnasio</span>
                      </a>
                  </li>
                  <li id="repAEvento">
                      <a href="?vista=reporteAEventos" title="Seleccionar Ejercicios" data-toggle="" class="no-submenu">
                        <span class="item-text">Asistencia a Eventos</span>
                      </a>
                  </li>
                  <li id="repInventario">
                      <a href="?vista=reporteInventario" title="Seleccionar Ejercicios" data-toggle="" class="no-submenu">
                        <span class="item-text">Inventario</span>
                      </a>
                  </li>
                </ul>
                <!-- END SubMenu item-->
			        </li>
               <li id="gNovedades">
                  <a href="?vista=crearInventario" title="Inventario" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-envelope-open"></em>
                     <span class="item-text">Novedades</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul id="subMenuGNovedades" class="nav collapse">
                    <li id="bandejaNovedad">
                        <a href="?vista=bandejaNovedades" title="Crear Inventario" data-toggle="" class="no-submenu">
                          <span class="item-text">Bandeja de Entrada</span>
                        </a>
                    </li>
                  </ul>
                  <!-- END SubMenu item-->
               </li>
               <li id="usuarios">
                  <a href="?vista=datosAntropometricosUsuario" title="Eventos" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-user-circle"></em>
                     <span class="item-text">Usuarios</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul id="subMenuUsuarios" class="nav collapse">
                    <li id="indexUsuarios">
                          <a href="?vista=permisosUsuario" title="Crear Inventario" data-toggle="" class="no-submenu">
                            <span class="item-text">Listado Usuarios</span>
                          </a>
                    </li>
                  </ul>
                  <!-- END SubMenu item-->
               </li>
               <li id="eventosA">
                  <a href="?vista=novedades" title="Eventos" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-calendar"></em>
                     <span class="item-text">Eventos</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul id="subMenuEventosA" class="nav collapse">
                  <li id="indexEventos">
                        <a href="?vista=eventos" title="Crear Inventario" data-toggle="" class="no-submenu">
                          <span class="item-text">Listado de Eventos</span>
                        </a>
                    </li>
                  <li id="crearEvento">
                        <a href="?vista=crearEvento" title="Crear Inventario" data-toggle="" class="no-submenu">
                          <span class="item-text">Crear Evento</span>
                        </a>
                    </li>
                    <li id="editarEvento">
                        <a href="?vista=editarEvento" title="Crear Inventario" data-toggle="" class="no-submenu">
                          <span class="item-text">Habilitar Evento</span>
                        </a>
                    </li>
                  </ul>
                  <!-- END SubMenu item-->
               </li>
               <li class="nav-heading">Opciones de Entrenador</li>
               <li id="datosAntropometricos">
                  <a href="?vista=crearDatosAntropometricos" title="Datos Antropometricos" data-toggle="" class="no-submenu">
                     <em class="fa fa-universal-access"></em>
                     <span class="item-text">Antropometría</span>
                  </a>
               </li>
               <li id="rutinas">
                  <a href="?vista=seleccionarEjercicio" title="Rutinas" data-toggle="collapse-next" class="has-submenu">
                    <em class="fa fa-bullseye"></em>
                    <span class="item-text">Rutinas</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul id="subMenuRutinas" class="nav collapse">
                    <li id="seleccionarEjercicio">
                        <a href="?vista=seleccionarEjercicio" title="Seleccionar Ejercicios" data-toggle="" class="no-submenu">
                          <span class="item-text">Asignar Rutina</span>
                        </a>
                    </li>
                    <li id="crearEjercicio">
                        <a href="?vista=crearEjercicio" title="Seleccionar Ejercicios" data-toggle="" class="no-submenu">
                          <span class="item-text">Crear Ejercicio</span>
                        </a>
                    </li>
                  </ul>
                  <!-- END SubMenu item-->
                </li>
                <li id="inventario">
                    <a href="?vista=crearInventario" title="Inventario" data-toggle="collapse-next" class="has-submenu">
                       <em class="fa fa-list-alt"></em>
                       <span class="item-text">Inventario</span>
                    </a>
                    <!-- START SubMenu item-->
                    <ul id="subMenuInventario" class="nav collapse">
                      <li id="crearInventario">
                          <a href="?vista=crearInventario" title="Crear Inventario" data-toggle="" class="no-submenu">
                            <span class="item-text">Crear Inventario</span>
                          </a>
                      </li>
                      <li id="crearElemento">
                          <a href="?vista=crearElemento" title="Crear Elemento" data-toggle="" class="no-submenu">
                            <span class="item-text">Crear Elemento</span>
                          </a>
                      </li>
                    </ul>
                    <!-- END SubMenu item-->
                 </li>
                 <li id="eventos">
                    <a href="?vista=datosAntropometricosUsuario" title="Eventos" data-toggle="collapse-next" class="has-submenu">
                       <em class="fa fa-calendar"></em>
                       <span class="item-text">Eventos</span>
                    </a>
                    <!-- START SubMenu item-->
                    <ul id="subMenuEventos" class="nav collapse">
                    <li id="verEvento">
                          <a href="?vista=verEventos" title="Crear Inventario" data-toggle="" class="no-submenu">
                            <span class="item-text">Ver Eventos</span>
                          </a>
                      </li>
                    </ul>
                    <!-- END SubMenu item-->
                 </li>
                 <li id="novedades">
                    <a href="?vista=novedades" title="Novedades" data-toggle="collapse-next" class="has-submenu">
                       <em class="fa fa-bullhorn"></em>
                       <span class="item-text">Novedades</span>
                    </a>
                    <!-- START SubMenu item-->
                    <ul id="subMenuNovedades" class="nav collapse">
                    <li id="indexNovedades">
                          <a href="?vista=novedades" title="Crear Inventario" data-toggle="" class="no-submenu">
                            <span class="item-text">Estado Novedades</span>
                          </a>
                      </li>
                      <li id="crearNovedad">
                          <a href="?vista=crearNovedad" title="Crear Inventario" data-toggle="" class="no-submenu">
                            <span class="item-text">Registrar Novedad</span>
                          </a>
                      </li>
                    </ul>
                    <!-- END SubMenu item-->
                 </li>
                 <li class="nav-heading">Opciones de Usuario</li>
               <li id="modRutinas">
                  <a href="?vista=rutinas" title="Rutinas Usuario" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-cog"></em>
                     <span class="item-text">Actualización Rutinas</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul id="subMenuRutinasU" class="nav collapse">
                  <li id="indexRutinasU">
                        <a href="?vista=rutinas" title="Rutinas" data-toggle="" class="no-submenu">
                          <span class="item-text">Rutinas de Usuarios</span>
                        </a>
                    </li>
                  </ul>
                  <!-- END SubMenu item-->
               </li>
               <li id="actMedidas">
                  <a href="?vista=rutinas" title="Rutinas Usuario" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-refresh"></em>
                     <span class="item-text">Actualización Medidas</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul id="subMenuAntrop" class="nav collapse">
                  <li id="indexAntrop">
                        <a href="?vista=editarDatosAntropometricos" title="Rutinas" data-toggle="" class="no-submenu">
                          <span class="item-text">Listado Evaluaciones</span>
                        </a>
                    </li>
                  </ul>
                  <!-- END SubMenu item-->
               </li>
            </ul>
         </nav>
         <!-- END Sidebar (left)-->
      </aside>
      <!-- End aside-->
      <!-- START aside-->
      <aside class="offsidebar">
         <!-- START Off Sidebar (right)-->
         <nav>
            <div class="p-lg text-center">
               <em class="fa fa-user"></em>
               <strong>Opciones de Usuario</strong>
            </div>
            <ul class="nav">
               <!-- END user info-->

               <!-- START list title-->
               <li class="p">
                  <a href="?vista=editarPerfil" style="padding: 0;"><small class="text-muted">EDITAR PERFIL</small></a>
               </li>
               <!-- END list title-->
               <li>
                  <!-- START User status-->
                  <a href="?vista=editarPerfil" class="media p mt0">
                     <span class="pull-right">
                        <span class="circle circle-success circle-lg"></span>
                     </span>
                     <span class="pull-left">
                        <!-- Contact avatar-->
                        <img src="<?php echo $datosUsuario['foto_Usuario']; ?>" alt="Image" class="media-object img-circle thumb32">
                     </span>
                     <!-- Contact info-->
                     <span class="media-body">
                        <span class="media-heading">
                           <strong><?php echo $datosUsuario['nombres_Usuario']; ?></strong>
                           <br>
                           <small class="text-muted"><?php echo $fila['nombre_Programa']; ?></small>
                        </span>
                     </span>
                  </a>
                  <!-- END User status-->
               </li>
               <li>
                  <div class="p-lg text-center">
                     <!-- Optional link to list more users-->
                     <a href="logout.php" title="See more contacts" class="btn btn-purple btn-sm">
                        <strong>Cerrar Sesión</strong>
                     </a>
                  </div>
               </li>
            </ul>
            <!-- Extra items-->
            <div class="p">
               <p>
                  <small class="text-muted">Activo</small>
               </p>
               <div class="progress progress-xs m0">
                  <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-success progress-100">
                     <span class="sr-only">80% Complete</span>
                  </div>
               </div>
            </div>
         </nav>
         <!-- END Off Sidebar (right)-->
      </aside>
      <!-- END aside-->
      <!-- START Main section-->
      <section>
         <!-- START Page content-->
         <div class="content-wrapper">
           <?php
             include_once('enrutador/Enrutador.php');
             $enrutador = new Enrutador();
             if(!isset($_GET['vista'])){
               $vista='inicio-admin';
               $enrutador-> cargarVista($vista);
             }
              else
                $enrutador-> cargarVista($_GET['vista']);
            ?>
         </div>
         <!-- END Page content-->
      </section>
      <!-- END Main section-->
   </div>
   <!-- END Main wrapper-->
   <!-- START Scripts-->
   <!-- Main vendor Scripts-->
   <script src="vendor/jquery/dist/jquery.min.js"></script>
   <script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
   <!-- Plugins-->
   <script src="vendor/chosen/chosen.jquery.js"></script>
   <script src="vendor/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js"></script>
   <script src="vendor/bootstrap-filestyle/src/bootstrap-filestyle.min.js"></script>
   <!-- Animo-->
   <script src="vendor/animo.js/animo.min.js"></script>
   <!-- Sparklines-->
   <script src="vendor/sparkline/index.js"></script>
   <!-- Slimscroll-->
   <script src="vendor/slimScroll/jquery.slimscroll.min.js"></script>
   <!-- Store + JSON-->
   <script src="vendor/store-js/store.2Bjson2.min.js"></script>
   <!-- ScreenFull-->
   <script src="vendor/screenfull/dist/screenfull.min.js"></script>
   <!-- START Page Custom Script-->
   <script src="vendor/jquery.steps/build/jquery.steps.min.js"></script>
   <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
   <script src="app/js/Chart.bundle.js"></script>
   <script src="app/js/utils.js"></script>
   <!--  Flot Charts-->
   <script src="vendor/flot/jquery.flot.js"></script>
   <script src="vendor/flot.tooltip/js/jquery.flot.tooltip.js"></script>
   <script src="vendor/flot/jquery.flot.resize.js"></script>
   <script src="vendor/flot/jquery.flot.pie.js"></script>
   <script src="vendor/flot/jquery.flot.time.js"></script>
   <script src="vendor/flot/jquery.flot.categories.js"></script>
   <script src="vendor/flot-spline/js/jquery.flot.spline.min.js"></script>
   <!-- Form Validation-->
   <script src="vendor/parsleyjs/dist/parsley.min.js"></script>
   <!-- END Page Custom Script-->
   <!-- Data Table Scripts-->
   <script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
   <script src="vendor/datatables/media/js/dataTables.bootstrap.min.js"></script>
   <script src="vendor/datatables-colvis/js/dataTables.colVis.js"></script><
   <!--Datepicker JS-->
   <script src="vendor/moment/min/moment-with-locales.min.js"></script>
   <script src="vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
   <!-- App Main-->
   <script src="app/js/app.js"></script>
   <!-- END Scripts-->
</body>

</html>
