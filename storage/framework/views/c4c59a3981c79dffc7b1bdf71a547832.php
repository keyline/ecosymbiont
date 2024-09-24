<?php
use App\Helpers\Helper;
$controllerRoute = $module['controller_route'];
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<style type="text/css">
    .choices__list--multiple .choices__item {
        background-color: #d81636;
        border: 1px solid #d81636;
    }
</style>
<div class="pagetitle">
  <h1><?=$page_header?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=url('admin/dashboard')?>">Home</a></li>
      <li class="breadcrumb-item active"><a href="<?=url('admin/' . $controllerRoute . '/list/')?>"><?=$module['title']?> List</a></li>
      <li class="breadcrumb-item active"><?=$page_header?></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section profile">
  <div class="row">
    <div class="col-xl-12">
      <?php if(session('success_message')): ?>
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show autohide" role="alert">
          <?php echo e(session('success_message')); ?>

          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
      <?php if(session('error_message')): ?>
        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show autohide" role="alert">
          <?php echo e(session('error_message')); ?>

          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
    </div>
    <?php
    if($row){
      $name                 = $row->name;
      $contact_persons      = (($row->contact_persons)?json_decode($row->contact_persons):[]);
      $email                = $row->email;
      $phone                = $row->phone;
      $url                  = $row->url;
      $notes                = $row->notes;
    } else {
      $name                 = '';
      $contact_persons      = [];
      $email                = '';
      $phone                = '';
      $url                  = '';
      $notes                = '';
    }
    ?>
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-3">
          <form method="POST" action="" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row mb-3">
              <label for="name" class="col-md-2 col-lg-2 col-form-label">Name</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="name" class="form-control" id="name" value="<?=$name?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="contact_persons" class="col-md-2 col-lg-2 col-form-label">Contact Persons</label>
              <div class="col-md-10 col-lg-10">
                <div class="field_wrapper1" style="padding: 10px;margin-bottom: 10px;">
                  <?php
                  if(!empty($contact_persons)){ for($i=0;$i<count($contact_persons);$i++){
                  ?>
                    <div class="row mt-3">
                      <div class="col-md-10">
                        <input type="text" class="form-control" name="contact_persons[]" autocomplete="off" value="<?=$contact_persons[$i]?>">
                      </div>
                      <div class="col-md-2" style="margin-top: 6px;">
                        <a href="javascript:void(0);" class="remove_button1" title="Remove field"><i class="fa fa-minus-circle fa-2x text-danger"></i></a>
                      </div>                                    
                    </div>
                  <?php } }?>
                  <div class="row mt-3">
                      <div class="col-md-10">
                        <input type="text" class="form-control" name="contact_persons[]" autocomplete="off">
                      </div>
                      <div class="col-md-2" style="margin-top: 6px;">
                        <a href="javascript:void(0);" class="add_button1" title="Add field"><i class="fa fa-plus-circle fa-2x text-success"></i></a>
                      </div>                                    
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="email" class="col-md-2 col-lg-2 col-form-label">Email</label>
              <div class="col-md-10 col-lg-10">
                <input type="email" name="email" class="form-control" id="email" value="<?=$email?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="phone" class="col-md-2 col-lg-2 col-form-label">Phone</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="phone" class="form-control" id="phone" value="<?=$phone?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="url" class="col-md-2 col-lg-2 col-form-label">URL</label>
              <div class="col-md-10 col-lg-10">
                <input type="text" name="url" class="form-control" id="url" value="<?=$url?>" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="notes" class="col-md-2 col-lg-2 col-form-label">Notes</label>
              <div class="col-md-10 col-lg-10">
                <textarea name="notes" class="form-control" id="notes" required rows="5"><?=$notes?></textarea>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary"><?=(($row)?'Save':'Add')?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){    
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        maxItemCount:30,
        searchResultLimit:30,
        renderChoiceLimit:30
    });     
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){        
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button1'); //Add button selector
    var wrapper = $('.field_wrapper1'); //Input field wrapper
    var fieldHTML = '<div class="row mt-3">\
                        <div class="col-md-10">\
                          <input type="text" class="form-control" name="contact_persons[]" autocomplete="off">\
                        </div>\
                        <div class="col-md-2" style="margin-top: 6px;">\
                          <a href="javascript:void(0);" class="remove_button1" title="Remove field"><i class="fa fa-minus-circle fa-2x text-danger"></i></a>\
                        </div>\
                    </div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button1', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
  });
</script><?php /**PATH G:\xampp8.2\htdocs\screen_2_crush\resources\views/admin/maincontents/source/add-edit.blade.php ENDPATH**/ ?>