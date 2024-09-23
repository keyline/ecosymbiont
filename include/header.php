<?php echo $current_url = url()->current(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOSYMBIONTS</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
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
                        <li><a class="<?= $current_url == url('/') ? 'active' : '' ?>" href="<?= url('/') ?>">About</a></li>
                        <li><a href="<?= url() ?>./together">Ecosymbionts Regenerate Together</a></li>
                        <li><a class="<?= $current_url == url('synergy-meetings') ? 'active' : '' ?>" href="<?= url('synergy-meetings') ?>">Synergy Meeting</a></li>                        
                        <li><a class="<?= $current_url == url('in-the-media') ? 'active' : '' ?>" href="<?= url('in-the-media') ?>">In the Media</a></li>
                        <li><a class="<?= $current_url == url('contact') ? 'active' : '' ?>" href="<?= url('contact') ?>">Contact</a></li>
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