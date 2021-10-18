<?php $toolbarHelper = app('Webkul\Product\Helpers\Toolbar'); ?>
<?php $productRepository = app('Webkul\Product\Repositories\ProductRepository'); ?>



<?php $__env->startSection('page_title'); ?>
    <?php echo e($category->meta_title ?? $category->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('seo'); ?>
    <meta name="description" content="<?php echo e($category->meta_description); ?>" />
    <meta name="keywords" content="<?php echo e($category->meta_keywords); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style type="text/css">
        .product-price span:first-child, .product-price span:last-child {
            font-size: 18px;
            font-weight: 600;
        }

        @media  only screen and (max-width: 992px) {
            .main-content-wrapper .vc-header {
                box-shadow: unset;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php
    $isDisplayMode = in_array(
        $category->display_mode, [
            null,
            'products_only',
            'products_and_description'
        ]
    );

    $products = $productRepository->getAll($category->id);
?>

<?php $__env->startSection('content-wrapper'); ?>
    <category-component></category-component>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="category-template">
        <section class="row col-12 velocity-divide-page category-page-wrapper">
            <?php echo view_render_event('bagisto.shop.productOrCategory.index.before', ['category' => $category]); ?>

    
            <?php if(in_array($category->display_mode, [null, 'products_only', 'products_and_description'])): ?>
                <?php echo $__env->make('shop::products.list.layered-navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
    
            <div class="category-container right">
                <div class="row remove-padding-margin">
                    <div class="pl0 col-12">
                        <h1 class="fw6 mb10"><?php echo e($category->name); ?></h1>
    
                        <?php if($isDisplayMode): ?>
                            <template v-if="products.length > 0">
                                <?php if($category->description): ?>
                                    <div class="category-description">
                                        <?php echo $category->description; ?>

                                    </div>
                                <?php endif; ?>
                            </template>
                        <?php endif; ?>
                    </div>
    
                    <div class="col-12 no-padding">
                        <div class="hero-image">
                            <?php if(!is_null($category->image)): ?>
                                <img class="logo" src="<?php echo e($category->image_url); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
    
                <div class="filters-container">
                    <?php echo $__env->make('shop::products.list.toolbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
    
                <div
                    class="category-block"
                    <?php if($category->display_mode == 'description_only'): ?>
                        style="width: 100%"
                    <?php endif; ?>>

                    <?php if($isDisplayMode): ?>
                        <shimmer-component v-if="isLoading && !isMobile()" shimmer-count="4"></shimmer-component>

                        <template v-else-if="products.length > 0">
                            <?php if($toolbarHelper->getCurrentMode() == 'grid'): ?>
                                <div class="row col-12 remove-padding-margin">
                                    <product-card
                                        :key="index"
                                        :product="product"
                                        v-for="(product, index) in products">
                                    </product-card>
                                </div>
                            <?php else: ?>
                                <div class="product-list">
                                    <product-card
                                        list=true
                                        :key="index"
                                        :product="product"
                                        v-for="(product, index) in products">
                                    </product-card>
                                </div>
                            <?php endif; ?>
    
                            <?php echo view_render_event('bagisto.shop.productOrCategory.index.pagination.before', ['category' => $category]); ?>

    
                            <div class="bottom-toolbar">
                                <?php echo e($products->appends(request()->input())->links()); ?>

                            </div>
    
                            <?php echo view_render_event('bagisto.shop.productOrCategory.index.pagination.after', ['category' => $category]); ?>

                        </template>
    
                        <div class="product-list empty" v-else>
                            <h2><?php echo e(__('shop::app.products.whoops')); ?></h2>
                            <p><?php echo e(__('shop::app.products.empty')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
    
            <?php echo view_render_event('bagisto.shop.productOrCategory.index.after', ['category' => $category]); ?>

        </section>
    </script>

    <script>
        Vue.component('category-component', {
            template: '#category-template',

            data: function () {
                return {
                    'products': [],
                    'isLoading': true,
                    'paginationHTML': '',
                }
            },

            created: function () {
                this.getCategoryProducts();
            },

            methods: {
                'getCategoryProducts': function () {
                    this.$http.get(`${this.$root.baseUrl}/category-products/<?php echo e($category->id); ?>${window.location.search}`)
                    .then(response => {
                        this.isLoading = false;
                        this.products = response.data.products.data;
                        this.paginationHTML = response.data.paginationHTML;
                    })
                    .catch(error => {
                        this.isLoading = false;
                        console.log(this.__('error.something_went_wrong'));
                    })
                }
            }
        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suhailinfo/domains/suhail.info/public_html/resources/themes/velocity/views/products/index.blade.php ENDPATH**/ ?>