<?php
  session_start();
  include_once('modelo/Validacion.php');
  include_once ('controlador/ControladorUsuario.php');
  include_once('controlador/ControladorPrograma.php');
  //Valida que el usuario haya iniciado sesion
  $validacion = new Validacion();
  if (!isset($_SESSION['id_Usuario'])) {
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
   <title>SOFIT | Usuario</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/ico" sizes="16x16" href="app/img/favicon.ico">
   <!-- Bootstrap CSS-->
   <link rel="stylesheet" href="app/css/bootstrap.css">
   <!-- Vendor CSS-->
   <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="vendor/animo.js/animate-animo.css">
   <link rel="stylesheet" href="vendor/whirl/dist/whirl.css">
   <!-- START Page Custom CSS-->
   <link rel="stylesheet" href="vendor/chosen/chosen.css">
   <link rel="stylesheet" href="vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
   <!-- Codemirror-->
   <link rel="stylesheet" href="vendor/codemirror/lib/codemirror.css">
   <!-- Bootstrap tags-->
   <link rel="stylesheet" href="vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
   <!-- END Page Custom CSS-->
   <!-- App CSS-->
  <link rel="stylesheet" href="app/css/app.css">
  <link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Rubik" rel="stylesheet">
   <!-- Modernizr JS Script-->
   <script src="vendor/modernizr/modernizr.custom.js" type="application/javascript"></script>
   <!-- FastClick for mobiles-->
   <script src="vendor/fastclick/lib/fastclick.js" type="application/javascript"></script>
</head>

<body>
   <!-- START Main wrapper-->
   <div class="wrapper">
      <!-- START Top Navbar-->
      <nav role="navigation" class="navbar navbar-default navbar-top navbar-fixed-top">
         <!-- START navbar header-->
         <div class="navbar-header">
            <a href="index-usuario.php" class="navbar-brand">
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
         <div class="nav-wrapper">
            <!-- START Left navbar-->
            <ul class="nav navbar-nav">
               <li>
                  <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                  <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                     <em class="fa fa-navicon"></em>
                  </a>
                  <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                  <a href="#" data-toggle-state="aside-toggled" class="visible-xs">
                     <em class="fa fa-navicon"></em>
                  </a>
               </li>
               <!-- START User avatar toggle-->
               <li>
                  <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                  <a href="#" data-toggle-state="aside-user">
                     <em class="fa fa-user"></em>
                  </a>
               </li>
               <!-- END User avatar toggle-->
               <!-- START Help-->
               <li>
                  <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                  <a href="fpdf/manuales/ManualdelAprendiz.pdf">
                     <em class="fa fa-question-circle"></em>
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
                     <em class="fa fa-expand"></em>
                  </a>
               </li>

               <!-- START Contacts button-->
               <li>
                  <a href="#" data-toggle-state="offsidebar-open">
                     <em class="fa fa-cogs"></em>
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
                  <a href="index-usuario.php" title="Dashboard" data-toggle="" class="no-submenu">
                     <em class="fa fa-home"></em>
                     <span class="item-text">Inicio</span>
                  </a>
               </li>
               <li id="rutinas">
                  <a href="?vista=rutinasUsuario" title="Epicrisis" data-toggle="" class="no-submenu">
                     <em class="fa fa-bullseye"></em>
                     <span class="item-text">Rutinas</span>
                  </a>
               </li>
               <li id="epicrisis">
                  <a href="?vista=verEpicrisis" title="Epicrisis" data-toggle="" class="no-submenu">
                     <em class="fa fa-heartbeat"></em>
                     <span class="item-text">Epicrisis</span>
                  </a>
               </li>
               <li id="antropometrica">
                  <a href="?vista=datosAntropometricosUsuario" title="Epicrisis" data-toggle="" class="no-submenu">
                     <em class="fa fa-universal-access"></em>
                     <span class="item-text">Datos Antropométricos</span>
                  </a>
               </li>
               <li id="eventos">
                  <a href="?vista=asistenciaEvento" title="Epicrisis" data-toggle="" class="no-submenu">
                     <em class="fa fa-street-view"></em>
                     <span class="item-text">Asistencia a Eventos</span>
                  </a>
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
                  <small class="text-muted">EDITAR PERFIL</small>
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
               $vista='inicio-usuario';
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
   <!--  Flot Charts-->
   <!-- <script src="vendor/flot/jquery.flot.js"></script>
   <script src="vendor/flot.tooltip/js/jquery.flot.tooltip.js"></script>
   <script src="vendor/flot/jquery.flot.resize.js"></script>
   <script src="vendor/flot/jquery.flot.pie.js"></script>
   <script src="vendor/flot/jquery.flot.time.js"></script>
   <script src="vendor/flot/jquery.flot.categories.js"></script>
   <script src="vendor/flot-spline/js/jquery.flot.spline.min.js"></script> -->
   <!-- jVector Maps-->
   <!-- <script src="vendor/ika.jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
   <script src="vendor/ika.jvectormap/jquery-jvectormap-us-mill-en.js"></script>
   <script src="vendor/ika.jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
   <script src="vendor/jquery.steps/build/jquery.steps.min.js"></script>
   <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
   <!-- Form Validation-->
   <script src="vendor/parsleyjs/dist/parsley.min.js"></script>
   <!-- END Page Custom Script-->
   <!-- App Main-->
   <script src="app/js/app.js"></script>
   <!-- END Scripts-->
</body>

</html>
