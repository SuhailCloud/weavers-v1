<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.exchange_rates.add-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">

        <form method="POST" action="<?php echo e(route('admin.exchange_rates.store')); ?>" @submit.prevent="onSubmit">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '<?php echo e(url('/admin/dashboard')); ?>';"></i>

                        <?php echo e(__('admin::app.settings.exchange_rates.add-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.settings.exchange_rates.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo e(__('admin::app.settings.exchange_rates.source_currency')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(__('admin::app.settings.exchange_rates.target_currency')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(__('admin::app.settings.exchange_rates.rate')); ?>

                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <?php echo view_render_event('bagisto.admin.settings.exchangerate.create.before'); ?>


                                    <td>
                                        <?php echo e(core()->getBaseCurrencyCode()); ?>

                                    </td>

                                    <td>
                                        <div class="control-group" :class="[errors.has('target_currency') ? 'has-error' : '']">
                                            <select v-validate="'required'" class="control" name="target_currency" data-vv-as="&quot;<?php echo e(__('admin::app.settings.exchange_rates.target_currency')); ?>&quot;">
                                                <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(is_null($currency->exchange_rate)): ?>
                                                        <option value="<?php echo e($currency->id); ?>"><?php echo e($currency->name); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="control-error" v-if="errors.has('target_currency')">{{ errors.first('target_currency') }}</span>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="control-group" :class="[errors.has('rate') ? 'has-error' : '']">
                                            <input v-validate="'required'" class="control" id="rate" name="rate" data-vv-as="&quot;<?php echo e(__('admin::app.settings.exchange_rates.rate')); ?>&quot;" value="<?php echo e(old('rate')); ?>"/>
                                            <span class="control-error" v-if="errors.has('rate')">{{ errors.first('rate') }}</span>
                                        </div>
                                    </td>

                                    <?php echo view_render_event('bagisto.admin.settings.exchangerate.create.after'); ?>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\weavers-v1\vendor\bagisto\bagisto\packages\Webkul\Admin\src\Providers/../Resources/views/settings/exchange_rates/create.blade.php ENDPATH**/ ?>