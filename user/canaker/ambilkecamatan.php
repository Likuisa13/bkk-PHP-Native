<?php
mysql_connect("localhost","root","");
mysql_select_db("bkk");
 
$kota = $_GET['kabupaten'];
$kec  = mysql_query("SELECT * FROM t_kec WHERE kode_kab='$kota' order by nama_kec");
 
echo "<option>-- Pilih Kecamatan --</option>";
while($k = mysql_fetch_array($kec)){
echo "<option value=\"".$k['kode_kec']."\">".$k['nama_kec']."</option>\n";
}
?>