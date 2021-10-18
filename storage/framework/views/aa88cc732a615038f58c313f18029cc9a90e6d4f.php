<?php $reviewHelper = app('Webkul\Product\Helpers\Review'); ?>
<?php $productImageHelper = app('Webkul\Product\Helpers\ProductImage'); ?>



<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.checkout.cart.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <cart-component></cart-component>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style type="text/css">
        .quantity {
            width: unset;
            float: right;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make('shop::checkout.cart.coupon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script type="text/x-template" id="cart-template">
        <div class="container">
            <section class="cart-details row no-margin col-12">
                <h1 class="fw6 col-12"><?php echo e(__('shop::app.checkout.cart.title')); ?></h1>

                <?php if($cart): ?>
                    <div class="cart-details-header col-lg-6 col-md-12">
                        <div class="row cart-header col-12 no-padding">
                            <span class="col-8 fw6 fs16 pr0">
                                <?php echo e(__('velocity::app.checkout.items')); ?>

                            </span>

                            <span class="col-2 fw6 fs16 no-padding text-right">
                                <?php echo e(__('velocity::app.checkout.qty')); ?>

                            </span>

                            <span class="col-2 fw6 fs16 text-right pr0">
                                <?php echo e(__('velocity::app.checkout.subtotal')); ?>

                            </span>
                        </div>

                        <div class="cart-content col-12">
                            <form
                                action="<?php echo e(route('shop.checkout.cart.update')); ?>"
                                method="POST"
                                @submit.prevent="onSubmit">

                                <div class="cart-item-list">
                                    <?php echo csrf_field(); ?>

                                    <?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php
                                            $productBaseImage = $item->product->getTypeInstance()->getBaseImage($item);
                                            $product = $item->product;

                                            $productPrice = $product->getTypeInstance()->getProductPrices();

                                        ?>

                                        <div class="row col-12" v-if="!isMobileDevice">
                                            <a
                                                title="<?php echo e($product->name); ?>"
                                                class="product-image-container col-2"
                                                href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>">

                                                <img
                                                    class="card-img-top"
                                                    alt="<?php echo e($product->name); ?>"
                                                    src="<?php echo e($productBaseImage['large_image_url']); ?>"
                                                    :onerror="`this.src='${this.$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`">
                                            </a>

                                            <div class="product-details-content col-7 pr0">
                                                <div class="row item-title no-margin">
                                                    <a
                                                        href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>"
                                                        title="<?php echo e($product->name); ?>"
                                                        class="unset col-12 no-padding">

                                                        <span class="fs20 fw6 link-color"><?php echo e($product->name); ?></span>
                                                    </a>
                                                </div>

                                                <?php if(isset($item->additional['attributes'])): ?>
                                                    <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="row col-12 no-padding no-margin display-block">
                                                            <label class="no-margin">
                                                                <?php echo e($attribute['attribute_name']); ?> :
                                                            </label>
                                                            <span>
                                                                <?php echo e($attribute['option_label']); ?>

                                                            </span>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>

                                                <div class="row col-12 no-padding no-margin">
                                                    <?php echo $__env->make('shop::products.price', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </div>

                                                <?php
                                                    $moveToWishlist = trans('shop::app.checkout.cart.move-to-wishlist');
                                                ?>

                                                <div class="no-padding col-12 cursor-pointer fs16">
                                                    <?php if(auth()->guard('customer')->check()): ?>
                                                        <?php if($item->parent_id != 'null' ||$item->parent_id != null): ?>
                                                            <?php echo $__env->make('shop::products.wishlist', [
                                                                'route' => route('shop.movetowishlist', $item->id),
                                                                'text' => "<span class='align-vertical-super'>$moveToWishlist</span>"
                                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php else: ?>
                                                            <?php echo $__env->make('shop::products.wishlist', [
                                                                'route' => route('shop.movetowishlist', $item->child->id),
                                                                'text' => "<span class='align-vertical-super'>$moveToWishlist</span>"
                                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if(auth()->guard('customer')->guest()): ?>
                                                        <?php echo $__env->make('shop::products.wishlist', [
                                                            'isMoveToWishlist' => route('shop.checkout.cart.remove', ['id' => $item->id]),
                                                            'text' => "<span class='align-vertical-top'>$moveToWishlist</span>"
                                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>

                                                    <a
                                                        class="unset
                                                            <?php if(auth()->guard('customer')->check()): ?>
                                                                ml10
                                                            <?php endif; ?>
                                                        "
                                                        href="<?php echo e(route('shop.checkout.cart.remove', ['id' => $item->id])); ?>"
                                                        onclick="removeLink('<?php echo e(__('shop::app.checkout.cart.cart-remove-action')); ?>')">

                                                        <span class="rango-delete fs24"></span>
                                                        <span class="align-vertical-top"><?php echo e(__('shop::app.checkout.cart.remove')); ?></span>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="product-quantity col-2 no-padding">
                                                <quantity-changer
                                                    :control-name="'qty[<?php echo e($item->id); ?>]'"
                                                    quantity="<?php echo e($item->quantity); ?>">
                                                </quantity-changer>
                                            </div>

                                            <div class="product-price fs18 col-1">
                                                <span class="card-current-price fw6 mr10">
                                                    <?php echo e(core()->currency( $item->base_total)); ?>

                                                </span>
                                            </div>
                                        </div>

                                        <div class="row col-12" v-else>
                                            <a
                                                title="<?php echo e($product->name); ?>"
                                                class="product-image-container col-2"
                                                href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>">

                                                <img
                                                    src="<?php echo e($productBaseImage['medium_image_url']); ?>"
                                                    class="card-img-top"
                                                    alt="<?php echo e($product->name); ?>">
                                            </a>

                                            <div class="col-10 pr0 item-title">
                                                <a
                                                    href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>"
                                                    title="<?php echo e($product->name); ?>"
                                                    class="unset col-12 no-padding">

                                                    <span class="fs20 fw6 link-color"><?php echo e($product->name); ?></span>
                                                </a>

                                                <?php if(isset($item->additional['attributes'])): ?>
                                                    <div class="row col-12 no-padding no-margin">

                                                        <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <b><?php echo e($attribute['attribute_name']); ?> : </b><?php echo e($attribute['option_label']); ?></br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </div>
                                                <?php endif; ?>

                                                <div class="col-12 no-padding">
                                                    <?php echo $__env->make('shop::products.price', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </div>

                                                <div class="row col-12 remove-padding-margin actions">
                                                    <div class="product-quantity col-lg-4 col-6 no-padding">
                                                        <quantity-changer
                                                            :control-name="'qty[<?php echo e($item->id); ?>]'"
                                                            quantity="<?php echo e($item->quantity); ?>">
                                                        </quantity-changer>
                                                    </div>

                                                    <div class="col-4 cursor-pointer text-down-4">
                                                        <a href="<?php echo e(route('shop.checkout.cart.remove', ['id' => $item->id])); ?>" class="unset">
                                                            <i class="material-icons fs24">delete</i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <?php echo view_render_event('bagisto.shop.checkout.cart.controls.after', ['cart' => $cart]); ?>

                                    <a
                                        class="col-12 link-color remove-decoration fs16 no-padding"
                                        href="<?php echo e(route('shop.home.index')); ?>">
                                        <?php echo e(__('shop::app.checkout.cart.continue-shopping')); ?>

                                    </a>

                                    <button
                                        type="submit"
                                        class="theme-btn light mr15 pull-right unset">

                                        <?php echo e(__('shop::app.checkout.cart.update-cart')); ?>

                                    </button>
                                <?php echo view_render_event('bagisto.shop.checkout.cart.controls.after', ['cart' => $cart]); ?>

                            </form>
                        </div>

                        <?php echo $__env->make('shop::products.view.cross-sells', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>

                <?php echo view_render_event('bagisto.shop.checkout.cart.summary.after', ['cart' => $cart]); ?>


                    <?php if($cart): ?>
                        <div class="col-lg-4 col-md-12 offset-lg-2 row order-summary-container">
                            <?php echo $__env->make('shop::checkout.total.summary', ['cart' => $cart], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <coupon-component></coupon-component>
                        </div>
                    <?php else: ?>
                        <div class="fs16 col-12 empty-cart-message">
                            <?php echo e(__('shop::app.checkout.cart.empty')); ?>

                        </div>

                        <a
                            class="fs16 mt15 col-12 remove-decoration continue-shopping"
                            href="<?php echo e(route('shop.home.index')); ?>">

                            <button type="button" class="theme-btn remove-decoration">
                                <?php echo e(__('shop::app.checkout.cart.continue-shopping')); ?>

                            </button>
                        </a>
                    <?php endif; ?>

                <?php echo view_render_event('bagisto.shop.checkout.cart.summary.after', ['cart' => $cart]); ?>


            </section>
        </div>
    </script>

    <script type="text/javascript" id="cart-template">
        (() => {
            Vue.component('cart-component', {
                template: '#cart-template',
                data: function () {
                    return {
                        isMobileDevice: this.isMobile(),
                    }
                }
            })

            function removeLink(message) {
                if (!confirm(message))
                event.preventDefault();
            }
        })()
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suhailinfo/domains/suhail.info/public_html/resources/themes/velocity/views/checkout/cart/index.blade.php ENDPATH**/ ?>