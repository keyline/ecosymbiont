<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y property-information-form">
    <h4 class="py-3 mb-1">
        <span class="text-muted fw-light">
        <h4><?=$page_header?></h4>
    </h4>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-4 pb-0 mb-3">
            <form method="POST" action="" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(session('success_message')): ?>
                        <h6 class="alert alert-success autohide"><?php echo e(session('success_message')); ?></h6>
                        <?php endif; ?>
                        <?php if(session('error_message')): ?>
                        <h6 class="alert alert-danger autohide"><?php echo e(session('error_message')); ?></h6>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" placeholder="First Name" value="<?=$getUser->first_name?>" name="first_name" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name" value="<?=$getUser->last_name?>" name="last_name" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" placeholder="Phone" value="<?=$getUser->phone?>" name="phone" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" value="<?=$getUser->email?>" required readonly>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Upload Profile Picture</label>
                            <input type="file" class="form-control" name="profile_image">
                            <?php if($getUser->profile_image != ''){?>
                            <img src="<?=env('UPLOADS_URL').'user/'.$getUser->profile_image?>" class="img-thumbnail" style="width:150px; height: 150px; border-radius: 50%;">
                            <?php } else {?>
                            <img src="<?=env('NO_IMAGE')?>" class="img-thumbnail" style="width:150px; height: 150px; border-radius: 50%;">
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="theme-btn">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- / Content --><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/pages/user/update-profile.blade.php ENDPATH**/ ?>