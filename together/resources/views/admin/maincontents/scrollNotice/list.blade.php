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
                  <th scope="col">Name<br>Publish Info</th>
                  <th scope="col">Summary</th>
                  <th scope="col">Journal Date</th>
                  <!-- <th scope="col">Uploaded By</th> -->
                  <th scope="col">Journal File</th>
                  <th scope="col">Archieve</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($rows)>0){ $sl=1; foreach($rows as $row){?>
                  <tr>
                    <th scope="row"><?=$sl++?></th>
                    <td>
                      <?=$row->name?><br>
                      Publisher : <b><?=$row->publisher_name?></b><br>
                      ISSN No. : <b><?=$row->issn_no?></b><br>
                      Volume : <b><?=$row->volume?></b><br>
                      Issue : <b><?=$row->issue?></b>
                    </td>
                    <td><?=wordwrap($row->description,35,"<br>\n")?></td>
                    <td><?=date_format(date_create($row->notice_date), "M d, Y")?></td>
                    <!-- <td><?=$row->uploaded_by?></td> -->
                    <td>
                      <?php if($row->notice_file != ''){?>
                        <a href="<?=env('UPLOADS_URL').'notice/'.$row->notice_file?>" target="_blank" class="badge bg-primary"><i class="fa fa-info-circle"></i> View Notice</a>
                      <?php }?>
                    </td>
                    <td>
                      <?php if($row->is_archieve){?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-archieve-status/'.Helper::encoded($row->id))?>" class="btn btn-warning btn-sm" title="Move To Current <?=$module['title']?>">Move To Current</a>
                      <?php } else {?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-archieve-status/'.Helper::encoded($row->id))?>" class="btn btn-success btn-sm" title="Move To Archieve <?=$module['title']?>">Move To Archieve</a>
                      <?php }?>
                    </td>
                    <td>
                      <a href="<?=url('admin/' . $controllerRoute . '/edit/'.Helper::encoded($row->id))?>" class="btn btn-outline-primary btn-sm" title="Edit <?=$module['title']?>"><i class="fa fa-edit"></i></a>
                      <a href="<?=url('admin/' . $controllerRoute . '/delete/'.Helper::encoded($row->id))?>" class="btn btn-outline-danger btn-sm" title="Delete <?=$module['title']?>" onclick="return confirm('Do You Want To Delete This <?=$module['title']?>');"><i class="fa fa-trash"></i></a>
                      <?php if($row->status){?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-status/'.Helper::encoded($row->id))?>" class="btn btn-outline-success btn-sm" title="Activate <?=$module['title']?>"><i class="fa fa-check"></i></a>
                      <?php } else {?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-status/'.Helper::encoded($row->id))?>" class="btn btn-outline-warning btn-sm" title="Deactivate <?=$module['title']?>"><i class="fa fa-times"></i></a>
                      <?php }?>
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