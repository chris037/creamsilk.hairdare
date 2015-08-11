<?php require("header.php"); ?>

<?php

// Open the file to get existing tweet id
$file = 'tweets.txt';
$filex = file($file);
$count = count($filex);
$nn = array();
if($count > 0) {
    foreach($filex as $row) {
        $dta= explode(",", $row);
       
        $nn[] = $dta[0];
    }
}

require "api/twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', 'O5aEw9PuzzgvA6SVmkEvkLCmd');
define('CONSUMER_SECRET', 'Ae87KPYSim7QOTCXuLDJiJSUTkhTp2R2ionOwi3Jl9BYdmBS7S');
define('ACCESS_TOKEN', '18185709-CL6LSUn8Z74g0ohs3dq3LIWQ16JLcz9reoAj9PklF');
define('ACCESS_TOKEN_SECRET', 'PRAHBvNhm1g7apmljX50HpMAibbDAVpFd1mkhXF1Fk3f3');
 
$toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
 
//  $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
$content = $toa->get("account/verify_credentials");

$query = array(
  "q" => "#CreamSilkHairDare",
  "count" => "2",
  "result_type" => "recent"
);
 


// Open the file to get existing content
//$current = file_get_contents($file);
// Append a new person to the file

// Write the contents back to the file


$results = $toa->get('search/tweets', $query);
//echo "<div style='display:none;'>". print_r($results)."</div>";
    foreach ($results->statuses as $result) {
        if(in_array($result->id, $nn)){

        }else{
            if($result->in_reply_to_status_id == null){
           // echo "<li data-id='".$result->id ."'>". $result->id . "> " .$result->user->screen_name . ": " . $result->text . " <img src='".  $result->user->profile_image_url ."'</li>";
             //echo $result->text;
              $str = $result->text;
              $search = ['~(?<!\s)\h*\R\h*+(?!\s)~', '~\h*(\R)\h*+\s+~'];
              $replace = [' ', '$1'];
              $str = preg_replace($search, $replace, $str);
              $str = trim($str, "\t\n\r\0\x0B");

              
              $str = preg_replace('/(^|\b)@\S*($|\b)/', '', $str); // remove @someone
              $str = preg_replace('/(^|\b)#\S*($|\b)/', '', $str); // remove hashtags

              // taken from http://daringfireball.net/2010/07/improved_regex_for_matching_urls
              $urlRegex = '~(?i)\b((?:[a-z][\w-]+:(?:/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))~';
              $str = preg_replace($urlRegex, '', $str); // remove urls
              
              $current = $result->id ."," . $result->user->screen_name . "," . $result->user->profile_image_url ."," . $str . "\r\n";
              file_put_contents($file, $current, FILE_APPEND | LOCK_EX);
             }
        }
        
    }



?>

<div data-pageid="entries" class="wrapper">
 
    <div class="content">
       <div style="position:absolute; top: 60px;">

           <div style="position:relative; top:-20px; left:-180px; z-index:99999;" >
            <img src="assets/images/03_entries_book.png">
          </div>
  </div>
          <div class="center row">
                <button data-href="video.php" class="capsuleLeft">Bring Nadine To Your School</button>
                <button data-href="entries.php" class="capsuleRight active" >Get Featured In Candy Magazine</button>
            </div>
           
        <div class="col one_third packshot">
         &nbsp;
         <!--  <img src="assets/images/03_entries_book.png"> -->
           
        </div>


        <div class="col two_third main">
          
            <div class="" style="padding-left: 20px;"><img src="assets/images/03_entries_header.png"></div> 
            <p class="center" style="margin: 5px 0 10px;">Take the #CreamSilkHairDare Challenge in your school, share your own
            <br>#CreamSilkHairDare photo on Facebook. Twitter and/or Instagram and get a chance 
            <br>to be featured on Candy magazine! Read on for Full Mechanics <a class="" href="" style="font-weight: bold; text-decoratin: underline; color: #fff;" data-featherlight="#fl_mechphoto">Here</a></p>
            <p class="center" style="margin: 5px 0 20px"> <a class="button" href="gallery.php" style="padding-left: 40px; padding-right: 40px;" >Find your photo</a></p>
            
            
            <div id="users" class="row">

              <div class="col full">
                <div class="box">
                  <div class="container-1">
                      <span class="icon"><i class="fa fa-search"></i></span>
                      <input class="search" type="search" id="search" placeholder="Search for your twitter username ..." />
                  </div>
                </div>
              </div>

             
               <div class="clearfix"></div>

  
  <div class="tweet">
           

  </div>
  <div class="clearfix"></div>

            </div>
      </div>
      <div class="clearfix"></div>
      <!-- <div class="tweet" style="display: none;"></div> -->

    </div>

</div><!-- end wrapper -->

<?php require("footer.php"); ?>