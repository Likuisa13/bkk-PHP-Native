<?php 
    session_start();
    if (empty($_SESSION['username']) || $_SESSION['level'] == 2) {
        header("location:../../index.php");
        exit();
    }
 ?>
<?php 
require "../../print/fpdf.php";
$db = new PDO('mysql:host=localhost;dbname=bkk','root','');
class myPDF extends FPDF{
    function header(){
        $this->image('../../img/logo.png',10,6);
        $this->SetFont('Times','B',14);
        $this->Cell(276,5,'BKK "JAYA ABADI"',0,0,'C');
        $this->Ln();
        $this->Cell(276,10,'DINAS PENDIDIKAN KABUPATEN PURBALINGGA',0,0,'C');
        $this->Ln(5);
        $this->Cell(276,10,'SMK NEGERI 1 BUKATEJA',0,0,'C');
        $this->Ln(5);
        $this->SetFont('Times','',10);
        $this->Cell(276,10,'Jl. Purwandaru, Kembangan, Bukateja Kode Pos 53382',0,0,'C');
        $this->Ln();
        $this->Cell(276,0.4,'',1,1,'C');
        $this->Ln();
        $this->Cell(276,0.8,'',1,1,'C');
        $this->Ln(5);
        $this->SetFont('Times','B',14);
        $this->Cell(276,10,'DATA HASIL SELEKSI',0,1,'C');
        $this->Ln(5);

    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        $this->SetFont('Times','B',12);
        $this->SetFillColor(192,192,192);
        //$this->SetTextColor(0,0,0);
        $this->Cell(15,12,'',0,0,'C');
        $this->Cell(255,0.1,'',1,1,'C');
        $this->Ln();
        $this->Cell(15,12,'',0,0,'C');
        $this->Cell(15,12,'ID',0,0,'C');
        $this->Cell(50,12,'Nama Perusahaan',0,0,'C');
        $this->Cell(50,12,'Posisi',0,0,'C');
        $this->Cell(140,12,'Deskripsi',0,0,'C');
        $this->Ln();
        $this->Cell(15,12,'',0,0,'C');
        $this->Cell(255,0.1,'',1,1,'C');
    }
    function viewTable($db){
        $this->SetFont('Times','',12);
        $stmt =  $db->query('SELECT t_hasilseleksi.id_hasil, t_perusahaan.nama_perusahaan, t_lowongan.posisi, 
        t_hasilseleksi.deskripsi FROM t_perusahaan, t_lowongan, t_hasilseleksi 
        WHERE t_perusahaan.id_perusahaan = t_lowongan.id_perusahaan 
        AND t_lowongan.id_lowongan = t_hasilseleksi.id_lowongan');
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(15,12,'',0,0,'C');
            $this->Cell(15,8,$data->id_hasil,0,0,'C');
            $this->Cell(50,8,$data->nama_perusahaan);
            $this->Cell(50,8,$data->posisi,0,0,'C');
            $this->MultiCell(140,8,$data->deskripsi);
            $this->Cell(15,12,'',0,0,'C');
            $this->Cell(255,0.1,'',1,1,'C');
        }
    }
}

$pdf = new myPDF();
$pdf->SetTitle('Data Hasil Seleksi');
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();