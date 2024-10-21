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
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/menumaker.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/retina-1.1.0.min.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/script.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/multiselect-dropdown.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/audioplayer.js"></script>
    <script>
        $(function() {
        $('audio').audioPlayer();
        });
    </script>
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
    <script type="text/javascript">
        $("#cssmenu").menumaker({
            title: "",              // The text of the button which toggles the menu
            breakpoint: 767,			// The breakpoint for switching to the mobile view
            format: "multitoggle"       // It takes three values: dropdown for a simple toggle menu, select for select list menu, multitoggle for a menu where each submenu can be toggled separately
        });
    </script>
</body>
</html>