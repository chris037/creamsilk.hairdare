<?php require("functions.php"); ?>
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

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CreamSilk Hair Dare</title>
  <meta name="description" content="Dare To See The Cream Silk Difference">
  <meta name="author" content="chris.cortez">

  <meta property="og:title" content="Facebook Open Graph META Tags"/>
  <meta property="og:image" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>

  <meta name="twitter:site" content="@site_username">
  <meta name="twitter:title" content="Dare To See The Cream Silk Difference">
  <meta name="twitter:description" content="Rally your schoolmates to bring Nadine Lustre and the #CreamSilkHairDare booth to your school!">
  <meta name="twitter:creator" content="@creator_username">
  <?php
       echo "<meta name='twitter:image:src' content='". ALBUM_DIR . '/' . $albumName . '/' . $photoName . "'>";
  ?>
 
  <meta name="twitter:domain" content="xpresswebsolution.com/">
  

  
</head>
<body>

<!-- <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=246077005407212";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> -->