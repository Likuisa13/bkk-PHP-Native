<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include_once '../../config/dao.php';
$dao = new Dao();
/* ================================================== */
$proc = $_POST['proc'];
$usrid = $_POST['usrid'];

if ($proc == "usrdel" && $usrid > 0) {
    $query = "DELETE FROM t_perusahaan WHERE id_perusahaan= '$usrid '";
}
else if ($proc == "usrin" && $usrid == 0) {
    $nama = $_POST['nama'];
    $desa = $_POST['desa'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telepon'];
    $pos = $_POST['kodepos'];
    $query = "INSERT INTO t_perusahaan (nama_perusahaan,kode_desa,alamat,no_telp,kode_pos) "
            . "VALUE ('$nama','$desa','$alamat','$telp','$pos')";    
}
else{
    $nama = $_POST['nama'];
    $desa = $_POST['desa'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telepon'];
    $pos = $_POST['kodepos'];
    $query = "UPDATE t_perusahaan SET nama_perusahaan = '$nama', kode_desa = '$desa',
                alamat = '$alamat', no_telp = '$telp', kode_pos = '$pos' WHERE id_perusahaan='$usrid' ";    
}



$in = $dao->execute($query);
if (!$in) {
    $msg[0] = "0";
    $msg[1] = $in;
} else {
    $result = $dao->readPerusahan();
    $i = 1;
    $userlist = "";
    $msg[0] = "1";
    foreach ($result as $value) {
        $userlist .= "<tr>
                <td>" . $value['id_perusahaan'] . "</td>
                <td>" . $value['nama_perusahaan'] . "</td>
                <td>" . $value['nama_desa'] . "</td>
                <td>" . $value['alamat'] . "</td>
                <td>" . $value['no_telp'] . "</td>
                <td>" . $value['kode_pos'] . "</td>
            </tr>";
        $i++;
    }
    $msg[1] = $userlist;
}
/* ================================================== */

echo json_encode($msg);
