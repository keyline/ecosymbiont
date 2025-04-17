<?php
//  use Illuminate\Support\Facades\Route;
//  $routeName = Route::current();
//  $pageName = explode('/', $routeName->uri());
//  $pageSegment = $pageName[1];
?>
<style>
    body {
      background-color: #f8f9fa;
    }

    .donation-box {
      background-color: #fff;
      border-radius: 10px;
      padding: 40px;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
      margin-bottom: 30px;
    }
    .donation-box p{
        font-size: 15px;
        line-height: 1.5;
    }
    .donation-box li{
        margin: 8px 0;
        font-size: 15px;
    }
    .donation-amounts button {
      width: 100px;
      margin-right: 6px;
      margin-top: 10px;
    }

    .payment-method button {
      margin-bottom: 10px;
      width: 160px;
    }

    .section-header {
      font-weight: 600;
      font-size: 20px;
      margin-top: 30px;
    }
    .custom-alert {
        background-color: #d1fae5;
        border-left: 5px solid #10b981; 
        border-radius: 6px;
        padding: 1rem 1.5rem;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);
        margin-bottom: 1rem;
    }

    .fade-in {
      animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
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
                            <div class="donation-box">
                            <h3>Support us to make better World</h3>
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
                    
                            <!-- 1. Donation Amount -->
                            <div class="section-header">1. Donation Amount</div>
                    
                            <div class="donation-amounts d-flex flex-wrap mb-3">
                                <ul class="d-flex flex-wrap list-unstyled mt-2">
                                    <li>
                                        <button class="btn btn-outline-secondary">$50</button>
                                    </li>
                                    <li>
                                        <button class="btn btn-outline-secondary">$100</button>
                                    </li>
                                    <li>
                                        <button class="btn btn-outline-secondary">$250</button>
                                    </li>
                                    <li>
                                        <button class="btn btn-outline-secondary">$1000</button>
                                    </li>
                                </ul>
                                <input type="text" class="form-control mt-2 w-50" placeholder="Custom amount">
                            </div>
                    
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="coverFee">
                                <label class="form-check-label" for="coverFee">
                                I'd like to help cover the transaction fees.
                                </label>
                            </div>
                    
                            <!-- 2. Donor Info -->
                            <div class="section-header mb-3">2. Donor Information</div>
                            <form class="mb-4">
                                <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                                </div>
                                <input type="email" class="form-control mb-3" placeholder="Email Address">
                                <input type="text" class="form-control mb-3" placeholder="Residential  Address">
                                <select name="country" id="" class="form-control mb-3">
                                    <option value="India">India</option>
                                    <option value="India">India2</option>
                                    <option value="India">India3</option>
                                    <option value="India">India4</option>
                                </select>
                            </form>
                    
                            <!-- 3. Payment Method -->
                            <div class="section-header mb-3">3. Select Payment Method</div>
                            <div class="payment-method d-flex flex-wrap">
                                <button class="btn btn-outline-info"><img src="<?=env('UPLOADS_URL').'paypal.png'?>" alt="" class="img-fluid"></button>
                            </div>
                    
                            <div class="mt-4">
                                <button class="btn btn-success w-100 py-2 mt-3">Complete Donation</button>
                            </div>
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