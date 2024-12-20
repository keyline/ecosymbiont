<!-- Content -->
  <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col">
          <h1 class="page-header-title"><?=$page_header?></h1>
        </div>
        <!-- End Col -->
        <!-- <div class="col-auto">
          <a class="btn btn-primary" href="javascript:;" data-bs-toggle="modal" data-bs-target="#inviteUserModal">
            <i class="bi-person-plus-fill me-1"></i> Invite users
          </a>
        </div> -->
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- End Page Header -->
    <!-- Stats -->
    <div class="row">
      <div class="col-sm-12 col-lg-6 mb-3 mb-lg-5">
        <!-- Card -->
        <a class="card card-hover-shadow h-100" href="<?=url('admin/readers/list')?>">
          <div class="card-body">
            <h6 class="card-subtitle">Readers</h6>
            <div class="row align-items-center gx-2 mb-1">
              <div class="col-12">
                <h2 class="card-title text-inherit"><?=$readers?></h2>
              </div>
            </div>
            <!-- End Row -->
            <!-- <span class="badge bg-soft-success text-success">
              <i class="bi-graph-up"></i> 12.5%
            </span>
            <span class="text-body fs-6 ms-1">from 70,104</span> -->
          </div>
        </a>
        <!-- End Card -->
      </div>
      <div class="col-sm-12 col-lg-6 mb-3 mb-lg-5">
        <!-- Card -->
        <a class="card card-hover-shadow h-100" href="<?=url('admin/content_creaters/list')?>">
          <div class="card-body">
            <h6 class="card-subtitle">Content Creators</h6>
            <div class="row align-items-center gx-2 mb-1">
              <div class="col-6">
                <h2 class="card-title text-inherit"><?=$content_creators?></h2>
              </div>
            </div>
            <!-- End Row -->
            <!-- <span class="badge bg-soft-success text-success">
              <i class="bi-graph-up"></i> 1.7%
            </span>
            <span class="text-body fs-6 ms-1">from 29.1%</span> -->
          </div>
        </a>
        <!-- End Card -->
      </div>

      <div class="col-sm-12 col-lg-4 mb-3 mb-lg-5">
        <!-- Card -->
        <a class="card card-hover-shadow h-100" href="<?= url('admin/article/list') ?>">
          <div class="card-body">
            <h6 class="card-subtitle">Creative-Work Submitted</h6>
            <div class="row align-items-center gx-2 mb-1">
              <div class="col-6">
                <h2 class="card-title text-inherit"><?=$submitted?></h2>
              </div>
            </div>
            <!-- End Row -->
            <!-- <span class="badge bg-soft-success text-success">
              <i class="bi-graph-up"></i> 1.7%
            </span>
            <span class="text-body fs-6 ms-1">from 29.1%</span> -->
          </div>
        </a>
        <!-- End Card -->
      </div>
      <div class="col-sm-12 col-lg-4 mb-3 mb-lg-5">
        <!-- Card -->
        <a class="card card-hover-shadow h-100" href="<?= url('admin/article/list') ?>">
          <div class="card-body">
            <h6 class="card-subtitle">Final Editing & Checking</h6>
            <div class="row align-items-center gx-2 mb-1">
              <div class="col-6">
                <h2 class="card-title text-inherit"><?=$final_edited?></h2>
              </div>
            </div>
            <!-- End Row -->
            <!-- <span class="badge bg-soft-success text-success">
              <i class="bi-graph-up"></i> 1.7%
            </span>
            <span class="text-body fs-6 ms-1">from 29.1%</span> -->
          </div>
        </a>
        <!-- End Card -->
      </div>
      <!-- <div class="col-sm-12 col-lg-4 mb-3 mb-lg-5">
         Card 
        <a class="card card-hover-shadow h-100" href="<?= url('admin/article/list') ?>">
          <div class="card-body">
            <h6 class="card-subtitle">NELP Form Generated & Shared</h6>
            <div class="row align-items-center gx-2 mb-1">
              <div class="col-6">
                <h2 class="card-title text-inherit"><?=$nelp_generated?></h2>
              </div>
            </div>
             End Row -->
            <!-- <span class="badge bg-soft-success text-success">
              <i class="bi-graph-up"></i> 1.7%
            </span>
            <span class="text-body fs-6 ms-1">from 29.1%</span> -->
          </div>
        </a>
        <!-- End Card
      </div> -->
      <!-- <div class="col-sm-12 col-lg-4 mb-3 mb-lg-5">
         Card 
        <a class="card card-hover-shadow h-100" href="<?= url('admin/article/list') ?>">
          <div class="card-body">
            <h6 class="card-subtitle">Scan Copy Uploaded</h6>
            <div class="row align-items-center gx-2 mb-1">
              <div class="col-6">
                <h2 class="card-title text-inherit"><?=$scan_copy_uploaded?></h2>
              </div>
            </div>
            End Row -->
            <!-- <span class="badge bg-soft-success text-success">
              <i class="bi-graph-up"></i> 1.7%
            </span>
            <span class="text-body fs-6 ms-1">from 29.1%</span> -->
          </div>
        </a>
        <!-- End Card 
      </div> -->
      <div class="col-sm-12 col-lg-4 mb-3 mb-lg-5">
        <!-- Card -->
        <a class="card card-hover-shadow h-100" href="<?= url('admin/article/list') ?>">
          <div class="card-body">
            <h6 class="card-subtitle">Approved & Published</h6>
            <div class="row align-items-center gx-2 mb-1">
              <div class="col-6">
                <h2 class="card-title text-inherit"><?=$approved?></h2>
              </div>
            </div>
            <!-- End Row -->
            <!-- <span class="badge bg-soft-success text-success">
              <i class="bi-graph-up"></i> 1.7%
            </span>
            <span class="text-body fs-6 ms-1">from 29.1%</span> -->
          </div>
        </a>
        <!-- End Card -->
      </div>
      <div class="col-sm-12 col-lg-4 mb-3 mb-lg-5">
        <!-- Card -->
        <a class="card card-hover-shadow h-100" href="<?=url('admin/news_content/list')?>">
          <div class="card-body">
            <h6 class="card-subtitle">News Content</h6>
            <div class="row align-items-center gx-2 mb-1">
              <div class="col-6">
                <h2 class="card-title text-inherit"><?=$news_content?></h2>
              </div>
            </div>
            <!-- End Row -->
            <!-- <span class="badge bg-soft-success text-success">
              <i class="bi-graph-up"></i> 1.7%
            </span>
            <span class="text-body fs-6 ms-1">from 29.1%</span> -->
          </div>
        </a>
        <!-- End Card -->
      </div>

    </div>
    <!-- End Stats -->
  </div>
<!-- End Content -->