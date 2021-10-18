<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.profile.index.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-detail-wrapper'); ?>
    <div class="account-head">
        <a href="<?php echo e(route('customer.session.destroy')); ?>" class="theme-btn light unset pull-right">
            <?php echo e(__('shop::app.header.logout')); ?>

        </a>

        <h1 class="account-heading">
            <?php echo e(__('shop::app.customer.account.profile.index.title')); ?>

        </h1>
    </div>

    <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.before', ['customer' => $customer]); ?>


        <div class="profile-update-form">
            <form
                method="POST"
                @submit.prevent="onSubmit"
                class="account-table-content"
                action="<?php echo e(route('customer.profile.edit')); ?>">
                <?php echo csrf_field(); ?>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.before', ['customer' => $customer]); ?>


                <div :class="`row ${errors.has('first_name') ? 'has-error' : ''}`">
                    <label class="col-12 mandatory">
                        <?php echo e(__('shop::app.customer.account.profile.fname')); ?>

                    </label>

                    <div class="col-12">
                        <input value="<?php echo e($customer->first_name); ?>" name="first_name" type="text" v-validate="'required'" />
                        <span class="control-error" v-if="errors.has('first_name')">{{ errors.first('first_name') }}</span>
                    </div>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.first_name.after', ['customer' => $customer]); ?>


                <div class="row">
                    <label class="col-12">
                        <?php echo e(__('shop::app.customer.account.profile.lname')); ?>

                    </label>

                    <div class="col-12">
                        <input value="<?php echo e($customer->last_name); ?>" name="last_name" type="text" />
                    </div>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.last_name.after', ['customer' => $customer]); ?>


                <div :class="`row ${errors.has('gender') ? 'has-error' : ''}`">
                    <label class="col-12 mandatory">
                        <?php echo e(__('shop::app.customer.account.profile.gender')); ?>

                    </label>

                    <div class="col-12">
                        <select
                            name="gender"
                            v-validate="'required'"
                            class="control styled-select"
                            data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.profile.gender')); ?>&quot;">

                            <option value=""  <?php if($customer->gender == ""): ?> selected <?php endif; ?>></option>
                            <option
                                value="Other"
                                <?php if($customer->gender == "Other"): ?>
                                    selected="selected"
                                <?php endif; ?>>
                                <?php echo e(__('velocity::app.shop.gender.other')); ?>

                            </option>

                            <option
                                value="Male"
                                <?php if($customer->gender == "Male"): ?>
                                    selected="selected"
                                <?php endif; ?>>
                                <?php echo e(__('velocity::app.shop.gender.male')); ?>

                            </option>

                            <option
                                value="Female"
                                <?php if($customer->gender == "Female"): ?>
                                    selected="selected"
                                <?php endif; ?>>
                                <?php echo e(__('velocity::app.shop.gender.female')); ?>

                            </option>
                        </select>

                        <div class="select-icon-container">
                            <span class="select-icon rango-arrow-down"></span>
                        </div>

                        <span class="control-error" v-if="errors.has('gender')">{{ errors.first('gender') }}</span>
                    </div>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.gender.after', ['customer' => $customer]); ?>


                <div :class="`row ${errors.has('date_of_birth') ? 'has-error' : ''}`">
                    <label class="col-12">
                        <?php echo e(__('shop::app.customer.account.profile.dob')); ?>

                    </label>

                    <div class="col-12">
                        <input
                            type="date"
                            name="date_of_birth"
                            placeholder="dd/mm/yyyy"
                            value="<?php echo e(old('date_of_birth') ?? $customer->date_of_birth); ?>"
                            v-validate="" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.profile.dob')); ?>&quot;" />

                            <span class="control-error" v-if="errors.has('date_of_birth')">
                                {{ errors.first('date_of_birth') }}
                            </span>
                    </div>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.date_of_birth.after', ['customer' => $customer]); ?>


                <div class="row">
                    <label class="col-12 mandatory">
                        <?php echo e(__('shop::app.customer.account.profile.email')); ?>

                    </label>

                    <div class="col-12">
                        <input value="<?php echo e($customer->email); ?>" name="email" type="text" v-validate="'required'" />
                        <span class="control-error" v-if="errors.has('email')">{{ errors.first('email') }}</span>
                    </div>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.email.after', ['customer' => $customer]); ?>


                <div class="row">
                    <label class="col-12">
                        <?php echo e(__('velocity::app.shop.general.enter-current-password')); ?>

                    </label>

                    <div :class="`col-12 ${errors.has('oldpassword') ? 'has-error' : ''}`">
                        <input value="" name="oldpassword" type="password" />
                    </div>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.oldpassword.after', ['customer' => $customer]); ?>


                <div class="row">
                    <label class="col-12">
                        <?php echo e(__('velocity::app.shop.general.new-password')); ?>

                    </label>

                    <div :class="`col-12 ${errors.has('password') ? 'has-error' : ''}`">
                        <input
                            value=""
                            name="password"
                            type="password"
                            v-validate="'min:6|max:18'" />

                        <span class="control-error" v-if="errors.has('password')">
                            {{ errors.first('password') }}
                        </span>
                    </div>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.password.after', ['customer' => $customer]); ?>


                <div class="row">
                    <label class="col-12">
                        <?php echo e(__('velocity::app.shop.general.confirm-new-password')); ?>

                    </label>

                    <div :class="`col-12 ${errors.has('password_confirmation') ? 'has-error' : ''}`">
                        <input value="" name="password_confirmation" type="password"
                        v-validate="'min:6|confirmed:password'" data-vv-as="confirm password" />

                        <span class="control-error" v-if="errors.has('password_confirmation')">
                            {{ errors.first('password_confirmation') }}
                        </span>
                    </div>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.after', ['customer' => $customer]); ?>


                <button
                    type="submit"
                    class="theme-btn mb20">
                    <?php echo e(__('velocity::app.shop.general.update')); ?>

                </button>
            </form>
        </div>

    <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.after', ['customer' => $customer]); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop::customers.account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suhailinfo/domains/suhail.info/public_html/resources/themes/velocity/views/customers/account/profile/edit.blade.php ENDPATH**/ ?>