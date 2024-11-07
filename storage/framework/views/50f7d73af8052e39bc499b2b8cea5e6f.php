<?php
use App\Models\GeneralSetting;
use App\Helpers\Helper;
$controllerRoute = $module['controller_route'];
?>
<style type="text/css">
    /* .choices__list--multiple .choices__item {
        background-color: #d81636;
        border: 1px solid #d81636;
    } */
</style>
<div class="pagetitle">
    <h1><?= $page_header ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= url('admin/dashboard') ?>">Home</a></li>

            <li class="breadcrumb-item active"><?= $page_header ?></li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section profile">
    <div class="row">
        <div class="col-xl-12">
            <?php if(session('success_message')): ?>
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show autohide"
                    role="alert">
                    <?php echo e(session('success_message')); ?>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if(session('error_message')): ?>
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show autohide"
                    role="alert">
                    <?php echo e(session('error_message')); ?>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body pt-3">
                    <form method="POST" action="<?php echo e(url('admin/scroll-notice/store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row mb-3">
                            <label for="description" class="col-md-2 col-lg-2 col-form-label">Content</label>
                            <div class="col-md-10 col-lg-10">
                                <textarea name="content" class="form-control" id="editor" rows="6"><?php echo e($row->content ?? ''); ?></textarea>

                                <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="form-text text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/tinymce@5.10.2/tinymce.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        tinymce.init({
            selector: '#editor',
            height: 300,
            menubar: false,
            plugins: 'advlist autolink lists link image charmap preview anchor textcolor',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    });
</script>
<?php /**PATH /home/keyline1/public_html/ecosymbiont.keylines.net.in/resources/views/admin/maincontents/scrollNotice/add-edit.blade.php ENDPATH**/ ?>