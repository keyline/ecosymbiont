<?php
use App\Helpers\Helper;
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
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($profiles){ $sl=1; foreach($profiles as $profile){?>
                                    <tr>
                                        <td><?=$sl++?></td>
                                        <td><?=$profile->name?></td>
                                        <td>
                                            <a href="<?=url('user/update-profile/' . Helper::encoded($profile->id))?>" class="label label-primary">Edit</a>
                                            <a href="<?=url('user/article-list/' . Helper::encoded($profile->id))?>" class="label label-primary">View Article List</a>
                                        </td>
                                    </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End single-post box -->
    </div>
<!-- End block content -->