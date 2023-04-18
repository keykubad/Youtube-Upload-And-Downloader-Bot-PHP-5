<?php
//Keykubad Youtube Uploader / Downloader Botu 
//www.keykubad.com
include_once( "ayar.php" );
include_once( "fonksiyon.php" );
include_once( "ust.php" );
$botid	= $_GET["id"];
$botsil	= mysql_query ("DELETE FROM botcek WHERE id='$botid' ");
	if($botsil){
	echo '<div class="form">
	<div class="baslik">Bot Silindi</div>
	<div class="listele">
	<div class="libas">Yönlendiriliyorsunuz<meta http-equiv="refresh" content="5;URL=botbilgi.php"></div>  
	</div>





	</div>';
	}





include_once( "alt.php" );
?>