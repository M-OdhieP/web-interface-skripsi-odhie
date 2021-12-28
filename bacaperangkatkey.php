<?php  
include "koneksi.php";

$sql = "SELECT * FROM perangkat_key";
$tampil = mysql_query($sql);
$data = mysql_fetch_array($tampil);

$data_key = $data['data_key']; 

//respon ke nodemcu
echo "$data_key";

?>