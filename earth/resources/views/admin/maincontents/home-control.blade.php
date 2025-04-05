<?php
use App\Helpers\Helper;
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
            <table id="simpletable" class="table table-striped table-bordered nowrap">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Gallery</th>
                  <th scope="col">Featured</th>
                  <th scope="col">Projects</th>
                  <th scope="col">Interviews</th>
                  <th scope="col">Webinars</th>
                  <th scope="col">Video Content</th>
                  <th scope="col">Explore Projects</th>
                </tr>
              </thead>
              <tbody>
                
                  <tr>
                  <?php if($gallery){ $sl=1; foreach($gallery as $gallery1){?>
                    <th scope="row"><?=$sl++?></th>
                    <td><?=$gallery1->new_title?></td> 
                    <?php } } if($featured){ foreach($featured as $featured1){ ?>                   
                    <td><?=$featured1->new_title?></td>   
                    <?php } } if($projects){ foreach($projects as $projects1){?>                 
                    <td><?=$projects1->new_title?></td>  
                    <?php } } if($interviews){  foreach($interviews as $interviews1){?>                  
                    <td><?=$interviews1->new_title?></td>  
                    <?php } } if($webinars){  foreach($webinars as $webinars1){?>                  
                    <td><?=$webinars1->new_title?></td>  
                    <?php } } if($video_content){  foreach($video_content as $video_content1){?>                  
                    <td><?=$video_content1->new_title?></td>   
                    <?php } } if($explore_projects){  foreach($explore_projects as $explore_projects1){?>
                    <td><?=$explore_projects1->new_title?></td>                      
                    <?php } } ?>               
                    <!-- <td>
                      <a class="btn btn-info btn-sm" href="?=url('admin/email-logs/details/'.Helper::encoded($row->id))?>"><i class="fa fa-eye"></i> Details</a>
                    </td> -->
                  </tr>                
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>