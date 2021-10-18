<?php $toolbarHelper = app('Webkul\Product\Helpers\Toolbar'); ?>



<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.search.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <div class="container">
        <section class="search-container row">
            <?php if($results && $results->count()): ?>
                <div class="filters-container col-12">
                    <?php echo $__env->make('shop::products.list.toolbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endif; ?>

            <?php if(! $results): ?>
                <h1 class="fw6 col-12"><?php echo e(__('shop::app.search.no-results')); ?></h1>
            <?php else: ?>
                <?php if($results->isEmpty()): ?>
                    <h1 class="fw6 col-12"><?php echo e(__('shop::app.products.whoops')); ?></h1>
                    <span class="col-12"><?php echo e(__('shop::app.search.no-results')); ?></span>
                <?php else: ?>
                    <?php if($results->total() == 1): ?>
                        <h2 class="fw6 col-12 mb20">
                            <?php echo e($results->total()); ?> <?php echo e(__('shop::app.search.found-result')); ?>

                        </h2>
                    <?php else: ?>
                        <h2 class="fw6 col-12 mb20">
                            <?php echo e($results->total()); ?> <?php echo e(__('shop::app.search.found-results')); ?>

                        </h2>
                    <?php endif; ?>

                    <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productFlat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($toolbarHelper->getCurrentMode() == 'grid'): ?>
                            <?php echo $__env->make('shop::products.list.card', ['product' => $productFlat->product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('shop::products.list.card', [
                                'list' => true,
                                'product' => $productFlat->product
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php echo $__env->make('ui::datagrid.pagination', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\weavers-v1/resources/themes/velocity/views/search/search.blade.php ENDPATH**/ ?>