<div class="customer-sidebar row no-margin no-padding">
    <div class="account-details col-12">
        <div class="customer-name col-12 text-uppercase">
            <?php echo e(substr(auth('customer')->user()->first_name, 0, 1)); ?>

        </div>
        <div class="col-12 customer-name-text text-capitalize text-break"><?php echo e(auth('customer')->user()->first_name . ' ' . auth('customer')->user()->last_name); ?></div>
        <div class="customer-email col-12 text-break"><?php echo e(auth('customer')->user()->email); ?></div>
    </div>

    <?php $__currentLoopData = $menu->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <ul type="none" class="navigation">
            
            <?php
                $subMenuCollection = [];

                try {
                    $subMenuCollection['profile'] = $menuItem['children']['profile'];
                    $subMenuCollection['orders'] = $menuItem['children']['orders'];
                    $subMenuCollection['downloadables'] = $menuItem['children']['downloadables'];
                    $subMenuCollection['wishlist'] = $menuItem['children']['wishlist'];
                    $subMenuCollection['compare'] = $menuItem['children']['compare'];
                    $subMenuCollection['reviews'] = $menuItem['children']['reviews'];
                    $subMenuCollection['address'] = $menuItem['children']['address'];

                    unset(
                        $menuItem['children']['profile'],
                        $menuItem['children']['orders'],
                        $menuItem['children']['downloadables'],
                        $menuItem['children']['wishlist'],
                        $menuItem['children']['compare'],
                        $menuItem['children']['reviews'],
                        $menuItem['children']['address']
                    );

                    foreach ($menuItem['children'] as $key => $remainingChildren) {
                        $subMenuCollection[$key] = $remainingChildren;
                    }
                } catch (\Exception $exception) {
                    $subMenuCollection = $menuItem['children'];
                }
            ?>

            <?php $__currentLoopData = $subMenuCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $subMenuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="<?php echo e($menu->getActive($subMenuItem)); ?>" title="<?php echo e(trans($subMenuItem['name'])); ?>">
                    <a class="unset fw6 full-width" href="<?php echo e($subMenuItem['url']); ?>">
                        <i class="icon <?php echo e($index); ?> text-down-3"></i>
                        <span><?php echo e(trans($subMenuItem['name'])); ?><span>
                        <i class="rango-arrow-right pull-right text-down-3"></i>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->startPush('css'); ?>
    <style type="text/css">
        .main-content-wrapper {
            margin-bottom: 0px;
            min-height: 100vh;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp64\www\weavers-v1/resources/themes/velocity/views/customers/account/partials/sidemenu.blade.php ENDPATH**/ ?>