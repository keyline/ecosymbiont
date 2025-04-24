<!-- block-wrapper-section ================================================== -->
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 content-blocker">
                <!-- block content -->
                <div class="block-content">
                    <div class="article-box">
                        <!-- Left Info -->
                        <div class="col-lg-5 fade-in">
                            <div class="donation-box donation-left">
                                <div class="titleto-inner mb-3">
                                    <h2>Support us to make better World</h2>
                                </div>
                                <p>Your contribution empowers ecological justice, human rights, and sustainable futures. Your support helps us:</p>
                                <ul>
                                    <li>Advance environmental initiatives</li>
                                    <li>Support ecological justice</li>
                                    <li>Provide free resources and programs</li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci et quo quas consectetur. Maiores voluptatum laborum quam, quis ut ab aut ad harum perspiciatis voluptatibus eos illum voluptas cupiditate, laudantium optio voluptate repellat dignissimos hic! Corporis ipsa fuga iusto, dicta eum minus error, facere rerum cumque hic cupiditate, asperiores ut.</p>
                                <div class="custom-alert d-flex align-items-start">
                                    <p>Give today and your gift will be matched $2:$1 by the Earthjustice Board of Trustees. Or start a monthly gift today and your donation will be matched $3:$1 for the next 12 months!</p>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci et quo quas consectetur. Maiores voluptatum laborum quam, quis ut ab aut ad harum perspiciatis voluptatibus eos illum voluptas cupiditate, laudantium optio voluptate repellat dignissimos hic! Corporis ipsa fuga iusto, dicta eum minus error, facere rerum cumque hic cupiditate, asperiores ut.</p>
                            </div>
                        </div>
                        <!-- Right Form -->
                        <div class="col-lg-7 fade-in">
                            <form class="mb-4" action="" method="POST">
                                @csrf
                                <input type="hidden" name="payment_mode" id="payment_mode" value="PAYPAL">
                                <div class="donation-box">
                                    <!-- 2. Donor Info -->
                                    <div class="titleto-inner mb-3">
                                        <h2>1. Donor Information</h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control" placeholder="First Name" name="first_name" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" required>
                                        </div>
                                    </div>
                                    <input type="email" class="form-control mb-3" placeholder="Email Address" name="email" required>
                                    <input type="text" class="form-control mb-3" placeholder="Residential  Address" name="address" required>
                                    <select name="country" id="country" class="form-control mb-3">
                                        <option value="" selected>Select Country</option>
                                        <?php if($countries){ foreach($countries as $country){?>
                                            <option value="<?=$country->id?>"><?=$country->name?></option>
                                        <?php } }?>
                                    </select>
                                    <small class="text-danger">*You will be able to download the donation receipt for tax exemption in the United State; therefore, please provide accurate residential address.</small>
                                    <!-- 1. Donation Amount -->
                                    <div class="titleto-inner mb-3">
                                        <h2>2. Donation Amount</h2>
                                    </div>
                                    <div class="donation-amounts d-flex flex-wrap mb-3">
                                        <ul class="d-flex flex-wrap list-unstyled mt-2">
                                            <li>
                                                <button type="button" class="btn btn-outline-secondary" onclick="calculatePayableAmount(50);">$50</button>
                                            </li>
                                            <li>
                                                <button type="button" class="btn btn-outline-secondary" onclick="calculatePayableAmount(100);">$100</button>
                                            </li>
                                            <li>
                                                <button type="button" class="btn btn-outline-secondary" onclick="calculatePayableAmount(250);">$250</button>
                                            </li>
                                            <li>
                                                <button type="button" class="btn btn-outline-secondary" onclick="calculatePayableAmount(1000);">$1000</button>
                                            </li>
                                        </ul>
                                        <input type="text" class="form-control mt-2 w-50" placeholder="Other" id="custom_amount" oninput="calculatePayableAmount(this.value);">
                                    </div>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="coverFee">
                                        <label class="form-check-label" for="coverFee">I'd like to help cover the transaction fees.</label>
                                    </div>
                                    <!-- 3. Payment Method -->
                                    <!-- <div class="titleto-inner mb-3">
                                        <h2>3. Select Payment Method</h2>
                                        </div>
                                        <div class="payment-method">
                                        <button class="btn btn-outline-info"><img src="<?=env('UPLOADS_URL').'paypal.png'?>" alt="" class="img-fluid"></button>
                                        </div> -->
                                    <input type="text" name="base_amount" id="base_amount" value="0" required>
                                    <input type="text" name="payable_amount" id="payable_amount" value="0" required>
                                    <h2>Payable Amount : <span id="payable_amount_text">0</span></h2>
                                    <div class="mt-4">
                                        <button type="submit" class="btn mt-4 donation_btn">Preview For Donation</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End block content -->
            </div>
        </div>
    </div>
</section>
<!-- End block-wrapper-section -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    function calculatePayableAmount(valam){
        var base_amount     = parseFloat(valam);
        var country         = $('#country').val();
        $('#base_amount').val(convertNumber(base_amount));
        if(this.checked){
            if(country == 220){
                payable_amount = base_amount + ((base_amount * 1.99) / 100) + 0.49;
            } else {
                payable_amount = base_amount + ((base_amount * 3.49) / 100) + 0.49;
            }
            $('#base_amount').val(convertNumber(base_amount));
            $('#payable_amount').val(convertNumber(payable_amount));
            $('#payable_amount_text').text(convertNumber(payable_amount));
        } else {
            $('#base_amount').val(convertNumber(base_amount));
            $('#payable_amount').val(convertNumber(base_amount));
            $('#payable_amount_text').text(convertNumber(base_amount));
        }
    }
    $(function(){
        $('#coverFee, #country').on('change', function () {
            var country         = $('#country').val();
            var base_amount     = parseFloat($('#base_amount').val());
            if(this.checked){
                if(country == 220){
                    var payable_amount = base_amount + ((base_amount * 1.99) / 100) + 0.49;
                } else {
                    var payable_amount = base_amount + ((base_amount * 3.49) / 100) + 0.49;
                }
                $('#base_amount').val(convertNumber(base_amount));
                $('#payable_amount').val(convertNumber(payable_amount));
                $('#payable_amount_text').text(convertNumber(payable_amount));
            } else {
                $('#base_amount').val(convertNumber(base_amount));
                $('#payable_amount').val(convertNumber(base_amount));
                $('#payable_amount_text').text(convertNumber(base_amount));
            }
        });
    });
    function convertNumber(number){
        let formatted = new Intl.NumberFormat('en-US', { 
            minimumFractionDigits: 2, 
            maximumFractionDigits: 2 
        }).format(number);
        return formatted;
    }
</script>