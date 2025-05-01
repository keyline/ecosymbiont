<title><?=$title?></title>
<!-- Favicons -->
<link href="<?=env('UPLOADS_URL').$generalSetting->site_favicon?>" rel="icon">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/bootstrap.min.css" media="screen"> 
<link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/jquery.bxslider.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/font-awesome.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/magnific-popup.css" media="screen">    
<link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/owl.carousel.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/owl.theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/ticker-style.css"/>
<link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/menumaker.css"/>
<link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/audioplayer.css">
<link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/style.css" media="screen">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<?php
 
// Get the protocol (HTTP or HTTPS)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

// Get the host (domain name)
echo $host = $_SERVER['HTTP_HOST']; // e.g., localhost or example.com

// Get the request URI (path after the domain)
$requestUri = $_SERVER['REQUEST_URI']; // e.g., /ecosymbiontgit/together/category/action

// Combine all parts to get the full URL
$fullUrl = $protocol . $host . $requestUri;

// echo $fullUrl; 

  foreach ($metadetails as $key => $meta) {
    if ($fullUrl == $meta->url) {?>
      <!-- <title><?=$meta->title;?></title> -->
      <meta name="title" content="<?=$meta->title?>">
      <meta name="description" content="<?=$meta->description;?>">
      <meta name="keywords" content="<?=$meta->keyword;?>">
   <?php } 
      // <title>Global Leader in Testing, Inspection, and Certification – Mitra SK</title>
      // <meta name="description" content="Over 85 years of leading global Testing, Inspection & Certification services, with a network spanning 28 countries, showcasing excellence across diverse industries. Your trusted TIC partner.">
      // <meta name="keywords" content="home">
    }
    ?>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZF0FJHP0P2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZF0FJHP0P2');
</script>