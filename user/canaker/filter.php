<?php 
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);
unset($_SESSION['prov']);
unset($_SESSION['kab']);
unset($_SESSION['posisi']);
unset($_SESSION['kabupaten']);
unset($_SESSION['provinsi']);
$p = $_POST['provinsi'];
$k =$_POST['kabupaten'];
$pos = $_POST['posisi'];
$prov = '';
$kab = '';
include_once '../../config/dao.php';
$dao = new Dao();
$query = "SELECT nama_prov FROM t_prov where kode_prov='$p'"; 
$result = $dao->execute($query);
$i = 1;
foreach ($result as $value) {
  $prov = $value['nama_prov'];
  $i++;
  }
$query = "SELECT nama_kab FROM t_kab where kode_kab='$k'"; 
$result = $dao->execute($query);
$i = 1;
foreach ($result as $value) {
  $kab = $value['nama_kab'];
  $i++;
  }
session_start();
$_SESSION['prov'] = $p;
$_SESSION['kab'] =$k;
$_SESSION['posisi'] = $pos;
$_SESSION['kabupaten'] =$kab;
$_SESSION['provinsi'] = $prov;

header('location:lowongan.php');

 ?>