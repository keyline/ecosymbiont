<?php
use App\Models\Unit;
?>
<!doctype html>
<html>
<head>
    <?=$before_head?>
</head>

<body>
    <header>
        <?=$before_header?>
    </header>
    <?=$maincontent?>
    <footer>
        <?=$before_footer?>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <!--<script src="https://code.jquery.com/jquery-3.4.1.js"></script>-->
    <script src="<?=env('FRONT_ASSETS_URL')?>assets/js/jquery.1.11.3.min.js"></script>
    <script src="<?=env('FRONT_ASSETS_URL')?>assets/js/wow.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="<?=env('FRONT_ASSETS_URL')?>assets/js/bootstrap.min.js"></script>
    <script src="<?=env('FRONT_ASSETS_URL')?>assets/js/owl.carousel.js"></script>
    <script src="<?=env('FRONT_ASSETS_URL')?>assets/js/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="<?=env('FRONT_ASSETS_URL')?>assets/js/jquery.counterup.js"></script>
    <script src="<?=env('FRONT_ASSETS_URL')?>assets/js/theme.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="<?=env('FRONT_ASSETS_URL')?>assets/js/stellarnav.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
    <script>
    Fancybox.bind('[data-fancybox="gallery"]', {
        //
    });
    </script>
    <script type="text/javascript">
    $(function() {
        $('.autohide').delay(5000).fadeOut('slow');
    })
    </script>
    <script>
    let digitValidate = function(ele) {
        console.log(ele.value);
        ele.value = ele.value.replace(/[^0-9]/g, '');
    }

    let tabChange = function(val) {
        let ele = document.querySelectorAll('input');
        if (ele[val - 1].value != '') {
            ele[val].focus()
        } else if (ele[val - 1].value == '') {
            ele[val - 2].focus()
        }
    }
    </script>
    <?php
        $minUnitPriceRange      = Unit::select('price')->where('status', '=', 1)->min('price');
        $maxUnitPriceRange      = Unit::select('price')->where('status', '=', 1)->max('price');
        ?>
    <!-- <script>
    $(function() {
        $("#slider-range").slider({
            range: true,
            min: <?=$minUnitPriceRange?>,
            max: <?=$maxUnitPriceRange?>,
            values: [<?=$minUnitPriceRange?>, <?=$maxUnitPriceRange?>],
            slide: function(event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));
    });
    </script> -->
    <script type="text/javascript">
    //price new
    $(document).ready(function() {
        // Triggered when the min or max price inputs change
        $('.price-range-field').on('input', function() {
            updatePriceRange();
        });

        // Triggered when the range slider changes

        $("#slider-range").slider({
            range: true,
            orientation: "horizontal",
            min: <?=$minUnitPriceRange?>,
            max: <?=$maxUnitPriceRange?>,
            values: [<?=$minUnitPriceRange?>, <?=$maxUnitPriceRange?>],
            step: 1,

            slide: function(event, ui) {
                if (ui.values[0] == ui.values[1]) {
                    return false;
                }

                $("#min_price").val(ui.values[0]);
                $("#max_price").val(ui.values[1]);

                // Update the price display
                $('.amount-price').eq(0).text('$' + ui.values[0]);

                $('.amount-price').eq(1).text('$' + ui.values[1]);

                // updatePriceRange();
                updatePriceRange2();
            }
        });
        // $('#slider-range').on('change', function () {
        //     updatePriceRange();
        // });

        function updatePriceRange() {
            // Get the min and max values
            var minPrice = $('#min_price').val();
            var maxPrice = $('#max_price').val();
            var checkedAry = [];
            var ball_type = [];
            var brands = [];

            // Update the price display
            $('.amount-price').eq(0).text('$' + minPrice);
            $('.amount-price').eq(1).text('$' + maxPrice);

            // console.log(minPrice);
            // console.log(maxPrice);

            var property_type   = $("#property_type").val();
            var bathroom        = $("#bathroom").val();
            var pets            = $("#pets").val();
            var couples         = $("#couples").val();
            var smoking         = $("#smoking").val();
            var fenced          = $("#fenced").val();

            var base_url        = '<?=url('/')?>';
            $.ajax({
                type: "POST",
                url: base_url + "/get-filter",
                data: {"_token": "<?php echo e(csrf_token()); ?>", property_type : property_type, bathroom : bathroom, pets : pets, couples : couples, smoking : smoking, fenced : fenced, minPrice : minPrice, maxPrice : maxPrice},
                dataType: "html",
                beforeSend: function () {
                    // $('.preloder').show();
                },
                success: function (res) {
                    $('.preloder').hide();
                    $('#property-list').empty();
                    $('#property-list').html(res);
                }
            });

            // Send AJAX request to Laravel controller

            // $.each($("#product_variations input:checked"), function(index, val) {
            //     //         /* iterate through array or object */
            //     checkedAry.push($(this).attr('option-id'));
            // });
            // $.each($("#brands_chk input:checked"), function(index, val) {
            //     brands.push($(this).val());
            // });
            // $.each($("#ball_type_chk input:checked"), function(index, val) {
            //     ball_type.push($(this).val());
            // });
            // var category_id = $('input[name=category_id]').val();
            // $.ajax({
            //         url: "https://clubmartnew.outsourcingit.asia/category/filterProduct",
            //         type: 'POST',
            //         data: {
            //             option_id: checkedAry,
            //             category_id: category_id,
            //             ball_type: ball_type,
            //             brands: brands,
            //             minPrice: minPrice,
            //             maxPrice: maxPrice,
            //             spc_pro: 0
            //         },
            //     })
            //     .done(function(response) {
            //         $('.set_ajax_product').html(response);
            //     })
            //     .fail(function() {
            //         //
            //     })
            //     .always(function() {
            //         //
            //     });

        }
        function updatePriceRange2() {
            // Get the min and max values
            var minPrice = $('#min_price').val();
            var maxPrice = $('#max_price').val();
            var checkedAry = [];
            var ball_type = [];
            var brands = [];

            // Update the price display
            $('.amount-price').eq(0).text('$' + minPrice);
            $('.amount-price').eq(1).text('$' + maxPrice);

            // console.log(minPrice);
            // console.log(maxPrice);

            var property_type   = $("#property_type").val();
            var bathroom        = $("#bathroom").val();
            var pets            = $("#pets").val();
            var couples         = $("#couples").val();
            var unit_status     = $("#unit_status").val();
            var fenced          = $("#fenced").val();

            var base_url        = '<?=url('/')?>';
            $.ajax({
                type: "POST",
                url: base_url + "/get-unit-filter",
                data: {"_token": "<?php echo e(csrf_token()); ?>", property_type : property_type, bathroom : bathroom, pets : pets, couples : couples, unit_status : unit_status, fenced : fenced, minPrice : minPrice, maxPrice : maxPrice},
                dataType: "html",
                beforeSend: function () {
                    // $('.preloder').show();
                },
                success: function (res) {
                    $('.preloder').hide();
                    $('#property-list').empty();
                    $('#property-list').html(res);
                }
            });

            // Send AJAX request to Laravel controller

            // $.each($("#product_variations input:checked"), function(index, val) {
            //     //         /* iterate through array or object */
            //     checkedAry.push($(this).attr('option-id'));
            // });
            // $.each($("#brands_chk input:checked"), function(index, val) {
            //     brands.push($(this).val());
            // });
            // $.each($("#ball_type_chk input:checked"), function(index, val) {
            //     ball_type.push($(this).val());
            // });
            // var category_id = $('input[name=category_id]').val();
            // $.ajax({
            //         url: "https://clubmartnew.outsourcingit.asia/category/filterProduct",
            //         type: 'POST',
            //         data: {
            //             option_id: checkedAry,
            //             category_id: category_id,
            //             ball_type: ball_type,
            //             brands: brands,
            //             minPrice: minPrice,
            //             maxPrice: maxPrice,
            //             spc_pro: 0
            //         },
            //     })
            //     .done(function(response) {
            //         $('.set_ajax_product').html(response);
            //     })
            //     .fail(function() {
            //         //
            //     })
            //     .always(function() {
            //         //
            //     });

        }
    });
    </script>
</body>

</html><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/layout-before-login.blade.php ENDPATH**/ ?>