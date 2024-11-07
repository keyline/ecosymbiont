<?php
	use App\Models\User;
?>
<div class="account_wrapper">
	<?=$sidebar;?>
	<div class="wrapper account_inner_section d-flex flex-column min-vh-100 bg-light">
		<header class="header header-sticky mb-4">
			<div class="container-fluid">
				<button class="header-toggler px-md-0 me-md-3 d-md-none" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
					<i class="fa-solid fa-bars"></i>
				</button>
				<h4 class="pagestitle-item mb-0">Survey List</h4>
				<ul class="header-nav ms-auto"></ul>
			</div>
		</header>
		<div class="col-xl-12">
		<?php if(session('success_message')): ?>
			<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show autohide" role="alert">
			<?php echo e(session('success_message')); ?>

			<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endif; ?>
		<?php if(session('error_message')): ?>
			<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show autohide" role="alert">
			<?php echo e(session('error_message')); ?>

			<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endif; ?>
		</div>
		<div class="body flex-grow-1 px-3">
			<div class="container-lg">
				<div class="row">
					<div class="col-sm-12 col-lg-12">
						
						<div class="card mb-4 text-white bg-whitebg">
							<div class="card-body profile_cardbody">
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th class="col-md-1">#</th>
												<th class="col-md-2">Title</th>
												<th class="col-md-6">Description</th>
												<th class="col-md-2">No Of Questions</th>
												<th class="col-md-4">Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>Test</td>
												<td>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</td>
												<td>10</td>
												<td>
													<a href="<?=url('user/survey-details')?>" class="btn_orgfill uppercase"> View</a>
												</td>
											</tr>
											<tr>
												<td>1</td>
												<td>Test</td>
												<td>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</td>
												<td>10</td>
												<td>
													<a href="<?=url('user/survey-details')?>" class="btn_orgfill uppercase">View</a>
												</td>
											</tr>
											<tr>
												<td>1</td>
												<td>Test</td>
												<td>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</td>
												<td>10</td>
												<td>
													<a href="<?=url('user/survey-details')?>" class="btn_orgfill uppercase"> VIEW</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php /**PATH E:\xampp8.2\htdocs\stumento\resources\views/front/dashboard/pages/survey-list.blade.php ENDPATH**/ ?>