<?php $reviewHelper = app('Webkul\Product\Helpers\Review'); ?>
<?php $customHelper = app('Webkul\Velocity\Helpers\Helper'); ?>

<?php
    if (! isset($total)) {
        $total = $reviewHelper->getTotalReviews($product);

        $avgRatings = $reviewHelper->getAverageRating($product);
        $avgStarRating = ceil($avgRatings);
    }

    $percentageRatings = $reviewHelper->getPercentageRating($product);
    $countRatings = $customHelper->getCountRating($product);
?>

<?php echo view_render_event('bagisto.shop.products.review.before', ['product' => $product]); ?>


    <?php if($total): ?>
        <?php if(isset($accordian) && $accordian): ?>
            <accordian :active="true">
                
                <div slot="header" class="col-lg-12 no-padding">
                    <h3 class="display-inbl">
                        <?php echo e(__('velocity::app.products.customer-rating')); ?>

                    </h3>

                    <i class="rango-arrow"></i>
                </div>

                <div class="row customer-rating" slot="body">
                    <div class="row full-width text-center mb30">
                        <div class="col-lg-12 col-xl-6">
                            <h4 class="col-lg-12 fs16"><?php echo e($avgRatings); ?> <?php echo e(__('shop::app.reviews.star')); ?></h4>

                            <star-ratings
                                :size="24"
                                :ratings="<?php echo e($avgStarRating); ?>"
                            ></star-ratings>

                            <span class="fs16 fw6 display-block">
                                <?php echo e(__('shop::app.reviews.ratingreviews', [
                                    'rating' => $avgRatings,
                                    'review' => $total])); ?>

                            </span>

                            <?php if(core()->getConfigData('catalog.products.review.guest_review') || auth()->guard('customer')->check()): ?>
                                <a href="<?php echo e(route('shop.reviews.create', ['slug' => $product->url_key ])); ?>">
                                    <button type="button" class="theme-btn light"><?php echo e(__('velocity::app.products.write-your-review')); ?></button>
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="col-lg-12 col-xl-6">

                            <?php for($i = 5; $i >= 1; $i--): ?>

                                <div class="row">
                                    <span class="col-3 no-padding fs16 fw6"><?php echo e($i); ?> <?php echo e(__('shop::app.reviews.star')); ?></span>

                                    <div class="col-7 rating-bar" title="<?php echo e($percentageRatings[$i]); ?>%">
                                        <div style="width: <?php echo e($percentageRatings[$i]); ?>%"></div>
                                    </div>

                                    <span class="col-2 fs16"><?php echo e($countRatings[$i]); ?></span>
                                </div>
                            <?php endfor; ?>

                        </div>
                    </div>
                </div>
            </accordian>
        <?php else: ?>
            <div class="row customer-rating">
                <div class="row full-width text-center mb30">
                    <div class="col-lg-12 col-xl-6">
                        <h3 class="col-lg-12"><?php echo e($avgRatings); ?> <?php echo e(__('shop::app.reviews.star')); ?></h3>

                        <star-ratings
                            :size="24"
                            :ratings="<?php echo e($avgStarRating); ?>"
                        ></star-ratings>

                        <span class="fs16 display-block">
                            <?php echo e(__('shop::app.reviews.ratingreviews', [
                                'rating' => $avgRatings,
                                'review' => $total])); ?>

                        </span>

                        <?php if(core()->getConfigData('catalog.products.review.guest_review') || auth()->guard('customer')->check()): ?>
                            <a href="<?php echo e(route('shop.reviews.create', ['slug' => $product->url_key ])); ?>">
                                <button type="button" class="theme-btn light"><?php echo e(__('velocity::app.products.write-your-review')); ?></button>
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="col-lg-12 col-xl-6">

                        <?php for($i = 5; $i >= 1; $i--): ?>

                            <div class="row">
                                <span class="col-3 no-padding fs16 fw6"><?php echo e($i); ?> Star</span>

                                <div class="col-7 rating-bar" title="<?php echo e($percentageRatings[$i]); ?>%">
                                    <div style="width: <?php echo e($percentageRatings[$i]); ?>%"></div>
                                </div>

                                <span class="col-2 fs16"><?php echo e($countRatings[$i]); ?></span>
                            </div>
                        <?php endfor; ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if(isset($accordian) && $accordian): ?>
            <accordian :title="'<?php echo e(__('shop::app.products.total-reviews')); ?>'" :active="true">
                
                <div slot="header" class="col-lg-12 no-padding">
                    <h3 class="display-inbl">
                        <?php echo e(__('velocity::app.products.reviews-title')); ?>

                    </h3>

                    <i class="rango-arrow"></i>
                </div>

                <div class="customer-reviews" slot="body">
                    <?php $__currentLoopData = $reviewHelper->getReviews($product)->paginate(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row">
                            <h4 class="col-lg-12 fs18"><?php echo e($review->title); ?></h4>

                            <star-ratings
                                :ratings="<?php echo e($review->rating); ?>"
                                push-class="mr10 fs16 col-lg-12"
                            ></star-ratings>

                            <div class="review-description col-lg-12">
                                <span><?php echo e($review->comment); ?></span>
                            </div>

                            <div class="col-lg-12 mt5">
                                <span><?php echo e(__('velocity::app.products.review-by')); ?> -</span>

                                <span class="fs16 fw6">
                                    <?php echo e($review->name); ?>,
                                </span>

                                <span><?php echo e(core()->formatDate($review->created_at, 'F d, Y')); ?>

                                </span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <a
                        href="<?php echo e(route('shop.reviews.index', ['slug' => $product->url_key ])); ?>"
                        class="mb20 link-color"
                    ><?php echo e(__('velocity::app.products.view-all-reviews')); ?></a>
                </div>
            </accordian>
        <?php else: ?>
            <h3 class="display-inbl mb20 col-lg-12 no-padding">
                <?php echo e(__('velocity::app.products.reviews-title')); ?>

            </h3>

            <div class="customer-reviews">
                <?php $__currentLoopData = $reviewHelper->getReviews($product)->paginate(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <h4 class="col-lg-12 fs18"><?php echo e($review->title); ?></h4>

                        <star-ratings
                            :ratings="<?php echo e($review->rating); ?>"
                            push-class="mr10 fs16 col-lg-12"
                        ></star-ratings>

                        <div class="review-description col-lg-12">
                            <span><?php echo e($review->comment); ?></span>
                        </div>

                        <div class="col-lg-12 mt5">
                            <?php if("<?php echo e($review->name); ?>"): ?>
                                <span><?php echo e(__('velocity::app.products.review-by')); ?> -</span>

                                <label>
                                    <?php echo e($review->name); ?>,
                                </label>
                            <?php endif; ?>

                            <span><?php echo e(core()->formatDate($review->created_at, 'F d, Y')); ?>

                            </span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

    <?php else: ?>
        <?php if(core()->getConfigData('catalog.products.review.guest_review') || auth()->guard('customer')->check()): ?>
            <div class="customer-rating" style="border: none">
                <a href="<?php echo e(route('shop.reviews.create', ['slug' => $product->url_key ])); ?>">
                    <button type="button" class="theme-btn light"><?php echo e(__('velocity::app.products.write-your-review')); ?></button>
                </a>
            </div>
        <?php endif; ?>
    <?php endif; ?>

<?php echo view_render_event('bagisto.shop.products.review.after', ['product' => $product]); ?><?php /**PATH /home/weaverslk/domains/weavers.lk/public_html/resources/themes/velocity/views/products/view/reviews.blade.php ENDPATH**/ ?>