<?php
    $attributeRepository = app('\Webkul\Attribute\Repositories\AttributeRepository');
    $comparableAttributes = $attributeRepository->findByField('is_comparable', 1);
?>

<?php $__env->startPush('css'); ?>
    <style>
        .btn-add-to-cart {
            max-width: 130px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="compare-product-template">
        <section class="cart-details row no-margin col-12">
            <h1 class="fw6 col-6">
                <?php echo e(__('velocity::app.customer.compare.compare_similar_items')); ?>

            </h1>

            <div class="col-6" v-if="products.length > 0">
                <button
                    class="theme-btn light pull-right"
                    @click="removeProductCompare('all')">
                    <?php echo e(__('shop::app.customer.account.wishlist.deleteall')); ?>

                </button>
            </div>

            <?php echo view_render_event('bagisto.shop.customers.account.compare.view.before'); ?>


            <table class="row compare-products">
                <shimmer-component v-if="!isProductListLoaded && !isMobile()"></shimmer-component>

                <template v-else-if="isProductListLoaded && products.length > 0">
                    <?php
                        $comparableAttributes = $comparableAttributes->toArray();

                        array_splice($comparableAttributes, 1, 0, [[
                            'code' => 'image',
                            'admin_name' => 'Product Image'
                        ]]);

                        array_splice($comparableAttributes, 2, 0, [[
                            'code' => 'addToCartHtml',
                            'admin_name' => 'Actions'
                        ]]);
                    ?>

                    <?php $__currentLoopData = $comparableAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <span class="fs16"><?php echo e($attribute['admin_name']); ?></span>
                            </td>

                            <td :key="`title-${index}`" v-for="(product, index) in products">
                                <?php switch($attribute['code']):
                                    case ('name'): ?>
                                        <a :href="`${$root.baseUrl}/${product.url_key}`" class="unset remove-decoration active-hover">
                                            <h1 class="fw6 fs18" v-text="product['<?php echo e($attribute['code']); ?>']"></h1>
                                        </a>
                                        <?php break; ?>

                                    <?php case ('image'): ?>
                                        <a :href="`${$root.baseUrl}/${product.url_key}`" class="unset">
                                            <img
                                                class="image-wrapper"
                                                :src="product['<?php echo e($attribute['code']); ?>']"
                                                onload="window.updateHeight ? window.updateHeight() : ''"
                                                :onerror="`this.src='${$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`" />
                                        </a>
                                        <?php break; ?>

                                    <?php case ('price'): ?>
                                        <span v-html="product['priceHTML']"></span>
                                        <?php break; ?>

                                    <?php case ('addToCartHtml'): ?>
                                        <div class="action">
                                            <vnode-injector :nodes="getDynamicHTML(product.addToCartHtml)"></vnode-injector>

                                            <i
                                                class="material-icons cross fs16"
                                                @click="removeProductCompare(product.id)">

                                                close
                                            </i>
                                        </div>
                                        <?php break; ?>

                                    <?php case ('color'): ?>
                                        <span v-html="product.color_label" class="fs16"></span>
                                        <?php break; ?>

                                    <?php case ('size'): ?>
                                        <span v-html="product.size_label" class="fs16"></span>
                                        <?php break; ?>

                                    <?php case ('description'): ?>
                                        <span v-html="product.description"></span>
                                        <?php break; ?>

                                    <?php default: ?>
                                        <?php switch($attribute['type']):
                                            case ('boolean'): ?>
                                                <span
                                                    v-text="product.product['<?php echo e($attribute['code']); ?>']
                                                            ? '<?php echo e(__('velocity::app.shop.general.yes')); ?>'
                                                            : '<?php echo e(__('velocity::app.shop.general.no')); ?>'"
                                                ></span>
                                                <?php break; ?>;
                                            <?php default: ?>
                                                <span v-html="product['<?php echo e($attribute['code']); ?>'] ? product['<?php echo e($attribute['code']); ?>'] : product.product['<?php echo e($attribute['code']); ?>'] ? product.product['<?php echo e($attribute['code']); ?>'] : '__'" class="fs16"></span>
                                                <?php break; ?>;
                                        <?php endswitch; ?>

                                        <?php break; ?>

                                <?php endswitch; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </template>

                <span v-else-if="isProductListLoaded && products.length == 0">
                    {{ __('customer.compare.empty-text') }}
                </span>
            </table>

            <?php echo view_render_event('bagisto.shop.customers.account.compare.view.after'); ?>

        </section>
    </script>

    <script>
        Vue.component('compare-product', {
            template: '#compare-product-template',

            data: function () {
                return {
                    'products': [],
                    'isProductListLoaded': false,
                    'isCustomer': '<?php echo e(auth()->guard('customer')->user() ? "true" : "false"); ?>' == "true",
                }
            },

            mounted: function () {
                this.getComparedProducts();
            },

            methods: {
                'getComparedProducts': function () {
                    let items = '';
                    let url = `${this.$root.baseUrl}/${this.isCustomer ? 'comparison' : 'detailed-products'}`;

                    let data = {
                        params: {'data': true}
                    }

                    if (! this.isCustomer) {
                        items = this.getStorageValue('compared_product');
                        items = items ? items.join('&') : '';

                        data = {
                            params: {
                                items
                            }
                        };
                    }

                    if (this.isCustomer || (! this.isCustomer && items != "")) {
                        this.$http.get(url, data)
                        .then(response => {
                            this.isProductListLoaded = true;

                            if (response.data.products.length > 3) {
                                $('.compare-products').css('overflow-x', 'scroll');
                            }

                            this.products = response.data.products;
                        })
                        .catch(error => {
                            this.isProductListLoaded = true;
                            console.log(this.__('error.something_went_wrong'));
                        });
                    } else {
                        this.isProductListLoaded = true;
                    }

                },

                'removeProductCompare': function (productId) {
                    if (this.isCustomer) {
                        this.$http.delete(`${this.$root.baseUrl}/comparison?productId=${productId}`)
                        .then(response => {
                            if (productId == 'all') {
                                this.$set(this, 'products', this.products.filter(product => false));
                            } else {
                                this.$set(this, 'products', this.products.filter(product => product.id != productId));
                            }

                            window.showAlert(`alert-${response.data.status}`, response.data.label, response.data.message);
                        })
                        .catch(error => {
                            console.log(this.__('error.something_went_wrong'));
                        });
                    } else {
                        let existingItems = this.getStorageValue('compared_product');

                        if (productId == "all") {
                            updatedItems = [];
                            this.$set(this, 'products', []);
                        } else {
                            updatedItems = existingItems.filter(item => item != productId);
                            this.$set(this, 'products', this.products.filter(product => product.id != productId));
                        }

                        this.setStorageValue('compared_product', updatedItems);

                        window.showAlert(
                            `alert-success`,
                            this.__('shop.general.alert.success'),
                            `${this.__('customer.compare.removed')}`
                        );
                    }

                    this.$root.headerItemsCount++;
                },
            }
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/suhailinfo/domains/suhail.info/public_html/resources/themes/velocity/views/guest/compare/compare-products.blade.php ENDPATH**/ ?>