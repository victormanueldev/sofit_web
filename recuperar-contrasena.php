<?php
	include_once('modelo/Conexion.php');
	include_once('modelo/Validacion.php');
  $conex = new Conexion();
	$validacion = new Validacion();
	$errors = array();

	if(!empty($_POST)){
		$email = $conex->conexion->real_escape_string($_POST['email']);
		if (!$validacion->isEmail($email)) {
			$errors[] = "Email no valido";
		}
			if($validacion-> emailExiste($email)){
				$id_user = $validacion-> getValor('id_Usuario', 'email', $email);
				$nombre = $validacion-> getValor('nombres_Usuario', 'email', $email);

				$token = $validacion-> generaTokenPass($id_user);

				$url = 'http://'.$_SERVER["SERVER_NAME"].'/SofitWeb_1.3/confirmar-contrasena.php?user_id='.$id_user.'&token='.$token;
				$asunto = utf8_decode('Recuperar Contraseña');
				$cuerpo = "Hola $nombre <br><br>Se ha solicitado un reinicio de contrase&ntilde;a. <br><br>para restaurarla, visite
				el siguiente link <a href='$url' class='btn btn-primary btn-block'>RESTAURAR</a>";

				if($validacion-> enviarEmail($email, $nombre, $asunto, $cuerpo)){
					$exito = "Email enviado exitosamente";
					echo "<div id='error' class='alert alert-success alert-dismissible' role='alert' style='margin-bottom: 0;'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	    			<span aria-hidden='true'>&times;</span>
	  			</button>
					<ul>";
					echo "<li>".$exito."</li>";
					echo "</ul>";
					echo "</div>";
				}else {
					$errors[] = "Error al enviar Email";
				}
			}else {
				$errors[] = "Este email no existe";
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
    <link rel="icon" type="image/ico" sizes="16x16" href="app/img/favicon.ico">
    <title>SOFIT | Recuperación de Contraseña</title>
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
        <div class="login-register" style="background-image:url(app/img/fondo8.png);">
            <div class="login-box card" style="background-color: #00000080;">
                <div class="card-body">
                  <form class="form-horizontal form-material" id="sa-success" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-group">
                      <div class="col-xs-12 text-center">
                        <div class="user-thumb text-center"> <img alt="thumbnail" class="img-circle" width="140" src="app/img/logo_sofit_full.png">
                          <h3 style="font-size:25px; color: white; margin: 20px;">Restablecer Contraseña</h3>
                        </div>
                      </div>
                    </div>
                    <div class="form-group ">
                      <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="Email" name="email" id="documento" style="color: #fff;">
                        <input type="hidden" name="Capturar">
                      </div>
                    </div>
                    <?php
                      $validacion = new Validacion();
                      //Imprime todos los errores encontrados
                      echo $validacion-> resultBlock($errors);
                    ?>
                      <div class="form-group" style="margin-top: 30px">
                        <div class="col-sm-6" style="margin-bottom: 10px;">
                            <button class="btn btn-block" type="submit">Restablecer</button>
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
