<?php 
ini_set('display_errors', 'off');
error_reporting(E_ALL);
session_start();
include_once '../../config/dao.php';
$dao = new Dao();
$proc = $_POST['proc'];
$id = $_POST['lowongan'];
if ($proc == "show") {
    $_SESSION['id_lowongan'] = $id;
    $result = $dao->readDataLowonganKu($id);
    $i = 1;
    foreach ($result as $value) {
      $_SESSION['perusahaan']= $value['nama_perusahaan'];
      $_SESSION['posisi'] = $value['posisi'];
      $_SESSION['tglbuka'] = $value['tgl_buka'];
      $i++;
      }
    ?>
      <script language="JavaScript">
        document.location='kelolapendaftaran.php';
      </script> 
    <?php
}
elseif ($proc == "input") {
    $idku = $_POST['lowonganku'];
    $id_pendaftaran = $_POST['idku']; 
    $id_canaker = $_POST['canaker'];
    $tgl = $_POST['tgl'];
    $status = $_POST['status'];
    $query = "INSERT INTO t_pendaftaran (id_lowongan, id_canaker, tgl_daftar, status_pembayaran) VALUE ('$idku','$id_canaker','$tgl','$status')";
    $result = $dao->execute($query);
    ?>
      <script language="JavaScript">
        alert('Berhasil Disimpan!.');
        document.location='kelolapendaftaran.php';
      </script> 
    <?php
}
elseif ($proc == "edit") {
    $idku = $_POST['lowonganku'];
    $id_pendaftaran = $_POST['idku']; 
    $id_canaker = $_POST['canaker'];
    $tgl = $_POST['tgl'];
    $status = $_POST['status'];
    $query = "UPDATE t_pendaftaran SET id_lowongan='$idku', id_canaker='$id_canaker', tgl_daftar='$tgl', status_pembayaran='$status' WHERE id_pendaftaran='$id_pendaftaran'";
    $result = $dao->execute($query);
    ?>
      <script language="JavaScript">
        alert('Berhasil Diubah!.');
        document.location='kelolapendaftaran.php';
      </script> 
    <?php
}
else{
    $id_pendaftaran = $_POST['idku']; 
    $query = "DELETE FROM t_pendaftaran WHERE id_pendaftaran='$id_pendaftaran'";
    $result = $dao->execute($query);
    ?>
      <script language="JavaScript">
        alert('Berhasil Dihapus!.');
        document.location='kelolapendaftaran.php';
      </script> 
    <?php
}
?>