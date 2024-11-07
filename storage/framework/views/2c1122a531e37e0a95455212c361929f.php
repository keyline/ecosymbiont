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
        <a class="card card-hover-shadow h-100" href="<?=url('admin/notice/list')?>">
          <div class="card-body">
            <h6 class="card-subtitle">Total Current Journals</h6>
            <div class="row align-items-center gx-2 mb-1">
              <div class="col-12">
                <h2 class="card-title text-inherit"><?=$current_journal_count?></h2>
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
        <a class="card card-hover-shadow h-100" href="<?=url('admin/notice/list')?>">
          <div class="card-body">
            <h6 class="card-subtitle">Total Archieve Journals</h6>
            <div class="row align-items-center gx-2 mb-1">
              <div class="col-6">
                <h2 class="card-title text-inherit"><?=$archieve_journal_count?></h2>
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
        <a class="card card-hover-shadow h-100" href="<?=url('admin/manuscript/list')?>">
          <div class="card-body">
            <h6 class="card-subtitle">Total Pending Manuscripts</h6>
            <div class="row align-items-center gx-2 mb-1">
              <div class="col-6">
                <h2 class="card-title text-inherit"><?=$pending_manuscript_count?></h2>
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
        <a class="card card-hover-shadow h-100" href="<?=url('admin/manuscript/list')?>">
          <div class="card-body">
            <h6 class="card-subtitle">Total Active Manuscripts</h6>
            <div class="row align-items-center gx-2 mb-1">
              <div class="col-6">
                <h2 class="card-title text-inherit"><?=$active_manuscript_count?></h2>
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
        <a class="card card-hover-shadow h-100" href="<?=url('admin/manuscript/list')?>">
          <div class="card-body">
            <h6 class="card-subtitle">Total Reject Manuscripts</h6>
            <div class="row align-items-center gx-2 mb-1">
              <div class="col-6">
                <h2 class="card-title text-inherit"><?=$reject_manuscript_count?></h2>
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
<!-- End Content --><?php /**PATH /home/keyline1/public_html/dev/aliahjournal.keylines.net.in/resources/views/admin/maincontents/dashboard.blade.php ENDPATH**/ ?>