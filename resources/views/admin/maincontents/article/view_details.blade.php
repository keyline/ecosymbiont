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
          <ul class="nav nav-tabs nav-tabs-bordered">
            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab1">Article Details</button>
            </li>            
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab2">Pdf Copy</button>
            </li>            
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab3">Scan Copy</button>
            </li>                               
          </ul> 
          <div class="tab-content pt-2">     
            <div class="tab-pane fade show active" id="tab1">
              <table id="simpletable" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th scope="col">#</th>                  
                    <th scope="col">Author Info</th>                  
                    <th scope="col">Article Info</th>                  
                    <th scope="col">From Where</th>                  
                    <th scope="col">Submitted Time</th>                  
                    <th scope="col">Published Status</th>                  
                    <th scope="col">Published Action</th>                  
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(count($rows)>0){ $sl=1; foreach($rows as $row){?>
                    <tr>
                      <th scope="row"><?=$sl++?></th>
                      <td>
                        <?=$row->first_name?> <?=$row->last_name?><br> <?=$row->email?></td>
                      <td>
                        <?=$row->creative_Work?><br>
                        <?=$row->subtitle?>
                      </td> 
                      <td>
                      <?php
                          $country_id = $row->country;
                          $country = DB::table('countries')->where('id', '=', $country_id)->get();
                          foreach($country as $countries){
                        ?>
                        <?=$countries->name?>
                        <?php } ?><br>
                        <?=$row->state?><br>
                        <?=$row->city?>
                      </td>                    
                      <td><?=date_format(date_create($row->created_at), "M d, Y")?></td>                                       
                      <td>
                        
                      </td>
                      <td>                      
                        
                      </td>
                      <td>                      
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
            <div class="tab-pane fade pt-3" id="tab2">
                <h4>Pdf Copy</h4>        
            </div>
            <div class="tab-pane fade pt-3" id="tab3">            
                <h4>Scan Copy</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>