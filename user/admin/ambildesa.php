<?php
mysql_connect("localhost","root","");
mysql_select_db("bkk");
 
$kec = $_GET['kecamatan'];
$desa  = mysql_query("SELECT * FROM t_desa WHERE kode_kec='$kec' order by nama_desa");
 
echo "<option>-- Pilih Desa --</option>";
while($k = mysql_fetch_array($desa)){
echo "<option value=\"".$k['kode_desa']."\">".$k['nama_desa']."</option>\n";
}
?>