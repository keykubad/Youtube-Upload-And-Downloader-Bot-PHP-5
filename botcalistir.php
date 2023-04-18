<?php
//Keykubad Youtube Uploader / Downloader Botu 
//www.keykubad.com
include_once( "ayar.php" );
include_once( "fonksiyon.php" );
include_once( "ust.php" );

?>
	
<div class="form"> 
  <div class="baslik">BOT SEÇİM MENÜSÜ</div>
 
	 <form action="yukle.php" method="post">
       <br> 
      <span class="form_baslik">Bot URL :</span>
       <input name="bot_url" type="text" class="f_4" />	
         <br> 
        <span class="form_baslik">Bot ADI :</span>
          
      
       <select name="yazbot" class="f_4" >
    <?php
//Keykubad Youtube Uploader / Downloader Botu 
//www.keykubad.com
include_once( "ayar.php" );
$botlistele	=	mysql_query ("SELECT * FROM botcek ");
while ($basbotu=mysql_fetch_array($botlistele)){
$botadi	=	$basbotu["bot_adi"];
$botid	=	$basbotu["id"];


?>     
           
           
    <option value="<?php echo $botid; ?>"><?php echo $botadi; ?></option>
           
    <?php } ?>
    </select>	
         <br>  				
         <input type="submit" class="submit" value="Video Ekle" />
       </p>
            </form>
			</div>
			
<?php
$bot	=	$_POST["yazbot"];

include_once( "alt.php" );
?>