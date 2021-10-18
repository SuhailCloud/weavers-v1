<div class="cart-wish-wrap">
    <form action="<?php echo e(route('cart.add', $product->product_id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="product_id" value="<?php echo e($product->product_id); ?>">
        <input type="hidden" name="quantity" value="1">
        <button class="btn btn-lg btn-primary addtocart" <?php echo e($product->isSaleable() ? '' : 'disabled'); ?>><?php echo e(__('shop::app.products.add-to-cart')); ?></button>
    </form>

    <?php echo $__env->make('shop::products.wishlist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('shop::products.compare', [
        'productId' => $product->id
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div><?php /**PATH C:\wamp64\www\handloomlk\vendor\bagisto\bagisto\packages\Webkul\Shop\src\Providers/../Resources/views/products/add-buttons.blade.php ENDPATH**/ ?>