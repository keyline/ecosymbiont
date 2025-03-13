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
                  <th scope="col">#</th>
                  <th scope="col">SRN<br>DOI<br>Parent Category<br>Sub Category</th>
                  <th scope="col">Title<br>Sub Title</th>
                  <th scope="col">Author Name<br>Pronoun<br>Affiliation<br>Email<br>Country<br>Organization</th>
                  <!-- <th scope="col">Keywords</th> -->
                  <th scope="col">Is Feature</th>
                  <th scope="col">Is Popular</th>
                  <th scope="col">Is Fiction</th>
                  <th scope="col">Is Series</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($rows)>0){ $sl=1; foreach($rows as $row){?>
                  <tr>
                    <th scope="row"><?=$sl++?></th>
                    <td>
                      <?=$row->creative_work_SRN?><br>
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
                      <?=wordwrap($row->new_title, 20, "<br>\n");?><br><hr><br>
                      <?=wordwrap($row->sub_title, 20, "<br>\n");?>
                    </td>
                    <td>
                      <?=$row->author_name?><br>
                      <?php
                        $pronoun_id = $row->author_pronoun;
                        $pronoun = DB::table('pronouns')->where('id', '=', $pronoun_id)->get();
                        foreach($pronoun as $pronouns){
                      ?>
                        <?=$pronouns->name?>
                      <?php } ?><br>
                      <?php
                      $author_affiliation = json_decode($row->author_affiliation);
                      $affiliations = [];
                      if(!empty($author_affiliation)){
                        for($k=0;$k<count($author_affiliation);$k++){
                          $getAffiliation = EcosystemAffiliation::select('name')->where('id', '=', $author_affiliation[$k])->first();
                          $affiliations[] = (($getAffiliation)?$getAffiliation->name:'');
                        }
                      }
                      echo implode(', ', $affiliations);
                      ?>
                      <br>
                      <?=$row->author_email?><br>
                      <?php
                        $country_id = $row->country;
                        $country = DB::table('countries')->where('id', '=', $country_id)->get();
                        foreach($country as $countries){
                      ?>
                        <?=$countries->name?>
                      <?php } ?><br>
                      <?=$row->organization_name?>
                    </td>
                    <!-- <td>
                      <?php
                      if($row->keywords != ''){
                          $deal_keywords = explode(",", $row->keywords);
                          if(!empty($deal_keywords)){
                          for($k=0;$k<count($deal_keywords);$k++){
                      ?>
                          <span class="badge"><?=$deal_keywords[$k]?> <span class="remove" data-tag="<?=$deal_keywords[$k]?>">&times;</span></span>
                      <?php } }
                      }
                      ?>
                    </td> -->
                    <td><span class="<?=(($row->is_feature)?'badge bg-success':'badge bg-danger')?>"><?=(($row->is_feature)?'<i class="fa fa-check"></i> YES':'<i class="fa fa-times"></i> NO')?></span></td>                 
                    <td><span class="<?=(($row->is_popular)?'badge bg-success':'badge bg-danger')?>"><?=(($row->is_popular)?'<i class="fa fa-check"></i> YES':'<i class="fa fa-times"></i> NO')?></span></td>
                    <td><span class="<?=(($row->creative_Work_fiction == 'Yes')?'badge bg-success':'badge bg-danger')?>"><?=(($row->creative_Work_fiction == 'Yes')?'<i class="fa fa-check"></i> YES':'<i class="fa fa-times"></i> NO')?></span></td>
                    <td><span class="<?=(($row->is_series)?'badge bg-success':'badge bg-danger')?>"><?=(($row->is_series)?'<i class="fa fa-check"></i> YES':'<i class="fa fa-times"></i> NO')?></span></td>
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
                    <td colspan="7" style="text-align: center;color: red;">No Records Found !!!</td>
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