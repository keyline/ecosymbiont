<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="#"><img src="images/logo.webp" alt="" class="img-responsive"></a></li>
                    <li><a href="#" class="footer_btn">Press Release</a></li>
                    <li><a href="#" class="footer_btn_2">Online Platform</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- js link -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $('.panel-title > a').click(function() {
    $(this).parents('.panel-default').find('i').toggleClass('fa-plus fa-minus');
    $(this).parents('.panel-default').siblings('.panel-default').find('i').removeClass('fa-minus').addClass('fa-plus')

    });        
</script>
</body>
</html>