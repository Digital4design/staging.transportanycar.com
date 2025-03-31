<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8" />
    <title>  <?php echo e(isset($title)?print_title($title).' | ':''); ?><?php echo e(print_title(site_name)); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="<?php echo e(isset($title)?print_title($title).' | ':''); ?><?php echo e(print_title(site_name)); ?>" name="description" />
    <meta content="<?php echo e(isset($title)?print_title($title).' | ':''); ?><?php echo e(print_title(site_name)); ?>" name="author" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- App favicon -->
    <link href="<?php echo e(Favicon); ?>" rel="icon" type="image/x-icon">
    
    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<?php $__env->startSection('body'); ?>
    <body data-sidebar="dark">
    <div class="loading" id="loader_display_d" style="z-index: 9999;">Loading&#8230;</div>
<?php echo $__env->yieldSection(); ?>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php echo $__env->make('layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    
    <!-- /Right-bar -->
    
    <!-- JAVASCRIPT -->
    
    <?php echo $__env->make('layouts.vendor-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- add Modal -->
    
<div class="modal fade  bs-example-modal-center_cust1 general_modal" id="general_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="general_modal_heading">Heading</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body general_modal_content">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-pill btn-primary waves-effect waves-light  general_modal_submit_btn">Submit</button>
                <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade  general_modal_second" id="general_modal_second" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="general_modal_heading_second">Heading</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body general_modal_content_second">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-pill btn-primary waves-effect waves-light  general_modal_submit_btn_second">Submit</button>
                <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>
    
</body>

</html>
<?php /**PATH D:\Laravelproject\transport\staging.transportanycar.com\resources\views/layouts/master.blade.php ENDPATH**/ ?>