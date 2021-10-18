<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.promotions.cart-rules.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.promotions.cart-rules.title')); ?></h1>
            </div>

            <div class="page-action">
                <a href="<?php echo e(route('admin.cart-rules.create')); ?>" class="btn btn-lg btn-primary">
                    <?php echo e(__('admin::app.promotions.cart-rules.add-title')); ?>

                </a>
            </div>
        </div>

        <div class="page-content">
            <?php $cartRuleGrid = app('Webkul\Admin\DataGrids\CartRuleDataGrid'); ?>
            <?php echo $cartRuleGrid->render(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\weavers-v1\vendor\bagisto\bagisto\packages\Webkul\Admin\src\Providers/../Resources/views/promotions/cart-rules/index.blade.php ENDPATH**/ ?>