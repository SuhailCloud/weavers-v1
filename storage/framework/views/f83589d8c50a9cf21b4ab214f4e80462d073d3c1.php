<?php echo view_render_event('bagisto.shop.products.view.stock.before', ['product' => $product]); ?>


<div class="stock-status <?php echo e(! $product->haveSufficientQuantity(1) ? '' : 'active'); ?>">
    <?php if( $product->haveSufficientQuantity(1) === true ): ?>
        <?php echo e(__('shop::app.products.in-stock')); ?>

    <?php elseif( $product->haveSufficientQuantity(1) > 0 ): ?>
        <?php echo e(__('shop::app.products.available')); ?>

    <?php else: ?>
        <?php echo e(__('shop::app.products.out-of-stock')); ?>

    <?php endif; ?>
</div>

<?php echo view_render_event('bagisto.shop.products.view.stock.after', ['product' => $product]); ?><?php /**PATH C:\wamp64\www\weavers-v1\vendor\bagisto\bagisto\packages\Webkul\Shop\src\Providers/../Resources/views/products/view/stock.blade.php ENDPATH**/ ?>