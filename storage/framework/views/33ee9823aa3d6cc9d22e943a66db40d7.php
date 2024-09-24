<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
  <head>
    <?=$after_head?>
  </head>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
      <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <?=$after_sidebar?>
        </aside>
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
            <?=$after_header?>
          </nav>
          <!-- / Navbar -->
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <?=$maincontent?>
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <?=$after_footer?>
            </footer>
            <!-- / Footer -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?=env('FRONT_THEME_ASSETS_URL')?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?=env('FRONT_THEME_ASSETS_URL')?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?=env('FRONT_THEME_ASSETS_URL')?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?=env('FRONT_THEME_ASSETS_URL')?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=env('FRONT_THEME_ASSETS_URL')?>assets/vendor/js/menu.js"></script>
    <!-- endbuild -->
    <!-- Vendors JS -->
    <!-- Main JS -->
    <script src="<?=env('FRONT_THEME_ASSETS_URL')?>assets/js/main.js"></script>
    <!-- Page JS -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <!-- <script async defer src="<?=env('FRONT_THEME_ASSETS_URL')?>buttons.github.io/buttons.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
      $('input[name="garage"]').click(function() {
         if($('input[name="garage"]:checked').val() == 0) {
             $("#garage_value").hide();
         } else {
             $("#garage_value").show();
         }
      });
      $('input[name="basement"]').click(function() {
         if($('input[name="basement"]:checked').val() == 0) {
             $("#basement_value").hide();
         } else {
             $("#basement_value").show();
         }
      });
      $('input[name="hoa"]').click(function() {
         if($('input[name="hoa"]:checked').val() == 0) {
             $("#hoa_value").hide();
         } else {
             $("#hoa_value").show();
         }
      });
    </script>
  </body>
</html><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/layout-after-login.blade.php ENDPATH**/ ?>