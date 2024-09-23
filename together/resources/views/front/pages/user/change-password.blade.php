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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
			                @csrf
			                <div class="row" style="margin-bottom: 15px;">
			                  <label for="old_password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
			                  <div class="col-md-8 col-lg-9">
			                    <input type="password" name="old_password" class="form-control" id="old_password" minlength="8" maxlength="15">
			                  </div>
			                </div>
			                <div class="row" style="margin-bottom: 15px;">
			                  <label for="new_password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
			                  <div class="col-md-8 col-lg-9">
			                    <input type="password" name="new_password" class="form-control" id="new_password" minlength="8" maxlength="15">
			                  </div>
			                </div>
			                <div class="row" style="margin-bottom: 15px;">
			                  <label for="confirm_password" class="col-md-4 col-lg-3 col-form-label">Confirm New Password</label>
			                  <div class="col-md-8 col-lg-9">
			                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" minlength="8" maxlength="15">
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