<div class="order-summary fs16">
    <h3 class="fw6"><?php echo e(__('velocity::app.checkout.cart.cart-summary')); ?></h3>

    <div class="row">
        <span class="col-8"><?php echo e(__('velocity::app.checkout.sub-total')); ?></span>
        <span class="col-4 text-right"><?php echo e(core()->currency($cart->base_sub_total)); ?></span>
    </div>

    <?php if($cart->selected_shipping_rate): ?>
        <div class="row">
            <span class="col-8"><?php echo e(__('shop::app.checkout.total.delivery-charges')); ?></span>
            <span class="col-4 text-right"><?php echo e(core()->currency($cart->selected_shipping_rate->base_price)); ?></span>
        </div>
    <?php endif; ?>

    <?php if($cart->base_tax_total): ?>
        <?php $__currentLoopData = Webkul\Tax\Helpers\Tax::getTaxRatesWithAmount($cart, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxRate => $baseTaxAmount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <span class="col-8" id="taxrate-<?php echo e(core()->taxRateAsIdentifier($taxRate)); ?>"><?php echo e(__('shop::app.checkout.total.tax')); ?> <?php echo e($taxRate); ?> %</span>
                <span class="col-4 text-right" id="basetaxamount-<?php echo e(core()->taxRateAsIdentifier($taxRate)); ?>"><?php echo e(core()->currency($baseTaxAmount)); ?></span>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(
        $cart->base_discount_amount
        && $cart->base_discount_amount > 0
    ): ?>
        <div
            id="discount-detail"
            class="row">

            <span class="col-8"><?php echo e(__('shop::app.checkout.total.disc-amount')); ?></span>
            <span class="col-4 text-right">
                -<?php echo e(core()->currency($cart->base_discount_amount)); ?>

            </span>
        </div>
    <?php endif; ?>

    <div class="payable-amount row" id="grand-total-detail">
        <span class="col-8"><?php echo e(__('shop::app.checkout.total.grand-total')); ?></span>
        <span class="col-4 text-right fw6" id="grand-total-amount-detail">
            <?php echo e(core()->currency($cart->base_grand_total)); ?>

        </span>
    </div>

    <div class="row">
        <a
            href="<?php echo e(route('shop.checkout.onepage.index')); ?>"
            class="theme-btn text-uppercase col-12 remove-decoration fw6 text-center">
            <?php echo e(__('velocity::app.checkout.proceed')); ?>

        </a>
    </div>
</div><?php /**PATH C:\wamp64\www\weavers-v1/resources/themes/velocity/views/checkout/total/summary.blade.php ENDPATH**/ ?>