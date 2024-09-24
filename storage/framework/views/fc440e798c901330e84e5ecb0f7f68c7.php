<?php
use App\Models\Faq;
?>
<section class="Products-list-section list-view-grid-section section-padding ">
   <div class="container-xxl container-xl container-lg container-md container-sm container">
      <div class="row ">
         <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-12 col-sm-12  col-12">
            <div class="shop-sidebar side-sticky" id="shopFilter">
               <div class="aside-header  align-items-center d-lg-flex  d-none ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                     <path
                        d="M3 7H10M10 7C10 8.65685 11.3431 10 13 10H14C15.6569 10 17 8.65685 17 7C17 5.34315 15.6569 4 14 4H13C11.3431 4 10 5.34315 10 7ZM16 17H21M20 7H21M3 17H6M6 17C6 18.6569 7.34315 20 9 20H10C11.6569 20 13 18.6569 13 17C13 15.3431 11.6569 14 10 14H9C7.34315 14 6 15.3431 6 17Z"
                        stroke="#071516" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                  <h3 class="mb-0">Search Filter</h3>
               </div>
               <div class="aside-header  align-items-center d-lg-none" id="hamburger">

                  <div class="hambur-left">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path
                           d="M3 7H10M10 7C10 8.65685 11.3431 10 13 10H14C15.6569 10 17 8.65685 17 7C17 5.34315 15.6569 4 14 4H13C11.3431 4 10 5.34315 10 7ZM16 17H21M20 7H21M3 17H6M6 17C6 18.6569 7.34315 20 9 20H10C11.6569 20 13 18.6569 13 17C13 15.3431 11.6569 14 10 14H9C7.34315 14 6 15.3431 6 17Z"
                           stroke="#071516" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                     </svg>
                     <h3 class="mb-0">Search Filter</h3>
                  </div>
                  <div class="hambur-right"><i class="fa-solid fa-angle-down"></i></div>

               </div>
               <!-- /.aside-header -->

               <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                     <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           Product Categories
                        </button>
                     </h2>
                     <div id="collapseOne" class="accordion-collapse collapse show"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body pt-0">
                           <ul class="list list-inline mb-0">
                              <li class="list-item">
                                 <a href="#" class="menu-link py-1">Shredders</a>
                              </li>
                              <li class="list-item">
                                 <a href="#" class="menu-link py-1">Screeners</a>
                              </li>
                              <li class="list-item">
                                 <a href="#" class="menu-link py-1">Crushers</a>
                              </li>
                              <li class="list-item">
                                 <a href="#" class="menu-link py-1">Trommels</a>
                              </li>
                              <li class="list-item">
                                 <a href="#" class="menu-link py-1">Blender</a>
                              </li>
                              <li class="list-item">
                                 <a href="#" class="menu-link py-1">Pugmill</a>
                              </li>
                              <li class="list-item">
                                 <a href="#" class="menu-link py-1">Conveyors</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                           Manufacturers
                        </button>
                     </h2>
                     <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body pt-0">
                           <ul class="list list-inline mb-0">
                              <li class="list-item">
                                 <a href="#" class="menu-link py-1">1</a>
                              </li>
                              <li class="list-item">
                                 <a href="#" class="menu-link py-1">2</a>
                              </li>
                              <li class="list-item">
                                 <a href="#" class="menu-link py-1">3</a>
                              </li>
                              <li class="list-item">
                                 <a href="#" class="menu-link py-1">4</a>
                              </li>
                              <li class="list-item">
                                 <a href="#" class="menu-link py-1">5</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                           Year
                        </button>
                     </h2>
                     <div id="collapseThree" class="accordion-collapse collapse show"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body pt-0 p-0 ">
                           <div class="year-field">
                              <div class="year-top">
                                 <div class="field">
                                    <span>From</span><br>
                                    <select name="dob-year" class="datefield year">
                                       <option value="">Year</option>
                                       <option value="2012">2012</option>
                                       <option value="2011">2011</option>
                                       <option value="2010">2010</option>
                                       <option value="2009">2009</option>
                                       <option value="2008">2008</option>
                                       <option value="2007">2007</option>
                                       <option value="2006">2006</option>
                                       <option value="2005">2005</option>
                                       <option value="2004">2004</option>
                                       <option value="2003">2003</option>
                                       <option value="2002">2002</option>
                                       <option value="2001">2001</option>
                                       <option value="2000">2000</option>
                                       <option value="1999">1999</option>
                                       <option value="1998">1998</option>
                                       <option value="1997">1997</option>
                                       <option value="1996">1996</option>
                                       <option value="1995">1995</option>
                                       <option value="1994">1994</option>
                                       <option value="1993">1993</option>
                                       <option value="1992">1992</option>
                                       <option value="1991">1991</option>
                                    </select>
                                 </div>
                                 <div class="separator">-</div>
                                 <div class="field">
                                    <span>To</span><br>
                                    <select name="dob-year" class="datefield year">
                                       <option value="">Year</option>
                                       <option value="2012">2012</option>
                                       <option value="2011">2011</option>
                                       <option value="2010">2010</option>
                                       <option value="2009">2009</option>
                                       <option value="2008">2008</option>
                                       <option value="2007">2007</option>
                                       <option value="2006">2006</option>
                                       <option value="2005">2005</option>
                                       <option value="2004">2004</option>
                                       <option value="2003">2003</option>
                                       <option value="2002">2002</option>
                                       <option value="2001">2001</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                           Hours
                        </button>
                     </h2>
                     <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body pt-0">
                           <ul class="list list-inline mb-0">
                              <li class="list-item">
                                 <p class="menu-link py-1">02:00</p>
                              </li>
                              <li class="list-item">
                                 <p class="menu-link py-1">02:00</p>
                              </li>
                              <li class="list-item">
                                 <p class="menu-link py-1">02:00</p>
                              </li>
                              <li class="list-item">
                                 <p class="menu-link py-1">02:00</p>
                              </li>
                              <li class="list-item">
                                 <p class="menu-link py-1">02:00</p>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                           Condition
                        </button>
                     </h2>
                     <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body pt-0">
                           <ul class="list list-inline mb-0">
                              <li class="list-item">
                                 <p class="menu-link py-1">Duis euismod ultrices fermentum. Quisque mauris magna,
                                    condimentum ut turpis ac, scelerisque pulvinar orci. Fusce consectetur tempus
                                    magna non posuere. Vestibulum commodo varius sem quis pretium. Donec vulputate
                                    urna ut elit malesuada pretium</p>
                              </li>

                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                           Price
                        </button>
                     </h2>
                     <div id="collapseSix" class="accordion-collapse collapse show"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body p-0">
                           <div class="wrapper">
                              <div class="values">
                                 <span id="range1">
                                    0
                                 </span>
                                 <span> &dash; </span>
                                 <span id="range2">
                                    100
                                 </span>
                              </div>
                              <div class="container">
                                 <div class="slider-track"></div>
                                 <input type="range" min="0" max="100" value="30" id="slider-1" oninput="slideOne()">
                                 <input type="range" min="0" max="100" value="70" id="slider-2" oninput="slideTwo()">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="side-res-height"></div>
               </div>

            </div>
         </div>
         <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-12 col-sm-12  col-12">
            <div class="row gx-3 justify-content-center">
               <div class="col-xxl-12">
                  <div class="filter-wrapper">
                     <div class="filter-left-area">
                        <div class="search-box">
                           <input class="search-input" type="search" name="search"
                              placeholder="What are you looking for?">
                           <div class="icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                 <path
                                    d="M23.9993 23.9041C23.9917 23.6857 23.9993 23.4667 23.9993 23.2476V22.7779C23.8772 22.4503 23.6347 22.2154 23.3946 21.9753C21.2773 19.8615 19.1608 17.7478 17.0451 15.634C16.9112 15.5013 16.9071 15.4221 17.0204 15.2759C17.967 14.0484 18.598 12.6075 18.8581 11.0795C19.1182 9.55144 18.9995 7.98291 18.5124 6.51143C17.9443 4.81175 16.9085 3.30673 15.5237 2.16917C14.139 1.0316 12.4615 0.307615 10.6839 0.0803287C9.01156 -0.141797 7.31036 0.098851 5.76528 0.776104C3.86408 1.60282 2.37212 2.91276 1.31936 4.70593C0.184388 6.64353 -0.226034 8.72675 0.118038 10.9391C0.464459 13.1656 1.48082 15.0563 3.17124 16.5529C5.44117 18.561 8.09217 19.3272 11.0867 18.8546C12.6385 18.6103 14.0377 17.9821 15.2783 17.0144C15.4269 16.897 15.5044 16.9117 15.6353 17.0432C17.6739 19.0904 19.7164 21.1343 21.7629 23.1748C22.0635 23.4755 22.3418 23.8013 22.7323 23.9969H23.202C23.4368 23.9969 23.6717 23.9922 23.9066 23.9998C23.9847 24.0021 24.004 23.9851 23.9993 23.9041ZM9.48256 16.9921C5.31376 16.971 1.99517 13.6095 2.00691 9.49475C2.01865 5.35355 5.41241 1.97919 9.51955 2.00678C11.5044 2.01608 13.4049 2.81015 14.8063 4.21567C16.2078 5.62119 16.9963 7.52402 16.9999 9.50884C16.9517 13.7387 13.5815 17.0115 9.48256 16.9915V16.9921Z"
                                    fill="#111111"></path>
                              </svg>
                           </div>
                        </div>
                     </div>
                     <div class="filter-right-area">
                        <div class="shop-tab">
                           <ul class="nav" role="tablist" id="dz-shop-tab">
                              <li class="nav-item" role="presentation">
                                 <a href="#tab-list" class="nav-link" id="tab-list-list-btn" data-bs-toggle="pill"
                                    data-bs-target="#tab-list-list" role="tab" aria-controls="tab-list-list"
                                    aria-selected="true">
                                    <i class="fa-solid fa-list"></i>List View
                                 </a>
                              </li>
                              <li class="nav-item" role="presentation">
                                 <a href="#tab-list-grid" class="nav-link" id="tab-list-grid-btn"
                                    data-bs-toggle="pill" data-bs-target="#tab-list-grid" role="tab"
                                    aria-controls="tab-list-grid" aria-selected="false">
                                    <i>
                                       <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                          xmlns="http://www.w3.org/2000/svg">
                                          <path
                                             d="M3.33332 0.5H5.83332C7.67426 0.5 9.16664 1.99238 9.16664 3.83332V6.33332C9.16664 8.17426 7.67426 9.66664 5.83332 9.66664H3.33332C1.49238 9.66668 0 8.1743 0 6.33332V3.83332C0 1.99238 1.49238 0.5 3.33332 0.5Z"
                                             fill="black"></path>
                                          <path
                                             d="M14.1673 0.5H16.6673C18.5082 0.5 20.0006 1.99238 20.0006 3.83332V6.33332C20.0006 8.17426 18.5082 9.66664 16.6673 9.66664H14.1673C12.3264 9.66664 10.834 8.17426 10.834 6.33332V3.83332C10.8339 1.99238 12.3263 0.5 14.1673 0.5Z"
                                             fill="black"></path>
                                          <path
                                             d="M3.33332 11.3333H5.83332C7.67426 11.3333 9.16664 12.8257 9.16664 14.6666V17.1666C9.16664 19.0076 7.67426 20.5 5.83332 20.5H3.33332C1.49238 20.5 0 19.0076 0 17.1667V14.6667C0 12.8257 1.49238 11.3333 3.33332 11.3333Z"
                                             fill="black"></path>
                                          <path
                                             d="M14.1673 11.3333H16.6673C18.5082 11.3333 20.0006 12.8257 20.0006 14.6666V17.1666C20.0006 19.0076 18.5082 20.5 16.6673 20.5H14.1673C12.3264 20.5 10.834 19.0076 10.834 17.1667V14.6667C10.8339 12.8257 12.3263 11.3333 14.1673 11.3333Z"
                                             fill="black"></path>
                                       </svg>
                                    </i>
                                    Grid View
                                 </a>
                              </li>
                              <li class="nav-item" role="presentation">
                                 <a href="#tab-list-short" class="nav-link sort-tabs" id="tab-list-short-btn"
                                    data-bs-toggle="pill" data-bs-target="#tab-list-short" role="tab"
                                    aria-controls="tab-list-short" aria-selected="false">
                                    <i class="fa-solid fa-arrow-up-short-wide"></i>Sort By
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12  col-12">
                  <div class="innovative_service_item double-product products_item list-view-grid">
                     <div class="img-wrapper">
                        <ul class="image-action-btn">
                           <li>
                              <div class="new-tag">New</div>
                           </li>
                           <li class="photo-video-view">
                              <a href=""><i><img class=" img-fluid w-auto" src="<?=env('FRONT_ASSETS_URL')?>images/picture.png"
                                       alt="image" /></i>55</a>
                              <a href=""><i><img class=" img-fluid w-auto" src="<?=env('FRONT_ASSETS_URL')?>images/play.png"
                                       alt="image" /></i>14</a>
                           </li>
                        </ul>
                        <a href="#"> <img class="img-fluid w-100 img-height" src="<?=env('FRONT_ASSETS_URL')?>images/product-1.png"
                              alt="image" /></a>
                     </div>
                     <div class="innovative_service_des">
                        <a href="#">
                           <h4 class="sub-title">New Metso HP3 Cone Crusher</h4>
                        </a>
                        <ul>
                           <li>
                              <p>Crushers - Jaws</p>
                              <div>
                                 <p><strong>Hours</strong>150</p>
                              </div>
                              <div>
                                 <p><strong>Serial#</strong>33742</p>
                              </div>
                              <div>
                                 <p><strong>ID#</strong>1021</p>
                              </div>
                           </li>
                           <li>
                              <p>+ Wishlist</p>
                              <p class="compare-tag compare-tag-bg ">Compare</p>
                              <p class="prices-amount">$120,000</p>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="innovative_service_item double-product products_item list-view-grid">
                     <div class="img-wrapper">
                        <ul class="image-action-btn">
                           <li>
                              <div class="new-tag">New</div>
                           </li>
                           <li class="photo-video-view">
                              <a href=""><i><img class=" img-fluid w-auto" src="<?=env('FRONT_ASSETS_URL')?>images/picture.png"
                                       alt="image" /></i>55</a>
                              <a href=""><i><img class=" img-fluid w-auto" src="<?=env('FRONT_ASSETS_URL')?>images/play.png"
                                       alt="image" /></i>14</a>
                           </li>
                        </ul>
                        <a href="#"> <img class="img-fluid w-100 img-height" src="<?=env('FRONT_ASSETS_URL')?>images/product-1.png"
                              alt="image" /></a>
                     </div>
                     <div class="innovative_service_des">
                        <a href="#">
                           <h4 class="sub-title">New Metso HP3 Cone Crusher</h4>
                        </a>
                        <ul>
                           <li>
                              <p>Crushers - Jaws</p>
                              <div>
                                 <p><strong>Hours</strong>150</p>
                              </div>
                              <div>
                                 <p><strong>Serial#</strong>33742</p>
                              </div>
                              <div>
                                 <p><strong>ID#</strong>1021</p>
                              </div>
                           </li>
                           <li>
                              <p>+ Wishlist</p>
                              <p class="compare-tag compare-tag-bg ">Compare</p>
                              <p class="prices-amount">$120,000</p>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="innovative_service_item double-product products_item list-view-grid">
                     <div class="img-wrapper">
                        <ul class="image-action-btn">
                           <li>
                              <div class="new-tag">New</div>
                           </li>
                           <li class="photo-video-view">
                              <a href=""><i><img class=" img-fluid w-auto" src="<?=env('FRONT_ASSETS_URL')?>images/picture.png"
                                       alt="image" /></i>55</a>
                              <a href=""><i><img class=" img-fluid w-auto" src="<?=env('FRONT_ASSETS_URL')?>images/play.png"
                                       alt="image" /></i>14</a>
                           </li>
                        </ul>
                        <a href="#"> <img class="img-fluid w-100 img-height" src="<?=env('FRONT_ASSETS_URL')?>images/product-1.png"
                              alt="image" /></a>
                     </div>
                     <div class="innovative_service_des">
                        <a href="#">
                           <h4 class="sub-title">New Metso HP3 Cone Crusher</h4>
                        </a>
                        <ul>
                           <li>
                              <p>Crushers - Jaws</p>
                              <div>
                                 <p><strong>Hours</strong>150</p>
                              </div>
                              <div>
                                 <p><strong>Serial#</strong>33742</p>
                              </div>
                              <div>
                                 <p><strong>ID#</strong>1021</p>
                              </div>
                           </li>
                           <li>
                              <p>+ Wishlist</p>
                              <p class="compare-tag compare-tag-bg ">Compare</p>
                              <p class="prices-amount">$120,000</p>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="innovative_service_item double-product products_item list-view-grid">
                     <div class="img-wrapper">
                        <ul class="image-action-btn">
                           <li>
                              <div class="new-tag">New</div>
                           </li>
                           <li class="photo-video-view">
                              <a href=""><i><img class=" img-fluid w-auto" src="<?=env('FRONT_ASSETS_URL')?>images/picture.png"
                                       alt="image" /></i>55</a>
                              <a href=""><i><img class=" img-fluid w-auto" src="<?=env('FRONT_ASSETS_URL')?>images/play.png"
                                       alt="image" /></i>14</a>
                           </li>
                        </ul>
                        <a href="#"> <img class="img-fluid w-100 img-height" src="<?=env('FRONT_ASSETS_URL')?>images/product-1.png"
                              alt="image" /></a>
                     </div>
                     <div class="innovative_service_des">
                        <a href="#">
                           <h4 class="sub-title">New Metso HP3 Cone Crusher</h4>
                        </a>
                        <ul>
                           <li>
                              <p>Crushers - Jaws</p>
                              <div>
                                 <p><strong>Hours</strong>150</p>
                              </div>
                              <div>
                                 <p><strong>Serial#</strong>33742</p>
                              </div>
                              <div>
                                 <p><strong>ID#</strong>1021</p>
                              </div>
                           </li>
                           <li>
                              <p>+ Wishlist</p>
                              <p class="compare-tag compare-tag-bg ">Compare</p>
                              <p class="prices-amount">$120,000</p>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/front/pages/new-products.blade.php ENDPATH**/ ?>