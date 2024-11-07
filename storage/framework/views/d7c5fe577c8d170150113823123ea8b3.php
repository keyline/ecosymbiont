<div class="inner-banner">
   <div class="background-overlay"></div>
   <h3><?=$page_header?></h3>
</div>
<section class="login-section contact-details section-padding">
   <div class="container-xxl container-xl container-lg container-md container-sm container">
      <div class="contact-form-blog">
         <div class="row ">
            <div class="col-xl-5">
               <div class="contact_left">
                  <h2>Contact Information</h2>
                  <ul id="contact" class="contact-listing">
                     <li class="adress-details">
                        <div class="adress-icon">
                           <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                        </div>
                        <div class="adress-content">
                           <h5>Our Locations</h5>
                           <p><?=$generalSetting->site_name?><br><?=$generalSetting->description?></p>
                        </div>
                     </li>
                     <hr>
                     <li class="adress-details">
                        <div class="adress-icon">
                           <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="adress-content">
                           <h5>Phone</h5>
                           <p><a href="tel:<?=$generalSetting->site_phone?>"><?=$generalSetting->site_phone?></a></p>
                           <p><a href="tel:<?=$generalSetting->site_phone2?>"><?=$generalSetting->site_phone2?></a></p>
                        </div>
                     </li>
                     <hr>
                  </ul>
                  <div class="social-media-icon">
                     <ul>
                        <li><a target="_blank" href="<?=$generalSetting->facebook_profile?>"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="<?=$generalSetting->twitter_profile?>"><i><img class="img-fluid" src="<?=env('FRONT_ASSETS_URL')?>images/Twitter_icon-x.webp" alt="image"></i></a></li>
                        <li><a target="_blank" href="<?=$generalSetting->linkedin_profile?>"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li><a target="_blank" href="<?=$generalSetting->youtube_profile?>"><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a target="_blank" href="<?=$generalSetting->instagram_profile?>"><i class="fa-brands fa-instagram"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-xl-7">
               <form method="POST" action="">
                  <?php echo csrf_field(); ?>
                  <div class="login-form-list">
                     <h2>Get In Touch</h2>
                     <div class="row gx-3">
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="fname">First Name <span class="text-danger">*</span></label>
                              <input type="text" name="fname" id="fname" class="form-control">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="fname">Last Name <span class="text-danger">*</span></label>
                              <input type="text" name="lname" id="lname" class="form-control">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="phone">Email <span class="text-danger">*</span></label>
                              <input type="text" name="email" id="email" class="form-control">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="phone">Phone <span class="text-danger">*</span></label>
                              <input type="text" name="phone" id="phone" class="form-control">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="phone">My question is for <span class="text-danger">*</span></label>
                              <select class="form-control form-select" aria-label="Default select example" name="question_for">
                                 <option value="Inquiry" selected>Inquiry </option>
                                 <option value="Feedback">Feedback </option>
                                 <option value="Complaint">Complaint </option>
                                 <option value="Suggestions">Suggestions</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="subject">Subject <span class="text-danger">*</span></label>
                              <input type="text" name="subject" id="subject" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="message">Message </label>
                              <textarea rows="4" name="message" id="message" class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="col-lg-12 ">
                           <div class="form-group">
                              <button type="submit" class="theme-btn">Submit</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/contact-us.blade.php ENDPATH**/ ?>