<?php
use App\Helpers\Helper;
?>
<style>
    .thankyou-holder{
      background-color: #f0fdf4;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px 0;
    }
    .thank-you-box {
      background: #ffffff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
      text-align: center;
      animation: fadeInUp 0.6s ease-out;
      max-width: 500px;
      margin: 0 15px;
    }
    .thank-you-box p{
      margin: 20px 0;
    }
    .thank-you-box svg {
      width: 60px;
      height: 60px;
      color: #10b981;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
</style>
<?php if($donation){?>
  <div class="thankyou-holder">
      <div class="thank-you-box">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="red" class="bi bi-x-circle-fill">
            <circle cx="8" cy="8" r="8" fill="red"/>
            <path fill="white" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 1 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
          </svg>
          <h2 class="fw-bold text-danger">Something Went Wrong.</h2>
          <p class="mt-3 mb-4 text-muted">Unfortunately, your donation could not be processed. Please try again or <a href="https://ecosymbiont.org/contact.php" target="_blank">contact</a> us if the issue persists.</p>
          <a href="<?=url('donation-preview/' . Helper::encoded($donation->id))?>" class="btn donation_btn">Retry Payment</a>
      </div>
  </div>
<?php }?>
