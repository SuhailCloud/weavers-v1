<?php $velocityHelper = app('Webkul\Velocity\Helpers\Helper'); ?>
<?php $productRatingHelper = app('Webkul\Product\Helpers\Review'); ?>
<?php $productImageHelper = app('Webkul\Product\Helpers\ProductImage'); ?>

<recently-viewed
    add-class="<?php echo e(isset($addClass) ? $addClass : ''); ?>"
    quantity="<?php echo e(isset($quantity) ? $quantity : null); ?>"
    add-class-wrapper="<?php echo e(isset($addClassWrapper) ? $addClassWrapper : ''); ?>">
</recently-viewed>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="recently-viewed-template">
        <div :class="`${addClass} recently-viewed`">
            <div class="row remove-padding-margin">
                <div class="col-12 no-padding">
                    <h2 class="fs20 fw6 mb15"><?php echo e(__('velocity::app.products.recently-viewed')); ?></h2>
                </div>
            </div>

            <div :class="`recetly-viewed-products-wrapper ${addClassWrapper}`">
                <div
                    :key="Math.random()"
                    class="row small-card-container"
                    v-for="(product, index) in recentlyViewed">

                    <div class="col-4 product-image-container mr15">
                        <a :href="`${baseUrl}/${product.urlKey}`" class="unset">
                            <div class="product-image" :style="`background-image: url(${product.image})`"></div>
                        </a>
                    </div>

                    <div class="col-8 no-padding card-body align-vertical-top" v-if="product.name">
                        <a :href="`${baseUrl}/${product.urlKey}`" class="unset no-padding">
                            <div class="product-name">
                                <span class="fs16 text-nowrap">{{ product.name }}</span>
                            </div>

                            <div
                                v-html="product.priceHTML"
                                class="fs18 card-current-price fw6">
                            </div>

                            <star-ratings v-if="product.rating > 0"
                                push-class="display-inbl"
                                :ratings="product.rating">
                            </star-ratings>
                        </a>
                    </div>
                </div>

                <span
                    class="fs16"
                    v-if="!recentlyViewed ||(recentlyViewed && Object.keys(recentlyViewed).length == 0)"
                    v-text="'<?php echo e(__('velocity::app.products.not-available')); ?>'">
                </span>
            </div>
        </div>
    </script>

    <script type="text/javascript">
        (() => {
            Vue.component('recently-viewed', {
                template: '#recently-viewed-template',
                props: ['quantity', 'addClass', 'addClassWrapper'],

                data: function () {
                    return {
                        recentlyViewed: (() => {
                            let storedRecentlyViewed = window.localStorage.recentlyViewed;
                            if (storedRecentlyViewed) {
                                var slugs = JSON.parse(storedRecentlyViewed);
                                var updatedSlugs = {};

                                slugs = slugs.reverse();

                                slugs.forEach(slug => {
                                    updatedSlugs[slug] = {};
                                });

                                return updatedSlugs;
                            }
                        })(),
                    }
                },

                created: function () {
                    for (slug in this.recentlyViewed) {
                        if (slug) {
                            this.$http(`${this.baseUrl}/product-details/${slug}`)
                            .then(response => {
                                if (response.data.status) {
                                    this.$set(this.recentlyViewed, response.data.details.urlKey, response.data.details);
                                } else {
                                    delete this.recentlyViewed[response.data.slug];
                                    this.$set(this, 'recentlyViewed', this.recentlyViewed);

                                    this.$forceUpdate();
                                }
                            })
                            .catch(error => {})
                        }
                    }
                },
            })
        })()
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp64\www\handloomlk/resources/themes/velocity/views/products/list/recently-viewed.blade.php ENDPATH**/ ?>