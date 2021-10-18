<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.checkout.success.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <div class="container">
        <div class="order-success-content row col-12 offset-1">
            <h1 class="row col-12"><?php echo e(__('shop::app.checkout.success.thanks')); ?></h1>

            <p class="row col-12">
                <?php echo e(__('shop::app.checkout.success.order-id-info', ['order_id' => $order->increment_id])); ?>

            </p>

            <p class="row col-12">
                <?php echo e(__('shop::app.checkout.success.info')); ?>

            </p>

            <?php echo e(view_render_event('bagisto.shop.checkout.continue-shopping.before', ['order' => $order])); ?>


            <div class="mt15 row-col-12">
                <a href="<?php echo e(route('shop.home.index')); ?>" class="theme-btn remove-decoration">
                    <?php echo e(__('shop::app.checkout.cart.continue-shopping')); ?>

                </a>
            </div>

            <?php echo e(view_render_event('bagisto.shop.checkout.continue-shopping.after', ['order' => $order])); ?>


        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\weavers-v1/resources/themes/velocity/views/checkout/success.blade.php ENDPATH**/ ?>