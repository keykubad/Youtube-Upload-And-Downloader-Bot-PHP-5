<?php 
			//Keykubad Youtube Uploader / Downloader Botu 
			//www.keykubad.com		
			error_reporting(E_ALL & ~E_NOTICE); 		
			
            $baslikcek = stripslashes( $_POST['video_title'] );
            $aciklamacek = stripslashes( $_POST['video_description'] );
			$etiketcek= stripslashes( $_POST['video_keywords'] );
			$kategoricek= stripslashes( $_POST['video_category'] );
			include_once( "ayar.php" );
			include_once( "fonksiyon.php" );
            include_once( "ust.php" );
        $nexturl = "http://localhost/youtubebotu/yukle.php";//burayı degis unutma
   
        $unique_id = $_GET['id'];
        $status = $_GET['status'];
		
        ?>
        
        
        
   <?php if( empty( $_POST['video_title'] ) && $unique_id == "" ) :?>
<?php

//bot verileri buradan cekiyoruz
$bot=$_POST["yazbot"];
$boturl= $_POST["bot_url"];
$botadi= $_POST["bot_adi"];

$botverisi=mysql_fetch_array (mysql_query ("SELECT * FROM botcek WHERE id='$bot' "));
$aciklama_ilk= $botverisi["aciklama_ilk"];
$aciklama_son= $botverisi["aciklama_son"];
$baslik_ilk= $botverisi["baslik_ilk"];
$baslik_son= $botverisi["baslik_son"];
$etiket_ilk= $botverisi["etiket_ilk"];
$etiket_son= $botverisi["etiket_son"];
$video_ilk = $botverisi["video_ilk"];
$video_son = $botverisi["video_son"];
$eklebuton = $_POST["ekle"];
$testbuton = $_POST["test"];
$baslik = "#".$baslik_ilk."(.*?)".$baslik_son."#si";
$aciklama = "#".$aciklama_ilk."(.*?)".$aciklama_son."#si";
$etiket = "#".$etiket_ilk."(.*?)".$etiket_son."#si";
$video = "#".$video_ilk."(.*?)".$video_son."#si";
$botadres=curl_cek($boturl);
$parcala=preg_match_all($baslik,$botadres,$linkcek);
foreach ($linkcek[1] as $baslikcek){
}
$parcala=preg_match_all($aciklama,$botadres,$linkcek1);
foreach ($linkcek1[1] as $aciklamacek){
}
$parcala=preg_match_all($etiket,$botadres,$linkcek2);
foreach ($linkcek2[1] as $etiketcek){
}
$parcala=preg_match_all($video,$botadres,$linkcek3);
foreach ($linkcek3[1] as $videocek){

}

//bing botu burda
if($bot=="4"){
	$videocek=str_replace ("\\x3a",":",$videocek);
	$videocek=str_replace ("\\x2f","/",$videocek);
}
//gamespot bot burda
if($bot=="5"){
	$videocek=str_replace ("%3A",":",$videocek);
	$videocek=str_replace ("%2F","/",$videocek);
	
}
//metacafe botu burada
if($bot=="8"){
$videocek=str_replace ("%3A",":",$videocek);
$videocek=str_replace ("%5C","",$videocek);
$videocek=str_replace ("%2F","/",$videocek);
$videocek=str_replace ("%25","%",$videocek);
	
}
//facebook botu burda
if($bot=="10"){
	$videocek=str_replace ("\u002522\u00253A\u002522https","http",$videocek);
	$videocek=str_replace ("\u002522\u00252C\u002522","",$videocek);
	$videocek=str_replace ("\u00253A\u00255C\u00252F\u00255C\u00252F","://",$videocek);
	$videocek=str_replace ("\u00255C\u00252F","/",$videocek);
	$videocek=str_replace ("\u00253F","?",$videocek);
	$videocek=str_replace ("\u00253D","=",$videocek);
	$videocek=str_replace ("\u002526","&",$videocek);
	$sayila=rand(1,4);
	file_download($videocek,'facebook_video'.$sayila.'.mp4');

	
}
//dailymotion botu burda
if($bot=="11"){
		$videocek=str_replace("%3F","?",$videocek);
		$videocek=str_replace("%3D","=",$videocek);
		$videocek=str_replace("%2F","/",$videocek);
		$videocek=str_replace("%3A",":",$videocek);
		$videocek=str_replace("%253F","?",$videocek);
		$videocek=str_replace("%253D","=",$videocek);
		$videocek=str_replace("%252F","/",$videocek);
		$videocek=str_replace("%253A",":",$videocek);
		$videocek=str_replace("%22%2C%22","",$videocek);
		$videocek=str_replace("%22%3A%22","",$videocek);
		$videocek=str_replace("%22:%22","",$videocek);
		$sayila=rand(1,1000);
		file_download($videocek,'dailymotion_video'.$sayila2.'.mp4');

	
}

file_download($videocek);


?>
<div class="form">   
<form action="" method="post"> 
  <p><div class="baslik">Elle Video Ekle</div></p>
  <p><br>                
                <label for="video_title"><span class="form_baslik">Video Başlık : </span></label>
      <input name="video_title" type="text" class="f_4" value="<?php echo $baslikcek;?>" />
      <label for="video_description" class="form_baslik">Video Açıklama : </label>
                <textarea name="video_description" class="f_6" id="video_description"><?php echo $aciklamacek;?></textarea>
				<label for="video_keywords" class="form_baslik">Video Etiket :</label>
                <textarea name="video_keywords" class="f_6" id="video_keywords"><?php echo $etiketcek;?></textarea>
				<p></p>
				<span class="form_baslik">Kategori Seç :</span>
<select name="video_category" class="f_9" id="video_category">
	  <option value="Seçiniz" selected>Seçiniz</option>
	  <?php
				foreach($kategoricek as $i => $v){
				?>
	  <option value="<?php echo $i;?>"><?php echo $v;?></option>
	  <?php
				}
				?>
	  </select>
                <p></p>
                <input type="submit" class="submit" value="İlerle" />
            </form>
             </div>
      <!-- /form -->





        <!--  2 -->           
        <?php elseif( $response->token != '' ) : ?> 
        <div class="form">
  <p><div class="baslik">Elle Video Ekle 2. Aşama</div></p>
  
                     
           
    <div class="form_baslik">
    		Başlık: <?php echo $baslikcek; ?><p>
           Açıklama: <?php echo $aciklamacek; ?><p>
			Etiket: <?php echo $etiketcek; ?><p>
            
            <form action="<?php echo( $response->url ); ?>?nexturl=<?php echo( urlencode( $nexturl ) ); ?>" method="post" enctype="multipart/form-data">
      
                   <div class="libas"><input name="file" type="file" class="f_4"  id="file" /></div><p>
                                          
            
                <input type="hidden" name="token" value="<?php echo( $response->token ); ?>"/>
                <input type="submit" class="submit" value="Video Yükle" /></div>
            </form> </div><!-- /form -->
           
<!-- Son kısım-->
        <?php elseif( $unique_id != '' && $status = '200' ) : ?>        
         <div class="form">
            <div class="baslik">Video Başariyla Yüklendi</div>
            <p class="baslik1">Videoyu birkaç dakika sonra izleyebilirsiniz.</p>
            <p><span class="baslik1">Video URL :</span><a href="http://www.youtube.com/watch?v=<?php echo $unique_id; ?>" target="_blank">http://www.youtube.com/watch?v=<?php echo $unique_id; ?></a></p>
        </div> <!-- /div#video son -->
        <?php endif; ?>
   <?php 
   include_once("alt.php");
   ?>     
    </body>
</html>
