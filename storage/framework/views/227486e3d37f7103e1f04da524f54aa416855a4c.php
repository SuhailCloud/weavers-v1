<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.wishlist.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <?php if(auth()->guard('customer')->guest()): ?>
        <wishlist-product></wishlist-product>
    <?php endif; ?>

    <?php if(auth()->guard('customer')->check()): ?>
        <?php $__env->startPush('scripts'); ?>
            <script>
                window.location = '<?php echo e(route('customer.wishlist.index')); ?>';
            </script>
        <?php $__env->stopPush(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="wishlist-product-template">
        <section class="cart-details row no-margin col-12">
            <h1 class="fw6 col-6">
                <?php echo e(__('shop::app.customer.account.wishlist.title')); ?>

            </h1>

            <div class="col-6" v-if="products.length > 0">
                <button
                    class="theme-btn light pull-right"
                    @click="removeProduct('all')">
                    <?php echo e(__('shop::app.customer.account.wishlist.deleteall')); ?>

                </button>
            </div>

            <?php echo view_render_event('bagisto.shop.customers.account.guest-customer.view.before'); ?>


            <div class="row products-collection col-12 ml0">
                <shimmer-component v-if="!isProductListLoaded && !isMobile()"></shimmer-component>

                <template v-else-if="isProductListLoaded && products.length > 0">
                    <carousel-component
                        slides-per-page="6"
                        navigation-enabled="hide"
                        pagination-enabled="hide"
                        id="wishlist-products-carousel"
                        :slides-count="products.length">

                        <slide
                            :key="index"
                            :slot="`slide-${index}`"
                            v-for="(product, index) in products">
                            <product-card :product="product"></product-card>
                        </slide>
                    </carousel-component>
                </template>

                <span v-else-if="isProductListLoaded"><?php echo e(__('customer::app.wishlist.empty')); ?></span>
            </div>

            <?php echo view_render_event('bagisto.shop.customers.account.guest-customer.view.after'); ?>

        </section>
    </script>

    <script>
        Vue.component('wishlist-product', {
            template: '#wishlist-product-template',

            data: function () {
                return {
                    'products': [],
                    'isProductListLoaded': false,
                }
            },

            watch: {
                '$root.headerItemsCount': function () {
                    this.getProducts();
                }
            },

            mounted: function () {
                this.getProducts();
            },

            methods: {
                'getProducts': function () {
                    let items = this.getStorageValue('wishlist_product');
                    items = items ? items.join('&') : '';

                    if (items != "") {
                        this.$http
                        .get(`${this.$root.baseUrl}/detailed-products`, {
                            params: { moveToCart: true, items }
                        })
                        .then(response => {
                            this.isProductListLoaded = true;
                            this.products = response.data.products;
                        })
                        .catch(error => {
                            this.isProductListLoaded = true;
                            console.log(this.__('error.something_went_wrong'));
                        });
                    } else {
                        this.products = [];
                        this.isProductListLoaded = true;
                    }
                },

                'removeProduct': function (productId) {
                    let existingItems = this.getStorageValue('wishlist_product');

                    if (productId == "all") {
                        updatedItems = [];
                        this.$set(this, 'products', []);
                    } else {
                        updatedItems = existingItems.filter(item => item != productId);
                        this.$set(this, 'products', this.products.filter(product => product.slug != productId));
                    }

                    this.$root.headerItemsCount++;
                    this.setStorageValue('wishlist_product', updatedItems);

                    window.showAlert(
                        `alert-success`,
                        this.__('shop.general.alert.success'),
                        `${this.__('customer.compare.removed')}`
                    );
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\weavers-v1/resources/themes/velocity/views/guest/wishlist/index.blade.php ENDPATH**/ ?>