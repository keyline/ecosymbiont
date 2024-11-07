<!DOCTYPE html>
<html lang="en">
<head>
    <?=$before_head?>
</head>
<body id="font-size">
    <header>
        <?=$before_header?>
    </header>
    <div class="main">
        <?=$maincontent?>
    </div>    
        
    <!-- footer section -->
    <?=$before_footer?>
    
    <!-- js link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
   <script src="<?=env('FRONT_ASSETS_URL')?>js/menumaker.js"></script>
    <script src="<?=env('FRONT_ASSETS_URL')?>js/fontsize.min.js"></script>
    <script>
        function iconChange() {
        var element = document.getElementById("mobile-icon");
        element.classList.toggle("fa-times");
        }
    </script>
    <script>
        $('#font-size').FontSize({
            increaseTimes: 5,
            reduceTimes: 5,
            step: 3,
            increaseBtn:'.zoomin',
            reduceBtn:'.zoomout'
        });
      $(document).ready(function() {
         $(".fa-search").click(function() {
            $(".togglesearch").toggle();
            $("input[type='search']").focus();
          });
      });
      $("#cssmenu").menumaker({
        title: "", // The text of the button which toggles the menu
        breakpoint: 1199, // The breakpoint for switching to the mobile view
        format: "multitoggle" // It takes three values: dropdown for a simple toggle menu, select for select list menu, multitoggle for a menu where each submenu can be toggled separately
    });
      
      
      $(".topsearch-icon").click(function () {
            $(".topsearch-icon").toggleClass("fa-bars fa-times");
        });
    </script>
</body>
</html><?php /**PATH /home/keyline1/public_html/ecosymbiont.keylines.net.in/resources/views/front/layout-before-login.blade.php ENDPATH**/ ?>