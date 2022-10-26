<?php $productViewHelper = app('Webkul\Product\Helpers\View'); ?>

<?php echo view_render_event('bagisto.shop.products.view.attributes.before', ['product' => $product]); ?>

    <?php
        $customAttributeValues = $productViewHelper->getAdditionalData($product);
    ?>

    <?php if($customAttributeValues): ?>
        <accordian :title="'<?php echo e(__('shop::app.products.specification')); ?>'" :active="'<?php echo e($active); ?>' == true ? true : false">
            <div slot="header">
                <h3 class="no-margin display-inbl">
                    <?php echo e(__('velocity::app.products.more-infomation')); ?>

                </h3>
                <i class="rango-arrow"></i>
            </div>

            <div slot="body">
                <table class="full-specifications">

                    <?php $__currentLoopData = $customAttributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php if($attribute['label']): ?>
                                <td class='fw6'><?php echo e($attribute['label']); ?></td>
                            <?php else: ?>
                                <td><?php echo e($attribute['admin_name']); ?></td>
                            <?php endif; ?>

                            <?php if($attribute['type'] == 'file' && $attribute['value']): ?>
                                <td>
                                    <a  href="<?php echo e(route('shop.product.file.download', [$product->product_id, $attribute['id']])); ?>">
                                        <i class="icon sort-down-icon download"></i>
                                    </a>
                                </td>
                            <?php elseif($attribute['type'] == 'image' && $attribute['value']): ?>
                                <td>
                                    <a href="<?php echo e(route('shop.product.file.download', [$product->product_id, $attribute['id']])); ?>">
                                        <img src="<?php echo e(Storage::url($attribute['value'])); ?>" style="height: 20px; width: 20px;"/>
                                    </a>
                                </td>
                            <?php else: ?>
                                <td><?php echo e($attribute['value']); ?></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </accordian>
    <?php endif; ?>

<?php echo view_render_event('bagisto.shop.products.view.attributes.after', ['product' => $product]); ?><?php /**PATH C:\wamp64\www\weavers-v1/resources/themes/velocity/views/products/view/attributes.blade.php ENDPATH**/ ?>