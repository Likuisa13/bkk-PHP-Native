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
        $this->Cell(276,10,'DATA CALON TENAGA KERJA',0,1,'C');
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
        $this->Cell(50,12,'Nama Lengkap',1,0,'C');
        $this->Cell(35,12,'Tempat Lahir',1,0,'C');
        $this->Cell(30,12,'Tgl Lahir',1,0,'C');
        $this->Cell(20,12,'Gender',1,0,'C');
        $this->Cell(40,12,'No HP',1,0,'C');
        $this->Cell(50,12,'Tinggi Badan',1,0,'C');
        $this->Cell(40,12,'Berat Badan',1,0,'C');
        $this->Ln();
    }
    function viewTable($db){
        $this->SetFont('Times','',12);
        $stmt =  $db->query('SELECT * FROM t_canaker, t_user where t_user.id_user = t_canaker.id_user');
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(15,8,$data->id_canaker,1,0,'C');
            $this->Cell(50,8,$data->nama_lengkap,1,0,'L');
            $this->Cell(35,8,$data->tempat_lahir,1,0,'L');
            $this->Cell(30,8,$data->tgl_lahir,1,0,'C');
            $this->Cell(20,8,$data->jenis_kelamin,1,'0','C');
            $this->Cell(40,8,$data->no_telp,1,0,'L');
            $this->Cell(50,8,$data->tinggi_badan,1,0,'C');
            $this->Cell(40,8,$data->berat_badan,1,'0','C');
            $this->Ln();
        }
    }
}

$pdf = new myPDF();
$pdf->SetTitle('Data Canaker');
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();