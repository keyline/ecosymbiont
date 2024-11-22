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
                  <th scope="col">#</th>
                  <th scope="col">SRN</th>
                  <th scope="col">Author Info</th>                  
                  <th scope="col">Creative-Work Info</th>                  
                  <th scope="col">Submitted At</th>                  
                  <th scope="col">Published Status</th>                  
                  <th scope="col">Published Action</th>                  
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($rows)>0)
                { $sl=1; foreach($rows as $row)
                  { ?>
                      <tr>
                        <th scope="row"><?=$sl++?></th>
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
                              echo "<h6>Final Edited & Checked</h6>";
                          } elseif($row->is_published == 2){
                              echo "<h6>NELP Form Generated & Shared</h6>";
                          } elseif($row->is_published == 3){
                              echo "<h6>Scan Copy Uploaded</h6>";
                          } elseif($row->is_published == 4){
                              echo "<h6>Approved</h6>";
                          } elseif($row->is_published == 5){
                              echo "<h6>Rejected</h6>";
                          }
                          ?>
                        </td>
                        <td>
                          <?php if ($row->is_published == 3) { ?>
                            <a href="<?=url('admin/' . $controllerRoute . '/change_status_accept/'.Helper::encoded($row->id))?>" class="btn btn-success btn-sm" title="Accept <?=$module['title']?>"><i class="fa fa-check"></i> Accept</a>
                            <a href="<?=url('admin/' . $controllerRoute . '/change_status_reject/'.Helper::encoded($row->id))?>" class="btn btn-danger btn-sm" title="Reject <?=$module['title']?>"><i class="fa fa-times"></i> Reject</a>
                        <?php } elseif($row->is_published == 4){?>
                            <a href="<?=url('admin/' . $controllerRoute . '/change_status_reject/'.Helper::encoded($row->id))?>" class="btn btn-danger btn-sm" title="Reject <?=$module['title']?>"><i class="fa fa-times"></i> Reject</a>
                        <?php }?>
                          
                        </td>
                        <td>                      
                          <a href="<?=url('admin/' . $controllerRoute . '/view_details/'.Helper::encoded($row->id))?>" class="btn btn-outline-primary btn-sm" title="ViewDetails <?=$module['title']?>">View Details</a>
                          <?php if ($row->is_import == 0) { ?>
                          <a href="<?=url('admin/news_content/import/'.Helper::encoded($row->id))?>" class="btn btn-outline-primary btn-sm" title="ViewDetails <?=$module['title']?>">Import to News Content</a>
                          <?php } ?>                     
                        </td>
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
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>