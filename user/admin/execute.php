<?php
ini_set('display_errors', 'Off');
error_reporting(E_ALL);
include_once '../../config/dao.php';
$dao = new Dao();

$proc = $_POST['proc'];
$usrid = $_POST['usrid'];

if ($proc == "usrdel" && $usrid > 0) {
    $query = "DELETE FROM t_perusahaan WHERE id_perusahaan= '$usrid '";
    $result = $dao->execute($query);
    ?>
      <script language="JavaScript">
        alert('Berhasil Dihapus!.');
        document.location='kelolaperusahaan.php';
      </script> 
    <?php
}
elseif ($proc == "usrin" && $usrid == 0) {
    $nama = $_POST['nama'];
    $desa = $_POST['desa'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telepon'];
    $pos = $_POST['kodepos'];
    $query = "INSERT INTO t_perusahaan (nama_perusahaan,kode_desa,alamat,no_telp,kode_pos) "
            . "VALUE ('$nama','$desa','$alamat','$telp','$pos')";    
    $result = $dao->execute($query);
    ?>
      <script language="JavaScript">
        alert('Berhasil Disimpan!.');
        document.location='kelolaperusahaan.php';
      </script> 
    <?php
}
else{
    $nama = $_POST['nama'];
    $desa = $_POST['desa'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telepon'];
    $pos = $_POST['kodepos'];
    $query = "UPDATE t_perusahaan SET nama_perusahaan = '$nama', kode_desa = '$desa',
                alamat = '$alamat', no_telp = '$telp', kode_pos = '$pos' WHERE id_perusahaan='$usrid' ";
    $result = $dao->execute($query);
    ?>
      <script language="JavaScript">
        alert('Berhasil Diubah!.');
        document.location='kelolaperusahaan.php';
      </script> 
    <?php    
}

