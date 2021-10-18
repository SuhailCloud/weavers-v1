<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.customers.customers.edit-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <?php echo view_render_event('bagisto.admin.customer.edit.before', ['customer' => $customer]); ?>


        <form method="POST" action="<?php echo e(route('admin.customer.update', $customer->id)); ?>">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '<?php echo e(url('/admin/dashboard')); ?>';"></i>

                        <?php echo e(__('admin::app.customers.customers.title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.customers.customers.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">

                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <input name="_method" type="hidden" value="PUT">

                    <accordian :title="'<?php echo e(__('admin::app.account.general')); ?>'" :active="true">
                        <div slot="body">

                            <?php echo view_render_event('bagisto.admin.customer.edit.form.before', ['customer' => $customer]); ?>


                            <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                                <label for="first_name" class="required"> <?php echo e(__('admin::app.customers.customers.first_name')); ?></label>
                                <input type="text"  class="control" name="first_name" v-validate="'required'" value="<?php echo e(old('first_name') ?:$customer->first_name); ?>"
                                data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.firstname')); ?>&quot;"/>
                                <span class="control-error" v-if="errors.has('first_name')">{{ errors.first('first_name') }}</span>
                            </div>

                            <?php echo view_render_event('bagisto.admin.customer.edit.first_name.after', ['customer' => $customer]); ?>


                            <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                                <label for="last_name" class="required"> <?php echo e(__('admin::app.customers.customers.last_name')); ?></label>
                                <input type="text"  class="control"  name="last_name"   v-validate="'required'" value="<?php echo e(old('last_name') ?:$customer->last_name); ?>" data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.lastname')); ?>&quot;">
                                <span class="control-error" v-if="errors.has('last_name')">{{ errors.first('last_name') }}</span>
                            </div>

                            <?php echo view_render_event('bagisto.admin.customer.edit.last_name.after', ['customer' => $customer]); ?>


                            <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                                <label for="email" class="required"> <?php echo e(__('admin::app.customers.customers.email')); ?></label>
                                <input type="email"  class="control"  name="email" v-validate="'required|email'" value="<?php echo e(old('email') ?:$customer->email); ?>" data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.email')); ?>&quot;">
                                <span class="control-error" v-if="errors.has('email')">{{ errors.first('email') }}</span>
                            </div>

                            <?php echo view_render_event('bagisto.admin.customer.edit.email.after', ['customer' => $customer]); ?>


                            <div class="control-group" :class="[errors.has('gender') ? 'has-error' : '']">
                                <label for="gender" class="required"><?php echo e(__('admin::app.customers.customers.gender')); ?></label>
                                <select name="gender" class="control" value="<?php echo e($customer->gender); ?>" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('admin::app.customers.customers.gender')); ?>&quot;">
                                    <option value="" <?php echo e($customer->gender == "" ? 'selected' : ''); ?>></option>
                                    <option value="<?php echo e(__('admin::app.customers.customers.male')); ?>" <?php echo e($customer->gender == __('admin::app.customers.customers.male') ? 'selected' : ''); ?>><?php echo e(__('admin::app.customers.customers.male')); ?></option>
                                    <option value="<?php echo e(__('admin::app.customers.customers.female')); ?>" <?php echo e($customer->gender == __('admin::app.customers.customers.female') ? 'selected' : ''); ?>><?php echo e(__('admin::app.customers.customers.female')); ?></option>
                                    <option value="<?php echo e(__('admin::app.customers.customers.other')); ?>" <?php echo e($customer->gender == __('admin::app.customers.customers.other') ? 'selected' : ''); ?>><?php echo e(__('admin::app.customers.customers.other')); ?></option>
                                </select>
                                <span class="control-error" v-if="errors.has('gender')">{{ errors.first('gender') }}</span>
                            </div>

                            <?php echo view_render_event('bagisto.admin.customer.edit.gender.after', ['customer' => $customer]); ?>


                            <div class="control-group">
                                <label for="status" class="required"><?php echo e(__('admin::app.customers.customers.status')); ?></label>

                                <label class="switch">
                                    <input type="checkbox" id="status" name="status" value="<?php echo e($customer->status); ?>" <?php echo e($customer->status ? 'checked' : ''); ?>>
                                    <span class="slider round"></span>
                                </label>

                                <span class="control-error" v-if="errors.has('status')">{{ errors.first('status') }}</span>
                            </div>

                            <?php echo view_render_event('bagisto.admin.customer.edit.status.after', ['customer' => $customer]); ?>


                            <div class="control-group" :class="[errors.has('date_of_birth') ? 'has-error' : '']">
                                <label for="dob"><?php echo e(__('admin::app.customers.customers.date_of_birth')); ?></label>
                                <input type="date" class="control" name="date_of_birth" value="<?php echo e(old('date_of_birth') ?:$customer->date_of_birth); ?>" v-validate="" data-vv-as="&quot;<?php echo e(__('admin::app.customers.customers.date_of_birth')); ?>&quot;">
                                <span class="control-error" v-if="errors.has('date_of_birth')">{{ errors.first('date_of_birth') }}</span>
                            </div>

                            <?php echo view_render_event('bagisto.admin.customer.edit.date_of_birth.after', ['customer' => $customer]); ?>


                            <div class="control-group" :class="[errors.has('phone') ? 'has-error' : '']">
                                <label for="phone"><?php echo e(__('admin::app.customers.customers.phone')); ?></label>
                                <input type="text" class="control" name="phone"  value="<?php echo e($customer->phone); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.customers.customers.phone')); ?>&quot;">
                                <span class="control-error" v-if="errors.has('phone')">{{ errors.first('phone') }}</span>
                            </div>

                            <?php echo view_render_event('bagisto.admin.customer.edit.phone.after', ['customer' => $customer]); ?>


                            <div class="control-group">
                                <label for="customerGroup" ><?php echo e(__('admin::app.customers.customers.customer_group')); ?></label>

                                <?php if(! is_null($customer->customer_group_id)): ?>
                                    <?php $selectedCustomerOption = $customer->group->id ?>
                                <?php else: ?>
                                    <?php $selectedCustomerOption = '' ?>
                                <?php endif; ?>

                                <select  class="control" name="customer_group_id">
                                    <?php $__currentLoopData = $customerGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($group->id); ?>" <?php echo e($selectedCustomerOption == $group->id ? 'selected' : ''); ?>>
                                        <?php echo e($group->name); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </accordian>

                </div>
            </div>
        </form>

        <?php echo view_render_event('bagisto.admin.customer.edit.after', ['customer' => $customer]); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suhailinfo/domains/suhail.info/public_html/vendor/bagisto/bagisto/packages/Webkul/Admin/src/Providers/../Resources/views/customers/edit.blade.php ENDPATH**/ ?>