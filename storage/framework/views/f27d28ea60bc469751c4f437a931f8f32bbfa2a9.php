<div class="control-group">
    <label><?php echo e(__('velocity::app.admin.meta-data.category-logo')); ?></label>

    <?php if(isset($category) && $category->category_icon_path): ?>
        <image-wrapper
            :multiple="false"
            input-name="category_icon_path"
            :images='"<?php echo e(url()->to('/') . '/storage/' . $category->category_icon_path); ?>"'
            :button-label="'<?php echo e(__('admin::app.catalog.products.add-image-btn-title')); ?>'">
        </image-wrapper>
    <?php else: ?>
        <image-wrapper
            :multiple="false"
            input-name="category_icon_path"
            :button-label="'<?php echo e(__('admin::app.catalog.products.add-image-btn-title')); ?>'">
        </image-wrapper>
    <?php endif; ?>
</div><?php /**PATH C:\wamp64\www\weavers-v1\vendor\bagisto\bagisto\packages\Webkul\Velocity\src/resources/views/admin/catelog/categories/category-icon.blade.php ENDPATH**/ ?>