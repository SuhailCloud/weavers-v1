<?php echo view_render_event('bagisto.shop.products.price.before', ['product' => $product]); ?>


<div class="product-price">
    <?php echo $product->getTypeInstance()->getPriceHtml(); ?>

</div>

<?php echo view_render_event('bagisto.shop.products.price.after', ['product' => $product]); ?><?php /**PATH C:\wamp64\www\weavers-v1/resources/themes/velocity/views/products/price.blade.php ENDPATH**/ ?>