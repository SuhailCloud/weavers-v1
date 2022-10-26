<?php
    $productUpSells = $product->up_sells()->get();
?>

<?php if($productUpSells->count()): ?>
    <card-list-header
        heading="<?php echo e(__('shop::app.products.up-sell-title')); ?>"
        view-all="false"
        row-class="pt20"
    ></card-list-header>

    <div class="carousel-products vc-full-screen">
        <carousel-component
            slides-per-page="6"
            navigation-enabled="hide"
            pagination-enabled="hide"
            id="upsell-products-carousel"
            :slides-count="<?php echo e(sizeof($productUpSells)); ?>">

            <?php $__currentLoopData = $productUpSells; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $upSellProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <slide slot="slide-<?php echo e($index); ?>">
                    <?php echo $__env->make('shop::products.list.card', [
                        'product' => $upSellProduct,
                        'addToCartBtnClass' => 'small-padding',
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </slide>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </carousel-component>
    </div>

    <div class="carousel-products vc-small-screen">
        <carousel-component
            :slides-count="<?php echo e(sizeof($productUpSells)); ?>"
            slides-per-page="2"
            id="upsell-products-carousel"
            navigation-enabled="hide"
            pagination-enabled="hide">

            <?php $__currentLoopData = $productUpSells; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $upSellProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <slide slot="slide-<?php echo e($index); ?>">
                    <?php echo $__env->make('shop::products.list.card', [
                        'product' => $upSellProduct,
                        'addToCartBtnClass' => 'small-padding',
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </slide>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </carousel-component>
    </div>
<?php endif; ?><?php /**PATH C:\wamp64\www\weavers-v1/resources/themes/velocity/views/products/view/up-sells.blade.php ENDPATH**/ ?>