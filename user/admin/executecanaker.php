<?php
include_once '../../config/dao.php';
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);
$dao = new Dao();
$proc= $_POST['proc'];
$id= $_POST['idku'];

if ($proc == "input") {
    $tempat= $_POST['tempat'];
    $tgl= $_POST['tgl'];
    $gender= $_POST['jk'];
    $alamat= $_POST['alamat'];
    $desa= $_POST['desa'];
    $sekolah= $_POST['sekolah'];
    $jurusan= $_POST['jurusan'];
    $hp= $_POST['hp'];
    $email= $_POST['email'];
    $agama= $_POST['agama'];
    $tb= $_POST['tb'];
    $bb= $_POST['bb'];
    $mtk= $_POST['mtk'];
    $rata= $_POST['raport'];
    $query = "INSERT INTO t_canaker (id_user,jenis_kelamin,asal_sekolah,jurusan,kode_desa,alamat,tempat_lahir,tgl_lahir,agama,email,no_telp,tinggi_badan,berat_badan,nilai_mtk,rata_raport) VALUE ('$iduser','$gender','$sekolah','$jurusan','$desa','$alamat','$tempat','$tgl','$agama','$email','$hp','$tb','$bb','$mtk','$rata')";
    $result = $dao->execute($query); 
    ?>
      <script language="JavaScript">
        alert('Data Berhasil Disimpan');
        document.location='kelolacanaker.php';
      </script> 
    <?php
}
elseif ($proc == "edit"){
    $tempat= $_POST['tempat'];
    $tgl= $_POST['tgl'];
    $gender= $_POST['jk'];
    $alamat= $_POST['alamat'];
    $desa= $_POST['desa'];
    $sekolah= $_POST['sekolah'];
    $jurusan= $_POST['jurusan'];
    $hp= $_POST['hp'];
    $email= $_POST['email'];
    $agama= $_POST['agama'];
    $tb= $_POST['tb'];
    $bb= $_POST['bb'];
    $mtk= $_POST['mtk'];
    $rata= $_POST['raport'];
    $query = "UPDATE t_canaker SET jenis_kelamin='$gender', asal_sekolah='$sekolah', jurusan='$jurusan',    kode_desa='$desa', alamat='$alamat', tempat_lahir='$tempat', tgl_lahir='$tgl', agama='$agama', email='$email', no_telp='$hp', tinggi_badan='$tb', berat_badan='$bb', nilai_mtk='$mtk', rata_raport='$rata' WHERE id_canaker='$id'" ;
    $result = $dao->execute($query); 
    ?>
      <script language="JavaScript">
        alert('Data Berhasil Diubah');
        document.location='kelolacanaker.php';
      </script> 
    <?php
}else{
    $query = "DELETE FROM t_canaker WHERE id_canaker='$id'" ;
    $result = $dao->execute($query); 
    ?>
      <script language="JavaScript">
        alert('Data Berhasil Dihapus');
        document.location='kelolacanaker.php';
      </script> 
    <?php
}
?>