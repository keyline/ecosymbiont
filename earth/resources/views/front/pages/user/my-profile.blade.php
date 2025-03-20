<!-- block content -->
    <div class="block-content">
        <!-- single-post box -->
        <div class="row">
            <div class="col-xl-12">
                @if(session('success_message'))
                    <div class="alert alert-success bg-success text-dark border-0 alert-dismissible show autohide" role="alert">
                        {{ session('success_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                @if(session('error_message'))
                    <div class="alert alert-danger bg-danger text-dark border-0 alert-dismissible show autohide" role="alert">
                        {{ session('error_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
            </div>
            <!-- <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="<?=(($user)?(($user->profile_image != '')?env('UPLOADS_URL').'user/'.$user->profile_image:env('NO_USER_IMAGE')):env('NO_USER_IMAGE'))?>" alt="<?=(($user)?$user->first_name . ' ' . $user->last_name:'')?>" class="img-circle" style="width: 250px;height: 250px;">
                    </div>
                </div>
            </div> -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="row" style="margin-bottom: 15px;">
                              <label for="first_name" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                              <div class="col-md-8 col-lg-9">
                                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name" value="<?=(($user)?$user->first_name:'')?>" required autocomplete="off" readonly>
                              </div>
                            </div>
                            <!-- <div class="row" style="margin-bottom: 15px;">
                              <label for="middle_name" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                              <div class="col-md-8 col-lg-9">
                                <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="Enter Middle Name" value="<?=(($user)?$user->middle_name:'')?>" autocomplete="off">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom: 15px;">
                              <label for="last_name" class="col-md-4 col-lg-3 col-form-label">Surname</label>
                              <div class="col-md-8 col-lg-9">
                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Sur Name" value="<?=(($user)?$user->last_name:'')?>" required autocomplete="off">
                              </div>
                            </div> -->
                            <div class="row" style="margin-bottom: 15px;">
                              <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                              <div class="col-md-8 col-lg-9">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" value="<?=(($user)?$user->email:'')?>" required autocomplete="off" readonly>
                              </div>
                            </div>
                            <!-- <div class="row" style="margin-bottom: 15px;">
                              <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                              <div class="col-md-8 col-lg-9">
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone" value="<?=(($user)?$user->phone:'')?>" required autocomplete="off">
                              </div>
                            </div> -->
                            <div class="row" style="margin-bottom: 15px;">
                              <label for="country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                              <div class="col-md-8 col-lg-9">
                                <select name="country" id="country" class="form-control" required>
                                    <option value="" selected>Select Country</option>
                                    <?php if($countries){ foreach($countries as $country){?>
                                        <option value="<?=$country->id?>" <?=(($user)?(($user->country == $country->id)?'selected':''):'')?>><?=$country->name?></option>
                                    <?php } }?>
                                </select>
                              </div>
                            </div>
                            <!-- <div class="row" style="margin-bottom: 15px;">
                                <label for="profile_image" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                                    <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small>
                                </div>
                            </div> -->
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