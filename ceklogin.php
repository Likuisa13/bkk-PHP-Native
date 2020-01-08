<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include_once 'config/dao.php';
$username= $_POST['username'];
$password=$_POST['password'];
$error='';
$level = 0;
$id = '';

$dao = new Dao();
$result = $dao->readAkun($username,$password);

$i = 1;
foreach ($result as $value) {
  $level = $value['level'];
  $id = $value['id_user'];
  $i++;
  }
if($result->num_rows == 1){  
    if ($level == "1") {
        session_start();
        header('location:user/admin/index.php');
    }
    else {
        session_start();
        header('location:user/canaker/index.php');
    }
    session_start();
    $_SESSION['username']=$username;
    $_SESSION['level']=$level;
    $_SESSION['id']=$id;
  }
  else{
    ?>
    <script language="JavaScript">
      alert('Login gagal! Username atau Password tidak sesuai.');
      document.location='index.php';
    </script>
    <?php
  }
?>