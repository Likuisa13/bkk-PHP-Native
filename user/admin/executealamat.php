<?php 
ini_set('display_errors', 'off');
error_reporting(E_ALL);
include_once '../../config/dao.php';
$dao = new Dao();
$proc = $_POST['proc'];
$id = $_POST['idku']; 


if ($proc == "inputProv") {
    $prov = $_POST['provinsi'];
    $query = "INSERT INTO t_prov (nama_prov) VALUE ('$prov')";
    $result = $dao->execute($query);
    ?>
      <script language="JavaScript">
        alert('Provinsi Berhasil Ditambah!.');
        document.location='kelolaalamat.php';
      </script> 
    <?php
    }
elseif ($proc == "inputKab") {
    $prov = $_POST['provinsi'];
    $kab = $_POST['kabupaten'];
    $query = "INSERT INTO t_kab (kode_prov,nama_kab) VALUE ('$prov','$kab')";
    $result = $dao->execute($query);
    ?>
      <script language="JavaScript">
        alert('Kabupaten Berhasil Ditambah!.');
        document.location='kelolaalamat.php';
      </script> 
    <?php
    }
elseif ($proc == "inputKec") {
    $kab = $_POST['kabupaten'];
    $kec = $_POST['kecamatan'];
    $query = "INSERT INTO t_kec (kode_kab,nama_kec) VALUE ('$kab','$kec')";
    $result = $dao->execute($query);
    ?>
      <script language="JavaScript">
        alert('Kecamatan Berhasil Ditambah!.');
        document.location='kelolaalamat.php';
      </script> 
    <?php
    }
elseif ($proc == "inputDesa") {
    $desa = $_POST['desa'];
    $kec = $_POST['kecamatan'];
    $query = "INSERT INTO t_desa (kode_kec, nama_desa) VALUE ('$kec','$desa')";
    $result = $dao->execute($query);
    ?>
      <script language="JavaScript">
        alert('Desa Berhasil Ditambah!.');
        document.location='kelolaalamat.php';
      </script> 
    <?php
    }
else if ($proc == "edit") {
    $desa = $_POST['desa'];
    $kec = $_POST['kecamatan'];
    $query = "UPDATE t_desa SET nama_desa='$desa', kode_kec='$kec' WHERE kode_desa='$id'";
    $result = $dao->execute($query);
    ?>
      <script language="JavaScript">
        alert('Berhasil Diubah!.');
        document.location='kelolahasilseleksi.php';
      </script> 
    <?php
} else {
    $query = "DELETE FROM t_desa WHERE kode_desa = '$id'";
    $result = $dao->execute($query);
    ?>
      <script language="JavaScript">
        alert('Berhasil Dihapus!.');
        document.location='kelolaalamat.php';
      </script> 
    <?php
}

?>