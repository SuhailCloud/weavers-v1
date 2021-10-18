<?php if($product->type == 'grouped'): ?>
    <?php echo view_render_event('bagisto.shop.products.view.grouped_products.before', ['product' => $product]); ?>


    <div class="grouped-product-container">
        <?php if($product->grouped_products->count()): ?>
            <div class="grouped-product-list">
                <ul>
                    <li>
                        <span><?php echo e(__('shop::app.products.name')); ?></span>
                        <span><?php echo e(__('shop::app.products.qty')); ?></span>
                    </li>
                    <?php $__currentLoopData = $product->grouped_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <span class="name">
                                <?php echo e($groupedProduct->associated_product->name); ?>


                                <?php echo $__env->make('shop::products.price', ['product' => $groupedProduct->associated_product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </span>

                            <span class="qty">
                                <quantity-changer
                                    :control-name="'qty[<?php echo e($groupedProduct->associated_product_id); ?>]'"
                                    :validations="'required|numeric|min_value:0'"
                                    quantity="<?php echo e($groupedProduct->qty); ?>"
                                    min-quantity="0">
                                </quantity-changer>
                            </span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <?php echo view_render_event('bagisto.shop.products.view.grouped_products.before', ['product' => $product]); ?>

<?php endif; ?><?php /**PATH C:\wamp64\www\weavers-v1\vendor\bagisto\bagisto\packages\Webkul\Shop\src\Providers/../Resources/views/products/view/grouped-products.blade.php ENDPATH**/ ?>