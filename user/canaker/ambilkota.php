<?php
mysql_connect("localhost","root","");
mysql_select_db("bkk");
$propinsi = $_GET['provinsi'];
$kota = mysql_query("SELECT * FROM t_kab WHERE kode_prov='$propinsi' order by nama_kab");
echo "<option>-- Pilih Kabupaten/Kota --</option>";
while($k = mysql_fetch_array($kota)){
echo "<option value=\"".$k['kode_kab']."\">".$k['nama_kab']."</option>\n";
}
?>