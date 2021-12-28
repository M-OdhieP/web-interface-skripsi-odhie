<?php
$koneksi=mysql_connect("localhost","root","")
or
die("Tak bisa terhubung ke database");
$db=mysql_select_db("sistem_keamanan",$koneksi);
?>