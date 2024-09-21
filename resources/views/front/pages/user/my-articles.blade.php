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
                                    <th>Title<br>Subtitle</th>
                                    <th>Status</th>
                                    <!-- <td>action</td> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($articles){ $sl=1; foreach($articles as $article){?>
                                    <tr>
                                        <td><?=$sl++?></td>
                                        <td><?=$article->article_no?></td>
                                        <td>
                                            <h5><?=$article->creative_Work?></h5>
                                            <h6><?=$article->subtitle?></h6>
                                        </td>
                                        <td>
                                            <h4>
                                            <?php
                                            if($article->is_published == 0){
                                                echo "Article Submitted";
                                            } elseif($article->is_published == 1){
                                                echo "Scan Copy Uploaded";
                                            } elseif($article->is_published == 2){
                                                echo "Approve";
                                            } elseif($article->is_published == 3){
                                                echo "Reject";
                                            }
                                            echo '</h4><hr>';
                                            if($article->is_published == 0){
                                            ?>
                                            <form method="POST" action="" enctype="multipart/form-data" oninput="validateForm()">
                                                @csrf
                                                <input type="hidden" name="article_id" value="<?=$article->id?>">
                                                <small>Upload Scan Copy Of NELP Form With Date & Signature</small>
                                                <input type="file" name="nelp_form_scan_copy" class="form-control" id="nelp_form_scan_copy" required>
                                                <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG files are allowed</small><br>
                                                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                            </form>
                                            <?php } ?>
                                        </td>
                                        <!-- <td>
                                            <?php if(!$article->is_published){?>
                                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <?php }?>
                                        </td> -->
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