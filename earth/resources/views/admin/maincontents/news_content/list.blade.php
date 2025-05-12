<?php
use App\Models\EcosystemAffiliation;
use App\Helpers\Helper;
$controllerRoute = $module['controller_route'];
?>
<style type="text/css">
  .badge {
      display: inline-flex;
      align-items: center;
      margin: 2px;
      background-color: #132144;
  }
  .badge .remove {
      cursor: pointer;
      margin-left: 5px;
  }
</style>
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
                  <th class="admin-select-none"><a href="javascript:selectToggle(selete);" id="show"
                      onclick="checkALL();">Select</a> | <br> <a
                      href="javascript:selectToggle(unselect);" id="hide"
                      onclick="unCheckALL();">Deselect</a>
                  </th>
                  <th scope="col">#</th>
                  <th scope="col">Action</th>
                  <th scope="col">Series</th>                  
                  <th scope="col">Project</th>                  
                  <th scope="col">Community</th>    
                  <th scope="col">DOI<br>Parent Category<br>Sub Category</th>
                  <th scope="col">Author Name<br>Email</th>
                  <th scope="col">Title</th>
                  <th scope="col">Published Date</th>                  
                  
                  <!-- <th scope="col">Keywords</th> -->                                   
                </tr>
              </thead>
              <tbody>
                <?php if(count($rows)>0){ $sl=1; foreach($rows as $row){?>
                  <tr>
                    <td>
                      <input type='checkbox' name='draw[]' value="<?php echo $row->id ?>" id="required-checkbox1" onClick="CheckIfChecked()">
                    </td>
                    <th scope="row"><?=$sl++?></th>
                    <td>
                      <a href="<?=url('admin/' . $controllerRoute . '/edit/'.Helper::encoded($row->id))?>" class="btn btn-outline-primary btn-sm" title="Edit <?=$module['title']?>"><i class="fa fa-edit"></i></a><br>
                      <a href="<?=url('admin/' . $controllerRoute . '/delete/'.Helper::encoded($row->id))?>" class="btn btn-outline-danger btn-sm" title="Delete <?=$module['title']?>" onclick="return confirm('Do You Want To Delete This <?=$module['title']?>');"><i class="fa fa-trash"></i></a><br>
                      <?php if($row->status){?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-status/'.Helper::encoded($row->id))?>" class="btn btn-outline-success btn-sm" title="Activate <?=$module['title']?>"><i class="fa fa-check"></i></a>
                      <?php } else {?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-status/'.Helper::encoded($row->id))?>" class="btn btn-outline-warning btn-sm" title="Deactivate <?=$module['title']?>"><i class="fa fa-times"></i></a>
                      <?php }?>
                    </td>
                    <td><?=$row->current_article_no?>/<?=$row->	series_article_no?></td>
                    <td><?=$row->projects_name?></td>
                    <td><?=$row->community_name?></td>
                    <td>                      
                      <?=$row->creative_work_DOI?><br>
                      <?php
                        $parent_id = $row->parent_category;
                        $categories = DB::table('news_category')->where('id', '=', $parent_id)->get();
                        foreach($categories as $category){
                      ?>
                      <?=$category->sub_category?>
                      <?php } ?><br>
                      <?php
                        $sub_id = $row->sub_category;
                        $subcategories = DB::table('news_category')->where('id', '=', $sub_id)->get();
                        foreach($subcategories as $subcategory){
                      ?>
                      <?=$subcategory->sub_category?>
                      <?php } ?>
                    </td>                    
                    <td>
                      <?=$row->author_name?><br>                      
                      <br>
                      <?=$row->author_email?><br>                      
                    </td>  
                    <td><?=wordwrap($row->new_title,30,"<br>\n")?></td>                        
                    <td data-order="<?=date('Y-m-d H:i:s', strtotime($row->created_at))?>"><?=date_format(date_create($row->created_at), "M d, Y")?></td>                                                      
                  </tr>
                <?php } } else {?>
                  <tr>
                    <td colspan="7" style="text-align: center;color: red;">No Records Found</td>
                  </tr>
                <?php }?>
              </tbody>
              <div id="first_button" style="display:none; " margin-bottom: -6px;>
                  <p align="left"><button type="submit" class="btn btn-danger" name="save">DELETE</button></p>
              </div>
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
            fetch("{{ route('admin.news_content.multiple_delete') }}", {
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