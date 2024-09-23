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
                                    <th>#</th>
                                    <th>SRN</th>
                                    <th>Title</th>
                                    <th>Submitted At</th>
                                    <th>NELP</th>
                                    <th>NELP Scan Copy</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($articles){ $sl=1; foreach($articles as $article){?>
                                    <tr>
                                        <td><?=$sl++?></td>
                                        <td><?=$article->article_no?></td>
                                        <td><?=$article->creative_Work?></td>
                                        <td><?=date_format(date_create($article->created_at), "d-m-Y")?></td>
                                        <td>
                                            <?php if($article->nelp_form_pdf){?>
                                                <a href="<?=env('UPLOADS_URL').'article/'.$article->nelp_form_pdf?>" target="_blank" class="label label-primary">View File</a>
                                            <?php }?>
                                        </td>
                                        <td>
                                            <?php if($article->nelp_form_scan_copy){?>
                                                <a href="<?=env('UPLOADS_URL').'article/'.$article->nelp_form_scan_copy?>" target="_blank" class="label label-primary">View File</a>
                                            <?php } else {?>
                                                <?php if($article->is_published == 2){?>
                                                    <form method="POST" action="" enctype="multipart/form-data" style="border: 1px solid #00000057;padding: 10px;border-radius: 10px;margin-bottom: 10px;margin-top: 10px;">
                                                        @csrf
                                                        <input type="hidden" name="article_id" value="<?=$article->id?>">
                                                        <small>Upload Scan Copy Of NELP Form With Date & Signature</small>
                                                        <input type="file" name="nelp_form_scan_copy" class="form-control" id="nelp_form_scan_copy" required>
                                                        <small class="text-info">* Only PDF files are allowed</small><br>
                                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Upload</button>
                                                    </form>
                                                <?php } ?>
                                            <?php }?>
                                        </td>
                                        <td>
                                            <?php
                                            if($article->is_published == 0){
                                                echo "<h6>Submitted</h6>";
                                            } elseif($article->is_published == 1){
                                                echo "<h6>Final Edited & Checked</h6>";
                                            } elseif($article->is_published == 2){
                                                echo "<h6>NELP Form Generated & Shared</h6>";
                                            } elseif($article->is_published == 3){
                                                echo "<h6>Scan Copy Uploaded</h6>";
                                            } elseif($article->is_published == 4){
                                                echo "<h6>Approved</h6>";
                                            } elseif($article->is_published == 5){
                                                echo "<h6>Rejected</h6>";
                                            }
                                            ?>
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