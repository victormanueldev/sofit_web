<script type="text/javascript">
  document.getElementById('reportes').setAttribute("class", "active");
  document.getElementById('subMenuReportes').setAttribute("class", "nav collapse in");
  document.getElementById('repAsistencia').setAttribute("class", "active");
</script>
<script>
    <?php
        include_once("modelo/Conexion.php");
        include_once('modelo/Carbon.php');
        use Carbon\Carbon;
        //Calcula el año actual
        function anioActual(){
            date_default_timezone_set('America/Bogota');
            $now = Carbon::now();//Obtiene la fecha y hora actual
            print $now->year;
        }
        ob_start();//Iniciar búfer de salida
        anioActual();
        $a = ob_get_clean();//Graba la salida

        $db = new Conexion();

        $sql = "SELECT COUNT(id_Usuario) FROM usuario";
        $resultado = $db->consultaRetorno($sql);
        $existe = mysqli_fetch_array($resultado);
        $valor13 = $existe[0];

        $sql = "SELECT COUNT(id_Usuario) FROM asistencia WHERE EXTRACT(month FROM fecha_Asistencia)='01' AND EXTRACT(year FROM fecha_Asistencia)='$a'";
        $resultado = $db->consultaRetorno($sql);
        $existe = mysqli_fetch_array($resultado);
        $valor = $existe[0];

        $sql = "SELECT COUNT(id_Usuario) FROM asistencia WHERE EXTRACT(month FROM fecha_Asistencia)='02' AND EXTRACT(year FROM fecha_Asistencia)='$a'";
        $resultado = $db->consultaRetorno($sql);
        $existe = mysqli_fetch_array($resultado);
        $valor1 = $existe[0];

        $sql = "SELECT COUNT(id_Usuario) FROM asistencia WHERE EXTRACT(month FROM fecha_Asistencia)='03' AND EXTRACT(year FROM fecha_Asistencia)='$a'";
        $resultado = $db->consultaRetorno($sql);
        $existe = mysqli_fetch_array($resultado);
        $valor2 = $existe[0];
    

        $sql = "SELECT COUNT(id_Usuario) FROM asistencia WHERE EXTRACT(month FROM fecha_Asistencia)='04' AND EXTRACT(year FROM fecha_Asistencia)='$a'";
        $resultado = $db->consultaRetorno($sql);
        $existe = mysqli_fetch_array($resultado);
        $valor3 = $existe[0];
        

        $sql = "SELECT COUNT(id_Usuario) FROM asistencia WHERE EXTRACT(month FROM fecha_Asistencia)='05' AND EXTRACT(year FROM fecha_Asistencia)='$a'";
        $resultado = $db->consultaRetorno($sql);
        $existe = mysqli_fetch_array($resultado);
        $valor4 = $existe[0];
        

        $sql = "SELECT COUNT(id_Usuario) FROM asistencia WHERE EXTRACT(month FROM fecha_Asistencia)='06' AND EXTRACT(year FROM fecha_Asistencia)='$a'";
        $resultado = $db->consultaRetorno($sql);
        $existe = mysqli_fetch_array($resultado);
        $valor5 = $existe[0];
        

        $sql = "SELECT COUNT(id_Usuario) FROM asistencia WHERE EXTRACT(month FROM fecha_Asistencia)='07' AND EXTRACT(year FROM fecha_Asistencia)='$a'";
        $resultado = $db->consultaRetorno($sql);
        $existe = mysqli_fetch_array($resultado);
        $valor6 = $existe[0];
        

        $sql = "SELECT COUNT(id_Usuario) FROM asistencia WHERE EXTRACT(month FROM fecha_Asistencia)='08' AND EXTRACT(year FROM fecha_Asistencia)='$a'";
        $resultado = $db->consultaRetorno($sql);
        $existe = mysqli_fetch_array($resultado);
        $valor7 = $existe[0];
        
        $sql = "SELECT COUNT(id_Usuario) FROM asistencia WHERE EXTRACT(month FROM fecha_Asistencia)='09' AND EXTRACT(year FROM fecha_Asistencia)='$a'";
        $resultado = $db->consultaRetorno($sql);
        $existe = mysqli_fetch_array($resultado);
        $valor8 = $existe[0];
        

        $sql = "SELECT COUNT(id_Usuario) FROM asistencia WHERE EXTRACT(month FROM fecha_Asistencia)='10' AND EXTRACT(year FROM fecha_Asistencia)='$a'";
        $resultado = $db->consultaRetorno($sql);
        $existe = mysqli_fetch_array($resultado);
        $valor9 = $existe[0];
        

        $sql = "SELECT COUNT(id_Usuario) FROM asistencia WHERE EXTRACT(month FROM fecha_Asistencia)='11' AND EXTRACT(year FROM fecha_Asistencia)='$a'";
        $resultado = $db->consultaRetorno($sql);
        $existe = mysqli_fetch_array($resultado);
        $valor10 = $existe[0];
        

        $sql = "SELECT COUNT(id_Usuario) FROM asistencia WHERE EXTRACT(month FROM fecha_Asistencia)='12' AND EXTRACT(year FROM fecha_Asistencia)='$a'";
        $resultado = $db->consultaRetorno($sql);
        $existe = mysqli_fetch_array($resultado);
        $valor11 = $existe[0];
        //Guardar los resultados en un arreglo
        $resultadosAsistencia = [
            "0" => $valor, 
            "1" => $valor1, 
            "2" => $valor2, 
            "3" => $valor3, 
            "4" => $valor4,
            "5" => $valor5,
            "6" => $valor6,
            "7" => $valor7,
            "8" => $valor8,
            "9" => $valor9,
            "10" => $valor10,
            "11" => $valor11
        ];
        //Array asociativo con meses
        $resultadosAsistenciaMes = [
            "Enero" => $valor, 
            "Febrero" => $valor1, 
            "Marzo" => $valor2, 
            "Abril" => $valor3, 
            "Mayo" => $valor4,
            "Junio" => $valor5,
            "Julio" => $valor6,
            "Agosto" => $valor7,
            "Septiembre" => $valor8,
            "Octubre" => $valor9,
            "Noviembre" => $valor10,
            "Diciembre" => $valor11
        ];
        $mayor = array_keys($resultadosAsistenciaMes, max($resultadosAsistenciaMes));//Obtiene el mes con mayor afluencia
        $menor = array_keys($resultadosAsistenciaMes, min($resultadosAsistenciaMes));//Obtiene el mes con menor afluencia
        $totalAsistencias = 0;
        //Hacer operaciones con el  arreglo
        for ($i=0; $i < count($resultadosAsistencia) ; $i++) { 
            $totalAsistencias += $resultadosAsistencia[$i];//Total de asistencias en el año
        }
    ?> 
    var MONTHS = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var config = {
        type: 'line',
        data: {
            labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            datasets: [{
                label: "Asistentes",
                backgroundColor: ['#fc704c99'],
                borderColor: "#FC704C",
                pointBackgroundColor: "#f8542a",
                data: [
                    valor = "<?php echo $valor;?>",
                    valor1 = "<?php echo $valor1;?>",
                    valor2 = "<?php echo $valor2;?>",
                    valor3 = "<?php echo $valor3;?>",
                    valor4 = "<?php echo $valor4;?>",
                    valor5 = "<?php echo $valor5;?>",
                    valor6 = "<?php echo $valor6;?>",
                    valor7 = "<?php echo $valor7;?>",
                    valor8 = "<?php echo $valor8;?>",
                    valor9 = "<?php echo $valor9;?>",
                    valor10 = "<?php echo $valor10;?>",
                    valor11 = "<?php echo $valor11;?>"
                ],
                fill: "start"
            }]
        },
        options: {
            responsive: true,
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 5,
                    bottom: 0
                }
            },
            elements: {
                line: {
                    tension: 0.3, // disables bezier curves
                }
            },
            title:{
                display:false,
                text:'Grafica de Asistencia'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Mes'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Cantidad Asistentes'
                    },
                    stacked: true
                }]
            }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx, config);
    };
