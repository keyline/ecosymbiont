<?php
use App\Models\Country;
use App\Helpers\Helper;
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
                                    <h2 class="mt-0">Give Today — Because We Need Real Solutions for People and Planet Now</h2>
                                </div>
                                <p>EaRTh is the only professionally edited (ad-free) global platform for grassroots changemakers (humans, communities, movements) everywhere in the world to share knowledge and build community, without censorship or gatekeeping (financially or content-wise).</p>
                                <p>EaRTh Creators (authors) include Elders, ecologists, activists, Indigenous peoples, frontline communities, artists, conservationists, reformers, thinkers, musicians, healers, and storytellers, who are <strong>innovating and implementing sustainable solutions for our planet, which includes us humans.</strong></p>
                                <p>Your support helps us:</p>
                                <ul>
                                    <li>Ensure anyone who cares about people and planet can be heard without paying</li>
                                    <li>Continue improving EaRTh for authors and readers/viewers</li>
                                    <li>Maintain the high quality of the Creative-Works published on EaRTh</li>
                                </ul>
                                
                                <div class="custom-alert d-flex align-items-start">
                                    <strong class="font15">Give today, so we can amplify the voices of more grassroots changemakers through EaRTh!</strong>
                                </div>
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
                                            <td>$<?=number_format($donation->payable_amount,2)?></td>
                                        </tr>
                                    </table>
                                    <div class="mt-4">
                                        <!-- <button type="submit" class="btn mt-4 donation_btn" style="display: flex;margin: 0 auto;">Pay Now $<?=number_format($donation->payable_amount,2)?></button> -->
                                        <a href="<?=url('paypal/payment/'.Helper::encoded($donation->id))?>" class="btn mt-4 donation_btn" style="display: flex;margin: 0 auto;justify-content: center;">Pay now: USD <?=number_format($donation->payable_amount,2)?></a>
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