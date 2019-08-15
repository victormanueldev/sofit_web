<?php

	require 'fpdf.php';

	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('fpdf/images/logosena.jpg', 10, 10, 20 );
			$this->Image('fpdf/images/logo_color.jpg', 180, 9, 25 );
			$this->SetFont('Arial','B',12);
			$this->Cell(25);
			$this->Cell(145,7, 'Reporte de Inventario' ,1,2,'C');
			$this->SetFont('Arial','I', 10);
			$this->Cell(145,13, 'Inventario de elementos del Gimnasio Sena.',1,0,'C');
			$this->Ln(20);
		}

		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}
?>
