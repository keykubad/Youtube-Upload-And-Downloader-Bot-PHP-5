<?php
//Keykubad Youtube Uploader / Downloader Botu 
//www.keykubad.com
include_once( "ayar.php" );
include_once( "fonksiyon.php" );
include_once( "ust.php" );
$botla=mysql_query ("SELECT * FROM botcek");
while ($botlama=mysql_fetch_array($botla)){
$botid	= $botlama["id"];

}
?>


<div class="form">
<div class="baslik">BOT BİLGİ MENÜSÜ</div>


<div class="tablolar">
<div>
<li class="no">No</li>
<li class="libas">İçerik Başlığı</li>
<li class="islem">İşlem</li>
</div>
</div>
<?php 

$limitim=5;
$sira=$_GET ["sira"];
	if (($sira=="") or !is_numeric ($sira))
	{
		$sira=1;
	
	}
	$satirsay=mysql_num_rows (mysql_query ("SELECT * FROM botcek"));
	$toplam=ceil ($satirsay / $limitim);
	$basla=($sira-1)*$limitim;
?>
	<div class="pagination">
<?php
	if($satirsay>5){
	if ($sira==1) {
	$linkCiktisi.="<img src='img/geri.png'>";
	}
	else {
	$birGeri=$sira-1;
	
	$linkCiktisi.="<div class=\"page\"><a href=\"botbilgi.php?sira=$birGeri\">geri</a></div>";
	}
	for($i=1; $i <= $toplam; $i++) {
	if ($sira==$i) {
	$linkCiktisi.="<div class=\"page\">$i</div>";
	continue;
	}
	}
	if ($sira<$toplam) {
	$birIleri=$sira+1;
	
	$linkCiktisi.="<div class=\"page\"><a href=\"botbilgi.php?sira=$birIleri\">ileri</a></div>";
	}
	else {
	$linkCiktisi="<img src='img/ileri.png'>";
	}
}
$sayfa=mysql_query ("SELECT * FROM botcek ORDER BY id ASC LIMIT $basla,$limitim");
while ($sayfala=mysql_fetch_array($sayfa)){
$botadi	=	$sayfala["bot_adi"];
$botid	=	$sayfala["id"];

?>
<div class="listeleme">
<li class="no"><?php echo $botid;?></li>
<li class="libas"><?php echo $botadi?></li>
<li class="islem">
<a href="botduzenle.php?id=<?php echo $botid;?>"><img class="vtip" title="Düzenle" class="vtip" title="Düzenle" src="images/icon/edit.png"></a>
<a href="botsil.php?id=<?php echo $botid;?>"><img class="vtip" title="İçeriği Sil" class="vtip" title="İçeriği Sil" src="images/icon/delete.png"></a>
</li>
</div>

<?php
}
?>
<div class="page"><?php echo $linkCiktisi;?></a></div>
</div>








</div>


<?php
include_once( "alt.php" );
?>