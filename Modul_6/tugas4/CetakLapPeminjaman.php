<?php
require('../../fpdf/fpdf.php');
include "Koneksi.php"; 

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial','B',14);
        $this->Cell(0,10,'LAPORAN DATA PEMINJAMAN',0,1,'C');
        $this->Ln(5);

        // Header tabel
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(0,255,0);
        $this->Cell(30,10,'KODE PINJAM',1,0,'C',true);
        $this->Cell(35,10,'NIM',1,0,'C',true);
        $this->Cell(40,10,'NAMA',1,0,'C',true);
        $this->Cell(25,10,'KODE BUKU',1,0,'C',true);
        $this->Cell(50,10,'JUDUL BUKU',1,0,'C',true);
        $this->Cell(30,10,'TGL PINJAM',1,0,'C',true);
        $this->Cell(30,10,'TGL KEMBALI',1,1,'C',true);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Halaman '.$this->PageNo(),0,0,'C');
    }
}

$pdf = new PDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','',10);


$query = "
    SELECT 
        p.kode_pinjam, 
        p.nim, 
        m.nama AS nama_mahasiswa, 
        p.kode_buku, 
        b.judul AS judul_buku, 
        p.tanggal_pinjam, 
        p.tanggal_kembali
    FROM peminjaman p
    LEFT JOIN mahasiswa m ON p.nim = m.nim
    LEFT JOIN buku b ON p.kode_buku = b.kode
    ORDER BY p.tanggal_pinjam DESC
";

$result = mysqli_query($db, $query);

while ($data = mysqli_fetch_assoc($result)) {
    $pdf->Cell(30,8,$data['kode_pinjam'],1,0,'C');
    $pdf->Cell(35,8,$data['nim'],1,0,'C');
    $pdf->Cell(40,8,$data['nama_mahasiswa'],1,0);
    $pdf->Cell(25,8,$data['kode_buku'],1,0,'C');
    $pdf->Cell(50,8,$data['judul_buku'],1,0);
    $pdf->Cell(30,8,$data['tanggal_pinjam'],1,0,'C');
    $pdf->Cell(30,8,$data['tanggal_kembali'],1,1,'C');
}

$pdf->Output('I', 'Laporan_Peminjaman.pdf');
?>
