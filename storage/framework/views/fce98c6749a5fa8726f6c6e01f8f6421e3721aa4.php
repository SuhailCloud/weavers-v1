<compare-component product-id="<?php echo e($productId); ?>"></compare-component>

<?php $__env->startPush('scripts'); ?>

    <script type="text/x-template" id="compare-component-template">
        <a class="unset compare-icon text-right" @click="addProductToCompare" style="cursor: pointer">
            <img src="<?php echo e(asset('themes/default/assets/images/compare_arrows.png')); ?>" />
        </a>
    </script>

    <script>
        Vue.component('compare-component', {
            props: ['productId'],

            template: '#compare-component-template',

            data: function () {
                return {
                    'baseUrl': "<?php echo e(url()->to('/')); ?>",
                    'customer': '<?php echo e(auth()->guard('customer')->user() ? "true" : "false"); ?>' == "true",
                }
            },

            methods: {
                'addProductToCompare': function () {
                    if (this.customer == "true" || this.customer == true) {
                        this.$http.put(
                            `${this.baseUrl}/comparison`, {
                                productId: this.productId,
                            }
                        ).then(response => {
                            window.flashMessages = [{
                                'type': `alert-${response.data.status}`,
                                'message': response.data.message
                            }];

                            this.$root.addFlashMessages()
                        }).catch(error => {
                            window.flashMessages = [{
                                'type': `alert-danger`,
                                'message': "<?php echo e(__('velocity::app.error.something_went_wrong')); ?>"
                            }];

                            this.$root.addFlashMessages()
                        });
                    } else {
                        let updatedItems = [this.productId];
                        let existingItems = this.getStorageValue('compared_product');

                        if (existingItems) {
                            if (existingItems.indexOf(this.productId) == -1) {
                                updatedItems = existingItems.concat(updatedItems);

                                this.setStorageValue('compared_product', updatedItems);

                                window.flashMessages = [{
                                    'type': `alert-success`,
                                    'message': "<?php echo e(__('velocity::app.customer.compare.added')); ?>"
                                }];

                                this.$root.addFlashMessages()
                            } else {
                                window.flashMessages = [{
                                    'type': `alert-success`,
                                    'message': "<?php echo e(__('velocity::app.customer.compare.already_added')); ?>"
                                }];

                                this.$root.addFlashMessages()
                            }
                        } else {
                            this.setStorageValue('compared_product', updatedItems);

                            window.flashMessages = [{
                                'type': `alert-success`,
                                'message': "<?php echo e(__('velocity::app.customer.compare.added')); ?>"
                            }];

                                this.$root.addFlashMessages()
                        }
                    }
                },

                'getStorageValue': function (key) {
                    let value = window.localStorage.getItem(key);

                    if (value) {
                        value = JSON.parse(value);
                    }

                    return value;
                },

                'setStorageValue': function (key, value) {
                    window.localStorage.setItem(key, JSON.stringify(value));

                    return true;
                },
            }
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/suhailinfo/domains/suhail.info/public_html/vendor/bagisto/bagisto/packages/Webkul/Shop/src/Providers/../Resources/views/products/compare.blade.php ENDPATH**/ ?>