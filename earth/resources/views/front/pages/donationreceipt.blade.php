<?php
//  use Illuminate\Support\Facades\Route;
//  $routeName = Route::current();
//  $pageName = explode('/', $routeName->uri());
//  $pageSegment = $pageName[1];
?>
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
    border-top: 2px solid #f4c542;
    width: 50%;
    margin: 4px 0 4px auto;
}

.text-right a {
    color: #f4a20e;
    font-weight: bold;
    text-decoration: none;
}
</style>
<!-- block-wrapper-section ================================================== -->
<section class="block-wrapper">
    <div class="pdf-body">
        <div class="receipt-header-top">
            <div class="logo-left">
                <img src="your-image-path/5d319ccb-63f2-4c44-8138-c5bbb5f5538b.png" alt="Śramani Logo">
            </div>
            <div class="text-right">
                <strong>Śramani Institute Inc.</strong><br>
                EIN: 45-2512093<br>
                <span>Tax Status: 501(c)(3) exempt (USA)</span>
                <hr class="highlight-line">
                <a href="https://www.sramani.org" target="_blank">www.sramani.org</a><br>
                <small><i>Realizing the interconnected wellbeing<br>of humans and ecologies</i></small>
            </div>
        </div>
        <div class="receipt-card">
            <div class="header">
                <h2>Donation Receipt</h2>
                <p>Śramani Institute, Inc.</p>
            </div>

            <div class="receipt-details">
                <p><strong><i>Donation Receipt Number:</i></strong> SRM-US-web2025-00123</p>
                <p><strong><i>Donation Receipt Date:</i></strong> 18/04/2025</p>
                <p><strong><i>Donee Name:</i></strong> Śramani Institute, Inc.</p>
                <p><strong><i>Donation Amount:</i></strong> USD 1,000.00 (One thousand dollars only)</p>
                <p><strong><i>Donor Name:</i></strong> John Doe</p>
                <p><strong><i>Donor Country of Residence:</i></strong> United States</p>
            </div>

            <div class="greeting">
                <p>Dear John Doe,</p>
                <p>Thank you so much for your donation to the Śramani Institute, Inc.!</p>

                <p>We greatly appreciate your gift. It will help to support our initiatives and projects that realize
                    the interconnected wellbeing of humans and ecologies.</p>

                <p>Your donation of <strong>USD</strong> 1,000.00 (One thousand dollars only) is tax-exempt in the
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
                Śramani Institute, Inc. | 501(c)(3) Nonprofit | Tax ID: [Insert EIN]
            </div>
        </div>
    </div>
</section>
<!-- End block-wrapper-section -->