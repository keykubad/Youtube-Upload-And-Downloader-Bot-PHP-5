<?php
//Keykubad Youtube Uploader / Downloader Botu 
//www.keykubad.com
include_once( "ayar.php" );
include_once( "fonksiyon.php" );
include_once( "ust.php" );
$botid	= $_GET ["id"];
$botverisi=mysql_fetch_array (mysql_query ("SELECT * FROM botcek WHERE id='$botid' "));
$botadim= $botverisi["bot_adi"];
$boturl= $botverisi["bot_url"];
$aciklama_ilk= $botverisi["aciklama_ilk"];
$aciklama_son= $botverisi["aciklama_son"];
$baslik_ilk= $botverisi["baslik_ilk"];
$baslik_son= $botverisi["baslik_son"];
$etiket_ilk= $botverisi["etiket_ilk"];
$etiket_son= $botverisi["etiket_son"];
$video_ilk = $botverisi["video_ilk"];
$video_son = $botverisi["video_son"];
?>

<div class="form">
<form action="" method="post"> 
  <p><div class="baslik">BOT EKLEME MENÜSÜ</div></p>
  <p><br> 

    <label for="video_description" class="form_baslik">Bot URL :</label>
    <input name="bot_url" type="text" class="f_4" value="<?php echo $boturl;?>" />	
    <br> 
    <label for="video_description" class="form_baslik">Bot ADI :</label>
    <input name="bot_adi" type="text" class="f_4" value="<?php echo $botadim;?>" />	<br>   				
    <label for="video_description" class="form_baslik">Aciklama :</label>
    <input name="aciklama_ilk" type="text" class="f_3" value='<?php echo $aciklama_ilk;?>'/>
    <input name="aciklama_son" type="text" class="f_3" value='<?php echo $aciklama_son;?>' /><br>
    <label for="video_description" class="form_baslik">Baslik :</label>
    <input name="baslik_ilk" type="text" class="f_3" value='<?php echo $baslik_ilk;?>'/>
    <input name="baslik_son" type="text" class="f_3" value='<?php echo $baslik_son;?>'/><br>
    <label for="video_description" class="form_baslik">Etiket :</label>
    <input name="etiket_ilk" type="text" class="f_3" value='<?php echo $etiket_ilk;?>'/>
    <input name="etiket_son" type="text" class="f_3" value='<?php echo $etiket_son;?>' /><br>
    <label for="video_description" class="form_baslik">Video URL : </label>
    <input name="video_ilk" type="text" class="f_3" value='<?php echo $video_ilk;?>'/>
    <input name="video_son" type="text" class="f_3" value='<?php echo $video_son;?>'/><p></p>
	<input name="test" type="submit" class="submit" value="Bot Test" />
    <input name="duzenle" type="submit" class="submit" value="Bot Duzenle" />
  </p>
            </form>
            </div>
			
<?php
$testbuton 	  = $_POST["test"];
$duzenlebuton = $_POST["duzenle"];
$bot_adi= $_POST["bot_adi"];
$bot_url= $_POST["bot_url"];
$aciklama_ilk	= mysql_real_escape_string($_POST["aciklama_ilk"]);
$aciklama_son	= mysql_real_escape_string($_POST["aciklama_son"]);
$baslik_ilk		= mysql_real_escape_string($_POST["baslik_ilk"]);
$baslik_son		= mysql_real_escape_string($_POST["baslik_son"]);
$etiket_ilk		= mysql_real_escape_string($_POST["etiket_ilk"]);
$etiket_son		= mysql_real_escape_string($_POST["etiket_son"]);
$video_ilk 		= mysql_real_escape_string($_POST["video_ilk"]);
$video_son 		= mysql_real_escape_string($_POST["video_son"]);		
$baslik		= "#".$baslik_ilk."(.*?)".$baslik_son."#si";
$aciklama 	= "#".$aciklama_ilk."(.*?)".$aciklama_son."#si";
$etiket 	= "#".$etiket_ilk."(.*?)".$etiket_son."#si";
$video 		= "#".$video_ilk."(.*?)".$video_son."#si";	
$botcalis	=	curl_cek($boturl);
if($duzenlebuton){
	$guncelle=mysql_query("UPDATE botcek SET bot_adi='$bot_adi',bot_url='$bot_url',aciklama_ilk='$aciklama_ilk',
	aciklama_son='$aciklama_son',baslik_ilk='$baslik_ilk',baslik_son='$baslik_son',etiket_ilk='$etiket_ilk',
	etiket_son='$etiket_son',video_ilk='$video_ilk',video_son='$video_son' WHERE id='$botid' ");
		if($guncelle){
		uyari ("Basariyla guncellendi");
		}
		else{
		uyari ("Güncelleme başarısız");
		}
}
if($testbuton){
echo '<div class="form">
<div class="baslik">Test Sonucu</div>
<div class="listele">  ';
$parcala	=	preg_match_all($baslik,$botcalis,$linkcek);
foreach ($linkcek[1] as $videocek){
echo '<div class="libas">
Başlık: '.$videocek.'</div><br>';

}
$parcala	=	preg_match_all($aciklama,$botcalis,$linkcek1);
foreach ($linkcek1[1] as $videocek1){
echo '<div class="libas">
Açıklama : '.$videocek1.'</div><br>';

}
$parcala	=	preg_match_all($etiket,$botcalis,$linkcek2);
foreach ($linkcek2[1] as $videocek2){
echo '<div class="libas">
Etiket : '.$videocek2.'</div><br>';

}
$parcala	=	preg_match_all($video,$botcalis,$linkcek3);
foreach ($linkcek3[1] as $videocek3){
echo '<div class="libas">
Video URL : '.$videocek3.'</div><br>';

}
echo "</div></div>";
}
include_once( "alt.php" );
?>