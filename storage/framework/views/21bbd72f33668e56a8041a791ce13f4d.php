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
	                        <p>Approved Creative-Works</p>
	                    </div>
                	</div>
            	</a>
            </div>
            <div class="col-md-6">
                <a href="<?=url('user/my-articles')?>">
	                <div class="card">
	                    <div class="card-body text-center">
	                    	<h3><?=$pending_articles?></h3>
	                        <p>Waiting For Approved Creative-Works</p>
	                    </div>
	                </div>
            	</a>
            </div>
        </div>
        <!-- End single-post box -->
    </div>
<!-- End block content --><?php /**PATH G:\xampp8.2\htdocs\ecosymbiont\resources\views/front/pages/user/dashboard.blade.php ENDPATH**/ ?>