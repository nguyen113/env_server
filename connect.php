<?php
header('Access-Control-Allow-Origin: *');
include 'app_config.php';
$conn=mysql_connect(SERVER,USERNAME,PASSWORD);
mysql_query('SET NAME "utf8" ');
if(!$conn)
{
	die ("Khong the ket noi dc toi database");
}

mysql_select_db(DBNAME,$conn) or die(mysql_error());





?>