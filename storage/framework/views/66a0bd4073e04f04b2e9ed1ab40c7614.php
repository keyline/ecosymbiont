<?php
use App\Helpers\Helper;
$controllerRoute = $module['controller_route'];
?>
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
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-3">
          <form method="POST" action="" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row mb-3">
              <label for="page_name" class="col-md-2 col-lg-2 col-form-label">Create Combination</label>
               <div class="col-md-10 col-lg-10">
                <div class="field_wrapper">
                    <?php if(!empty($getSurveyCombination)){ foreach($getSurveyCombination as $row){  ?>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-2">
                          <input type="text" name="code[]" id="code" class="form-control" value="<?=$row->combination_code;?>" >
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" id="combination" name="combination[]"><?=$row->combination_description;?></textarea>
                        </div>
                        <div class="col-md-2" >
                            <a href="javascript:void(0);" class="remove_button" title="Add field">
                                <i class="fa fa-minus-circle fa-2x text-danger"></i>
                            </a>
                        </div>
                    </div>
                    <?php    }  } ?>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-2">
                          <input type="text" name="code[]" id="code"  class="form-control"  placeholder="Code" >
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="combination[]" id="combination" placeholder="Combintion"></textarea>
                        </div>                        
                        <div class="col-md-2">
                            <a href="javascript:void(0);" class="add_button" title="Add field">
                              <i class="fa fa-plus-circle fa-2x text-success"></i>
                            </a>
                        </div>
                    </div>
                </div>
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
        var maxField = 100;
        var addButton = $('.add_button');
        var wrapper = $('.field_wrapper');
        var fieldHTML ='<div class="row" style="margin-top: 10px;">\
                        <div class="col-md-2">\
                          <input type="text" name="code[]" id="code" class="form-control" placeholder="Code"" >\
                        </div>\
                        <div class="col-md-8">\
                            <textarea class="form-control" name="combination[]" id="combination" placeholder="Combintion"></textarea>\
                        </div>\
                          <div class="col-md-2" style="margin-top: 10px">\
                                <a href="javascript:void(0);" class="remove_button" title="Add field">\
                                <i class="fa fa-minus-circle fa-2x text-danger"></i>\
                                </a>\
                          </div>\
                        </div>';
        var x = 1;
        $(addButton).click(function(){
            if(x < maxField){
                x++;
                $(wrapper).append(fieldHTML);
            }
        });
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
        });
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){
      var minweight = $("#minWeight").val();
      var maxweight = $("#maxWeight").val();
      $('#minimum').on('change', function(){
          var value = $(this).val();
          if(value < minweight){
            alert('Minimum score is Low');
            document.getElementById('minimum').value = '';
          }
      });
      $('#maximum').on('change', function(){
          var value = $(this).val();
          if(maxweight < value){
            alert('Maximum score is too High');
            document.getElementById('maximum').value = '';
          }
      });
  });
</script><?php /**PATH E:\xampp8.2\htdocs\stumento\resources\views/admin/maincontents/survey/edit-combination.blade.php ENDPATH**/ ?>