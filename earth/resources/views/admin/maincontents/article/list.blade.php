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
            <a href="<?=url('admin/' . $controllerRoute . '/add/')?>" class="btn btn-outline-success btn-sm">Add <?=$module['title']?></a>
          </h5>
          <div class="dt-responsive table-responsive">
            <table id="simpletable" class="table table-striped table-bordered nowrap">
              <thead>
                <tr>                  
                  <th scope="col"><input type="checkbox" id="selectAll">#</th>
                  <th scope="col">Action</th>
                  <th scope="col">SRN</th>
                  <th scope="col">Author Info</th>                  
                  <th scope="col">Creative-Work Info</th>                  
                  <th scope="col">Submitted At</th>                  
                  <th scope="col">Published Status</th>                  
                  <!-- <th scope="col">Published Action</th> -->                  
                </tr>
              </thead>
              <tbody>
                <?php if(count($rows)>0)
                { $sl=1; foreach($rows as $row)
                  { ?>
                      <tr>                        
                        <th scope="row"><input type='checkbox' class='rowCheckbox' name='draw[]' value="<?php echo $row->id ?>"> <?=$sl++?></th>
                        <td>                      
                          <a href="<?=url('admin/' . $controllerRoute . '/view_details/'.Helper::encoded($row->id))?>" class="btn btn-outline-primary btn-sm" title="ViewDetails <?=$module['title']?>">View Details</a>
                          <a href="<?=url('admin/' . $controllerRoute . '/delete/'.Helper::encoded($row->id))?>" class="btn btn-outline-danger btn-sm" title="Delete <?=$module['title']?>" onclick="return confirm('Do you want to delete this Creative-Work ?');"><i class="fa fa-trash"></i> Delete</a><br>
                          <?php if ($row->is_import == 0) { ?>
                            <a href="<?=url('admin/news_content/import/'.Helper::encoded($row->id))?>" class="btn btn-outline-primary btn-sm" title="ViewDetails <?=$module['title']?>">Edit / Import to News Content</a><br>
                          <?php } ?>                          
                        </td>
                        <td><?=$row->article_no?></td>
                        <td>
                          <?=$row->first_name?> <?=$row->last_name?><br> <?=$row->email?></td>
                        <td>
                          <?=wordwrap($row->creative_Work,30,"<br>\n")?></td>                    
                        <td><?=date_format(date_create($row->created_at), "M d, Y")?></td>                                       
                        <td>
                        <?php
                          if($row->is_published == 0){
                              echo "<h6>Submitted</h6>";
                          } elseif($row->is_published == 1){
                              echo "<h6>Final Editing & Checking</h6>";
                          } elseif($row->is_published == 2){
                              echo "<h6>NELP Form Generated & Shared</h6>";
                          } elseif($row->is_published == 3){
                              echo "<h6>Scan Copy Uploaded</h6>";
                          } elseif($row->is_published == 4){
                              echo "<h6>Approved & Published</h6>";
                          } elseif($row->is_published == 5){
                              echo "<h6>Rejected</h6>";
                          }
                          ?>
                        </td>
                        <!-- <td>
                          ?php if ($row->is_published == 3) { ?>
                            <a href="?=url('admin/' . $controllerRoute . '/change_status_accept/'.Helper::encoded($row->id))?>" class="btn btn-success btn-sm" title="Accept ?=$module['title']?>"><i class="fa fa-check"></i> Accept</a>
                            <a href="?=url('admin/' . $controllerRoute . '/change_status_reject/'.Helper::encoded($row->id))?>" class="btn btn-danger btn-sm" title="Reject ?=$module['title']?>"><i class="fa fa-times"></i> Reject</a>
                        ?php } elseif($row->is_published == 4){?>
                            <a href="?=url('admin/' . $controllerRoute . '/change_status_reject/'.Helper::encoded($row->id))?>" class="btn btn-danger btn-sm" title="Reject ?=$module['title']?>"><i class="fa fa-times"></i> Reject</a>
                        ?php }?>
                          
                        </td> -->                        
                      </tr>
                    <?php 
                  } 
                } else 
                { ?>
                  <tr>
                    <td colspan="9" style="text-align: center;color: red;">No Records Found !!!</td>
                  </tr>
                <?php } ?>
              </tbody>
              <div id="deleteButtonContainer" style="display:none; " margin-bottom: 10px;>
                      <p align="left"><button type="button" id="deleteSelected" class="btn btn-danger">DELETE</button></p>
              </div>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function () {
    // Select All Checkboxes
    $("#selectAll").click(function () {
        $(".rowCheckbox").prop("checked", this.checked);
        toggleDeleteButton();
    });

    // Handle individual checkbox click
    $(".rowCheckbox").click(function () {
        $("#selectAll").prop("checked", $(".rowCheckbox:checked").length === $(".rowCheckbox").length);
        toggleDeleteButton();
    });

    // Show/Hide delete button
    function toggleDeleteButton() {
        $("#deleteButtonContainer").toggle($(".rowCheckbox:checked").length > 0);
    }

    // Delete Selected Rows
    $("#deleteSelected").click(function () {
        let selectedIds = $(".rowCheckbox:checked").map(function () {
            return $(this).val();
        }).get();

        if (selectedIds.length === 0) {
            alert("Please select at least one record to delete.");
            return;
        }

        if (confirm("Are you sure you want to delete selected records?")) {
            $.ajax({
                url: "<?= url('admin/' . $controllerRoute . '/multiple_delete') ?>",
                type: "POST",
                data: {
                    ids: selectedIds,
                    _token: "{{ csrf_token() }}" // Pass CSRF token
                },
                success: function (response) {
                    alert(response);
                    location.reload(); // Refresh after deletion
                },
                error: function () {
                    alert("An error occurred while deleting records.");
                }
            });
        }
    });
  });
</script>