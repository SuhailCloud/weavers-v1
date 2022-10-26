<?php $__env->startSection('content-wrapper'); ?>
    <div class="inner-section">
    
        <?php echo $__env->make('admin::layouts.nav-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="content-wrapper">

            <?php echo $__env->make('admin::layouts.tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->yieldContent('content'); ?>

        </div>
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\handloomlk\vendor\bagisto\bagisto\packages\Webkul\Admin\src\Providers/../Resources/views/layouts/content.blade.php ENDPATH**/ ?>