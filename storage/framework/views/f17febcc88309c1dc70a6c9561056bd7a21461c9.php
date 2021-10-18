<?php echo view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]); ?>


<div class="add-to-buttons">
    <?php echo $__env->make('shop::products.add-to-cart', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('shop::products.buy-now', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php echo view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]); ?><?php /**PATH C:\wamp64\www\weavers-v1\vendor\bagisto\bagisto\packages\Webkul\Shop\src\Providers/../Resources/views/products/view/product-add.blade.php ENDPATH**/ ?>