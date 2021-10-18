<?php echo view_render_event('bagisto.shop.products.view.stock.before', ['product' => $product]); ?>


<div class="col-12 availability">
    <button
        type="button"
        class="<?php echo e(! $product->haveSufficientQuantity(1) ? '' : 'active'); ?> disable-box-shadow">
            <?php if( $product->haveSufficientQuantity(1) === true ): ?>
                <?php echo e(__('shop::app.products.in-stock')); ?>

            <?php elseif( $product->haveSufficientQuantity(1) > 0 ): ?>
                <?php echo e(__('shop::app.products.available')); ?>

            <?php else: ?>
                <?php echo e(__('shop::app.products.out-of-stock')); ?>

            <?php endif; ?>
    </button>
</div>

<?php echo view_render_event('bagisto.shop.products.view.stock.after', ['product' => $product]); ?><?php /**PATH C:\wamp64\www\handloomlk/resources/themes/velocity/views/products/view/stock.blade.php ENDPATH**/ ?>