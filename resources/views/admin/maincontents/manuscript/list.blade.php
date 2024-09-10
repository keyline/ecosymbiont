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
          <div class="dt-responsive table-responsive">
            <table id="simpletable" class="table table-striped table-bordered nowrap">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Author Info</th>
                  <th scope="col">Submite Date/Time</th>
                  <th scope="col">Manuscript File</th>
                  <th scope="col">Payment Receipt</th>
                  <th scope="col">Plagiarism Certificate</th>
                  <th scope="col">Status</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($rows)>0){ $sl=1; foreach($rows as $row){?>
                  <tr>
                    <th scope="row"><?=$sl++?></th>
                    <td>
                      Name : <b><?=$row->author_name?></b><br>
                      Designation : <b><?=$row->author_designation?></b><br>
                      Affiliation : <b><?=$row->author_affiliation?></b><br>
                      Email : <b><?=$row->author_email?></b><br>
                      Phone : <b><?=$row->author_phone?></b>
                    </td>
                    <td><?=date_format(date_create($row->created_at), "M d, Y h:i A")?></td>
                    <td>
                      <?php if($row->manuscript_file != ''){?>
                        <a href="<?=env('UPLOADS_URL').'manuscript/'.$row->manuscript_file?>" target="_blank" class="badge bg-info"><i class="fa fa-info-circle"></i> View File</a>
                      <?php }?>
                    </td>
                    <td>
                      <?php if($row->payment_receipt != ''){?>
                        <a href="<?=env('UPLOADS_URL').'manuscript/'.$row->payment_receipt?>" target="_blank" class="badge bg-info"><i class="fa fa-info-circle"></i> View File</a>
                      <?php }?>
                    </td>
                    <td>
                      <?php if($row->plagiarism_certificate != ''){?>
                        <a href="<?=env('UPLOADS_URL').'manuscript/'.$row->plagiarism_certificate?>" target="_blank" class="badge bg-info"><i class="fa fa-info-circle"></i> View File</a>
                      <?php }?>
                    </td>
                    <td>
                      <?php if($row->status == 0){?>
                        <span class="badge bg-warning">PENDING</span>
                      <?php } else if($row->status == 1){?>
                        <span class="badge bg-success">APPROVED</span>
                        <h5><small><?=date_format(date_create($row->approve_reject_timestamp), "M d, Y h:i A")?></small></h5>
                      <?php } else if($row->status == 2){?>
                        <span class="badge bg-danger">REJECTED</span>
                        <h5><small><?=date_format(date_create($row->approve_reject_timestamp), "M d, Y h:i A")?></small></h5>
                      <?php }?>
                    </td>
                    <td>
                      <?php if($row->status == 0){?>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-status/'.Helper::encoded($row->id).'/'.Helper::encoded(1))?>" class="btn btn-success btn-sm" title="Approve <?=$module['title']?>" onclick="return confirm('Do you want to approve this manuscript ?');"><i class="fa fa-check"></i> Click To Approve</a>
                        <a href="<?=url('admin/' . $controllerRoute . '/change-status/'.Helper::encoded($row->id).'/'.Helper::encoded(2))?>" class="btn btn-danger btn-sm" title="Reject <?=$module['title']?>" onclick="return confirm('Do you want to reject this manuscript ?');"><i class="fa fa-check"></i> Click To Reject</a>
                      <?php }?>
                      <?php if($row->status != 1){?>
                        <br><br>
                        <a href="<?=url('admin/' . $controllerRoute . '/delete/'.Helper::encoded($row->id))?>" class="btn btn-outline-danger btn-sm" title="Delete <?=$module['title']?>" onclick="return confirm('Do You Want To Delete This <?=$module['title']?>');"><i class="fa fa-trash"></i> Click To Delete</a>
                      <?php }?>
                    </td>
                  </tr>
                <?php } } else {?>
                  <tr>
                    <td colspan="8" style="text-align: center;color: red;">No Records Found !!!</td>
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