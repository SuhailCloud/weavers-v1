<?php $productImageHelper = app('Webkul\Product\Helpers\ProductImage'); ?>
<?php $reviewHelper = app('Webkul\Product\Helpers\Review'); ?>
<?php $toolbarHelper = app('Webkul\Product\Helpers\Toolbar'); ?>


<?php $__env->startPush('css'); ?>
    <style type="text/css">
        .list-card .wishlist-icon i {
            padding-left: 10px;
        }

        .product-price span:first-child, .product-price span:last-child {
            font-size: 18px;
            font-weight: 600;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php
    if (isset($checkmode) && $checkmode && $toolbarHelper->getCurrentMode() == "list") {
        $list = true;
    }
?>

<?php
    $productBaseImage = $productImageHelper->getProductBaseImage($product);
    $totalReviews = $reviewHelper->getTotalReviews($product);
    $avgRatings = ceil($reviewHelper->getAverageRating($product));
?>

<?php echo view_render_event('bagisto.shop.products.list.card.before', ['product' => $product]); ?>

    <?php if(isset($list) && $list): ?>
        <div class="col-12 lg-card-container list-card product-card row">
            <div class="product-image">
                <a
                    title="<?php echo e($product->name); ?>"
                    href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>">

                    <img
                        src="<?php echo e($productBaseImage['medium_image_url']); ?>"
                        :onerror="`this.src='${this.$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`" />
                </a>
            </div>

            <div class="product-information">
                <div>
                    <div class="product-name">
                        <a
                            href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>"
                            title="<?php echo e($product->name); ?>" class="unset">

                            <span class="fs16"><?php echo e($product->name); ?></span>
                        </a>
                    </div>

                    <div class="product-price">
                        <?php echo $__env->make('shop::products.price', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <?php if( $totalReviews ): ?>
                        <div class="product-rating">
                            <star-ratings ratings="<?php echo e($avgRatings); ?>"></star-ratings>
                            <span><?php echo e($totalReviews); ?> Ratings</span>
                        </div>
                    <?php endif; ?>

                    <div class="cart-wish-wrap mt5">
                        <?php echo $__env->make('shop::products.add-to-cart', [
                            'product' => $product,
                            'showCompare' => true,
                            'addWishlistClass' => 'pl10',
                            'addToCartBtnClass' => 'medium-padding'
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="card grid-card product-card-new">
            <a
                href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>"
                title="<?php echo e($product->name); ?>"
                class="product-image-container">

                <img
					loading="lazy"
                    class="card-img-top"
                    alt="<?php echo e($product->name); ?>"
                    src="<?php echo e($productBaseImage['large_image_url']); ?>"
                    :onerror="`this.src='${this.$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`" />

                    
            </a>

            <div class="card-body">
                <div class="product-name col-12 no-padding">
                    <a
                        href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>"
                        title="<?php echo e($product->name); ?>"
                        class="unset">

                        <span class="fs16"><?php echo e($product->name); ?></span>
                    </a>
                </div>

                <div class="product-price fs16">
                    <?php echo $__env->make('shop::products.price', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <?php if($totalReviews): ?>
                    <div class="product-rating col-12 no-padding">
                        <star-ratings ratings="<?php echo e($avgRatings); ?>"></star-ratings>
                        <span class="align-top">
                            <?php echo e(__('velocity::app.products.ratings', ['totalRatings' => $totalReviews ])); ?>

                        </span>
                    </div>
                <?php else: ?>
                    <div class="product-rating col-12 no-padding">
                        <span class="fs14"><?php echo e(__('velocity::app.products.be-first-review')); ?></span>
                    </div>
                <?php endif; ?>

                <div class="cart-wish-wrap no-padding ml0">
                    <?php echo $__env->make('shop::products.add-to-cart', [
                        'showCompare'       => true,
                        'product'           => $product,
                        'btnText'           => $btnText ?? null,
                        'moveToCart'        => $moveToCart ?? null,
                        'reloadPage'        => $reloadPage ?? null,
                        'addToCartForm'     => $addToCartForm ?? false,
                        'addToCartBtnClass' => $addToCartBtnClass ?? '',
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php echo view_render_event('bagisto.shop.products.list.card.after', ['product' => $product]); ?>

<?php /**PATH C:\wamp64\www\handloomlk/resources/themes/velocity/views/products/list/card.blade.php ENDPATH**/ ?>