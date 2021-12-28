<?php 
include "koneksi.php";

$stat = $_GET["stat"];
if($stat=="ON")
{
	mysql_query("UPDATE perangkat_key set data_key = 1");
	echo "ON";
}
else
{
mysql_query("UPDATE perangkat_key set data_key = 0");
	echo "OFF";

}

 ?>