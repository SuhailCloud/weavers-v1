<?php if($product->type == 'downloadable'): ?>
    <?php echo view_render_event('bagisto.shop.products.view.downloadable.before', ['product' => $product]); ?>


    <div class="downloadable-container">

        <?php if($product->downloadable_samples->count()): ?>
            <div class="sample-list">
                <h3><?php echo e(__('shop::app.products.samples')); ?></h3>

                <ul type="none">
                    <?php $__currentLoopData = $product->downloadable_samples; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sample): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a class="remove-decoration" href="<?php echo e(route('shop.downloadable.download_sample', ['type' => 'sample', 'id' => $sample->id])); ?>" target="_blank">
                                <?php echo e($sample->title); ?>

                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if($product->downloadable_links->count()): ?>
            <div class=" link-list control-group" :class="[errors.has('links[]') ? 'has-error' : '']">
                <h3><?php echo e(__('shop::app.products.links')); ?></h3>

                <ul type="none" class="mt15">
                    <?php $__currentLoopData = $product->downloadable_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="checkbox col-12 ml10">
                                <input
                                    name="links[]"
                                    type="checkbox"
                                    id="<?php echo e($link->id); ?>"
                                    v-validate="'required'"
                                    value="<?php echo e($link->id); ?>"
                                    data-vv-as="&quot;<?php echo e(__('shop::app.products.links')); ?>&quot;" />

                                <span><?php echo e($link->title . ' + ' . core()->currency($link->price)); ?></span>

                                <?php if($link->sample_file || $link->sample_url): ?>
                                    <a
                                        target="_blank"
                                        class="remove-decoration"
                                        href="<?php echo e(route('shop.downloadable.download_sample', [
                                            'type' => 'link',
                                            'id' => $link->id
                                        ])); ?>">

                                        <?php echo e(__('shop::app.products.sample')); ?>

                                    </a>
                            </div>

                            <?php endif; ?>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

                <span class="control-error" v-if="errors.has('links[]')">{{ errors.first('links[]') }}</span>
            </div>
        <?php endif; ?>
    </div>

    <?php echo view_render_event('bagisto.shop.products.view.downloadable.before', ['product' => $product]); ?>

<?php endif; ?><?php /**PATH C:\wamp64\www\handloomlk/resources/themes/velocity/views/products/view/downloadable.blade.php ENDPATH**/ ?>