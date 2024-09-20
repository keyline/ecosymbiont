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
                        <a href="<?=url('user/submit-new-article')?>" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Submit New Article</a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Article No.</td>
                                    <td>Title</td>
                                    <td>Published Status</td>
                                    <td>action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($articles){ $sl=1; foreach($articles as $article){?>
                                    <tr>
                                        <td><?=$sl++?></td>
                                        <td><?=$article->article_no?></td>
                                        <td>
                                            <h5><?=$article->article_no?></h5>
                                            <h6><?=$article->subtitle?></h6>
                                        </td>
                                        <td>
                                            <?php if($article->is_published){?>
                                                <span class="label label-success">Approved</span>
                                            <?php } else {?>
                                                <span class="label label-warning">Waiting For Approve</span>
                                            <?php }?>
                                        </td>
                                        <td>
                                            <?php if(!$article->is_published){?>
                                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <?php }?>
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