<?php if(app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts()->count()): ?>
    <section class="featured-products">

        <div class="featured-heading">
            <?php echo e(__('shop::app.home.featured-products')); ?><br/>

            <span class="featured-seperator" style="color:lightgrey;">_____</span>
        </div>

        <div class="featured-grid product-grid-4">

            <?php $__currentLoopData = app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productFlat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php echo $__env->make('shop::products.list.card', ['product' => $productFlat], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </section>
<?php endif; ?><?php /**PATH C:\wamp64\www\weavers-v1\vendor\bagisto\bagisto\packages\Webkul\Shop\src\Providers/../Resources/views/home/featured-products.blade.php ENDPATH**/ ?>