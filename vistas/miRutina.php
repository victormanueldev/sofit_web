<div class="col-lg-6">
        <div class="panel panel-default" style="border-color: #fc704c;border-left-color: #fff;border-bottom-color: #fff;border-right-color: #fff;">
            <div class="panel-heading">
            <a href="#" data-perform="panel-dismiss" data-toggle="tooltip" title="Close Panel" class="pull-right">
                <em class="fa fa-times"></em>
            </a>
            <a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="Collapse Panel" class="pull-right">
                <em class="fa fa-minus"></em>
            </a>
            <div class="panel-title">Reporte de Asistencia</div>
            </div>
            <div class="panel-collapse">
                <div class="panel-body">
                    <canvas id="myChart" width="300px" height="300px"></canvas>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
	<?php 
		include_once("modelo/Conexion.php");
		$ContUsuario = 0;
		$ContInstructor = 0;
		$ContFuncionario = 0;
		$info = 0;

		if (isset($_POST['btn'])) {
			$info = $_POST['filtro'];
		}

		$db = new Conexion();
		$sql = "SELECT count(rolAsistente) FROM asistenciaevento WHERE id_Evento = '$info' AND rolAsistente = 'Aprendiz'";
		$resultado = $db->consultaRetorno($sql);
		$retorno = mysqli_fetch_array($resultado);
		
		$sql2 = "SELECT count(rolAsistente) FROM asistenciaevento WHERE id_Evento = '$info' AND rolAsistente = 'Instructor'";
		$resultado = $db->consultaRetorno($sql2);
		$retorno2 = mysqli_fetch_array($resultado);
		
		$sql = "SELECT count(rolAsistente) FROM asistenciaevento WHERE id_Evento = '$info' AND rolAsistente = 'Funcionario'";
		$resultado = $db->consultaRetorno($sql);
		$retorno3 = mysqli_fetch_array($resultado);

		
		/*if ($retorno["rolAsistente"] == "Instructor") {
			$ContInstructor++;
		}else if ($retorno["rolAsistente"] == "Aprendiz") {
			$ContUsuario = $ContUsuario + 1;
			echo $ContUsuario;
		}else if ($retorno["rolAsistente"] == "Funcionario") {
			$ContFuncionario = $ContFuncionario + 1 ;
			echo $ContFuncionario;
		}else{
			echo "no entre";
		}*/

		$maximo = $retorno[0] + $retorno2[0] + $retorno3[0];
		$promedio = "";
		
		if ($retorno[0] > $retorno2[0] && $retorno[0] > $retorno3[0]) {
		  $promedio = "Aprendiz"; 
		}elseif ($retorno2[0] > $retorno[0] && $retorno2[0] > $retorno3[0]) {
			$promedio = "Instructor";
		}elseif ($retorno3[0] > $retorno[0] && $retorno3[0] > $retorno2[0]) {
			$promedio = "Funcionario";
		}

	?>
	var config = {
		type: "bar",
		data : {
			labels: ["Aprendiz","Instructor","Funcionario","Total"],
			datasets: [{
				label: "Cantidad Asistentes",
				data: [ Aprendiz = "<?php echo $retorno[0];?>",
					    Instructor = "<?php echo $retorno2[0];?>",
					    Funcionario = "<?php echo $retorno3[0];?>",
					    Total = "<?php echo $maximo;?>"
					   ],
				backgroundColor: [
                'rgba(255, 78, 33, 0.5)',
                'rgba(229, 68, 58, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)'
            	],
            	borderColor: [
                'rgba(255, 78, 33,1)',
                'rgba(229, 68, 58, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
           		],
           		borderWidth: 1,
					  }]
			    },
		options:{
			responsive: true,
			title: {
				display: true,
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
					ticks:{
						beginAtZero:true
				   	  	  },
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
        window.myLine = new Chart(ctx, config);
    };
	</script>