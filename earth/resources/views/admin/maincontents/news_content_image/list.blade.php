<?php
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
      @if(session('success_message'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show autohide" role="alert">
          {{ session('success_message') }}
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if(session('error_message'))
        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show autohide" role="alert">
          {{ session('error_message') }}
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    </div>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            <a href="<?=url('admin/news_content_image/add_image/')?>" class="btn btn-outline-success btn-sm">Add News Content Image</a>
          </h5>
          <div class="dt-responsive table-responsive">
            <table id="simpletable" class="table table-striped table-bordered nowrap">
              <thead>
                <tr>
                  <th scope="col">#</th>                                   
                  <th scope="col">Image</th>                                                                                                                                           
                  <th scope="col">Image URL</th>                                                                                                                                           
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($rows)>0){ $sl=1; foreach($rows as $row){?>
                  <tr>
                    <th scope="row"><?=$sl++?></th>                      
                    <td>
                      <?php if($row->image_file != ''){?>
                        <img src="<?=env('UPLOADS_URL').'newcontent/'.$row->image_file?>" class="img-thumbnail" id="imageToCopy<?=$row->id?>" alt="<?=$row->image_title?>" style="width: 150px; height: 150px; margin-top: 10px;"><br><?=$row->image_file?>
                      <?php } else {?>
                        <img src="<?=env('NO_IMAGE')?>" alt="" class="img-thumbnail"  style="width: 150px; height: 150px; margin-top: 10px;">
                      <?php }?>
                    </td>                                                                              
                    <td>
                      <input type="hidden" class="form-control" id="imageUrlTextBox" value="<?=env('UPLOADS_URL').'newcontent/'.$row->image_file?>" readonly style="width: 300px;"><br>
                      <button class="btn btn-primary" onclick="copyImageLink(<?=$row->id?>)">Copy Image Link</button>
                      <!-- Message that appears after copying -->
                      <p id="copyMessage<?=$row->id?>" style="color:green; display:none;">Image link copied!</p>
                    </td>
                    <td>
                      <a href="<?=url('admin/news_content_image/edit_image/'.Helper::encoded($row->id))?>" class="btn btn-outline-primary btn-sm" title="Edit News Content Image"><i class="fa fa-edit"></i></a>
                      <!-- <a href="<?=url('admin/news_content_image/delete_image/'.Helper::encoded($row->id))?>" class="btn btn-outline-danger btn-sm" title="Delete News Content Image" onclick="return confirm('Do You Want To Delete This News Content Image');"><i class="fa fa-trash"></i></a>                       -->
                      <a href="<?=env('UPLOADS_URL').'newcontent/'.$row->image_file?>" download="<?=$row->image_file?>" class="btn btn-outline-success btn-sm"><i class="fa fa-download"></i></a>
                    </td>
                  </tr>
                <?php } } else {?>
                  <tr>
                    <td colspan="9" style="text-align: center;color: red;">No Records Found !!!</td>
                  </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
    function copyImageLink(id) {
        // Get the image URL from the `src` attribute
        const imageUrl = document.getElementById('imageToCopy' + id).src;
        
        // Use the Clipboard API to copy the URL
        navigator.clipboard.writeText(imageUrl).then(function() {
            // Show success message
            const message = document.getElementById('copyMessage' + id);
            message.style.display = 'block';
            setTimeout(() => {
                message.style.display = 'none';
            }, 2000); // Hide message after 2 seconds
        }).catch(function(error) {
            console.error('Error copying image URL: ', error);
        });
    }
</script>