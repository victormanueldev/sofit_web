<script type="text/javascript">
  document.getElementById('reportes').setAttribute("class", "active");
  document.getElementById('subMenuReportes').setAttribute("class", "nav collapse in");
  document.getElementById('repAEvento').setAttribute("class", "active");
</script>
<script type="text/javascript">
	<?php 
		include_once("modelo/Conexion.php");
        include_once('controlador/ControladorEvento.php');
        $controladorEvento = new ControladorEvento();
        $listadoEventos = $controladorEvento-> indexEvento();
		$ContUsuario = 0;
		$ContInstructor = 0;
		$ContFuncionario = 0;
		$info = 0;
		
        if (isset($_POST['btn'])) {
            $info = $_POST['filtro'];
            $datos = $controladorEvento-> verE($info);
        }
        
		$db = new Conexion();
		$sql = "SELECT count(rolAsistente) FROM asistenciaevento WHERE id_Evento = '$info' AND rolAsistente = 'Aprendiz'";
		$resultado = $db->consultaRetorno($sql);
		$retorno = mysqli_fetch_array($resultado);
		
		$sql2 = "SELECT count(rolAsistente) FROM asistenciaevento WHERE id_Evento = '$info' AND rolAsistente = 'Instructor'";
		$resultado = $db->consultaRetorno($sql2);
		$retorno2 = mysqli_fetch_array($resultado);
		
		$sql3 = "SELECT count(rolAsistente) FROM asistenciaevento WHERE id_Evento = '$info' AND rolAsistente = 'Funcionario'";
		$resultado = $db->consultaRetorno($sql3);
        $retorno3 = mysqli_fetch_array($resultado);

        $sql4 = "SELECT count(rolAsistente) FROM asistenciaevento WHERE id_Evento = '$info' AND rolAsistente = 'Contratista'";
		$resultado = $db->consultaRetorno($sql4);
        $retorno4 = mysqli_fetch_array($resultado);
        
        $sql5 = "SELECT count(rolAsistente) FROM asistenciaevento WHERE id_Evento = '$info' AND rolAsistente = 'Otro'";
		$resultado = $db->consultaRetorno($sql5);
        $retorno5 = mysqli_fetch_array($resultado);
        
        $sql6 = "SELECT count(calificacion) FROM asistenciaevento WHERE id_Evento = '$info' AND calificacion = 'Excelente'";
		$resultado = $db->consultaRetorno($sql6);
        $retorno6 = mysqli_fetch_array($resultado);
        
        $sql7 = "SELECT count(calificacion) FROM asistenciaevento WHERE id_Evento = '$info' AND calificacion = 'Bueno'";
		$resultado = $db->consultaRetorno($sql7);
        $retorno7 = mysqli_fetch_array($resultado);
        
        $sql8 = "SELECT count(calificacion) FROM asistenciaevento WHERE id_Evento = '$info' AND calificacion = 'Regular'";
		$resultado = $db->consultaRetorno($sql8);
        $retorno8 = mysqli_fetch_array($resultado);
        
        $sql9 = "SELECT count(calificacion) FROM asistenciaevento WHERE id_Evento = '$info' AND calificacion = 'Malo'";
		$resultado = $db->consultaRetorno($sql9);
        $retorno9 = mysqli_fetch_array($resultado);

        $resultadoCalificacion = [
            "Excelente" => $retorno6[0],
            "Bueno" => $retorno7[0],
            "Regular" => $retorno8[0],
            "Malo" => $retorno9[0]
        ];

        $acogida = array_keys($resultadoCalificacion, max($resultadoCalificacion));


		$maximo = $retorno[0] + $retorno2[0] + $retorno3[0] + $retorno4[0] +$retorno5[0];
        $promedio = "";
        //Guarda los resultado en un Array aosiativo
        $resultadoAsistentes = [
            "Aprendices" => $retorno[0],
            "Instructores" => $retorno2[0],
            "Funcionarios" => $retorno3[0],
            "Contratistas" => $retorno4[0],
            "Otros" => $retorno5[0]
        ];
        $mayor = array_keys($resultadoAsistentes, max($resultadoAsistentes));//Obtiene el mes con mayor afluencia
        $menor = array_keys($resultadoAsistentes, min($resultadoAsistentes));
	?>

	var config = {
		type: "bar",
		data : {
			labels: ["Aprendiz","Instructor","Funcionario","Contratista", "Otro"],
			datasets: [{
				label: "Cantidad Asistentes",
				data: [ Aprendiz = "<?php echo $retorno[0];?>",
					    Instructor = "<?php echo $retorno2[0];?>",
					    Funcionario = "<?php echo $retorno3[0];?>",
					    Contratista = "<?php echo  $retorno4[0];?>",
                        Otro = "<?php echo  $retorno5[0];?>"
					   ],
				backgroundColor: [
                'rgba(255, 78, 33, 0.5)',
                'rgba(255, 78, 33, 0.5)',
                'rgba(255, 78, 33, 0.5)',
                'rgba(255, 78, 33, 0.5)',
                'rgba(255, 78, 33, 0.5)',
            	],
            	borderColor: [
                'rgba(255, 78, 33,1)',
                'rgba(255, 78, 33,1)',
                'rgba(255, 78, 33,1)',
                'rgba(255, 78, 33,1)',
                'rgba(255, 78, 33,1)',
           		],
           		borderWidth: 1,
					  }]
			    },
		options:{
			responsive: true,
			title: {
				display: false,
				text: 'Grafica de Asistencia de Eventos'
			},
			scales:{
				xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Rol'
                        		}
                }],
				yAxes: [{
					display: true,
				   	scaleLabel: {
                        display: true,
                        labelString: 'Numero de Asistentes'
                    }
				}]
			}
		}
	};
    window.onload = function() {
        var ctx = document.getElementById("myChart").getContext("2d");
        window.myBar = new Chart(ctx, config);
    };
