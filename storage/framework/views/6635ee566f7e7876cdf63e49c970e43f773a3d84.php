<?php $wishListHelper = app('Webkul\Customer\Helpers\Wishlist'); ?>

<?php echo view_render_event('bagisto.shop.products.wishlist.before'); ?>

    <?php if(auth()->guard('customer')->check()): ?>
        <?php
            $isWished = $wishListHelper->getWishlistProduct($product);
        ?>

        <a
            class="unset wishlist-icon <?php echo e($addWishlistClass ?? ''); ?> text-right"
            <?php if(isset($route)): ?>
                href="<?php echo e($route); ?>"
            <?php elseif(! $isWished): ?>
                href="<?php echo e(route('customer.wishlist.add', $product->product_id)); ?>"
                title="<?php echo e(__('velocity::app.shop.wishlist.add-wishlist-text')); ?>"
            <?php elseif(isset($itemId) && $itemId): ?>
                href="<?php echo e(route('customer.wishlist.remove', $itemId)); ?>"
                title="<?php echo e(__('velocity::app.shop.wishlist.remove-wishlist-text')); ?>"
            <?php endif; ?>>

            <wishlist-component active="<?php echo e(!$isWished); ?>" is-customer="true"></wishlist-component>

            <?php if(isset($text)): ?>
                <?php echo $text; ?>

            <?php endif; ?>
        </a>
    <?php endif; ?>

    <?php if(auth()->guard('customer')->guest()): ?>
        <wishlist-component
            active="false"
            is-customer="false"
            text="<?php echo e($text ?? null); ?>"
            product-id="<?php echo e($product->id); ?>"
            item-id="<?php echo e($item->id ?? null); ?>"
            product-slug="<?php echo e($product->url_key); ?>"
            add-class="<?php echo e($addWishlistClass ?? ''); ?>"
            move-to-wishlist="<?php echo e($isMoveToWishlist ?? null); ?>"
            added-text="<?php echo e(__('shop::app.customer.account.wishlist.add')); ?>"
            remove-text="<?php echo e(__('shop::app.customer.account.wishlist.remove')); ?>">
        </wishlist-component>
    <?php endif; ?>
<?php echo view_render_event('bagisto.shop.products.wishlist.after'); ?><?php /**PATH /home/weaverslk/domains/weavers.lk/public_html/resources/themes/velocity/views/products/wishlist.blade.php ENDPATH**/ ?>