<?php
ini_set('display_errors', 'Off');
error_reporting(E_ALL);
include_once '../../config/dao.php';
$dao = new Dao();

$smk = $_POST['smk'];
$bkk = $_POST['bkk'];
$motto = $_POST['motto'];
$alamat = $_POST['alamat'];
$telp = $_POST['telepon'];
$email = $_POST['email'];
$fb = $_POST['fb'];
$ig = $_POST['ig'];
$twitter = $_POST['twitter'];
$jam = $_POST['jam'];

$query = "UPDATE t_profil SET nama_smk='$smk', nama_bkk='$bkk', motto='$motto', alamat='$alamat', no_telp='$telp', email='$email', fb='$fb', ig='$ig', twitter='$twitter', jam_kerja='$jam' WHERE id_profil='1'";
    $result = $dao->execute($query);
	
    session_start();
	$dao2 = new Dao();
	$new = $dao2->readProfil();
	$i = 1;
	foreach ($new as $value) {
	    $_SESSION['smk'] = $value['nama_smk'];
	    $_SESSION['bkk'] = $value['nama_bkk'];
	    $_SESSION['motto'] = $value['motto'];
	    $_SESSION['alamat'] = $value['alamat'];
	    $_SESSION['telp'] = $value['no_telp'];
	    $_SESSION['email'] = $value['email'];
	    $_SESSION['fb'] = $value['fb'];
	    $_SESSION['ig'] = $value['ig'];
	    $_SESSION['twitter'] = $value['twitter'];
	    $_SESSION['jam'] = $value['jam_kerja'];
	    $i++;
	    }
    ?>
      <script language="JavaScript">
        alert('Berhasil Diubah!.');
        document.location='profil.php';
      </script> 
    <?php

?>