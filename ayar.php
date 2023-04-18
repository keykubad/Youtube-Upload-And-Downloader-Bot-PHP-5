<?php
//Keykubad Youtube Uploader / Downloader Botu 
//www.keykubad.com
error_reporting(0);
set_time_limit(0);
date_default_timezone_set('Europe/Istanbul');
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname	= "youtube";
$giris	= mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname,$giris);
mysql_query('SET NAMES utf8');

?>