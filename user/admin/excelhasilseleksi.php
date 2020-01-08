<?php 
    session_start();
    if (empty($_SESSION['username']) || $_SESSION['level'] == 2) {
        header("location:../../index.php");
        exit();
    }
 ?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=bkk','root','');

require_once 'PHPExcel/PHPExcel.php';

$excel = new PHPExcel();
$excel->getProperties()->setCreator('BKK SMK 1 Bukateja')
					   ->setLastModifiedBy('BKK SMK 1 Bukateja')
					   ->setTitle("Data Hasil Seleksi")
					   ->setSubject("Hasil Seleksi")
					   ->setDescription("Laporan Semua Data Hasil Seleksi")
					   ->setKeywords("Data Hasil Seleksi");

// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = array(
	'font' => array('bold' => true), // Set font nya jadi bold
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
	)
);

$style_row = array(
	'alignment' => array(
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
	)
);

$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA HASIL SELEKSI"); 
$excel->getActiveSheet()->mergeCells('A1:F1'); 
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

// Buat header tabel nya pada baris ke 3
$excel->setActiveSheetIndex(0)->setCellValue('A3', "ID"); 
$excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA PERUSAHAAN"); 
$excel->setActiveSheetIndex(0)->setCellValue('C3', "LOWONGAN"); 
$excel->setActiveSheetIndex(0)->setCellValue('D3', "DESKRIPSI"); 
//$excel->setActiveSheetIndex(0)->setCellValue('E3', "FILE");  

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
//$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);

// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

// Buat query untuk menampilkan semua data siswa
$sql = $pdo->prepare("SELECT t_hasilseleksi.id_hasil, t_perusahaan.nama_perusahaan, t_lowongan.posisi, 
        t_hasilseleksi.deskripsi FROM t_perusahaan, t_lowongan, t_hasilseleksi 
        WHERE t_perusahaan.id_perusahaan = t_lowongan.id_perusahaan 
        AND t_lowongan.id_lowongan = t_hasilseleksi.id_lowongan");
$sql->execute(); // Eksekusi querynya

$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
	//$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['id_hasil']);
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['nama_perusahaan']);
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['posisi']);
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['deskripsi']);
//	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['file']);
	
	// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
//	$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	
	$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
	
	$no++; // Tambah 1 setiap kali looping
	$numrow++; // Tambah 1 setiap kali looping
}

// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
//$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E

// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Laporan Data Hasil Seleksi");
$excel->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Hasil Seleksi.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>
