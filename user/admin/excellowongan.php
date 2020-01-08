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
					   ->setTitle("Data Lowongan")
					   ->setSubject("Lowongan")
					   ->setDescription("Laporan Semua Data Lowongan")
					   ->setKeywords("Data Lowongan");

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

$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA LOWONGAN"); 
$excel->getActiveSheet()->mergeCells('A1:F1'); 
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

// Buat header tabel nya pada baris ke 3
$excel->setActiveSheetIndex(0)->setCellValue('A3', "ID"); 
$excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA PERUSAHAAN"); 
$excel->setActiveSheetIndex(0)->setCellValue('C3', "POSISI"); 
$excel->setActiveSheetIndex(0)->setCellValue('D3', "TGL BUKA"); 
$excel->setActiveSheetIndex(0)->setCellValue('E3', "TGL TUTUP"); 
$excel->setActiveSheetIndex(0)->setCellValue('F3', "BIAYA PENDAFTARAN"); 
$excel->setActiveSheetIndex(0)->setCellValue('G3', "DESKRIPSI"); 
$excel->setActiveSheetIndex(0)->setCellValue('H3', "PERSYARATAN");   

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);

// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

// Buat query untuk menampilkan semua data siswa
$sql = $pdo->prepare("SELECT * FROM t_lowongan, t_perusahaan
            WHERE t_lowongan.id_perusahaan = t_perusahaan.id_perusahaan ORDER BY t_lowongan.tgl_buka ASC");
$sql->execute(); // Eksekusi querynya

$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
	//$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['id_lowongan']);
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['nama_perusahaan']);
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['posisi']);
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['tgl_buka']);
	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['tgl_tutup']);
	$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['biaya_pendaftaran']);
	$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['deskripsi']);
	$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['persyaratan']);
	
	// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	
	$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
	
	$no++; // Tambah 1 setiap kali looping
	$numrow++; // Tambah 1 setiap kali looping
}

// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20); // Set width kolom E

// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Laporan Data Lowongan");
$excel->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Lowongan.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>
