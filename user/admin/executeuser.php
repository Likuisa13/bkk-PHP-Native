<?php
session_start();
ini_set('display_errors', 'Off');
error_reporting(E_ALL);
include_once '../../config/dao.php';
$dao = new Dao();
$id = $_POST['idku'];
$proc = $_POST['proc'];

if ($password == $repassword) {
        if ($proc == "input") {
        $noinduk = $_POST['noinduk']; 
        $nama = $_POST['nama'];
        $usr = $_POST['username'];
        $password=$_POST['password'];
        $repassword=$_POST['repassword'];
        $lvl=$_POST['level'];
         $query = "INSERT INTO t_user (no_induk,username,level,nama_lengkap,pasword) VALUE ('$noinduk','$usr','$lvl','$nama',PASSWORD('$password'))";
          $result = $dao->execute($query); 
          ?>
          <script language="JavaScript">
            alert('Tambah Akun Sukses!.');
            document.location='kelolauser.php';
          </script> 
          <?php
       } elseif($proc == "edit"){
        $noinduk = $_POST['noinduk']; 
        $nama = $_POST['nama'];
        $usr = $_POST['username'];
        $password=$_POST['password'];
        $repassword=$_POST['repassword'];
        $lvl=$_POST['level'];
          $query = "UPDATE t_user SET no_induk='$noinduk', username='$usr', level='$lvl', nama_lengkap='$nama', pasword=PASSWORD('$password') WHERE id_user ='$id' ";
          $result = $dao->execute($query); 
          ?>
          <script language="JavaScript">
            alert('Update Akun Sukses!.');
            document.location='kelolauser.php';
          </script> 
          <?php
       }else{
         $query = "DELETE FROM t_user WHERE id_user ='$id' ";
          $result = $dao->execute($query); 
          ?>
          <script language="JavaScript">
            alert('Data Berhasil dihapus!.');
            document.location='kelolauser.php';
          </script> 
          <?php
       }
        
    }
else{
    ?>
    <script language="JavaScript">
      alert('Insert or Update gagal!.');
      document.location='kelolauser.php';
    </script>
    <?php
  }
?>