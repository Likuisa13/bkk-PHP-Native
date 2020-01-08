<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include_once '../../config/dao.php';
$dao = new Dao();
$id= $_POST['usrid'];
$query = "DELETE FROM t_pendaftaran WHERE id_pendaftaran = '$id'"; 
      $result = $dao->execute($query); 
 ?>
      <script language="JavaScript">
        alert('Data Berhasil Dihapus');
        document.location='lamaran.php';
      </script> 
      <?php
?>