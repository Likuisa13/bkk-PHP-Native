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
        $this->Cell(190,5,'BKK "JAYA ABADI"',0,0,'C');
        $this->Ln();
        $this->Cell(190,10,'DINAS PENDIDIKAN KABUPATEN PURBALINGGA',0,0,'C');
        $this->Ln(5);
        $this->Cell(190,10,'SMK NEGERI 1 BUKATEJA',0,0,'C');
        $this->Ln(5);
        $this->SetFont('Times','',10);
        $this->Cell(190,10,'Jl. Purwandaru, Kembangan, Bukateja Kode Pos 53382',0,0,'C');
        $this->Ln();
        $this->Cell(190,0.4,'',1,1,'C');
        $this->Ln();
        $this->Cell(190,0.8,'',1,1,'C');
        $this->Ln(5);
        $this->SetFont('Times','B',14);
        $this->Cell(190,10,'DATA PENDAFTARAN',0,1,'C');
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
        $this->Cell(15,12,'ID',1,0,'C');
        $this->Cell(25,12,'No Induk',1,0,'C');
        $this->Cell(60,12,'Nama Lengkap',1,0,'C');
        $this->Cell(40,12,'Tanggal Daftar',1,0,'C');
        $this->Cell(40,12,'Status Pembayaran',1,0,'C');
        $this->Ln();
    }
    function viewTable($db){
        $this->SetFont('Times','',12);
        $stmt =  $db->query('SELECT * FROM t_pendaftaran, t_lowongan, t_perusahaan, t_canaker, t_user WHERE t_perusahaan.id_perusahaan=t_lowongan.id_perusahaan AND t_lowongan.id_lowongan = t_pendaftaran.id_lowongan AND t_pendaftaran.id_canaker = t_canaker.id_canaker AND t_canaker.id_user = t_user.id_user');
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(15,8,$data->id_pendaftaran,1,0,'C');
            $this->Cell(25,8,$data->no_induk,1,0,'C');
            $this->Cell(60,8,$data->nama_lengkap,1,0,'L');
            $this->Cell(40,8,$data->tgl_daftar,1,0,'C');
            $this->Cell(40,8,$data->status_pembayaran,1,'0','C');
            $this->Ln();
        }
    }
}

$pdf = new myPDF();
$pdf->SetTitle('Data Pendaftaran');
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();