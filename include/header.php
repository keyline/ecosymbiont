<?php 

// Get the current host
$host = $_SERVER['HTTP_HOST'];

// Set base URL according to the environment
if ($host == 'localhost') {
    // Local environment
    define('BASE_URL', 'http://localhost/ecosymbiont/');
} elseif ($host == 'ecosymbiont.org') {
    // Live environment
    define('BASE_URL', 'https://ecosymbiont.org/');
} elseif ($host == 'ecosymbiont.keylines.in') {
    // Development environment
    define('BASE_URL', 'https://ecosymbiont.keylines.in/');
} else {
    // Default to live as a fallback
    define('BASE_URL', 'https://ecosymbiont.org/');
}

 $url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];      

$urlParts = explode('/', str_ireplace(array('http://', 'https://'), '', $url)); 

//    echo $urlParts[0];
if($urlParts[2] == 'index.php'|| $urlParts[2] == ''){
    $title = 'HOME';
    $metatitle = $title;
    $ogtitle = $title;
    $metadescription = 'home description';
    $metakeyword = 'home keyword';
    $ogdescription = $metadescription;
    $ogimage = BASE_URL."images/logo.webp";
?>
    <title><?= $title ?></title>
    <meta name="title" content="<?=$title?>">
    <meta name="description" content="<?=$metadescription?>">
    <meta name="keywords" content="<?=$metakeyword?>">

    <meta property="og:title" content="<?=$ogtitle;?>">
    <meta property="og:site_name" content=ECOSYMBIONTS>
    <meta property="og:url" content=<?= BASE_URL; ?>>
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
    $ogimage = BASE_URL."images/logo.webp";
?>
    <title><?= $title ?></title>
    <meta name="title" content="<?=$title?>">
    <meta name="description" content="<?=$metadescription?>">
    <meta name="keywords" content="<?=$metakeyword?>">

    <meta property="og:title" content="<?=$ogtitle;?>">
    <meta property="og:site_name" content=ECOSYMBIONTS>
    <meta property="og:url" content=<?= BASE_URL; ?>>
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
    $ogimage = BASE_URL."images/logo.webp";
?>
    <title><?= $title ?></title>
    <meta name="title" content="<?=$title?>">
    <meta name="description" content="<?=$metadescription?>">
    <meta name="keywords" content="<?=$metakeyword?>">

    <meta property="og:title" content="<?=$ogtitle;?>">
    <meta property="og:site_name" content=ECOSYMBIONTS>
    <meta property="og:url" content=<?= BASE_URL; ?>>
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
    $ogimage = BASE_URL."images/logo.webp";
?>
    <title><?= $title ?></title>
    <meta name="title" content="<?=$title?>">
    <meta name="description" content="<?=$metadescription?>">
    <meta name="keywords" content="<?=$metakeyword?>">

    <meta property="og:title" content="<?=$ogtitle;?>">
    <meta property="og:site_name" content=ecoex>
    <meta property="og:url" content=<?= BASE_URL; ?>>
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
    <link href="<?= BASE_URL; ?>images/fav.png" rel="icon">
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
                    <button type="button" class="navbar-toggle innernav_samedesign collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <!-- <span class="icon-bar"></span> -->
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= BASE_URL; ?>">
                        <img src="images/logo.webp" alt="" class="img-responsive">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">                        
                        <li><a class="<?= isActive('index') ?>" href="<?= BASE_URL; ?>">About</a></li>
                        <li><a href="<?= BASE_URL; ?>earth" style="text-transform: none;">EaRTh</a></li>
                        <li><a href="<?= BASE_URL; ?>earth/communities" style="text-transform: none;">COMMUNITIES</a></li>
                        <!-- <li><a class="<?= isActive('synergy-meetings') ?>" href="<?= BASE_URL; ?>synergy-meetings.php">Synergy Meetings</a></li>                         -->
                        <li><a class="<?= isActive('in-the-media') ?>" href="<?= BASE_URL; ?>in-the-media.php">In the Media</a></li>
                        <li><a class="<?= isActive('contact') ?>" href="<?= BASE_URL; ?>contact.php">Contact</a></li>
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
