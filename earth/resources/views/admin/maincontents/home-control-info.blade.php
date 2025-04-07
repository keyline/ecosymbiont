<?php
use App\Helpers\Helper;
?>
<div class="pagetitle">
  <h1><?=$page_header?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=url('admin/dashboard')?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?=url('admin/email-logs')?>">Email-logs List</a></li>
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
        <div class="card-body" style="margin-top: 20px">
          <form action="<?=url('admin/home-control/'.$slug.'/save')?>" method="post">
            <!-- Table with stripped rows -->
            <table id="simpletable" class="table table-striped table-bordered nowrap">
              <thead>
                <tr>
                  <th scope="col">Select</th>
                  <th scope="col">#</th>                  
                  <th scope="col">Title</th>
                  <th scope="col">Author</th>
                  <th scope="col">Date of publication</th>                
                </tr>
              </thead>
              <tbody>
                <?php if($rows){ $sl=1; foreach($rows as $row){?>
                  <tr>
                    <td>
                      <input type='checkbox' name='draw[]' value="<?php echo $row->id ?>" class="row-checkbox" onclick="limitCheckboxes(this)"                       
                      <?php  
                      if($slug == 'Gallery'){
                        echo $row->is_gallery == 1 ? 'checked' : '';
                      } elseif($slug == 'Featured'){
                        echo $row->is_feature == 1 ? 'checked' : '';
                      } elseif($slug == 'Projects'){
                        echo $row->is_home_projects == 1 ? 'checked' : '';
                      } elseif($slug == 'Interviews'){
                        echo $row->is_home_interviews == 1 ? 'checked' : '';
                      } elseif($slug == 'Webinars'){
                        echo $row->is_home_webinars == 1 ? 'checked' : '';
                      } elseif($slug == 'Video Content'){
                        echo $row->is_home_video == 1 ? 'checked' : '';
                      } elseif($slug == 'Explore Projects'){
                        echo $row->is_explore_projects == 1 ? 'checked' : '';
                      }  ?>
                      >
                    </td>
                    <th scope="row"><?=$sl++?></th>
                    <td><?=$row->new_title?></td>
                    <td><?=$row->author_name?></td>                  
                    <td><?=date_format(date_create($row->created_at), "M d, Y h:i A")?></td>                  
                  </tr>
                <?php } }?>
              </tbody>
              <!-- End Table with stripped rows -->
              <div id="selected-draws"></div>
              <button type="submit" class="btn btn-primary mt-3">Save Selected</button>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <script>
function limitCheckboxes(clickedCheckbox) {
    const checkboxes = document.querySelectorAll('.row-checkbox');
    const maxChecked = 5;

    let checkedCount = 0;
    checkboxes.forEach(cb => {
        if (cb.checked) checkedCount++;
    });

    if (checkedCount > maxChecked) {
        clickedCheckbox.checked = false;
        alert("You can select a maximum of 5 rows only.");
    }
}
</script> -->
<script>
let selectedIds = new Set();

function limitCheckboxes(checkbox) {
    const id = checkbox.value;

    if (checkbox.checked) {
        if (selectedIds.size >= 5) {
            checkbox.checked = false;
            alert("You can select a maximum of 5 rows only.");
        } else {
            selectedIds.add(id);
        }
    } else {
        selectedIds.delete(id);
    }

    updateHiddenInputs();
}

function updateHiddenInputs() {
    const container = document.getElementById('selected-draws');
    container.innerHTML = ''; // Clear previous inputs

    selectedIds.forEach(id => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'draw[]';
        input.value = id;
        container.appendChild(input);
    });
}

// When page loads, pre-fill selectedIds from checked boxes (e.g. from server)
window.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.row-checkbox:checked').forEach(cb => {
        selectedIds.add(cb.value);
    });
    updateHiddenInputs();
});
</script>
