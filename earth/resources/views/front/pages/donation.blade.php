<?php
//  use Illuminate\Support\Facades\Route;
//  $routeName = Route::current();
//  $pageName = explode('/', $routeName->uri());
//  $pageSegment = $pageName[1];
?>
<style>
    .donation-container {
      max-width: 800px;
      margin: 60px auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      overflow: hidden;
      animation: fadeInUp 1s ease-in-out;
    }
    .donation-header {
      background: #4a7c59;
      color: white;
      padding: 30px;
      text-align: center;
    }
    .donation-header h1 {
      font-family: 'Playfair Display', serif;
      font-size: 36px;
      margin-bottom: 10px;
    }
    .donation-content {
      padding: 40px;
    }
    .donation-content p, .donation-content li {
      font-size: 16px;
      line-height: 1.8;
      color: #333;
    }
    .donation-footer {
      background: #f5f5f5;
      padding: 25px 40px;
    }
    .donation-footer p {
      margin: 0;
      font-size: 15px;
      color: #666;
    }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .highlight {
      font-weight: bold;
      color: #4a7c59;
    }
</style>
<!-- block-wrapper-section ================================================== -->
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 content-blocker">
                <!-- block content -->
                <div class="donation-container">
                    <div class="donation-header">
                      <h1>Donation Receipt</h1>
                      <p>Thank you for supporting Śramani Institute</p>
                    </div>
                    <div class="donation-content">
                      <ul class="list-unstyled mb-4">
                        <li><span class="highlight">Donation Receipt Number:</span> SRM-US-webYYYY-xxxxx</li>
                        <li><span class="highlight">Donee Name:</span> Śramani Institute, Inc.</li>
                        <li><span class="highlight">Donation Amount:</span> USD x,xxx.xx (in words)</li>
                        <li><span class="highlight">Donation Receipt Date:</span> DD/MM/YYYY</li>
                        <li><span class="highlight">Donor Name:</span> First name Last name</li>
                        <li><span class="highlight">Donor Country of Residence:</span> Country</li>
                      </ul>
                  
                      <p>Dear <strong>First name Last name</strong>,</p>
                  
                      <p>Thank you so much for your donation to the <strong>Śramani Institute, Inc.</strong>!</p>
                  
                      <p>We greatly appreciate your gift. It will help to support our initiatives and projects that realize the interconnected wellbeing of humans and ecologies.</p>
                  
                      <p>Your donation of <strong>USD x,xxx.xx (in words)</strong> is tax-exempt in the United States of America (USA), as the Śramani Institute, Inc. is a 501(c)(3) tax-exempt nonprofit organization registered in the USA.</p>
                  
                      <p>Thank you again for your generosity.</p>
                  
                      <p>Best wishes,</p>
                  
                      <p><strong>Dr. Kakoli Mitra, Esq.<br>
                      Founder and Executive Director<br>
                      Śramani Institute</strong></p>
                      <p>Email: <a href="mailto:support@sramani.org">support@sramani.org</a></p>
                    </div>
                    <div class="donation-footer text-end">
                      <p>&copy; 2025 Śramani Institute, Inc. | All rights reserved</p>
                    </div>
                  </div>
                <!-- End block content -->
            </div>
        </div>
    </div>
</section>
<!-- End block-wrapper-section -->