<?php require("functions.php"); ?>
<?php


$notinner = true;
if(isset($_GET['album'])){

  //FOR XSS SCRIPTING
  $albumName = htmlentities($_GET['album'], ENT_QUOTES | ENT_HTML5, 'UTF-8');

  //FOR PHP FILTERING
  // $filtered = filter_var($id, FILTER_VALIDATE_INT);
  // $notinner = ($filtered || $filtered === 0) ? false : true ; }
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
  <meta name="description" content="CreamSilk Hair Dare">
  <meta property="og:title" content="Facebook Open Graph META Tags"/>
<meta property="og:image" content="http://davidwalsh.name/wp-content/themes/klass/img/facebooklogo.png"/>
<meta property="og:site_name" content="David Walsh Blog"/>
<meta property="og:description" content="Facebook's Open Graph protocol allows for web developers to turn their websites into Facebook "graph" objects, allowing a certain level of customization over how information is carried over from a non-Facebook website to Facebook when a page is 'recommended', 'liked', or just generally shared."/>
  
  <meta name="author" content="chris.cortez">
  <link rel="stylesheet" href="assets/css/featherlight.css" />
  <link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.css" />
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="styles.css" />
  
</head>
<body>
<div id="header">
      <div id="header_container">
        <img src="http://www.creamsilk.com.ph/images/csk_logo.png" id="csk_header_logo" class="">
        <div id="main_menu">
            <a href="/home">HOME</a>
            <a href="/products">PRODUCTS</a>
            <a href="/videos">VIDEOS</a>
            <a href="/news">NEWS AND EVENTS</a>
             <a href="/hairdare">HAIR DARE</a>
          
        </div>
        <div class="clearfix"></div>
        
      </div>
    </div>
