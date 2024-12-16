<?php
use App\Helpers\Helper;
use App\Models\EcosystemAffiliation;
use App\Models\ExpertiseArea;
use Illuminate\Support\Facades\DB;

?>
<!-- block content -->
    <div class="block-content">
        <!-- single-post box -->
        <div class="row">
            <div class="col-xl-12">
                @if(session('success_message'))
                    <div class="alert alert-success bg-success text-dark border-0 alert-dismissible show autohide" role="alert">
                        {{ session('success_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                @if(session('error_message'))
                    <div class="alert alert-danger bg-danger text-dark border-0 alert-dismissible show autohide" role="alert">
                        {{ session('error_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php if(count($profiles) <= 0){?>
                            <a href="<?=url('user/add-profile')?>" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add New Profile</a>
                        <?php }?>
                        <div class="table-responsive">                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Author Classification</th>
                                    <th>Country <br> State <br> City</th>
                                    <th>Organization Name</th>
                                    <th>Organization Website</th>
                                    <th>Ecosystem Affiliation</th>
                                    <th>Indigenous Affiliation</th>
                                    <th>Expertise Area</th>
                                    <th>Short Bio</th>
                                    <th>Long Bio</th>
                                    <th>Created at</th>                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($profiles){ $sl=1; foreach($profiles as $profile){?>
                                    <tr>
                                        <td><?=$sl++?></td>
                                        <td><?=$profile->first_name?></td>
                                        <td><?=$profile->email?></td>
                                        <td><?=$profile->author_classification?></td>
                                        <td>
                                        <?php                                        
                                        $getCountry = DB::table('countries')->where('id', '=', $profile->country)->first();    
                                        echo $getCountry->name?><br><?=$profile->state?> <br> <?=$profile->city?></td>
                                        <td><?=$profile->organization_name?></td>
                                        <td><?=$profile->organization_website?></td>
                                        <td><?php
                                        $ecosystem_affiliationId = json_decode($profile->ecosystem_affiliationId);
                                        $ecosystem = [];
                                        if(!empty($ecosystem_affiliationId)){
                                            for($k=0;$k<count($ecosystem_affiliationId);$k++){
                                            $getAffiliation = EcosystemAffiliation::select('name')->where('id', '=', $ecosystem_affiliationId[$k])->first();
                                            $ecosystem[] = (($getAffiliation)?$getAffiliation->name:'');
                                            }
                                        }
                                        echo implode(', ', $ecosystem);
                                        ?></td>
                                        <td><?=$profile->indigenous_affiliation?></td>
                                        <td><?php
                                        $expertise_areaId = json_decode($profile->expertise_areaId);
                                        $expertise = [];
                                        if(!empty($expertise_areaId)){
                                            for($k=0;$k<count($expertise_areaId);$k++){
                                            $getAffiliation = ExpertiseArea::select('name')->where('id', '=', $expertise_areaId[$k])->first();
                                            $expertise[] = (($getAffiliation)?$getAffiliation->name:'');
                                            }
                                        }
                                        echo implode(', ', $expertise);
                                        ?></td>
                                        <td><?=$profile->bio_short?></td>
                                        <td><?=$profile->bio_long?></td>
                                        <td><?=$profile->created_at?></td>                                        
                                        <td>
                                            <a href="<?=url('user/update-profile/' . Helper::encoded($profile->id))?>" class="label label-primary">Edit</a>
                                            <!-- <a href="<?=url('user/article-list/' . Helper::encoded($profile->id))?>" class="label label-primary">View Article List</a> -->
                                        </td>
                                    </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End single-post box -->
    </div>
<!-- End block content -->