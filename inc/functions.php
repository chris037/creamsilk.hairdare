<?php





function getAlbums(){

		$handle = opendir(dirname(realpath(__FILE__)) . "/" . ALBUM_DIR);
		 while($file = readdir($handle)){
                 if($file !== '.' && $file !== '..' && $file !== '.DS_Store'){
                 	echo "<li data-gal='". $file . "'><p>". $file."</p></li>";
                 }
         }

}

function getPhotos($album){

	
	$handle = opendir(dirname(realpath(__FILE__)) . "/" . ALBUM_DIR . "/" .$album);
		 while($file = readdir($handle)){
                 if($file !== '.' && $file !== '..' && $file !== '.DS_Store'){
                 	echo "<li data-album='" . $album . "' data-photo='" . $file . "' ><div class='imgLiquidFill imgLiquid' style='width:200px; height:240px;'><img src='". ALBUM_DIR . $album . "/". $file ."' /></div></li>";
                 }
         }
		
}
////bitly_url_shorten(Long URL, Access Token, Bitly Short Domain);
//echo bitly_url_shorten($share_url, 'woeuroeurow2394732947ewdslkfjweiusdfsj', 'j.mp');
function bitly_url_shorten($long_url, $access_token, $domain)
{
  $url = 'https://api-ssl.bitly.com/v3/shorten?access_token='.$access_token.'&longUrl='.urlencode($long_url).'&domain='.$domain;
  try {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 4);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $output = json_decode(curl_exec($ch));
  } catch (Exception $e) {
  }
  if(isset($output)){return $output->data->url;}
}


?>

