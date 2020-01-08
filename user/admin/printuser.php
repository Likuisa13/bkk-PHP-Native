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
        $this->Cell(276,10,'DATA USER',0,1,'C');
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
        $this->Cell(50,12,'Username',1,0,'C');
        $this->Cell(120,12,'Password',1,0,'C');
        $this->Cell(40,12,'Level',1,0,'C');
        $this->Ln();
    }
    function viewTable($db){
        $this->SetFont('Times','',12);
        $stmt =  $db->query('select * from t_user order by level asc');
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(15,8,$data->id_user,1,0,'C');
            $this->Cell(50,8,$data->nama_lengkap,1,0,'L');
            $this->Cell(50,8,$data->username,1,0,'L');
            $this->Cell(120,8,$data->pasword,1,0,'C');
            $this->Cell(40,8,$data->level,1,'0','C');
            $this->Ln();
        }
    }
}

$pdf = new myPDF();
$pdf->SetTitle('Data User');
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();