<?php 
ini_set('display_errors', 'off');
error_reporting(E_ALL);
include_once '../../config/dao.php';
$dao = new Dao();
$url ='';
$file ='';
$proc = $_POST['proc'];
$id = $_POST['idhasil'];
if(isset($_POST['addfile'])) {
$target_dir = "../../files/";
    $url = $target_dir. basename($_FILES["file"]["name"]);
    $file = $_FILES["file"]["name"];
    $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $url)) {
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }

}
if ($proc == "input") {
    $kode = $_POST['lowongan'];
    $tglttp = $_POST['tgl'];
    $des = $_POST['deskripsi'];
    $query = "INSERT INTO t_hasilseleksi (id_lowongan, deskripsi, tgl_tutup, file, url) VALUE ('$kode','$des','$tglttp','$file','$url')";
    $result = $dao->execute($query);
    ?>
      <script language="JavaScript">
        alert('Berhasil Disimpan!.');
        document.location='kelolahasilseleksi.php';
      </script> 
    <?php 
    }
else if ($proc == "edit") {
    $kode = $_POST['lowongan'];
    $tglttp = $_POST['tgl'];
    $des = $_POST['deskripsi'];
    $query = "UPDATE t_hasilseleksi SET id_lowongan='$kode', deskripsi='$des', tgl_tutup='$tglttp', file='$file', url='$url' WHERE id_hasil='$id'";
    $result = $dao->execute($query);
    ?>
      <script language="JavaScript">
        alert('Berhasil Diubah!.');
        document.location='kelolahasilseleksi.php';
      </script> 
    <?php
} else {
    $query = "DELETE FROM t_hasilseleksi WHERE id_hasil = '$id'";
    $result = $dao->execute($query);
    ?>
      <script language="JavaScript">
        alert('Berhasil Dihapus!.');
        document.location='kelolahasilseleksi.php';
      </script> 
    <?php
}
?>