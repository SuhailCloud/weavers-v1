<?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $product = $item->product;

        if ($product->cross_sells()->count()) {
            $products[] = $product;
            $products = array_unique($products);
        }
    ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if(isset($products)): ?>

    <card-list-header
        heading="<?php echo e(__('shop::app.products.cross-sell-title')); ?>"
        view-all="false"
        row-class="pt20"
    ></card-list-header>

    <div class="carousel-products vc-full-screen">
        <carousel-component
            slides-per-page="6"
            navigation-enabled="hide"
            pagination-enabled="hide"
            id="upsell-products-carousel"
            :slides-count="<?php echo e(sizeof($products)); ?>">
            
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $product->cross_sells()->paginate(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $crossSellProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <slide slot="slide-<?php echo e($index); ?>">
                        <?php echo $__env->make('shop::products.list.card', [
                            'product' => $crossSellProduct,
                            'addToCartBtnClass' => 'small-padding',
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </slide>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </carousel-component>
    </div>

    <div class="carousel-products vc-small-screen">
        <carousel-component
            :slides-count="<?php echo e(sizeof($products)); ?>"
            slides-per-page="2"
            id="upsell-products-carousel"
            navigation-enabled="hide"
            pagination-enabled="hide">

            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $product->cross_sells()->paginate(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $crossSellProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <slide slot="slide-<?php echo e($index); ?>">
                        <?php echo $__env->make('shop::products.list.card', [
                            'product' => $crossSellProduct,
                            'addToCartBtnClass' => 'small-padding',
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </slide>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </carousel-component>
    </div>
<?php endif; ?><?php /**PATH /home/suhailinfo/domains/suhail.info/public_html/resources/themes/velocity/views/products/view/cross-sells.blade.php ENDPATH**/ ?>