<?php
use App\Models\Label;
use App\Helpers\Helper;
$controllerRoute = $module['controller_route'];
?>
<div class="pagetitle">
  <h1><?=$page_header?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=url('admin/dashboard')?>">Home</a></li>
      <li class="breadcrumb-item active"><?=$page_header?></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
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
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            <a href="<?=url('admin/' . $controllerRoute . '/list/')?>" class="btn btn-outline-success btn-sm">Back</a>
          </h5>
          <table id="simpletable" class="table table-striped table-bordered nowrap">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Label No.</th>
                  <th scope="col">Marks</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($rows)>0){ $sl=1; foreach($rows as $row){?>
                  <tr>
                    <th scope="row"><?=$sl++?></th>
                    <td>
                      <?php
                      $labelRow = Label::select('name')->where('id', '=', $row->label_id)->first();
                      echo (($labelRow)?$labelRow->name:'');
                      ?>
                    </td>
                    <td><?=$row->label_marks?></td>
                    <td><?=date_format(date_create($row->created_at), "M d, Y h:i A")?></td>
                  </tr>
                <?php } } else {?>
                  <tr>
                    <td colspan="4" style="text-align: center;color: red;">No Records Found !!!</td>
                  </tr>
                <?php }?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    var maxField = 20; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = `<div class="row" style="border:1px solid #1321443d; padding: 10px; border-radius: 10px; margin-bottom: 10px;">
                        <div class="col-md-5">
                          <input type="time" name="start_time[]" class="form-control" required>
                        </div>
                        <div class="col-md-5">
                          <input type="time" name="end_time[]" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                          <a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-minus-circle fa-2x text-danger mt-2"></i></a>
                        </div>
                      </div>`; //New input field html 
    var x = 1; //Initial field counter is 1
    
    // Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increase field counter
            $(wrapper).append(fieldHTML); //Add field html
        }else{
            alert('A maximum of '+maxField+' fields are allowed to be added. ');
        }
    });
    
    // Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrease field counter
    });
});
</script><?php /**PATH G:\xampp8.2\htdocs\kids-zone\resources\views/admin/maincontents/student/label-marks.blade.php ENDPATH**/ ?>