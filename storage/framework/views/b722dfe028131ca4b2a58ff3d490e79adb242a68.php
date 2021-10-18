<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.inventory_sources.edit-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">

        <form method="POST" action="<?php echo e(route('admin.inventory_sources.update', $inventorySource->id)); ?>" @submit.prevent="onSubmit">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '<?php echo e(url('/admin/dashboard')); ?>';"></i>

                        <?php echo e(__('admin::app.settings.inventory_sources.edit-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.settings.inventory_sources.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <?php echo view_render_event('bagisto.admin.settings.inventory.edit.before'); ?>


                    <input name="_method" type="hidden" value="PUT">

                    <accordian :title="'<?php echo e(__('admin::app.settings.inventory_sources.general')); ?>'" :active="true">
                        <div slot="body">

                            <div class="control-group" :class="[errors.has('code') ? 'has-error' : '']">
                                <label for="code" class="required"><?php echo e(__('admin::app.settings.inventory_sources.code')); ?></label>
                                <input v-validate="'required'" class="control" id="code" name="code" data-vv-as="&quot;<?php echo e(__('admin::app.settings.inventory_sources.code')); ?>&quot;" value="<?php echo e(old('code') ?: $inventorySource->code); ?>" v-code/>
                                <span class="control-error" v-if="errors.has('code')">{{ errors.first('code') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                                <label for="name" class="required"><?php echo e(__('admin::app.settings.inventory_sources.name')); ?></label>
                                <input v-validate="'required'" class="control" id="name" name="name" data-vv-as="&quot;<?php echo e(__('admin::app.settings.inventory_sources.name')); ?>&quot;" value="<?php echo e(old('name') ?: $inventorySource->name); ?>"/>
                                <span class="control-error" v-if="errors.has('name')">{{ errors.first('name') }}</span>
                            </div>

                            <div class="control-group">
                                <label for="description"><?php echo e(__('admin::app.settings.inventory_sources.description')); ?></label>
                                <textarea class="control" id="description" name="description"><?php echo e(old('description') ?: $inventorySource->description); ?></textarea>
                            </div>

                            <div class="control-group">
                                <label for="latitude"><?php echo e(__('admin::app.settings.inventory_sources.latitude')); ?></label>
                                <input class="control" id="latitude" name="latitude" value="<?php echo e(old('latitude') ?: $inventorySource->latitude); ?>"/>
                            </div>

                            <div class="control-group">
                                <label for="longitude"><?php echo e(__('admin::app.settings.inventory_sources.longitude')); ?></label>
                                <input class="control" id="longitude" name="longitude" value="<?php echo e(old('longitude') ?: $inventorySource->longitude); ?>"/>
                            </div>

                            <div class="control-group">
                                <label for="priority"><?php echo e(__('admin::app.settings.inventory_sources.priority')); ?></label>
                                <input class="control" id="priority" name="priority" value="<?php echo e(old('priority') ?: $inventorySource->priority); ?>"/>
                            </div>

                            <div class="control-group">
                                <label for="status"><?php echo e(__('admin::app.settings.inventory_sources.status')); ?></label>

                                <label class="switch">
                                    <input type="checkbox" id="status" name="status" value="<?php echo e($inventorySource->status); ?>" <?php echo e($inventorySource->status ? 'checked' : ''); ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>

                        </div>
                    </accordian>

                    <accordian :title="'<?php echo e(__('admin::app.settings.inventory_sources.contact-info')); ?>'" :active="true">
                        <div slot="body">

                            <div class="control-group" :class="[errors.has('contact_name') ? 'has-error' : '']">
                                <label for="contact_name" class="required"><?php echo e(__('admin::app.settings.inventory_sources.contact_name')); ?></label>
                                <input class="control" v-validate="'required'" id="contact_name" name="contact_name" data-vv-as="&quot;<?php echo e(__('admin::app.settings.inventory_sources.contact_name')); ?>&quot;" value="<?php echo e(old('contact_name') ?: $inventorySource->contact_name); ?>"/>
                                <span class="control-error" v-if="errors.has('contact_name')">{{ errors.first('contact_name') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('contact_email') ? 'has-error' : '']">
                                <label for="contact_email" class="required"><?php echo e(__('admin::app.settings.inventory_sources.contact_email')); ?></label>
                                <input class="control" v-validate="'required|email'" id="contact_email" name="contact_email" data-vv-as="&quot;<?php echo e(__('admin::app.settings.inventory_sources.contact_email')); ?>&quot;" value="<?php echo e(old('contact_email') ?: $inventorySource->contact_email); ?>"/>
                                <span class="control-error" v-if="errors.has('contact_email')">{{ errors.first('contact_email') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('contact_number') ? 'has-error' : '']">
                                <label for="contact_number" class="required"><?php echo e(__('admin::app.settings.inventory_sources.contact_number')); ?></label>
                                <input class="control" v-validate="'required'" id="contact_number" name="contact_number" data-vv-as="&quot;<?php echo e(__('admin::app.settings.inventory_sources.contact_number')); ?>&quot;" value="<?php echo e(old('contact_number') ?: $inventorySource->contact_number); ?>"/>
                                <span class="control-error" v-if="errors.has('contact_number')">{{ errors.first('contact_number') }}</span>
                            </div>

                            <div class="control-group">
                                <label for="contact_fax"><?php echo e(__('admin::app.settings.inventory_sources.contact_fax')); ?></label>
                                <input class="control" id="country" name="contact_fax" value="<?php echo e(old('contact_fax') ?: $inventorySource->contact_fax); ?>"/>
                            </div>

                        </div>
                    </accordian>

                    <accordian :title="'<?php echo e(__('admin::app.settings.inventory_sources.address')); ?>'" :active="true">
                        <div slot="body">

                            <?php echo $__env->make('admin::customers.country-state', ['countryCode' => old('country') ?? $inventorySource->country, 'stateCode' => old('state') ?? $inventorySource->state], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="control-group" :class="[errors.has('city') ? 'has-error' : '']">
                                <label for="city" class="required"><?php echo e(__('admin::app.settings.inventory_sources.city')); ?></label>
                                <input class="control" v-validate="'required'" id="city" name="city" data-vv-as="&quot;<?php echo e(__('admin::app.settings.inventory_sources.city')); ?>&quot;" value="<?php echo e(old('city') ?: $inventorySource->city); ?>"/>
                                <span class="control-error" v-if="errors.has('city')">{{ errors.first('city') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('street') ? 'has-error' : '']">
                                <label for="street" class="required"><?php echo e(__('admin::app.settings.inventory_sources.street')); ?></label>
                                <input class="control" v-validate="'required'" id="street" name="street" data-vv-as="&quot;<?php echo e(__('admin::app.settings.inventory_sources.street')); ?>&quot;" value="<?php echo e(old('street') ?: $inventorySource->street); ?>"/>
                                <span class="control-error" v-if="errors.has('street')">{{ errors.first('street') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('postcode') ? 'has-error' : '']">
                                <label for="postcode" class="required"><?php echo e(__('admin::app.settings.inventory_sources.postcode')); ?></label>
                                <input class="control" v-validate="'required'" id="postcode" name="postcode" data-vv-as="&quot;<?php echo e(__('admin::app.settings.inventory_sources.postcode')); ?>&quot;" value="<?php echo e(old('postcode') ?: $inventorySource->postcode); ?>"/>
                                <span class="control-error" v-if="errors.has('postcode')">{{ errors.first('postcode') }}</span>
                            </div>

                        </div>
                    </accordian>

                    <?php echo view_render_event('bagisto.admin.settings.inventory.edit.after'); ?>

                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\weavers-v1\vendor\bagisto\bagisto\packages\Webkul\Admin\src\Providers/../Resources/views/settings/inventory_sources/edit.blade.php ENDPATH**/ ?>