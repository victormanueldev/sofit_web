<?php
  session_start();
	include_once('../modelo/Conexion.php');
	require '../modelo/Carbon.php';
  include_once('../modelo/Validacion.php');
	use Carbon\Carbon;
  $errors =  array();
  $validacion = new Validacion();
  $resultadoConsulta = $_SESSION['id_Usuario'];
  //Valida si el formulario se ha enviado
	if(isset($_POST["Capturar"])){
		if(!empty($_POST["Objeto"])){
			$objeto = $_POST['Objeto'];
      $resultadoConsulta = registro($objeto);//Llama la funcion registro
    }
  }

  /**
  * Esta funcion permite registrar la asistencia en la BD
  * @author Maycol Angel
  * ed: 2018-03-11
  **/
  function registro($objetito){
    //Cambia la zona horaria del sistema
    date_default_timezone_set("America/Bogota");
    $now = Carbon::now();//Obtiene la hora y la fecha actual
    $fecha = $now->toDateString();//Obtiene solo la fecha
    $hora = $now->toTimeString();//Obtiene solo la hora

    $db = new Conexion();
    $sql ="SELECT numeroid_Usuario,id_Usuario FROM usuario WHERE numeroid_Usuario ='$objetito';";
    $resultado = $db->consultaRetorno($sql);
    $existe = mysqli_fetch_array($resultado);
    $requisito = $existe["id_Usuario"];
    //Valida si el usuario existe en la BD
    if($existe["numeroid_Usuario"] == $objetito) {
        $sql = "INSERT INTO asistencia(hora_Ingreso,fecha_Asistencia,id_Usuario) VALUES ('$hora','$fecha','$requisito'); ";
        $db->consultaSimple($sql);
        return $requisito;
    }else {
      return "Fallo";
    }
  }
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <!-- Favicon icon -->
   <link rel="icon" type="image/ico" sizes="16x16" href="../app/img/favicon.ico">
    <title>SOFIT | Asistencia</title>
    <link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Rubik" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="../app/css/bootstrap.min.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="../app/css/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="../app/css/style2.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
<script> 
  //Sweet alert de error
  function alertError() {
    swal({
      title: "Usuario no encontrado!", 
      text: "Registrate en SOFIT para guardar la asistencia",
      icon: "error",
      button: false,
      timer: 3000,
    }); 
  };
  //Sweet Alert de Exito
  function alertSuccess() {
    swal({
      title: "¡Bienvenido!", 
      text: "Su asistencia ha sido registrada",
      icon: "success",
      button: false,
      timer: 1800,
    }); 
  }
  //Sweet Alert de inicio
  function alertInit() {
    swal({
      title: "", 
      text: "Inicializando componentes..",
      button: false,
      timer: 2500,
    }); 
  }
</script>
    <?php 
      if($resultadoConsulta == "".$_SESSION['id_Usuario']."" ){
        echo "<script>alertInit()</script>";
      }elseif($resultadoConsulta == "Fallo"){
        echo "<script>alertError()</script>";
      }else {
        echo "<script>alertSuccess()</script>";
      }
    ?>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../app/img/asistencia.jpg);">
            <div class="login-box card" style="background-color: #00000080;height: 340px;">
                <div class="card-body">
                  <form class="form-material" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-group">
                      <div class="col-xs-12 text-center">
                        <div class="user-thumb text-center"> <img alt="thumbnail" class="img-circle" width="140" src="../app/img/logo_sofit_full.png">
                          <h3 style="font-size: 45px;">SOFIT</h3>
                        </div>
                      </div>
                    </div>
                    <div class="form-group ">
                      <div class="col-xs-12">
                        <input class="form-control" type="text"  placeholder="Código de Carnet" name="Objeto" id="documento" style="color: #fff;">
                        <input type="hidden" name="Capturar">
                        <!-- sa-success -->
                      </div>
                    </div>
                    <div class="form-group ">
                      <div class="col-xs-12">
                      <?php if($_SESSION['rol'] == 1){?>
                        <a href="../index-entrenador.php" id="to-recover" style="color: #fc704c;margin-bottom: 10px;"><i class="fa fa-lock m-r-5"></i> Volver al inicio</a>
                      <?php }else{?>
                        <a href="../index-admin.php" id="to-recover" style="color: #fc704c;margin-bottom: 10px;"><i class="fa fa-lock m-r-5"></i> Volver al inicio</a>
                        <?php }?>
                      </div>
                    </div>
                  </form>
                  <?php
      							$validacion = new Validacion();
      							//Imprime todos los errores encontrados
      							echo $validacion-> resultBlock($errors);
      						?>
                </div>
              </div>
        </div>

    </section>
    <!--Custum JS -->
    <script type="text/javascript">
        function stopRKey(evt) {
          var evt = (evt) ? evt : ((event) ? event : null);
          var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
        }
        document.onkeypress = stopRKey;
        document.getElementById("documento").focus();
    </script>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../app/js/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../app/js/popper.min.js"></script>
    <script src="../app/js/bootstrap.min.js"></script>
    <!--slimscroll-->
    <script src="../app/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../app/js/waves.js"></script>

    <script src="../app/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../app/js/sticky-kit.min.js"></script>
    <script src="../app/js/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../app/js/custom.min.js"></script>
    <!-- Sweet-Alert  -->
  <script src="../app/js/sweetalert.min.js"></script>
  <script src="../app/js/jquery.sweet-alert.custom.js"></script>
</body>
</html>
