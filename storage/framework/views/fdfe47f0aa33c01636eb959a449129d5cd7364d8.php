<?php echo view_render_event('bagisto.shop.products.view.description.before', ['product' => $product]); ?>


    <accordian :title="'<?php echo e(__('shop::app.products.description')); ?>'" :active="true">
        <div slot="header">
            <h3 class="no-margin display-inbl">
                <?php echo e(__('velocity::app.products.details')); ?>

            </h3>

            <i class="rango-arrow"></i>
        </div>

        <div slot="body">
            <div class="full-description">
                <?php echo $product->description; ?>

            </div>
        </div>
    </accordian>

<?php echo view_render_event('bagisto.shop.products.view.description.after', ['product' => $product]); ?><?php /**PATH /home/suhailinfo/domains/suhail.info/public_html/resources/themes/velocity/views/products/view/description.blade.php ENDPATH**/ ?>