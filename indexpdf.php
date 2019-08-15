

 <?php
	include_once('controlador/controladorInventario.php');
 ?>

<?php
    $controlador = new controladorInventario();
	if(isset($_GET['id_Inventario'])){
    $id_Inventario = $_GET['id_Inventario'];
    $resultado1 = $controlador-> verIB($id_Inventario);
	$datos = mysqli_fetch_assoc($resultado1);
	$resultado2 = $controlador-> verIn($id_Inventario);
   }
?>

<?php


	include 'fpdf/plantilla.php';
	require 'fpdf/conexionpdf.php';
	
	$pdf = new PDF('P','mm','Letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	//Head
	$pdf->SetFont('Arial','B',15);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(85,6,'No. Inventario',1,0,'C',1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(105,6,$datos['id_Inventario'],1,1,'C',0);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(85,6,'Nombre del Encargado',1,0,'C',1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(105,6,$datos['nombres_Usuario']." ".$datos['apellidos_Usuario'],1,1,'C',0);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(85,6,'Fecha de Registro',1,0,'C',1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(105,6, $datos['fecha_Inventario'] ,1,1,'C',0);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(85,6,'Hora de Registro',1,0,'C',1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(105,6,$datos['hora_Inventario'],1,1,'C',0);
	//Body
	/*$pdf->SetFont('Arial','',11);
	$pdf->Cell(35,6,$datos['id_Inventario'],1,0,'C',0);
	$pdf->Cell(65,6,$datos['nombres_Usuario']." ".$datos['apellidos_Usuario'],1,0,'C',0);
	$pdf->Cell(45,6, $datos['fecha_Inventario'] ,1,0,'C',0);
	$pdf->Cell(45,6,$datos['hora_Inventario'],1,1,'C',0);*/
	$pdf->Ln(5);
	//Body
	$pdf->SetFont('Arial','B',15);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(25,6,'No.',1,0,'C',1);
	$pdf->Cell(60,6,'Nombre del Elemento',1,0,'C',1);
	$pdf->Cell(30,6,'Cantidad',1,0,'C',1);
	$pdf->Cell(75,6,'Observacion',1,1,'C',1);

	$pdf->SetFont('Arial','',10);

	  while($fila = mysqli_fetch_assoc($resultado2)){
		$pdf->Cell(25,6,$fila['id_Elemento'],1,0,'C');
		$pdf->Cell(60,6,$fila['nombre_Elemento'],1,0,'C');
		$pdf->Cell(30,6,$fila['total_Elemento_Inventario'],1,0,'C');
		$pdf->Cell(75,6,$fila['observacion'],1,1,'C');
	}


	$pdf->Output("ReporteElemento.pdf","I");

?>
