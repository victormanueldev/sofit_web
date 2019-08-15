<?php
	include_once('modelo/Conexion.php');
	include_once('modelo/Validacion.php');
	$conex = new Conexion();
	$validacion = new Validacion();

	$errors = array();

  if(empty($_GET['user_id'])){
  	header('Location: ../SofitWeb_1.3');
  }
  if (empty($_GET['token'])) {
    header('Location: ../SofitWeb_1.3');
  }

  $user_id = $conex->conexion->real_escape_string($_GET['user_id']);
  $token = $conex->conexion->real_escape_string($_GET['token']);

  if(!$validacion-> verificaTokenPass($user_id, $token)){
    echo "No se pudieron verificar los datos";
    exit;
	}
	if (!empty($_POST)) {
		$password = $conex->conexion->real_escape_string($_POST['password']);
		$con_password = $conex->conexion->real_escape_string($_POST['con_password']);
		$user_id = $conex->conexion->real_escape_string($_POST['user_id']);
		$token = $conex->conexion->real_escape_string($_POST['token']);
	
		if($validacion-> validaPassword($password, $con_password)){
			$pass_hash = $validacion-> hashPassword($password);
			if($validacion-> cambiaPassword($pass_hash, $user_id, $token)){
				$exito = "La contraseña ha cambiado";
					echo "<div id='error' class='alert alert-success alert-dismissible' role='alert' style='margin-bottom: 0;'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	    			<span aria-hidden='true'>&times;</span>
	  			</button>
					<ul>";
					echo "<li>".$exito."</li>";
					echo "</ul>";
					echo "</div>";
			}else {
				$errors[] = "Error al modificar contraseña";
			}
		}else {
			$errors[] = "Las contraseñas no coinciden";
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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Sofit</title>
    <link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Rubik" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="app/css/bootstrap.min.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="app/css/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="app/css/styleR.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(app/img/fondo9.jpg);">
            <div class="login-box card" style="background-color: #00000080;">
                <div class="card-body">
                  <form class="form-horizontal form-material" id="sa-success" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                    <div class="form-group">
                      <div class="col-xs-12 text-center">
                        <div class="user-thumb text-center"> <img alt="thumbnail" class="img-circle" width="140" src="app/img/logo_sofit_full.png">
                          <h3 style="font-size:25px; color: white; margin: 20px;">Confirmar Contraseña</h3>
                        </div>
                      </div>
                    </div>
                    <div class="form-group ">
                      <div class="col-xs-12">
                        <input class="form-control" type="password" required="" placeholder="Nueva Contraseña" name="password" id="documento" style="color: #fff;">
                        <input type="hidden" name="Capturar">
                      </div>
                    </div>
                    <div class="form-group ">
                      <div class="col-xs-12">
                        <input class="form-control" type="password" required="" placeholder="Confirme Contraseña" name="con_password" id="documento" style="color: #fff;">
                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id;  ?>">
                        <input type="hidden" id="token" name="token" value="<?php echo $token;  ?>">
                      </div>
                    </div>
                    <?php
                      $validacion = new Validacion();
                      //Imprime todos los errores encontrados
                      echo $validacion-> resultBlock($errors);
                    ?>
                    <div class="form-group" style="margin-top: 30px">
                        <div class="col-sm-6" style="margin-bottom: 10px;">
                            <button class="btn btn-block" type="submit">Cambiar</button>
                        </div>
                        <div class="col-sm-6" style="margin-top: 7px;">
                            <a href="index.php" class="text-pruple" style="padding: 0;color: #fc704c;">Volver al inicio</a>
                        </div>
                      </div>
                  </form>
                </div>
              </div>
        </div>

    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="app/js/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <!-- <script src="app/js/popper.min.js"></script> -->
    <script src="app/js/bootstrap.min.js"></script>
    <!--slimscroll-->
    <!-- <script src="app/js/jquery.slimscroll.js"></script> -->
    <!--Wave Effects -->
    <script src="app/js/waves.js"></script>

    <!-- <script src="app/js/sidebarmenu.js"></script> -->
    <!--stickey kit -->
    <!-- <script src="app/js/sticky-kit.min.js"></script> -->
    <!-- <script src="app/js/jquery.sparkline.min.js"></script> -->
    <!--Custom JavaScript -->
    <script src="app/js/custom.min.js"></script>
    <!-- Sweet-Alert  -->
  <!-- <script src="app/js/sweetalert.min.js"></script> -->
  <!-- <script src="app/js/jquery.sweet-alert.custom.js"></script> -->
</body>
</html>
