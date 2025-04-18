<style>
    .thankyou-holder{
      background-color: #f0fdf4;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 80px 0;
    }
    .thank-you-box {
      background: #ffffff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
      text-align: center;
      animation: fadeInUp 0.6s ease-out;
      max-width: 500px;
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
<div class="thankyou-holder">
    <div class="thank-you-box">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
          <path d="M16 8a8 8 0 11-16 0 8 8 0 0116 0zM6.93 10.588l5.482-5.482-.708-.708L6.93 9.172 4.796 7.04l-.708.707L6.93 10.588z"/>
        </svg>
        <h2 class="fw-bold text-success">Thank You!</h2>
        <p class="mt-3 mb-4 text-muted">Your donation has been successfully received. We truly appreciate your generous support to our cause.</p>
        <a href="#" class="btn donation_btn">Download Receipt</a>
    </div>
</div>
