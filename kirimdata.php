<?php

	include("koneksi.php");

	$nilai = $_GET["sensor"];
date_default_timezone_set('Asia/Jakarta');
$waktu=date('Y-m-d H:i:s');


mysql_query("INSERT INTO data set data_koordinat='$nilai', waktu='$waktu'");
	
?>