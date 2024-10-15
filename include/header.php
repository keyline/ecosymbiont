<?php 

// Get the protocol (HTTP or HTTPS)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

// Get the host (domain)
$host = $_SERVER['HTTP_HOST'];

// Get the URI (path)
$uri = $_SERVER['REQUEST_URI'];

// Combine to form the full URL
echo $current_url = $protocol . $host; 


$url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];      

$urlParts = explode('/', str_ireplace(array('http://', 'https://'), '', $url)); 

//   echo $urlParts[0]; die;
if($urlParts[2] == 'index.php'|| $urlParts[2] == ''){
    $title = 'HOME';
    $metatitle = $title;
    $ogtitle = $title;
    $metadescription = 'home description';
    $metakeyword = 'home keyword';
    $ogdescription = $metadescription;
    $ogimage = "<?=$url?>images/logo.webp";
?>
    <title><?= $title ?></title>
    <meta name="title" content="<?=$title?>">
    <meta name="description" content="<?=$metadescription?>">
    <meta name="keywords" content="<?=$metakeyword?>">

    <meta property="og:title" content="<?=$ogtitle;?>">
    <meta property="og:site_name" content=ECOSYMBIONTS>
    <meta property="og:url" content=<?=$url?>>
    <meta property="og:description" content= "<?=$ogdescription;?>">
    <meta property="og:type" content=website>
    <meta property="og:image" content="<?=$ogimage?>">  

<?php }else if($urlParts[2] == 'synergy-meetings.php'){
    $title = 'synergy-meetings';
    $metatitle = $title;
    $ogtitle = $title;
    $metadescription = 'synergy-meetings description';
    $metakeyword = '';
    $ogdescription = $metadescription;
    $ogimage = "<?=$url?>images/logo.webp";
?>
    <title><?= $title ?></title>
    <meta name="title" content="<?=$title?>">
    <meta name="description" content="<?=$metadescription?>">
    <meta name="keywords" content="<?=$metakeyword?>">

    <meta property="og:title" content="<?=$ogtitle;?>">
    <meta property="og:site_name" content=ECOSYMBIONTS>
    <meta property="og:url" content=<?=$url?>>
    <meta property="og:description" content= "<?=$ogdescription;?>">
    <meta property="og:type" content=website>
    <meta property="og:image" content="<?=$ogimage?>">            

<?php }else if($urlParts[2] == 'in-the-media.php'){
    $title = 'in-the-media';
    $metatitle = $title;
    $ogtitle = $title;
    $metadescription = 'in-the-media description';
    $metakeyword = '';
    $ogdescription = $metadescription;
    $ogimage = "<?=$url?>images/logo.webp";
?>
    <title><?= $title ?></title>
    <meta name="title" content="<?=$title?>">
    <meta name="description" content="<?=$metadescription?>">
    <meta name="keywords" content="<?=$metakeyword?>">

    <meta property="og:title" content="<?=$ogtitle;?>">
    <meta property="og:site_name" content=ECOSYMBIONTS>
    <meta property="og:url" content=<?=$url?>>
    <meta property="og:description" content= "<?=$ogdescription;?>">
    <meta property="og:type" content=website>
    <meta property="og:image" content="<?=$ogimage?>">     

<?php }else if($urlParts[2] == 'contact.php'){
    $title = 'contact';
    $metatitle = $title;
    $ogtitle = $title;
    $metadescription = "contact description";
    $metakeyword = '';
    $ogdescription = $metadescription;
    $ogimage = "<?=$url?>images/logo.webp";
?>
    <title><?= $title ?></title>
    <meta name="title" content="<?=$title?>">
    <meta name="description" content="<?=$metadescription?>">
    <meta name="keywords" content="<?=$metakeyword?>">

    <meta property="og:title" content="<?=$ogtitle;?>">
    <meta property="og:site_name" content=ecoex>
    <meta property="og:url" content=https://ecoex.market/>
    <meta property="og:description" content= "<?=$ogdescription;?>">
    <meta property="og:type" content=website>
    <meta property="og:image" content="<?=$ogimage?>"> 
    <?php  } 

function isActive($page) {
   $current_page = basename($_SERVER['REQUEST_URI'], ".php"); // Get current page name without extension
    return $current_page == $page ? 'active' : '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>ECOSYMBIONTS</title> -->
    <link href="<?=$url?>images/fav.png" rel="icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/audioplayer.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_meeting.css">
</head>
<body>
<header>
        <nav class="navbar header_top navbar-default ">
            <div class="container middle-nav">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=$url?>">
                        <img src="images/logo.webp" alt="" class="img-responsive">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">                        
                        <li><a class="<?= isActive('index') ?>" href="<?=$url?>">About</a></li>
                        <li><a href="<?=$url?>together">Online Platform</a></li>
                        <li><a class="<?= isActive('synergy-meetings') ?>" href="synergy-meetings.php">Synergy Meetings</a></li>                        
                        <li><a class="<?= isActive('in-the-media') ?>" href="in-the-media.php">In the Media</a></li>
                        <li><a class="<?= isActive('contact') ?>" href="contact.php">Contact</a></li>
                        <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                    </ul>
                  </li> -->
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
    </header>
