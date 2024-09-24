<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y property-information-form">
   <h4 class="py-3 mb-1"><span class="text-muted fw-light"><h4><?=$page_header?></h4></h4>
   <div class="row justify-content-center">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-4 pb-0 mb-3">
         <div class="pay-rent-details">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <div class="Property-item">
                     <div class="Property-title-icon">
                        <strong>Paying For The Month: </strong>
                     </div>
                     <div class="Property-value">November, 2023</div>
                  </div>
               </div>
               <div class="col-lg-12 col-md-12">
                  <div class="Property-item">
                     <div class="Property-title-icon">
                        <strong>Payment Amount:</strong>
                     </div>
                     <div class="Property-value">$2500</div>
                  </div>
               </div>
               <div class="col-lg-12 col-md-12">
                  <div class="Property-item">
                     <div class="Property-title-icon">
                        <strong>Name on the Card:</strong>
                     </div>
                     <div class="Property-value">
                        <input type="text"  name="text" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="col-lg-12 col-md-12">
                  <div class="Property-item">
                     <div class="Property-title-icon">
                        <strong>Credit Card Number:</strong>
                     </div>
                     <div class="Property-value">
                        <input type="number"  name="number" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="col-lg-12 col-md-12">
                  <div class="Property-item">
                     <div class="Property-title-icon">
                        <strong>Valid Till:</strong>
                     </div>
                     <div class="Property-value month-year-list">
                        <div id="head2" class="month-list">
                           <select class="form-control" id='gMonth2' onchange="show_month()">
                              <option value=''>--Select Month--</option>
                              <option selected value='1'>Janaury</option>
                              <option value='2'>February</option>
                              <option value='3'>March</option>
                              <option value='4'>April</option>
                              <option value='5'>May</option>
                              <option value='6'>June</option>
                              <option value='7'>July</option>
                              <option value='8'>August</option>
                              <option value='9'>September</option>
                              <option value='10'>October</option>
                              <option value='11'>November</option>
                              <option value='12'>December</option>
                           </select>
                        </div>
                        <div class="year-list">
                           <select class="form-control" id='date-dropdown'></select>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12 col-md-12">
                  <div class="Property-item">
                     <div class="Property-title-icon">
                        <strong>CVV/CVC:</strong>
                     </div>
                     <div class="Property-value">
                        <input type="number"  name="number" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="col-lg-12 col-md-12">
                  <a href="#" class="theme-btn download-btn">Pay Now</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- / Content -->
<script>
   let dateDropdown = document.getElementById('date-dropdown');
   let currentYear = new Date().getFullYear();    
   let earliestYear = 1970;     
   while (currentYear >= earliestYear) {      
      let dateOption = document.createElement('option');          
      dateOption.text = currentYear;      
      dateOption.value = currentYear;        
      dateDropdown.add(dateOption);      
      currentYear -= 1;    
   }
</script><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/user/pay-rent.blade.php ENDPATH**/ ?>