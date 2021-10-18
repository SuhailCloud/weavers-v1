<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.currencies.edit-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">

        <form method="POST" action="<?php echo e(route('admin.currencies.update', $currency->id)); ?>" @submit.prevent="onSubmit" enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '<?php echo e(url('/admin/dashboard')); ?>';"></i>

                        <?php echo e(__('admin::app.settings.currencies.edit-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.settings.currencies.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    <?php echo csrf_field(); ?>
                    <input name="_method" type="hidden" value="PUT">

                    <?php echo view_render_event('bagisto.admin.settings.currencies.edit.before'); ?>


                    <accordian :title="'<?php echo e(__('admin::app.settings.currencies.general')); ?>'" :active="true">
                        <div slot="body">

                            <div class="control-group" :class="[errors.has('code') ? 'has-error' : '']">
                                <label for="code" class="required"><?php echo e(__('admin::app.settings.currencies.code')); ?></label>
                                <input type="text" v-validate="'required'" class="control" id="code" name="code" data-vv-as="&quot;<?php echo e(__('admin::app.settings.currencies.code')); ?>&quot;" value="<?php echo e(old('code') ?: $currency->code); ?>" disabled="disabled"/>
                                <input type="hidden" name="code" value="<?php echo e($currency->code); ?>"/>
                                <span class="control-error" v-if="errors.has('code')">{{ errors.first('code') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                                <label for="name" class="required"><?php echo e(__('admin::app.settings.currencies.name')); ?></label>
                                <input v-validate="'required'" class="control" id="name" name="name" data-vv-as="&quot;<?php echo e(__('admin::app.settings.currencies.name')); ?>&quot;" value="<?php echo e(old('name') ?: $currency->name); ?>"/>
                                <span class="control-error" v-if="errors.has('name')">{{ errors.first('name') }}</span>
                            </div>

                            <div class="control-group">
                                <label for="symbol"><?php echo e(__('admin::app.settings.currencies.symbol')); ?></label>
                                <input class="control" id="symbol" name="symbol" value="<?php echo e(old('symbol') ?: $currency->symbol); ?>"/>
                            </div>
                        </div>
                    </accordian>

                    <?php echo view_render_event('bagisto.admin.settings.currencies.edit.after'); ?>

                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\weavers-v1\vendor\bagisto\bagisto\packages\Webkul\Admin\src\Providers/../Resources/views/settings/currencies/edit.blade.php ENDPATH**/ ?>