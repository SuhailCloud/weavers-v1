<?php echo view_render_event('bagisto.shop.products.list.card.before', ['product' => $product]); ?>


<div class="product-card">

    <?php $productImageHelper = app('Webkul\Product\Helpers\ProductImage'); ?>

    <?php $productBaseImage = $productImageHelper->getProductBaseImage($product); ?>

    <?php if($product->new): ?>
        <div class="sticker new">
            <?php echo e(__('shop::app.products.new')); ?>

        </div>
    <?php endif; ?>

    <div class="product-image">
        <a href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>" title="<?php echo e($product->name); ?>">
            <img src="<?php echo e($productBaseImage['medium_image_url']); ?>" onerror="this.src='<?php echo e(asset('vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png')); ?>'"/>
        </a>
    </div>

    <div class="product-information">

        <div class="product-name">
            <a href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>" title="<?php echo e($product->name); ?>">
                <span>
                    <?php echo e($product->name); ?>

                </span>
            </a>
        </div>

        <?php echo $__env->make('shop::products.price', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('shop::products.add-buttons', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

</div>

<?php echo view_render_event('bagisto.shop.products.list.card.after', ['product' => $product]); ?><?php /**PATH C:\wamp64\www\weavers-v1\vendor\bagisto\bagisto\packages\Webkul\Shop\src\Providers/../Resources/views/products/list/card.blade.php ENDPATH**/ ?>