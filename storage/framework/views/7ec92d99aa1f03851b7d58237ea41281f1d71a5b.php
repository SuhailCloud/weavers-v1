<?php
    $relatedProducts = $product->related_products()->get();
?>

<?php if($relatedProducts->count()): ?>
    <card-list-header
        heading="<?php echo e(__('shop::app.products.related-product-title')); ?>"
        view-all="false"
        row-class="pt20"
    ></card-list-header>

    <div class="carousel-products vc-full-screen">
        <carousel-component
            slides-per-page="6"
            navigation-enabled="hide"
            pagination-enabled="hide"
            id="related-products-carousel"
            :slides-count="<?php echo e(sizeof($relatedProducts)); ?>">

            <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <slide slot="slide-<?php echo e($index); ?>">
                    <?php echo $__env->make('shop::products.list.card', [
                        'product' => $relatedProduct,
                        'addToCartBtnClass' => 'small-padding',
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </slide>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </carousel-component>
    </div>

    <div class="carousel-products vc-small-screen">
        <carousel-component
            :slides-count="<?php echo e(sizeof($relatedProducts)); ?>"
            slides-per-page="2"
            id="related-products-carousel"
            navigation-enabled="hide"
            pagination-enabled="hide">

            <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <slide slot="slide-<?php echo e($index); ?>">
                    <?php echo $__env->make('shop::products.list.card', [
                        'product' => $relatedProduct,
                        'addToCartBtnClass' => 'small-padding',
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </slide>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </carousel-component>
    </div>
<?php endif; ?><?php /**PATH /home/suhailinfo/domains/suhail.info/public_html/resources/themes/velocity/views/products/view/related-products.blade.php ENDPATH**/ ?>