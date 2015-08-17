<?php require("inc/config.php"); ?>
<?php require("inc/functions.php"); ?>
<?php


$notinner = true;
if(isset($_GET['album'])){

  //FOR XSS SCRIPTING
  $albumName = htmlentities($_GET['album'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
  $notinner = false;
}

if(isset($_GET['photo'])){
   $photoName = htmlentities($_GET['photo'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

?>

<?php

$base_dir  = __DIR__; // Absolute path to your installation, ex: /var/www/mywebsite
$doc_root  = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']); # ex: /var/www
$base_url  = preg_replace("!^${doc_root}!", '', $base_dir); # ex: '' or '/mywebsite'
$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
$port      = $_SERVER['SERVER_PORT'];
$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
$domain    = $_SERVER['SERVER_NAME'];
$full_url  = "${protocol}://${domain}${disp_port}"; # Ex: 'http://example.com', 'https://example.com/mywebsite', etc.

//echo $full_url;
//echo $protocol;

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CreamSilk Hair Dare</title>
  <meta name="description" content="Dare To See The Cream Silk Difference">
  <meta name="author" content="chris.cortez">

  <meta property="og:title" content="Dare To See The Cream Silk Difference"/>
    <?php
       echo "<meta property='og:image'  content='". $full_url . ALBUM_DIR . '/' . $albumName . '/' . $photoName . "'>";
  ?>

  <meta property="og:site_name" content=""/>
  <meta property="og:description" content="The %23CreamSilkHairDare challenge makes me feel %23BeyondBeautiful"/>

  <meta name="twitter:site" content="@site_username">
  <meta name="twitter:title" content="Dare To See The Cream Silk Difference">
  <meta name="twitter:description" content="Rally your schoolmates to bring Nadine Lustre and the #CreamSilkHairDare booth to your school!">
  <meta name="twitter:creator" content="@creator_username">
  <?php
       echo "<meta name='twitter:image:src' content='". ALBUM_DIR . '/' . $albumName . '/' . $photoName . "'>";
  ?>
 
  <meta name="twitter:domain" content="creamsilk.con.ph/">
  

  
</head>
<body>
<!-- FB JAVASCRIPT SDK --> 

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=246077005407212";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- / FB JAVASCRIPT SDK --> 


<style>

html, body, div, span, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
abbr, address, cite, code,
del, dfn, em, img, ins, kbd, q, samp,
small, strong, sub, sup, var,
b, i,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, figure, footer, header,&nbsp;hgroup, menu, nav, section, menu,
time, mark, audio, video {
margin:0;
padding:0;
border:0;
outline:0;
font-size:100%;
vertical-align:baseline;
background:transparent;
}
 
article, aside, figure, footer, header,
hgroup, nav, section { display:block; }
 
nav ul { list-style:none; }
 
blockquote, q { quotes:none; }
 
blockquote:before, blockquote:after,
q:before, q:after { content:''; content:none; }
 
a { margin:0; padding:0; font-size:100%; vertical-align:baseline; background:transparent; }
 
ins { background-color:#ff9; color:#000; text-decoration:none; }
 
mark { background-color:#ff9; color:#000; font-style:italic; font-weight:bold; }
 
del { text-decoration: line-through; }
 
abbr[title], dfn[title] { border-bottom:1px dotted #000; cursor:help; }
 
/* tables still need cellspacing="0" in the markup */
table { border-collapse:collapse; border-spacing:0; }
 
hr { display:block; height:1px; border:0; border-top:1px solid #ccc; margin:1em 0; padding:0; }
 
input, select { vertical-align:middle; }
/* END RESET CSS */

.lightbox{
  width: 650px;
  font-family: Arial;
}
.lightbox img{
   float: left;
   margin-right: 20px;
}

.lightbox .lightdiv{
   float: left;
   display: block;
   width: 150px;
}

.clearfix{
  clear: both;
}
</style>

<div class="lightbox" id="fl12" style="padding: 25px;">
        <div class="lightimg">
            <?php echo "<img src='". ALBUM_DIR . '/' . $albumName . '/' . $photoName . "' width='428'/>"; ?>
          <div class="lightdiv">
              <p  style="padding-top:100px;">Share your #CreamSilkHairDare Photo with the prescribed caption to get a chance to be featured in candy magazine.</p> 
          <div style="margin-top: 10px;">
            <div style="margin-bottom: 20px;" class="fb-share-button" data-href="<?php echo $_SERVER['QUERY_STRING']; ?>" data-layout="button_count"></div>
            
            <iframe id="twitter-widget-1" scrolling="no" frameborder="0" allowtransparency="true" src="https://platform.twitter.com/widgets/tweet_button.9b77a1cb4bd14da06dfa5e2f65422c91.en.html#_=1437943738411&amp;count=horizontal&amp;dnt=false&amp;id=twitter-widget-1&amp;lang=en&amp;original_referer=http%3A%2F%2Fhttp://www.creamsilk.com.ph/%2Fweb%2Ftweet-button&amp;size=m&amp;text=The %23CreamSilkHairDare challenge makes me feel %23BeyondBeautiful because " class="twitter-share-button twitter-tweet-button twitter-share-button twitter-count-horizontal" title="Twitter Tweet Button" data-twttr-rendered="true" style="position: static; visibility: visible; width: 97px; height: 20px;"></iframe>
       </div>
          </div>
           <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</body>
</html>