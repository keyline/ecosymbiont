<!doctype html>
<html lang="en" class="no-js">
<head>
    <?=$head?>
</head>
<body>
    <!-- Container -->
    <div id="container">
        <!-- Header ================================================== -->
        <header class="clearfix">
            <?=$header?>
        </header>
        <!-- End Header -->
        <?=$maincontent?>
        <!-- footer 
            ================================================== -->
        <footer>
            <?=$footer?>
        </footer>
        <!-- End footer -->
    </div>
    <!-- End Container -->
    
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/jquery.migrate.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/jquery.ticker.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/jquery.imagesloaded.min.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/theia-sticky-sidebar.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/sticky.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/retina-1.1.0.min.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/script.js"></script>
    <script type="text/javascript">
        $(function(){
          $('.autohide').delay(5000).fadeOut('slow');
        })
    </script>
</body>
</html><?php /**PATH G:\xampp8.2\htdocs\ecosymbiont\resources\views/front/layout-before-login.blade.php ENDPATH**/ ?>