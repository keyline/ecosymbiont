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
            
          </h5>
          <div class="dt-responsive table-responsive">
            <table id="simpletable" class="table table-striped table-bordered nowrap">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Donation Number</th>
                  <th scope="col">Donor Info</th>
                  <th scope="col">Payment Info</th>
                  <th scope="col">Donation Date</th>
                  <th scope="col">Receipt</th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($rows)>0){ $sl=1; foreach($rows as $row){?>
                  <tr>
                    <th scope="row"><?=$sl++?></th>
                    <td><?=$row->donation_number?></td>
                    <td>
                      <i class="fa fa-user"></i>&nbsp;<?=$row->first_name. ' '. $row->last_name?><br>
                      <i class="fa fa-envelope"></i>&nbsp;<?=$row->email?><br>
                      <i class="fa fa-map-marker"></i>&nbsp;<?=$row->address?><br>
                      <i class="fa fa-flag"></i>&nbsp;<?=$row->country_name?><br>
                    </td>
                    <td>
                      <?=$row->payment_mode?><br>
                      $<?=number_format($row->payment_amount,2)?><br>
                      <?=$row->txn_id?><br>
                      <span class="badge <?=(($row->payment_status)?'bg-success':'bg-danger')?>"><?=(($row->payment_status)?'PAID':'UNPAID')?></span>
                      <br>
                    </td>                   
                    <td><?=date_format(date_create($row->payment_timestamp), "d M, Y h:i A")?></td>
                    <td><a href="<?=$row->payment_receipt?>" target="_blank" class="badge bg-info"><i class="fa fa-eye"></i>&nbsp;View Receipt</td>
                  </tr>
                <?php } } else {?>
                  <tr>
                    <td colspan="6" style="text-align: center;color: red;">No Records Found !!!</td>
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