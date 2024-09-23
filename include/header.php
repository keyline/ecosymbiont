<?php 
// echo  $current_page = $_SERVER['REQUEST_URI']; die;
$base_url = "https://ecosymbiont.keylines.net.in/";
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
    <title>ECOSYMBIONTS</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_meeting.css">
</head>
<body>
<header>
        <nav class="navbar navbar-default navbar-fixed-top">
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
                    <a class="navbar-brand" href="#">
                        <img src="images/logo.webp" alt="" class="img-responsive">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">                        
                        <li><a class="<?= isActive('index') ?>" href="#">About</a></li>
                        <li><a href="<?=$base_url?>/together">ERT</a></li>
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
</body>
</html>