</script>
<h3>
    Reporte de Asistencia a Eventos
</h3>
<div class="row">
    <div class="col-lg-12">
        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" data-parsley-validate="" novalidate="">
            <!-- START panel-->
       <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
          <div class="panel-heading">
              Datos del evento
            </div>
          <div class="panel-body">
             <div class="form-group col-lg-9">
                <label class="col-lg-3 control-label" style="margin-top: 5px;">Seleccionar Evento</label>
                <div class="col-lg-6">
                  <select name="filtro" id="filtro" class="form-control m-b" required style="width: 460px;">
                      <?php while($fila = mysqli_fetch_assoc($listadoEventos)) { ?>
                        <option value="<?php echo $fila['id_Evento']; ?>"><?php echo $fila['nombre_Evento']." ".$fila['fecha_Evento']; ?></option>
                      <?php } ?>
                  </select> 
                </div>
             </div>
             <div class="form-group col-lg-3">
             
                <button type="submit" class="btn btn-purple" name ="btn">Generar Reporte</button>
             </div> 
          </div>
       </div>
       <!-- END panel-->
        </form>
    </div>
    <div class="col-lg-9">
        <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
            <div class="panel-heading">
                <a href="#" data-perform="panel-dismiss" data-toggle="tooltip" title="Cerrar Panel" class="pull-right">
                    <em class="fa fa-times"></em>
                </a>
                <a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="Minimizar Panel" class="pull-right">
                    <em class="fa fa-minus"></em>
                </a>
                <?php if (isset($datos)) { ?>
                    <div class="panel-title">Reporte de Asistencia a <?php echo $datos['nombre_Evento']." ".$datos['fecha_Evento']?></div>
                <?php }else { ?>
                <div class="panel-title">Reporte de Asistencia a Eventos</div>
                <?php }?>
            </div>
            <div class="panel-collapse">
                <div class="panel-body">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="panel-footer">
                    <div class="clearfix">
                    <div class="pull-left">
                        <button type="button" onclick="window.print();" class="btn btn-default pull-left">Imprimir</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4">
        <div class="panel b0 oh">
            <div class="panel-heading mb-xl">
                <div class="pull-right label label-purple fa-lg"><?php echo $maximo; ?> </div>
                <div class="panel-title">Total</div>
                <span class="circle circle-purple ml0" style="background-color: #fc704c"></span>
                <small class="text-muted">Total de Asistentes</small>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="p">
        <h4 class="page-header mv">Resumen</h4>
        <table class="table table-transparent">
            <tbody>
                <tr>
                    <td class="wd-xxs">
                    <div data-type="bar" data-bar-width="4" data-bar-spacing="3" data-height="30" data-chart-range-min="0" data-bar-color="#fc704c" class="inlinesparkline">5,6,6,4,8</div>
                    </td>
                    <td>
                    <h5 class="m0 text-bold text-dark" style="color: #656565;">Población mas afectada</h5>
                    <small>
                        <?php 
                           for ($i=0; $i < count($mayor) ; $i++) { 
                            echo $mayor[$i]." "; 
                            } 
                        ?>
                    </small>
                    </td>
                </tr>
                <tr>
                <td class="wd-xxs">
                    <div data-type="bar" data-bar-width="4" data-bar-spacing="3" data-height="30" data-chart-range-min="0" data-bar-color="#fc704c" class="inlinesparkline">8,6,3,1,0</div>
                    </td>
                    <td>
                    <h5 class="m0 text-bold text-dark" style="color: #656565;">Población menos afectada</h5>
                    <small>
                        <?php 
                           for ($i=0; $i < count($menor) ; $i++) { 
                            echo $menor[$i]." "; 
                        } 
                        ?>
                    </small>
                    </td>
                </tr>
                <tr>
                <td class="wd-xxs">
                    <div data-type="bar" data-bar-width="4" data-bar-spacing="3" data-height="30" data-chart-range-min="0" data-bar-color="#fc704c" class="inlinesparkline">3,8,5,1,6</div>
                    </td>
                    <td>
                    <h5 class="m0 text-bold text-dark" style="color: #656565;">Nivel de Acogida</h5>
                    <small>
                        <?php 
                           echo $acogida[0];
                        ?>
                    </small>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>
