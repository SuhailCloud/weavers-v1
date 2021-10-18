<input type="text" v-validate="'<?php echo e($validations); ?>'" class="control" id="<?php echo e($attribute->code); ?>" name="<?php echo e($attribute->code); ?>" value="<?php echo e(old($attribute->code) ?: $product[$attribute->code]); ?>" <?php echo e(in_array($attribute->code, ['sku', 'url_key']) ? 'v-slugify' : ''); ?> data-vv-as="&quot;<?php echo e($attribute->admin_name); ?>&quot;" <?php echo e($attribute->code == 'name' ? 'v-slugify-target=\'url_key\'' : ''); ?> />



<?php /**PATH /home/suhailinfo/domains/suhail.info/public_html/vendor/bagisto/bagisto/packages/Webkul/Admin/src/Providers/../Resources/views/catalog/products/field-types/text.blade.php ENDPATH**/ ?>