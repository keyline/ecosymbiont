<!-- block-wrapper-section ================================================== -->
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 content-blocker">
                @if(session('success_message'))
                    <div class="alert alert-success bg-success text-dark border-0 alert-dismissible show mt-3" role="alert">
                        {{ session('success_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                @if(session('error_message'))
                    <div class="alert alert-danger bg-danger text-dark border-0 alert-dismissible show mt-3" role="alert">
                        {{ session('error_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                <!-- block content -->
                <div class="block-content">
                    <div class="article-box">
                        <!-- Left Info -->
                        <div class="col-lg-7 fade-in">
                            <div class="donation-box donation-left">
                                <div class="titleto-inner mb-3">
                                    <h2 class="mt-0">Give Today — Because We Need Real Solutions for People and Planet Now</h2>
                                </div>
                                <p>The Śramani Institute works with impoverished, marginalized communities in degraded ecologies around the world to help them become EcoResilient, ensuring both human and ecological health and wellbeing. Your donation (tax-exempt in the USA and in India) helps us ensure a sustainable future for people and planet.</p>
                                <p>If you are interested in making a large donation, please contact us, so that we can minimize transaction fees.</p>
                                <p>Give today!</p>
                                <div class="custom-alert d-flex align-items-start">
                                    <strong class="font15" style="font-family: 'proximanova_regular', sans-serif;">Give today, so we can amplify the voices of more grassroots changemakers through EaRTh!</strong>
                                </div>

                                {{-- Donation type selector --}}
                                <div class="donation-type-selector mt-4">
                                    <div class="titleto-inner mb-3">
                                        <h2 class="mt-0">Select Donation Type</h2>
                                    </div>
                                    <div class="donation-type-options">
                                        <div class="form-check donation-type-option mb-2">
                                            <input class="form-check-input" type="radio" name="donation_type" id="donate_inr" value="inr">
                                            <label class="form-check-label" for="donate_inr">
                                                I am an Indian citizen and wish to donate in Indian Rupees (INR).
                                            </label>
                                        </div>
                                        <div class="form-check donation-type-option">
                                            <input class="form-check-input" type="radio" name="donation_type" id="donate_usd" value="usd">
                                            <label class="form-check-label" for="donate_usd">
                                                I am NOT an Indian citizen and wish to donate in a currency other than INR.
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Right Form -->
                        <div class="col-lg-5 fade-in">

                            {{-- INR Donation Form --}}
                            <div id="inr_form_wrapper" style="display:none;">
                                <form class="mb-4" id="inr_donation_form" action="" method="POST">
                                    @csrf
                                    <input type="hidden" name="payment_mode" value="INR">
                                    <div class="donation-box">
                                        <div class="titleto-inner mb-3">
                                            <h2 class="mt-0">1. Donor Information</h2>
                                        </div>

                                        {{-- Are you an Indian Citizen? --}}
                                        <div class="form-group mb-3">
                                            <label class="donor-label">Are you an Indian Citizen?</label>
                                            <div class="d-flex mt-1">
                                                <div class="form-check mr-4">
                                                    <input class="form-check-input" type="radio" name="is_indian_citizen" id="citizen_yes" value="yes" required>
                                                    <label class="form-check-label" for="citizen_yes">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_indian_citizen" id="citizen_no" value="no">
                                                    <label class="form-check-label" for="citizen_no">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Are you donating in INR? --}}
                                        <div class="form-group mb-3">
                                            <label class="donor-label">Are you donating in Indian Rupees (INR)?</label>
                                            <div class="d-flex mt-1">
                                                <div class="form-check mr-4">
                                                    <input class="form-check-input" type="radio" name="is_donating_inr" id="inr_yes" value="yes" required>
                                                    <label class="form-check-label" for="inr_yes">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_donating_inr" id="inr_no" value="no">
                                                    <label class="form-check-label" for="inr_no">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="inr_fields_wrapper">
                                        <input type="text" class="form-control mb-3" placeholder="Full legal name" name="full_legal_name" required>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="PAN Number" name="pan_number" id="pan_number" oninput="validatePAN(this)" required>
                                            <small id="pan_error" class="text-danger mt-1" style="display:none;">Invalid PAN. Format: AAAAA9999A (5 letters, 4 digits, 1 letter).</small>
                                        </div>
                                        <input type="text" class="form-control mb-3" placeholder="Residential address" name="address" required>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" placeholder="E-mail address" name="email" id="inr_email" oninput="validateEmail(this)" required>
                                            <small id="email_error" class="text-danger mt-1" style="display:none;">Please enter a valid email address.</small>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Mobile Number (e.g. 9876543210)" name="mobile_number" id="mobile_number" oninput="validateMobile(this)" maxlength="10" required>
                                            <small id="mobile_error" class="text-danger mt-1" style="display:none;">Enter a valid 10-digit Indian mobile number starting with 6, 7, 8, or 9.</small>
                                        </div>
                                        <input type="text" class="form-control mb-3" placeholder="Donor bank name" name="bank_name" required>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Donor bank account number" name="bank_account_number" id="bank_account_number" oninput="validateBankAccount(this)" required>
                                            <small id="bank_error" class="text-danger mt-1" style="display:none;">Bank account number must contain only digits.</small>
                                        </div>

                                        {{-- Donation Amount --}}
                                        <div class="titleto-inner mb-3">
                                            <h2>2. Donation Amount</h2>
                                        </div>
                                        <div class="donation-amounts d-flex flex-wrap mb-3 justify-content-start">
                                            <ul class="d-flex flex-wrap list-unstyled mt-2 justify-content-start">
                                                <li>
                                                    <button type="button" class="btn btn-outline-secondary inr-amount-btn" onclick="calculateINRPayableAmount(1000);">₹1,000</button>
                                                </li>
                                                <li>
                                                    <button type="button" class="btn btn-outline-secondary inr-amount-btn" onclick="calculateINRPayableAmount(2500);">₹2,500</button>
                                                </li>
                                                <li>
                                                    <button type="button" class="btn btn-outline-secondary inr-amount-btn" onclick="calculateINRPayableAmount(5000);">₹5,000</button>
                                                </li>
                                                <li>
                                                    <button type="button" class="btn btn-outline-secondary inr-amount-btn" onclick="calculateINRPayableAmount(10000);">₹10,000</button>
                                                </li>
                                                <li>
                                                    <button type="button" class="btn btn-outline-secondary inr-amount-btn" onclick="calculateINRPayableAmount(20000);">₹20,000</button>
                                                </li>
                                            </ul>
                                            <div style="width:100%;">
                                                <input type="text" class="form-control donation_abovesame mt-2 w-50" placeholder="Minimum donation INR 500" id="inr_custom_amount" oninput="calculateINRPayableAmount(this.value);" onblur="validateINRMinimum(this);">
                                                <small id="inr_amount_error" class="text-danger mt-1" style="display:none;">Minimum donation amount is ₹500. Please enter a valid amount.</small>
                                            </div>
                                        </div>

                                        <input type="hidden" name="base_amount" id="inr_base_amount" value="0">
                                        <input type="hidden" name="payable_amount" id="inr_payable_amount" value="0">
                                        <h3 class="payable_amount">Amount Payable: INR <span id="inr_payable_amount_text">0</span></h3>

                                        <div class="mt-4">
                                            <button type="submit" class="btn mt-4 donation_btn">Next</button>
                                        </div>
                                        </div>{{-- end #inr_fields_wrapper --}}
                                    </div>
                                </form>
                            </div>

                            {{-- USD / Non-INR Donation Form --}}
                            <div id="usd_form_wrapper" style="display:none;">
                                <form class="mb-4" id="usd_donation_form" action="" method="POST">
                                    @csrf
                                    <input type="hidden" name="payment_mode" id="payment_mode" value="PAYPAL">
                                    <div class="donation-box">
                                        <div class="titleto-inner mb-3">
                                            <h2 class="mt-0">1. Donor Information*</h2>
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
                                        <input type="text" class="form-control mb-3" placeholder="Residential Address" name="address" required>
                                        <select name="country" id="country" class="form-control mb-3">
                                            <option value="" selected>Select Country</option>
                                            <?php if($countries){ foreach($countries as $country){?>
                                                <option value="<?=$country->id?>"><?=$country->name?></option>
                                            <?php } }?>
                                        </select>
                                        <small class="text-danger">*You will be able to download the donation receipt for tax exemption in the United States; therefore, please provide an accurate residential address.</small>

                                        <div class="titleto-inner mb-3 mt-3">
                                            <h2>2. Donation Amount</h2>
                                        </div>
                                        <div class="donation-amounts d-flex flex-wrap mb-3 justify-content-start">
                                            <ul class="d-flex flex-wrap list-unstyled mt-2 justify-content-start">
                                                <li>
                                                    <button type="button" class="btn btn-outline-secondary" onclick="calculatePayableAmount(25);">$25</button>
                                                </li>
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
                                                    <button type="button" class="btn btn-outline-secondary" onclick="calculatePayableAmount(500);">$500</button>
                                                </li>
                                            </ul>
                                            <div style="width: 100%;"><input type="text" class="form-control donation_abovesame mt-2 w-50" placeholder="Minimum donation USD 10" id="custom_amount" oninput="calculatePayableAmount(this.value);"></div>
                                        </div>
                                        <div class="form-check mb-4 label_checkbox">
                                            <input class="form-check-input" type="checkbox" id="coverFee">
                                            <label class="form-check-label" for="coverFee">I'd like to help cover the transaction fees.</label>
                                        </div>
                                        <input type="hidden" name="base_amount" id="base_amount" value="0" required>
                                        <input type="hidden" name="payable_amount" id="payable_amount" value="0" required>
                                        <h3 class="payable_amount">Amount Payable: USD <span id="payable_amount_text">0</span></h3>
                                        <div class="mt-4">
                                            <button type="submit" class="btn mt-4 donation_btn">Next</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End block content -->
            </div>
        </div>
    </div>
</section>
<!-- End block-wrapper-section -->
{{-- INR Eligibility Warning Modal --}}
<div class="modal fade" id="inrEligibilityModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#8b1a1a;">
                <h5 class="modal-title" style="color:#fff;">Please Choose Donation Type Properly</h5>
            </div>
            <div class="modal-body text-center py-4">
                <div style="font-size:40px; color:#8b1a1a; margin-bottom:12px;">&#9888;</div>
                <p style="font-size:15px; margin-bottom:8px;">The <strong>INR donation form</strong> is only for <strong>Indian citizens donating in Indian Rupees</strong>.</p>
                <p style="font-size:14px; color:#555;">If you are not an Indian citizen or wish to donate in a currency other than INR, please go back and select the other donation type.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="inr_eligibility_back_btn">Go Back & Choose Again</button>
            </div>
        </div>
    </div>
</div>

{{-- Data Preview Modal --}}
{{-- <div class="modal fade" id="donationPreviewModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Review Your Donation Details</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <pre id="donation_preview_data" style="background:#f8f9fa;padding:15px;border-radius:4px;font-size:13px;"></pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Edit</button>
                <button type="button" class="btn donation_btn" id="confirm_submit_btn">Confirm & Submit</button>
            </div>
        </div>
    </div>
</div> --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">

    // PAN: format AAAAA9999A
    function validatePAN(input) {
        var val = input.value.toUpperCase();
        input.value = val;
        var pan_regex = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
        if (val.length === 0) {
            $('#pan_error').hide();
            $(input).removeClass('is-invalid is-valid');
        } else if (pan_regex.test(val)) {
            $('#pan_error').hide();
            $(input).removeClass('is-invalid').addClass('is-valid');
        } else {
            $('#pan_error').show();
            $(input).removeClass('is-valid').addClass('is-invalid');
        }
    }

    // Email validation
    function validateEmail(input) {
        var val = input.value.trim();
        var email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (val.length === 0) {
            $('#email_error').hide();
            $(input).removeClass('is-invalid is-valid');
        } else if (email_regex.test(val)) {
            $('#email_error').hide();
            $(input).removeClass('is-invalid').addClass('is-valid');
        } else {
            $('#email_error').show();
            $(input).removeClass('is-valid').addClass('is-invalid');
        }
    }

    // Mobile: exactly 10 digits, must start with 6, 7, 8, or 9 (Indian numbers)
    function validateMobile(input) {
        input.value = input.value.replace(/[^0-9]/g, '');
        var val = input.value;
        if (val.length === 0) {
            $('#mobile_error').hide();
            $(input).removeClass('is-invalid is-valid');
        } else if (/^[6-9][0-9]{9}$/.test(val)) {
            $('#mobile_error').hide();
            $(input).removeClass('is-invalid').addClass('is-valid');
        } else {
            $('#mobile_error').show();
            $(input).removeClass('is-valid').addClass('is-invalid');
        }
    }

    // Bank account: digits only
    function validateBankAccount(input) {
        input.value = input.value.replace(/[^0-9]/g, '');
        var val = input.value;
        if (val.length === 0) {
            $('#bank_error').hide();
            $(input).removeClass('is-invalid is-valid');
        } else if (/^[0-9]+$/.test(val)) {
            $('#bank_error').hide();
            $(input).removeClass('is-invalid').addClass('is-valid');
        } else {
            $('#bank_error').show();
            $(input).removeClass('is-valid').addClass('is-invalid');
        }
    }

    // Toggle forms based on donation type selection
    $('input[name="donation_type"]').on('change', function () {
        if ($(this).val() === 'inr') {
            $('#inr_form_wrapper').show();
            $('#usd_form_wrapper').hide();
        } else {
            $('#usd_form_wrapper').show();
            $('#inr_form_wrapper').hide();
        }
    });

    // INR minimum validation on blur — resets field if below 500
    function validateINRMinimum(input) {
        var amount = parseFloat(input.value);
        if (!isNaN(amount) && amount > 0 && amount < 500) {
            $('#inr_amount_error').show();
            $(input).val('');
            $('#inr_payable_amount_text').text('0');
            $('#inr_base_amount').val(0);
            $('#inr_payable_amount').val(0);
        }
    }

    // INR amount calculation
    function calculateINRPayableAmount(valam) {
        var amount = parseFloat(valam);
        if (isNaN(amount) || amount === 0 || valam === '') {
            $('#inr_amount_error').hide();
            $('#inr_payable_amount_text').text('0');
            $('#inr_base_amount').val(0);
            $('#inr_payable_amount').val(0);
            return;
        }
        if (amount < 500) {
            $('#inr_amount_error').show();
            $('#inr_payable_amount_text').text('0');
            $('#inr_base_amount').val(0);
            $('#inr_payable_amount').val(0);
            return;
        }
        $('#inr_amount_error').hide();
        $('#inr_base_amount').val(amount);
        $('#inr_payable_amount').val(amount);
        $('#inr_payable_amount_text').text(convertINRNumber(amount));

        // Highlight active button
        $('.inr-amount-btn').removeClass('active');
        $('.inr-amount-btn').each(function () {
            if ($(this).text().replace(/[₹,]/g, '') == amount) {
                $(this).addClass('active');
            }
        });
    }

    // USD amount calculation
    function calculatePayableAmount(valam){
        var base_amount = parseFloat(valam);
        var country     = $('#country').val();
        if (isNaN(base_amount)) return;
        if($('#coverFee').is(':checked')){
            if(country == 220){
                var payable_amount = base_amount + ((base_amount * 1.99) / 100) + 0.49;
            } else {
                var payable_amount = base_amount + ((base_amount * 3.49) / 100) + 0.49;
            }
        } else {
            var payable_amount = base_amount;
        }
        $('#base_amount').val(base_amount);
        $('#payable_amount').val(payable_amount);
        $('#payable_amount_text').text(convertNumber(payable_amount));
    }

    $(function(){
        $('#coverFee, #country').on('change', function () {
            var country     = $('#country').val();
            var base_amount = parseFloat($('#base_amount').val());
            if (isNaN(base_amount)) return;
            if($('#coverFee').is(':checked')){
                if(country == 220){
                    var payable_amount = base_amount + ((base_amount * 1.99) / 100) + 0.49;
                } else {
                    var payable_amount = base_amount + ((base_amount * 3.49) / 100) + 0.49;
                }
            } else {
                var payable_amount = base_amount;
            }
            $('#base_amount').val(base_amount);
            $('#payable_amount').val(payable_amount);
            $('#payable_amount_text').text(convertNumber(payable_amount));
        });
    });

    function convertNumber(number){
        return new Intl.NumberFormat('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(number);
    }

    function convertINRNumber(number){
        return new Intl.NumberFormat('en-IN', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(number);
    }

    // INR eligibility check — hide fields and show popup if either answer is "No"
    function checkINReligibility() {
        var citizen = $('input[name="is_indian_citizen"]:checked').val();
        var inr     = $('input[name="is_donating_inr"]:checked').val();

        // Only trigger if at least one has been answered
        if (!citizen && !inr) return;

        if (citizen === 'no' || inr === 'no') {
            $('#inr_fields_wrapper').hide();
            $('#inr_fields_wrapper').find('input, select, textarea').prop('required', false);
            $('#inrEligibilityModal').modal('show');
        } else if (citizen === 'yes' && inr === 'yes') {
            $('#inr_fields_wrapper').show();
            $('#inr_fields_wrapper').find('input[type="text"], input[type="email"]').prop('required', true);
        }
    }

    $('input[name="is_indian_citizen"], input[name="is_donating_inr"]').on('change', checkINReligibility);

    $('#inr_eligibility_back_btn').on('click', function () {
        $('input[name="is_indian_citizen"]').prop('checked', false);
        $('input[name="is_donating_inr"]').prop('checked', false);
        $('input[name="donation_type"]').prop('checked', false);
        $('#inr_form_wrapper').hide();
        $('#usd_form_wrapper').hide();
    });

    // var $activeForm = null;

    // function collectFormData($form) {
    //     var data = {};
    //     $form.find('[name]').each(function () {
    //         var name = $(this).attr('name');
    //         if (name === '_token') return;
    //         var type = $(this).attr('type');
    //         if ((type === 'radio' || type === 'checkbox') && !$(this).is(':checked')) return;
    //         data[name] = $(this).val();
    //     });
    //     return data;
    // }

    // function formatDataAsArray(data) {
    //     var lines = ['Array('];
    //     $.each(data, function (key, value) {
    //         lines.push('    [' + key + '] => ' + (value === '' ? '(empty)' : value));
    //     });
    //     lines.push(')');
    //     return lines.join('\n');
    // }

    // $('#inr_donation_form, #usd_donation_form').on('submit', function (e) {
    //     e.preventDefault();
    //     $activeForm = $(this);
    //     var data = collectFormData($activeForm);
    //     $('#donation_preview_data').text(formatDataAsArray(data));
    //     $('#donationPreviewModal').modal('show');
    // });

    // $('#confirm_submit_btn').on('click', function () {
    //     $('#donationPreviewModal').modal('hide');
    //     if ($activeForm) {
    //         $activeForm.off('submit').submit();
    //     }
    // });
</script>

<style>
    .donation-type-selector {
        border-top: 1px solid #e5e5e5;
        padding-top: 20px;
    }
    .donation-type-option label {
        cursor: pointer;
        font-size: 15px;
        font-family: 'proximanova_regular', sans-serif;
        line-height: 1.5;
    }
    .donor-label {
        font-weight: 600;
        font-size: 14px;
        color: #333;
        margin-bottom: 4px;
        display: block;
    }
    .inr-amount-btn.active {
        background-color: #8b1a1a;
        color: #fff;
        border-color: #8b1a1a;
    }
    .mr-4 { margin-right: 1.5rem; }
</style>