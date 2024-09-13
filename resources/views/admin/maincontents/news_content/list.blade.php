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
                  <th scope="col">Parent Category</th>                                   
                  <th scope="col">Sub category</th>                                   
                  <th scope="col">Title</th>                                   
                  <th scope="col">Sub Title</th>                                   
                  <th scope="col">Author Name</th>                                   
                  <th scope="col">Author Pronoun</th>                                   
                  <th scope="col">Author Affiliation</th>                                   
                  <th scope="col">Author Email</th>                                   
                  <th scope="col">Country</th>                                   
                  <th scope="col">Organization Name</th>                                   
                  <th scope="col">Long Description</th>                                   
                  <th scope="col">Is Feature</th>                                   
                  <th scope="col">Is Popular</th>                                                                                        
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($rows)>0){ $sl=1; foreach($rows as $row){?>
                  <tr>
                    <th scope="row"><?=$sl++?></th>
                    <td>
                      <?php
                        $parent_id = $row->parent_category;
                        $categories = DB::table('news_category')->where('id', '=', $parent_id)->get();
                        foreach($categories as $category){
                      ?>
                      <?=$category->sub_category?>
                      <?php } ?>
                    </td>                    
                    <td>
                    <?php
                        $sub_id = $row->sub_category;
                        $subcategories = DB::table('news_category')->where('id', '=', $sub_id)->get();
                        foreach($subcategories as $subcategory){
                      ?>
                      <?=$subcategory->sub_category?>
                    <?php } ?>
                  </td>   
                  <td><?=$row->new_title?></td>                 
                  <td><?=$row->sub_title?></td>                 
                  <td><?=$row->author_name?></td>                 
                  <td>
                  <?php
                        $pronoun_id = $row->author_pronoun;
                        $pronoun = DB::table('pronouns')->where('id', '=', $pronoun_id)->get();
                        foreach($pronoun as $pronouns){
                      ?>
                    <?=$pronouns->name?>
                    <?php } ?>
                  </td>                 
                  <td><?=$row->author_affiliation?></td>                 
                  <td><?=$row->author_email?></td>                 
                  <td>
                  <?php
                        $country_id = $row->country;
                        $country = DB::table('countries')->where('id', '=', $country_id)->get();
                        foreach($country as $countries){
                      ?>
                    <?=$countries->name?>
                    <?php } ?>
                  </td>                 
                  <td><?=$row->organization_name?></td>                 
                  <td><?=$row->long_desc?></td>                 
                  <td><?=$row->is_feature?></td>                 
                  <td><?=$row->is_popular?></td>                                                
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