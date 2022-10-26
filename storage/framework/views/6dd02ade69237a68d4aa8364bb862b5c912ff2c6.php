<?php $wishListHelper = app('Webkul\Customer\Helpers\Wishlist'); ?>

<?php if(auth()->guard('customer')->check()): ?>
    <?php echo view_render_event('bagisto.shop.products.wishlist.before'); ?>


    <a
        <?php if($wishListHelper->getWishlistProduct($product)): ?>
            class="add-to-wishlist already"
        <?php else: ?>
            class="add-to-wishlist"
        <?php endif; ?>
        id="wishlist-changer"
        style="margin-right: 15px;"
        href="<?php echo e(route('customer.wishlist.add', $product->product_id)); ?>">
        <span class="icon wishlist-icon"></span>
    </a>

    <?php echo view_render_event('bagisto.shop.products.wishlist.after'); ?>

<?php endif; ?>
<?php /**PATH C:\wamp64\www\weavers-v1\vendor\bagisto\bagisto\packages\Webkul\Shop\src\Providers/../Resources/views/products/wishlist.blade.php ENDPATH**/ ?>