<?php
//Keykubad Youtube Uploader / Downloader Botu 
//www.keykubad.com
include_once( "ayar.php" );
include_once( "fonksiyon.php" );
include_once( "ust.php" );
?>


	
<div class="form">
<form action="" method="post"> 
  <p><div class="baslik">BOT EKLEME MENÜSÜ</div></p>
  <p><br> 

    <label for="video_description" class="form_baslik">Bot URL :</label>
    <input name="bot_url" type="text" class="f_4" />	
    <br> 
    <label for="video_description" class="form_baslik">Bot ADI :</label>
    <input name="bot_adi" type="text" class="f_4" />	<br>   				
    <label for="video_description" class="form_baslik">Aciklama :</label>
    <input name="aciklama_ilk" type="text" class="f_3" />
    <input name="aciklama_son" type="text" class="f_3" /><br>
    <label for="video_description" class="form_baslik">Baslik :</label>
    <input name="baslik_ilk" type="text" class="f_3" />
    <input name="baslik_son" type="text" class="f_3" /><br>
    <label for="video_description" class="form_baslik">Etiket :</label>
    <input name="etiket_ilk" type="text" class="f_3" />
    <input name="etiket_son" type="text" class="f_3" /><br>
    <label for="video_description" class="form_baslik">Video URL : </label>
    <input name="video_ilk" type="text" class="f_3" />
    <input name="video_son" type="text" class="f_3" /><p></p>
    <input name="test" type="submit" class="submit" value="Bot Test" />
    <input name="ekle" type="submit" class="submit" value="Bot Ekle" />
  </p>
            </form>
            </div>
<?php
$eklebuton = $_POST["ekle"];
$testbuton = $_POST["test"];

$bot_url	= $_POST["bot_url"];
$bot_adi	= $_POST["bot_adi"];
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
$botcalis	=	curl_cek($bot_url);
if($eklebuton){
	$mysqlekle=mysql_query("insert into botcek (bot_url,bot_adi,aciklama_ilk,aciklama_son,baslik_ilk,baslik_son,etiket_ilk,etiket_son,video_ilk,video_son) 
	values ('$bot_url','$bot_adi','$aciklama_ilk','$aciklama_son','$baslik_ilk','$baslik_son','$etiket_ilk','$etiket_son','$video_ilk','$video_son')");
		if($mysqlekle){
		uyari ("Basariyla eklendi");
		}
		else{
		uyari ("Ekleme basarisiz");
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

