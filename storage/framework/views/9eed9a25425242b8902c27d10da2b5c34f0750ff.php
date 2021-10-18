<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.customers.subscribers.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.customers.subscribers.title')); ?></h1>
            </div>

            
        </div>

        <div class="page-content">
            <?php $subscribers = app('Webkul\Admin\DataGrids\NewsLetterDataGrid'); ?>
            <?php echo $subscribers->render(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suhailinfo/domains/suhail.info/public_html/vendor/bagisto/bagisto/packages/Webkul/Admin/src/Providers/../Resources/views/customers/subscribers/index.blade.php ENDPATH**/ ?>