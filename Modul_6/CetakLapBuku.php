<?php
require_once("../fpdf/fpdf.php");
include "Koneksi.php";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetTitle("Laporan Data Buku");
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Laporan Data Buku', 0, 1, 'C');
$pdf->Ln(5);

// Header Tabel
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(0, 255, 0);
$pdf->Cell(10, 10, 'No', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Kode', 1, 0, 'C', true);
$pdf->Cell(60, 10, 'Judul', 1, 0, 'C', true);
$pdf->Cell(45, 10, 'Pengarang', 1, 0, 'C', true);
$pdf->Cell(45, 10, 'Penerbit', 1, 1, 'C', true);

// Data Tabel
$pdf->SetFont('Arial', '', 10);
$q = "SELECT * FROM buku";
$r = mysqli_query($db, $q);
$no = 1;

while ($data = mysqli_fetch_array($r)) {
    $pdf->Cell(10, 8, $no++, 1, 0, 'C');
    $pdf->Cell(30, 8, $data['kd_buku'], 1);
    $pdf->Cell(60, 8, $data['judul'], 1);
    $pdf->Cell(45, 8, $data['pengarang'], 1);
    $pdf->Cell(45, 8, $data['penerbit'], 1, 1);
}

// Output
$pdf->Output("lapBuku.pdf", "D");
?>
