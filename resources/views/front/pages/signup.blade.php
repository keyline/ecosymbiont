<!-- block-wrapper-section ================================================== -->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8 content-blocker">
                    <!-- block content -->
                    <div class="block-content">
                        <!-- single-post box -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h2><?=$page_header?></h2>
                                        <form method="POST" action="">
                                            @csrf
                                            <div class="row mb-3">
                                              <label for="first_name" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                              <div class="col-md-8 col-lg-9">
                                                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Surajit" required autocomplete="off">
                                              </div>
                                            </div>
                                            <div class="row mb-3">
                                              <label for="middle_name" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                                              <div class="col-md-8 col-lg-9">
                                                <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="Chandra" autocomplete="off">
                                              </div>
                                            </div>
                                            <div class="row mb-3">
                                              <label for="last_name" class="col-md-4 col-lg-3 col-form-label">Sur Name</label>
                                              <div class="col-md-8 col-lg-9">
                                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Bera" required autocomplete="off">
                                              </div>
                                            </div>
                                            <div class="row mb-3">
                                              <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                              <div class="col-md-8 col-lg-9">
                                                <input type="email" name="email" class="form-control" id="email" placeholder="surajit.b@keylines.net" required autocomplete="off">
                                              </div>
                                            </div>
                                            <div class="row mb-3">
                                              <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                              <div class="col-md-8 col-lg-9">
                                                <input type="text" name="phone" class="form-control" id="phone" placeholder="9477434948" required autocomplete="off">
                                              </div>
                                            </div>
                                            <div class="row mb-3">
                                              <label for="password" class="col-md-4 col-lg-3 col-form-label">Password</label>
                                              <div class="col-md-8 col-lg-9">
                                                <input type="password" name="password" class="form-control" id="password" placeholder="********" minlength="8" maxlength="15" required autocomplete="off">
                                              </div>
                                            </div>
                                            <div class="row mb-3">
                                              <label for="country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                              <div class="col-md-8 col-lg-9">
                                                <select name="country" class="form-control" required>
                                                    <option value="" selected>Select Country</option>
                                                    <?php if($countries){ foreach($countries as $country){?>
                                                        <option value="<?=$country->id?>"><?=$country->name?></option>
                                                    <?php } }?>
                                                </select>
                                              </div>
                                            </div>
                                            <div class="text-center">
                                              <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                          </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End single-post box -->
                    </div>
                    <!-- End block content -->
                </div>
            </div>
        </div>
    </section>
<!-- End block-wrapper-section -->