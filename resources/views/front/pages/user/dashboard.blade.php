<!-- block content -->
    <div class="block-content">
        <!-- single-post box -->
        <h3><?=$page_header?></h3>
        <div class="row">
            <div class="col-md-6">
                <a href="<?=url('user/my-articles')?>">
                	<div class="card">
	                    <div class="card-body text-center">
	                    	<h3><?=$approved_articles?></h3>
	                        <p>Approved Articles</p>
	                    </div>
                	</div>
            	</a>
            </div>
            <div class="col-md-6">
                <a href="<?=url('user/my-articles')?>">
	                <div class="card">
	                    <div class="card-body text-center">
	                    	<h3><?=$pending_articles?></h3>
	                        <p>Waiting For Approve Articles</p>
	                    </div>
	                </div>
            	</a>
            </div>
        </div>
        <!-- End single-post box -->
    </div>
<!-- End block content -->