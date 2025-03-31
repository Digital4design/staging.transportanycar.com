
<?php


use Illuminate\Support\Facades\Route;

$currentPath =  \Request::route()->getName();

?>
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
           <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?php echo app('translator')->get('translation.Menu'); ?></li>
               
                <?php $__currentLoopData = admin_modules(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $have_child=count($value['child']);
                ?>
                <li class=<?php echo e(is_active_module($value['all_routes'])); ?>>
                    <?php

                    $link = $value['route'] ?? "javascript:;";
                    if( $have_child){
                        $link = "javascript:;";
                    }
                    ?>

                    <a href="<?php echo e($link); ?>" class="waves-effect <?php echo e($have_child?" has-arrow":""); ?>">
                        <i class="<?php echo e($value['icon']); ?>"></i>
                        <span key="t-projects"><?php echo e($value['name']); ?></span>
                    </a>
                    <?php if($have_child): ?>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php $__currentLoopData = $value['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li  class=<?php echo e(is_active_module($val['all_routes'])); ?>><a href="<?php echo e($val['route']); ?>" key="t-p-grid"><?php echo e($val['name']); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <?php endif; ?>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<?php /**PATH D:\Laravelproject\transport\staging.transportanycar.com\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>