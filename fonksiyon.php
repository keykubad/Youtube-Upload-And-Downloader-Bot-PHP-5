<?php
//Keykubad Youtube Uploader / Downloader Botu 
//www.keykubad.com
set_time_limit (0);
//Keykubad Youtube Uploader / Downloader Botu 
//www.keykubad.com
	
    $youtube_email = "birnumara35@gmail.com";//youtube kayıtlı mailiniz.
    $youtube_password = "turkiye35"; // Youtube hesap sifreniz
    // Developer key: Youtube api key kodu buraya gireceksiniz url uzerinden alabilirsiniz: http://code.google.com/apis/youtube/dashboard/.
    $key = "AI39si59BpIhzxb0X0awDpKorK75pwL5yF4CisL8PoBSnCoxqw50A63Een0Rc2j7yp3XrJP_bLi0r-4VePlt0XFY9yJ6fw6yQg"; 
    
    $source = 'BirnumaraKanal'; // Developer kısmına yazdınız name (ad)
    $postdata = "Email=".$youtube_email."&Passwd=".$youtube_password."&service=youtube&source=" . $source;
    $curl = curl_init( "https://www.google.com/youtube/accounts/ClientLogin" );
    curl_setopt( $curl, CURLOPT_HEADER, "Content-Type:application/x-www-form-urlencoded" );
    curl_setopt( $curl, CURLOPT_POST, 1 );
    curl_setopt( $curl, CURLOPT_POSTFIELDS, $postdata );
    curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
    curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 0 );
    $response = curl_exec( $curl );
    curl_close( $curl );

    list( $auth, $youtubeuser ) = explode( "\n", $response );
    list( $authlabel, $authvalue ) = array_map( "trim", explode( "=", $auth ) );
    list( $youtubeuserlabel, $youtubeuservalue ) = array_map( "trim", explode( "=", $youtubeuser ) );

    $youtube_video_title = $baslikcek; // Video başlık cek
    $youtube_video_description = $aciklamacek; // Video acıklama cek 
    $youtube_video_keywords = $etiketcek; // Video keyword etiket cek
    $youtube_video_category = $kategoricek; // Kategori cek
    
    $data = '<?xml version="1.0"?>
                <entry xmlns="http://www.w3.org/2005/Atom"
                  xmlns:media="http://search.yahoo.com/mrss/"
                  xmlns:yt="http://gdata.youtube.com/schemas/2007">
                  <media:group>
                    <media:title type="plain">' . stripslashes( $youtube_video_title ) . '</media:title>
                    <media:description type="plain">' . stripslashes( $youtube_video_description ) . '</media:description>
                    <media:category type="plain"
                      scheme="http://gdata.youtube.com/schemas/2007/categories.cat">'.stripslashes($youtube_video_category).'</media:category>
                    <media:keywords type="plain">' . stripslashes($youtube_video_keywords) . '</media:keywords>
                  </media:group>
                </entry>';

    $headers = array( "Authorization: GoogleLogin auth=".$authvalue,
                 "GData-Version: 2",
                 "X-GData-Key: key=".$key,
                 "Content-length: ".strlen( $data ),
                 "Content-Type: application/atom+xml; charset=UTF-8" );

$curl = curl_init( "http://gdata.youtube.com/action/GetUploadToken");
curl_setopt( $curl, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"] );
curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $curl, CURLOPT_TIMEOUT, 10 );
curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $curl, CURLOPT_POST, 1 );
curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, 1 );
curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
curl_setopt( $curl, CURLOPT_POSTFIELDS, $data );
curl_setopt( $curl, CURLOPT_REFERER, true );
curl_setopt( $curl, CURLOPT_HEADER, 0 );

$response = simplexml_load_string( curl_exec( $curl ) );
curl_close( $curl );



function curl_cek($url){
$useragent 	= 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:24.0) Gecko/20100101 Firefox/24.0';
$referer 	= 'https://www.google.com/accounts/ServiceLogin?service=youtube';
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_HEADER, 1); 
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt ($ch, CURLOPT_REFERER, $referer);
curl_setopt ($ch, CURLOPT_USERAGENT, $useragent);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
$rmx = curl_exec($ch);
curl_close($ch);
return $rmx;
}
function file_download($link,$dosya_adi=NULL){
$ch 	= curl_init();
curl_setopt($ch, CURLOPT_URL,$link);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION , TRUE);
$dosya	=curl_exec($ch);
curl_close($ch);
if($dosya_adi==NULL){
$dosya_adi=explode("/",$link);
$dosya_adi=array_reverse($dosya_adi);
$dosya_adi=$dosya_adi[0];
}
$klasor="videolar";
$fp = fopen($klasor."/".$dosya_adi,'w');
fwrite($fp, $dosya);
fclose($fp);
}

function icon($deger){
return iconv('iso-8859-9','UTF-8',$deger);
}  

function uyari($uyar){
echo '<div class="blok">
<div class="sol_blok">
<div class="baslik1">UYARI</div>

<div class="yorums">'.$uyar.'
</div>
</div>
</div>';

return $uyar;
}  


$kategoricek = array(
"Film" => "Film ve Animasyon",
"Autos" => "Otomobiller ve Araçlar",
"Music" => "Müzik",
"Animals" => "Hayvanlar Dünyası",
"Sports" => "Spor",
"Shortmov" => "Kısa Filmler",
"Travel" => "Seyahat ve Etkinlikler",
"Games" => "Oyun",
"Videoblog" => "Video bloğu",
"People" => "Kişiler ve Bloglar",
"Comedy" => "Komedi",
"Entertainment" => "Eğlence",
"News" => "Haberler ve Politika",
"Howto" => "Nasıl Yapılır ve Stil",
"Education" => "Eğitim",
"Tech" => "Bilim ve Teknoloji",
"Movies_anime_animation" => "Anime/Animasyon"
);

$aciklama_ilk	= $_POST["aciklama_ilk"];
$aciklama_son	= $_POST["aciklama_son"];
$baslik_ilk		= $_POST["baslik_ilk"];
$baslik_son		= $_POST["baslik_son"];
$etiket_ilk		= $_POST["etiket_ilk"];
$etiket_son		= $_POST["etiket_son"];
$video_ilk 		= $_POST["video_ilk"];
$video_son 		= $_POST["video_son"];

$baslik 	= "#".$baslik_ilk."(.*?)".$baslik_son."#si";
$aciklama 	= "#".$aciklama_ilk."(.*?)".$aciklama_son."#si";
$etiket 	= "#".$etiket_ilk."(.*?)".$etiket_son."#si";
$video 		= "#".$video_ilk."(.*?)".$video_son."#si";

?>