<?php
session_start();
ini_set('display_errors', 'Off');
error_reporting(E_ALL);
include_once 'config/dao.php';
$dao = new Dao();
$noinduk= $_POST['noinduk'];
$nama=$_POST['nama'];
$username= $_POST['username'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];

if ($password == $repassword) {
    $query = "SELECT * FROM t_user where username='$username'"; 
    $result = $dao->execute($query);
    if ($result->num_rows == 0) {
      $query = "INSERT INTO t_user (no_induk,nama_lengkap,username,pasword) "
            . "VALUE ('$noinduk','$nama','$username',PASSWORD('$password'))"; 
      $result = $dao->execute($query);
          session_start();
    $_SESSION['username']=$username;
    $_SESSION['level']="2"; 
      ?>
      <script language="JavaScript">
        alert('Pendaftaran Sukses!.');
      </script> 
      <?php
      header('location:user/canaker/index.php');
    }
    else{
      ?>
      <script language="JavaScript">
        alert('Maaf, Username yang anda gunakan sudah terpakai!.');
        document.location='index.php';
      </script>   
      <?php
      }
    
}
else{
    ?>
    <script language="JavaScript">
      alert('Pendaftaran gagal!.');
      document.location='index.php';
    </script>
    <?php
  }
?>