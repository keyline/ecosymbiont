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
            <table <?php Helper::pr($rows); if(count($rows)>0){ ?>id="simpletable" <?php } ?> class="table table-striped table-bordered nowrap">
              <thead>
                <tr>
                  <!-- <th class="admin-select-none"><a href="javascript:selectToggle(selete);" id="show"
                      onclick="checkALL();">Select</a> | <br> <a
                      href="javascript:selectToggle(unselect);" id="hide"
                      onclick="unCheckALL();">Deselect</a>
                  </th> -->
                  <th scope="col">#</th>
                  <th scope="col">Action</th>                  
                  <th scope="col">Series</th>                  
                  <th scope="col">Project</th>                  
                  <th scope="col">Community</th>                  
                  <th scope="col">SRN</th>
                  <th scope="col">Author(s)</th>                  
                  <th scope="col">Title</th>                  
                  <th scope="col">Submitted</th>                  
                  <th scope="col">Status</th>                  
                  <!-- <th scope="col">Published Action</th> -->                  
                </tr>
              </thead>
              <tbody>
                <?php if(count($rows)>0)
                { $sl=1; foreach($rows as $row)
                  { ?>
                      <tr>
                        <!-- <td>
                            <input type='checkbox' name='draw[]' value="?php echo $row->id ?>" id="required-checkbox1" onClick="CheckIfChecked()">
                        </td> -->
                        <th scope="row"><?=$sl++?></th>
                        <td>                      
                          <a href="<?=url('admin/' . $controllerRoute . '/view_details/'.Helper::encoded($row->id))?>" class="btn btn-outline-primary btn-sm" title="ViewDetails <?=$module['title']?>"><i class="fa fa-eye"></i></a>
                          <a href="<?=url('admin/' . $controllerRoute . '/delete/'.Helper::encoded($row->id))?>" class="btn btn-outline-danger btn-sm" title="Delete <?=$module['title']?>" onclick="return confirm('Do you want to delete this Creative-Work ?');"><i class="fa fa-trash"></i></a><br>
                          <?php if ($row->is_import == 0) { ?>
                            <a href="<?=url('admin/news_content/import/'.Helper::encoded($row->id))?>" class="btn btn-outline-primary btn-sm" title="Edit/Import <?=$module['title']?>"><i class="fa fa-edit"></i>/<i class="fa fa-file-import"></i></a><br>
                          <?php } ?>                          
                        </td>
                        <td><?=$row->current_article_no?>/<?=$row->	series_article_no?></td>
                        <td><?=$row->projects_name?></td>
                        <td><?=$row->community_name?></td>
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
                    <td colspan="8" style="text-align: center;color: red;">No Records Found</td>
                  </tr>
                <?php } ?>
              </tbody>
              <!-- <div id="first_button" style="display:none; " margin-bottom: -6px;>
                  <p align="left"><button type="submit" class="btn btn-danger" name="save">DELETE</button></p>
              </div> -->
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    let selectAllBtn = document.getElementById("show");
    let deselectAllBtn = document.getElementById("hide");
    let checkboxes = document.querySelectorAll("input[name='draw[]']");
    let deleteButton = document.getElementById("first_button");

    function updateButtonVisibility() {
        let anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
        deleteButton.style.display = anyChecked ? "block" : "none";
    }

    // Select All
    selectAllBtn.addEventListener("click", function () {
        checkboxes.forEach(checkbox => checkbox.checked = true);
        updateButtonVisibility();
    });

    // Deselect All
    deselectAllBtn.addEventListener("click", function () {
        checkboxes.forEach(checkbox => checkbox.checked = false);
        updateButtonVisibility();
    });

    // Individual Checkbox Click Event
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener("change", updateButtonVisibility);
    });

    // Delete Selected Records
    document.querySelector("#first_button button").addEventListener("click", function () {
        let selectedIds = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

        if (selectedIds.length === 0) {
            alert("Please select at least one record.");
            return;
        }

        if (confirm("Are you sure you want to update selected records?")) {
            fetch("{{ route('admin.article.multiple_delete') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ ids: selectedIds })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                location.reload();
            })
            .catch(error => {
                alert("An error occurred while updating records.");
                console.error(error);
            });
        }
    });
});
</script>