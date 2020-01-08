<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include_once '../../config/dao.php';
$dao = new Dao();
$id = $_SESSION['id'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];

if ($password == $repassword) {
      $query = "UPDATE t_user SET pasword=PASSWORD('$password') WHERE id_user ='$id' ";
      $result = $dao->execute($query); 
      ?>
      <script language="JavaScript">
        alert('Update Akun Sukses!.');
        document.location='index.php';
      </script> 
      <?php 
    }
else{
    ?>
    <script language="JavaScript">
      alert('Update gagal!.');
      document.location='index.php';
    </script>
    <?php
  }
?>