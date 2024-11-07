<!DOCTYPE html>
<html lang="en">
<head>
   <?=$before_head?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
   <div id="stop" class="scrollTop" style="opacity: 0;">
      <span><a href=""><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a></span>
   </div>
   <?php if(session('success_message')): ?>
     <script>
          $(function(){
              Swal.fire({
                  title: 'Success!',
                  text: '<?=session('success_message')?>',
                  icon: 'success',
                  confirmButtonText: 'Ok'
              });
          });
      </script>
   <?php endif; ?>
   <?php if(session('error_message')): ?>
        <script>
          $(function(){
              Swal.fire({
                  title: 'Error!',
                  text: '<?=session('error_message')?>',
                  icon: 'error',
                  confirmButtonText: 'Ok'
              });
          });
      </script>
   <?php endif; ?>
   <?=$before_header?>
   <?=$maincontent?>
   <?=$before_footer?>
   <!------------------js------------->
   <script src="<?=env('FRONT_ASSETS_URL')?>js/jquery-3.6.3.js"></script>
   <script src="<?=env('FRONT_ASSETS_URL')?>js/bootstrap.bundle.min.js"></script>
   <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/stellarnav.min.js"></script>
   <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/slick.min.js"></script>
   <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/owl.carousel.js"></script>
   <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/colorbox.js"></script>
   <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/script.js"></script>
   <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/glightbox.js"></script>
   <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>js/custom.js"></script>
   <script type="text/javascript">
      $(function(){
         $('.autohide').delay(5000).fadeOut('slow');
      })
   </script>
</body>
</html><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/layout-before-login.blade.php ENDPATH**/ ?>