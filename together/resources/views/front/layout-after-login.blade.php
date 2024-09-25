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
        <!-- block-wrapper-section ================================================== -->
            <section class="block-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-4 sidebar-sticky">
                            <!--sidebar -->
                            <?=$sidebar?>
                        </div>
                        <div class="col-md-10 col-sm-8 content-blocker">
                            <?=$maincontent?>
                        </div>
                    </div>
                </div>
            </section>
        <!-- End block-wrapper-section -->
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
        $(function() {
            $('[data-toggle="tooltip"]').tooltip({
                html: true
            });
        });
    </script>
</body>
</html>