</script>
<h3>
    Reporte de Asistencia
</h3>
<div class="row">
    <div class="col-lg-9">
    <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
            <div class="panel-heading">
            <a href="#" data-perform="panel-dismiss" data-toggle="tooltip" title="Cerrar Panel" class="pull-right">
                <em class="fa fa-times"></em>
            </a>
            <a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="Minimizar Panel" class="pull-right">
                <em class="fa fa-minus"></em>
            </a>
            <div class="panel-title">Reporte de Asistencia al gimnasio</div>
            </div>
            <div class="panel-collapse">
                <div class="panel-body">
                    <canvas id="canvas"></canvas>
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
                <div class="pull-right label label-purple fa-lg"><?php echo $totalAsistencias; ?> </div>
                <div class="panel-title">Total</div>
                <span class="circle circle-purple ml0" style="background-color: #fc704c"></span>
                <small class="text-muted">Asistencia anual</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4">
        <div class="panel b0 oh">
            <div class="panel-heading mb-xl">
                <div class="pull-right label label-purple fa-lg"><?php echo $valor13; ?> </div>
                <div class="panel-title">Usuarios</div>
                <span class="circle circle-purple ml0" style="background-color: #fc704c"></span>
                <small class="text-muted">Usuarios del sistema</small>
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
                    <h5 class="m0 text-bold text-dark" style="color: #656565;">Mayor Afluencia</h5>
                    <small>
                        <?php 
                            for ($i=0; $i < count($mayor) ; $i++) { 
                                echo $mayor[$i].". "; 
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
                    <h5 class="m0 text-bold text-dark" style="color: #656565;">Menor Afluencia</h5>
                    <small>
                        <?php 
                            for ($i=0; $i < count($menor) ; $i++) { 
                                echo $menor[$i].". "; 
                            } 
                        ?>
                    </small>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>