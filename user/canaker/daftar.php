<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include_once '../../config/dao.php';
$dao = new Dao();
$idlowongan= $_POST['idlowongan'];
session_start();
$user=$_SESSION['username'];
$tgl = date("Y-m-d");
$id = '';

$query = "SELECT * FROM t_user, t_canaker WHERE t_user.id_user = t_canaker.id_user 
          AND t_user.username='$user'";
$result = $dao->execute($query);

if ($result->num_rows == 0) {
  ?>
      <script language="JavaScript">
        alert('Silahkan Lengkapi Biodata Dahulu !.');
        document.location='lowongan.php';
      </script> 
      <?php
}
else{
      $i = 1;
      foreach ($result as $value) {
        $id = $value['id_canaker'];
        $i++;
      }

      $query = "INSERT INTO t_pendaftaran (id_lowongan,id_canaker,tgl_daftar) VALUE ('$idlowongan','$id','$tgl')";
      $result = $dao->execute($query);
      ?>
      <script language="JavaScript">
        alert('Selamat, Pendaftaran berhasil, Silahkan cek di MENU DAFTAR LAMARAN');
        document.location='lamaran.php';
      </script>   
      <?php
}
?>