<?php 
ini_set('display_errors', 'Off');
error_reporting(E_ALL);
include_once '../../config/dao.php';
$proc = $_POST['proc'];
$id = $_POST['idku'];


$dao2 = new Dao();
if ($proc == "input") {
    $kode = $_POST['perusahaan'];
    $posisi = $_POST['posisi'];
    $tglbk = $_POST['tglbuka']; 
    $tglttp = $_POST['tgltutup'];
    $biaya = $_POST['biaya'];
    $des = $_POST['deskripsi'];
    $syarat = $_POST['persyaratan'];
    $query = "INSERT INTO t_lowongan (id_perusahaan,posisi,tgl_buka,tgl_tutup,biaya_pendaftaran,deskripsi,persyaratan) VALUE ('$kode','$posisi','$tglbk','$tglttp','$biaya','$des','$syarat') ";
    $result = $dao2->execute($query);
    ?>
      <script language="JavaScript">
        alert('Berhasil Disimpan!.');
        document.location='kelolalowongan.php';
      </script> 
    <?php
    }
else if ($proc == "edit") {
    $kode = $_POST['perusahaan'];
    $posisi = $_POST['posisi'];
    $tglbk = $_POST['tglbuka']; 
    $tglttp = $_POST['tgltutup'];
    $biaya = $_POST['biaya'];
    $des = $_POST['deskripsi'];
    $syarat = $_POST['persyaratan'];
    $query = "UPDATE t_lowongan SET id_perusahaan = '$kode', posisi = '$posisi', tgl_buka = '$tglbk', tgl_tutup = '$tglttp', biaya_pendaftaran = '$biaya', deskripsi = '$des', persyaratan = '$syarat' WHERE id_lowongan = '$id'";
    $result = $dao2->execute($query);
    ?>
      <script language="JavaScript">
        alert('Berhasil Diubah!.');
        document.location='kelolalowongan.php';
      </script> 
    <?php
} else {
    $query = "DELETE FROM t_lowongan WHERE id_lowongan = '$id'";
    $result = $dao2->execute($query);
    ?>
      <script language="JavaScript">
        alert('Berhasil Dihapus!.');
        document.location='kelolalowongan.php';
      </script> 
    <?php
}

?>