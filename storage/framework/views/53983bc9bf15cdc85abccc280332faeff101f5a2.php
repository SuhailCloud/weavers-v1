<?php $__env->startSection('page_title'); ?>
    <?php echo e(trim($product->meta_title) != "" ? $product->meta_title : $product->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('seo'); ?>
    <meta name="description" content="<?php echo e(trim($product->meta_description) != "" ? $product->meta_description : \Illuminate\Support\Str::limit(strip_tags($product->description), 120, '')); ?>"/>
    <meta name="keywords" content="<?php echo e($product->meta_keywords); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>

    <?php echo view_render_event('bagisto.shop.products.view.before', ['product' => $product]); ?>


    <section class="product-detail">

        <div class="layouter">
            <product-view>
                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="product_id" value="<?php echo e($product->product_id); ?>">

                    <?php echo $__env->make('shop::products.view.gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="details">

                        <div class="product-heading">
                            <span><?php echo e($product->name); ?></span>
                        </div>

                        <?php echo $__env->make('shop::products.review', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('shop::products.price', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('shop::products.view.stock', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo view_render_event('bagisto.shop.products.view.short_description.before', ['product' => $product]); ?>


                        <div class="description">
                            <?php echo $product->short_description; ?>

                        </div>

                        <?php echo view_render_event('bagisto.shop.products.view.short_description.after', ['product' => $product]); ?>



                        <?php echo view_render_event('bagisto.shop.products.view.quantity.before', ['product' => $product]); ?>


                        <?php if($product->getTypeInstance()->showQuantityBox()): ?>
                            <quantity-changer></quantity-changer>
                        <?php else: ?>
                            <input type="hidden" name="quantity" value="1">
                        <?php endif; ?>

                        <?php echo view_render_event('bagisto.shop.products.view.quantity.after', ['product' => $product]); ?>


                        <?php echo $__env->make('shop::products.view.configurable-options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('shop::products.view.downloadable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('shop::products.view.grouped-products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('shop::products.view.bundle-options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo view_render_event('bagisto.shop.products.view.description.before', ['product' => $product]); ?>


                        <accordian :title="'<?php echo e(__('shop::app.products.description')); ?>'" :active="true">
                            <div slot="header">
                                <?php echo e(__('shop::app.products.description')); ?>

                                <i class="icon expand-icon right"></i>
                            </div>

                            <div slot="body">
                                <div class="full-description">
                                    <?php echo $product->description; ?>

                                </div>
                            </div>
                        </accordian>

                        <?php echo view_render_event('bagisto.shop.products.view.description.after', ['product' => $product]); ?>


                        <?php echo $__env->make('shop::products.view.attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('shop::products.view.reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </product-view>
        </div>

        <?php echo $__env->make('shop::products.view.related-products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('shop::products.view.up-sells', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </section>

    <?php echo view_render_event('bagisto.shop.products.view.after', ['product' => $product]); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script type="text/x-template" id="product-view-template">
        <form method="POST" id="product-form" action="<?php echo e(route('cart.add', $product->product_id)); ?>" @click="onSubmit($event)">

            <input type="hidden" name="is_buy_now" v-model="is_buy_now">

            <slot></slot>

        </form>
    </script>

    <script type="text/x-template" id="quantity-changer-template">
        <div class="quantity control-group" :class="[errors.has(controlName) ? 'has-error' : '']">
            <label class="required"><?php echo e(__('shop::app.products.quantity')); ?></label>

            <button type="button" class="decrease" @click="decreaseQty()">-</button>

            <input :name="controlName" class="control" :value="qty" :v-validate="validations" data-vv-as="&quot;<?php echo e(__('shop::app.products.quantity')); ?>&quot;" readonly>

            <button type="button" class="increase" @click="increaseQty()">+</button>

            <span class="control-error" v-if="errors.has(controlName)">{{ errors.first(controlName) }}</span>
        </div>
    </script>

    <script>

        Vue.component('product-view', {

            template: '#product-view-template',

            inject: ['$validator'],

            data: function() {
                return {
                    is_buy_now: 0,
                }
            },

            methods: {
                onSubmit: function(e) {
                    if (e.target.getAttribute('type') != 'submit')
                        return;

                    e.preventDefault();

                    var this_this = this;

                    this.$validator.validateAll().then(function (result) {
                        if (result) {
                            this_this.is_buy_now = e.target.classList.contains('buynow') ? 1 : 0;

                            setTimeout(function() {
                                document.getElementById('product-form').submit();
                            }, 0);
                        }
                    });
                }
            }
        });

        Vue.component('quantity-changer', {
            template: '#quantity-changer-template',

            inject: ['$validator'],

            props: {
                controlName: {
                    type: String,
                    default: 'quantity'
                },

                quantity: {
                    type: [Number, String],
                    default: 1
                },

                minQuantity: {
                    type: [Number, String],
                    default: 1
                },

                validations: {
                    type: String,
                    default: 'required|numeric|min_value:1'
                }
            },

            data: function() {
                return {
                    qty: this.quantity
                }
            },

            watch: {
                quantity: function (val) {
                    this.qty = val;

                    this.$emit('onQtyUpdated', this.qty)
                }
            },

            methods: {
                decreaseQty: function() {
                    if (this.qty > this.minQuantity)
                        this.qty = parseInt(this.qty) - 1;

                    this.$emit('onQtyUpdated', this.qty)
                },

                increaseQty: function() {
                    this.qty = parseInt(this.qty) + 1;

                    this.$emit('onQtyUpdated', this.qty)
                }
            }
        });

        $(document).ready(function() {
            var addTOButton = document.getElementsByClassName('add-to-buttons')[0];
            document.getElementById('loader').style.display="none";
            addTOButton.style.display="flex";
        });

        window.onload = function() {
            var thumbList = document.getElementsByClassName('thumb-list')[0];
            var thumbFrame = document.getElementsByClassName('thumb-frame');
            var productHeroImage = document.getElementsByClassName('product-hero-image')[0];

            if (thumbList && productHeroImage) {

                for(let i=0; i < thumbFrame.length ; i++) {
                    thumbFrame[i].style.height = (productHeroImage.offsetHeight/4) + "px";
                    thumbFrame[i].style.width = (productHeroImage.offsetHeight/4)+ "px";
                }

                if (screen.width > 720) {
                    thumbList.style.width = (productHeroImage.offsetHeight/4) + "px";
                    thumbList.style.minWidth = (productHeroImage.offsetHeight/4) + "px";
                    thumbList.style.height = productHeroImage.offsetHeight + "px";
                }
            }

            window.onresize = function() {
                if (thumbList && productHeroImage) {

                    for(let i=0; i < thumbFrame.length; i++) {
                        thumbFrame[i].style.height = (productHeroImage.offsetHeight/4) + "px";
                        thumbFrame[i].style.width = (productHeroImage.offsetHeight/4)+ "px";
                    }

                    if (screen.width > 720) {
                        thumbList.style.width = (productHeroImage.offsetHeight/4) + "px";
                        thumbList.style.minWidth = (productHeroImage.offsetHeight/4) + "px";
                        thumbList.style.height = productHeroImage.offsetHeight + "px";
                    }
                }
            }
        };
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\weavers-v1\vendor\bagisto\bagisto\packages\Webkul\Shop\src\Providers/../Resources/views/products/view.blade.php ENDPATH**/ ?>