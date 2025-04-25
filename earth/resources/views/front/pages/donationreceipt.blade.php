<?php
use App\Models\Country;
use App\Models\GeneralSetting;
use App\Models\EmailLog;
use App\Models\Donation;
use App\Helpers\Helper;
$generalSetting             = GeneralSetting::find('1');
$getcountry                 = Country::find($donation->country);
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <title>Donation-Receipt</title>
    <!-- Favicons -->
    <!-- <link href="<?=env('UPLOADS_URL').$generalSetting->site_favicon?>" rel="icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/bootstrap.min.css" media="screen"> 
    <link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/jquery.bxslider.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/font-awesome.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/magnific-popup.css" media="screen">    
    <link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/owl.carousel.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/owl.theme.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/ticker-style.css"/>
    <link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/menumaker.css"/>
    <link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/audioplayer.css">
    <link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>css/style.css" media="screen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
    <style>
        .pdf-body {
            font-family: sans-serif;
            color: #333;
        }

        .receipt-card {
            max-width: 700px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 40px 50px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .header h2 {
            margin: 0;
            font-size: 26px;
            color: #2b2b2b;
        }

        .header p {
            font-weight: bold;
            font-size: 16px;
            color: #444;
        }
        .receipt-details strong{
            width: 230px;
            display: inline-block;
        }
        .receipt-details p {
            margin: 8px 0;
            font-size: 16px;
            color: #000
        }
        .receipt-details table{
            border-collapse: collapse;
        }
        .receipt-details table tr td{
            vertical-align: top;
            padding-bottom: 5px;
        }
        .greeting {
            margin-top: 30px;
            font-size: 15px;
            line-height: 1.6;
        }

        .greeting p {
            margin-bottom: 15px;
            color: #000;
            font-size: 16px;
        }

        .signature {
            margin-top: 40px;
        }

        .signature p {
            margin: 8px 0;
            font-size: 15px;
            color: #000;
        }

        .footer {
            font-size: 15px;
            color: #000;
            margin-top: 30px;
            border-top: 1px solid #eee;
            padding-top: 10px;
            text-align: center;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }
        .receipt-header-top {
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
            height: 130px;
        }
        .logo-left{
            width: 50%;
            float: left;
        }
        .text-right {
            text-align: right;
            font-size: 14px;
            color: #000;
            line-height: 1;
            width: 50%;
            float: right;
        }
        .text-right strong,
        .text-right span {
            line-height: 1.5;
        }
        .text-right .highlight-line {
            border: none;
            height: 1px;
            background: #DAA600;
            width: 100%;
            margin: 0px 0 0 auto;
        }

        .text-right .highlight-line:nth-child(2) {
            margin: 2px 0 2px auto;
        }

        .text-right a {
            color: #DAA600;
            font-weight: bold;
            text-decoration: none;
        }
        .yellow{
            color: #DAA600;
        }
        .text-right .green{
            color: #538135;
        }
        .my-3{
            margin: 8px 0 2px;
        }
    </style>
</head>
<body>
    <!-- Container -->
    <div id="container">
        <?php if($donation){?>
            <!-- block-wrapper-section ================================================== -->
            <section class="block-wrappers">
                <div class="pdf-body">
                    <div class="receipt-card">
                        <div class="receipt-header-top">
                            <div class="logo-left">
                                <img style="width: 130px; height: 130px;" src="data:image/svg+xml;base64,<?php echo base64_encode(file_get_contents(base_path('public/uploads/pdf-logo.jpg'))); ?>">
                            </div>
                            <div class="text-right">
                                <strong class="green">Realizing the interconnected wellbeing<br>of humans and ecologies</strong><br>
                                <a href="https://www.sramani.org" target="_blank">www.sramani.org</a>
                                <div>
                                    <hr class="highlight-line">
                                    <hr class="highlight-line">
                                    <hr class="highlight-line">
                                </div>
                                <strong class="yellow">Sramani Institute, Inc.</strong><br>
                                <strong>EIN:</strong> 45-2512093<br>
                                <span><strong>Tax Status:</strong> 501(c)(3) exempt (USA)</span>
                            </div>
                        </div>

                        <div class="receipt-details">
                            <table>
                                <tr>
                                    <td><strong><i>Donation Receipt Number:</i></strong></td>
                                    <td><?=$donation->donation_number?></td>
                                </tr>
                                <tr>
                                    <td><strong><i>Donation Receipt Date:</i></strong></td>
                                    <td><?=date_format(date_create($donation->payment_timestamp), "d M, Y")?></td>
                                </tr>
                                <tr>
                                    <td><strong><i>Donee Name:</i></strong></td>
                                    <td><?=$donation->first_name?> <?=$donation->last_name?></td>
                                </tr>
                                <tr>
                                    <td><strong><i>Donation Amount:</i></strong></td>
                                    <td>USD <?=number_format($donation->payment_amount,2)?> (<?=Helper::getIndianCurrency($donation->payment_amount)?> only)</td>
                                </tr>
                                <tr>
                                    <td><strong><i>Donor Name:</i></strong></td>
                                    <td><?=$donation->first_name?> <?=$donation->last_name?></td>
                                </tr>
                                <tr>
                                    <td><strong><i>Donor Country of Residence:</i></strong></td>
                                    <td><?=(($getcountry)?$getcountry->name:'')?></td>
                                </tr>
                            </table>

                            <!-- <p><strong><i>Donation Receipt Number:</i></strong> <?=$donation->donation_number?></p>
                            <p><strong><i>Donation Receipt Date:</i></strong> <?=date_format(date_create($donation->payment_timestamp), "d/m/Y")?></p>
                            <p><strong><i>Donee Name:</i></strong> Sramani Institute,, Inc.</p>
                            <p style="height: auto;"><strong><i>Donation Amount:</i></strong> USD <?=number_format($donation->payment_amount,2)?> (<?=Helper::getIndianCurrency($donation->payment_amount)?> only)</p>
                            <p><strong><i>Donor Name:</i></strong> <?=$donation->first_name?> <?=$donation->last_name?></p>
                            <p><strong><i>Donor Country of Residence:</i></strong> <?=(($getcountry)?$getcountry->name:'')?></p> -->
                        </div>

                        <div class="greeting">
                            <p>Dear <?=$donation->first_name?> <?=$donation->last_name?>,</p>
                            <p>Thank you so much for your donation to the Sramani Institute, Inc.!</p>

                            <p>We greatly appreciate your gift. It will help to support our initiatives and projects that realize
                                the interconnected wellbeing of humans and ecologies.</p>

                            <p>Your donation of <strong>USD</strong> <?=number_format($donation->payment_amount,2)?> (<?=Helper::getIndianCurrency($donation->payment_amount)?> only) is tax-exempt in the
                                United States of America (USA), as the Sramani Institute, Inc. is a 501(c)(3) tax-exempt nonprofit
                                organization registered in the USA.</p>
                            <p>Thank you again for your generosity.</p>
                        </div>

                        <div class="signature">
                            <p>Best wishes,</p>
                            <p><strong>Dr. Kakoli Mitra, <i>Esq.</i></strong></p>
                            <p>Founder and Executive Director</p>
                            <p><i>Sramani Institute, Inc</i></p>
                            <p><strong><i>Email:</i></strong> <a href="mailto:support@sramani.org">support@sramani.org</a></p>
                        </div>

                        <div class="footer">
                            Sramani Institute, Inc. | 501(c)(3) Nonprofit | Tax ID: [45-2512093]
                        </div>
                    </div>
                </div>
            </section>
            <!-- End block-wrapper-section -->
        <?php }?>
    </div>
    <!-- End Container -->
</body>
</html>