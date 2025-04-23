<?php
use App\Models\Country;
use App\Models\GeneralSetting;
use App\Models\EmailLog;
use App\Models\Donation;
use App\Helpers\Helper;
$generalSetting             = GeneralSetting::find('1');
$country                    = GeneralSetting::find($donation->country);
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
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        .pdf-body {
            font-family: 'Roboto', sans-serif;
            background: #f5f7fa;
            padding: 40px;
            color: #333;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
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
            margin: 4px 0;
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
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        .logo-left img {
            max-height: 80px;
        }

        .text-right {
            text-align: right;
            font-size: 14px;
            color: #000;
            line-height: 1.5;
        }

        .text-right .highlight-line {
            border: none;
            border-top: 1px solid #f4c542;
            width: 100%;
            margin: 2px 0 0px auto;
        }

        .text-right a {
            color: #f4a20e;
            font-weight: bold;
            text-decoration: none;
        }
        .my-3{
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <!-- Container -->
    <div id="container">
        <?php if($donation){?>
            <!-- block-wrapper-section ================================================== -->
            <section class="block-wrapper">
                <div class="pdf-body">
                    <div class="receipt-card">
                        <div class="receipt-header-top">
                            <div class="logo-left">
                                <!-- <img src="<?=env('UPLOADS_URL').'pdf-logo.jpg'?>" alt="pdf-logo" class="img-fluid"> -->
                                <img src="data:image/svg+xml;base64,<?php echo base64_encode(file_get_contents(base_path('public/uploads/pdf-logo.jpg'))); ?>">
                            </div>
                            <div class="text-right">
                                <strong>Śramani Institute Inc.</strong><br>
                                EIN: 45-2512093<br>
                                <span>Tax Status: 501(c)(3) exempt (USA)</span>
                                <div class="my-3">
                                    <hr class="highlight-line">
                                    <hr class="highlight-line">
                                    <hr class="highlight-line">
                                </div>
                                <a href="https://www.sramani.org" target="_blank">www.sramani.org</a><br>
                                <small><i>Realizing the interconnected wellbeing<br>of humans and ecologies</i></small>
                            </div>
                        </div>

                        <div class="receipt-details">
                            <p><strong><i>Donation Receipt Number:</i></strong> <?=$donation->donation_number?></p>
                            <p><strong><i>Donation Receipt Date:</i></strong> <?=date_format(date_create($donation->payment_timestamp), "d/m/Y")?></p>
                            <p><strong><i>Donee Name:</i></strong> Śramani Institute, Inc.</p>
                            <p><strong><i>Donation Amount:</i></strong> USD <?=number_format($donation->payment_amount,2)?> (<?=Helper::getIndianCurrency($donation->payment_amount)?> only)</p>
                            <p><strong><i>Donor Name:</i></strong> <?=$donation->first_name?> <?=$donation->last_name?></p>
                            <p><strong><i>Donor Country of Residence:</i></strong> <?=(($country)?$country->name:'')?></p>
                        </div>

                        <div class="greeting">
                            <p>Dear <?=$donation->first_name?> <?=$donation->last_name?>,</p>
                            <p>Thank you so much for your donation to the Śramani Institute, Inc.!</p>

                            <p>We greatly appreciate your gift. It will help to support our initiatives and projects that realize
                                the interconnected wellbeing of humans and ecologies.</p>

                            <p>Your donation of <strong>USD</strong> <?=number_format($donation->payment_amount,2)?> (One thousand dollars only) is tax-exempt in the
                                United States of America (USA), as the Śramani Institute, Inc. is a 501(c)(3) tax-exempt nonprofit
                                organization registered in the USA.</p>
                            <p>Thank you again for your generosity.</p>
                        </div>

                        <div class="signature">
                            <p>Best wishes,</p>
                            <p><strong>Dr. Kakoli Mitra, <i>Esq.</i></strong></p>
                            <p>Founder and Executive Director</p>
                            <p><i>Śramani Institute</i></p>
                            <p><strong><i>Email:</i></strong> <a href="mailto:support@sramani.org">support@sramani.org</a></p>
                        </div>

                        <div class="footer">
                            Śramani Institute, Inc. | 501(c)(3) Nonprofit | Tax ID: [45-2512093]
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