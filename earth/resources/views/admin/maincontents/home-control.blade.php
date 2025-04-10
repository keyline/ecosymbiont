<?php
use App\Helpers\Helper;
use App\Models\NewsCategory;

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
          <div class="dt-responsive table-responsive">
            <?php 
            $max = max(
              count($gallery),
              count($featured),
              count($projects),
              count($interviews),
              count($webinars),
              count($video_content),
              count($explore_projects)
            );
            ?>
            <table id="simpletable" class="table table-striped table-bordered nowrap">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Gallery <a href="<?=url('admin/home-control/details/Gallery')?>" target="_blank"><i class="fa fa-eye"></i></a></th>
                  <th scope="col">Featured <a href="<?=url('admin/home-control/details/Featured')?>" target="_blank"><i class="fa fa-eye"></i></a></th>
                  <th scope="col">Projects <a href="<?=url('admin/home-control/details/Projects')?>" target="_blank"><i class="fa fa-eye"></i></a></th>
                  <th scope="col">Interviews <a href="<?=url('admin/home-control/details/Interviews')?>" target="_blank"><i class="fa fa-eye"></i></a></th>
                  <th scope="col">Webinars <a href="<?=url('admin/home-control/details/Webinars')?>" target="_blank"><i class="fa fa-eye"></i></a></th>
                  <th scope="col">Video Content <a href="<?=url('admin/home-control/details/Video Content')?>" target="_blank"><i class="fa fa-eye"></i></a></th>
                  <th scope="col">Explore Projects <a href="<?=url('admin/home-control/details/Explore Projects')?>" target="_blank"><i class="fa fa-eye"></i></a></th>
                </tr>
              </thead>            
              <tbody>
              <?php for ($i = 0; $i < $max; $i++) { ?>
                <tr>
                  <th scope="row"><?= $i + 1 ?></th>
                  <td><?= isset($gallery[$i]) ? wordwrap($gallery[$i]->new_title, 10, "<br>") : '-' ?><hr>
                  <?php
                    $categoryId = $gallery[$i]->parent_category;
                    $subcategoryId = $gallery[$i]->sub_category;
                    $categoryName = NewsCategory::where('id', $categoryId)->first();
                    $subcategoryName = NewsCategory::where('id', $subcategoryId)->first();
                    echo $categoryName->sub_category .'/'. $subcategoryName->sub_category;
                    if($gallery[$i]->projects_name != ''){                        
                    ?><hr>
                    <?= $gallery[$i]->projects_name; } ?>
                  </td>
                  <td><?= isset($featured[$i]) ? wordwrap($featured[$i]->new_title, 10, "<br>") : '-' ?></td>
                  <td><?= isset($projects[$i]) ? wordwrap($projects[$i]->new_title, 10, "<br>") : '-' ?></td>
                  <td><?= isset($interviews[$i]) ? wordwrap($interviews[$i]->new_title, 10, "<br>") : '-' ?></td>
                  <td><?= isset($webinars[$i]) ? wordwrap($webinars[$i]->new_title, 10, "<br>") : '-' ?></td>
                  <td><?= isset($video_content[$i]) ? wordwrap($video_content[$i]->new_title, 10, "<br>") : '-' ?></td>
                  <td><?= isset($explore_projects[$i]) ? wordwrap($explore_projects[$i]->new_title, 10, "<br>") : '-' ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>