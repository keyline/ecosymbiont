<?php
use App\Models\Country;
?>
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
                            <div class="donation-box">
                                <?php if($donation){?>
                                    <table class="table table-striped">
                                        <tr>
                                            <td style="font-weight: bold;">Name</td>
                                            <td>:</td>
                                            <td><?=$donation->first_name . ' ' . $donation->last_name?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Email</td>
                                            <td>:</td>
                                            <td><?=$donation->email?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Address</td>
                                            <td>:</td>
                                            <td><?=$donation->address?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Country</td>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                $getCountry         = Country::select('name', 'ISO')->where('id', $donation->country)->first();
                                                echo (($getCountry)?$getCountry->name . ' (' . $getCountry->ISO . ')':'');
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Payment Method</td>
                                            <td>:</td>
                                            <td><?=$donation->payment_mode?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Payable Amount</td>
                                            <td>:</td>
                                            <td><?=number_format($donation->payable_amount,2)?></td>
                                        </tr>
                                    </table>
                                    <div class="mt-4">
                                        <button type="submit" class="btn mt-4 donation_btn" style="display: flex;margin: 0 auto;">Pay Now $<?=number_format($donation->payable_amount,2)?></button>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End block content -->
            </div>
        </div>
    </div>
</section>