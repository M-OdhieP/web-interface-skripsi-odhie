<?php

	include("koneksi.php");

	$nilai = $_GET["key"];



mysql_query("UPDATE perangkat_key set data_key='$nilai'");
	
?>