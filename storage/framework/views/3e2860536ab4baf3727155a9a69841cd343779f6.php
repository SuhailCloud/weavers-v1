<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.signup-form.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <div class="auth-content form-container">
        <div class="container">
            <div class="col-lg-10 col-md-12 offset-lg-1">
                <div class="heading">
                    <h2 class="fs24 fw6">
                        <?php echo e(__('velocity::app.customer.signup-form.user-registration')); ?>

                    </h2>

                    <a href="<?php echo e(route('customer.session.index')); ?>" class="btn-new-customer">
                        <button type="button" class="theme-btn light">
                            <?php echo e(__('velocity::app.customer.signup-form.login')); ?>

                        </button>
                    </a>
                </div>

                <div class="body col-12">
                    <h3 class="fw6">
                        <?php echo e(__('velocity::app.customer.signup-form.become-user')); ?>

                    </h3>

                    <p class="fs16">
                        <?php echo e(__('velocity::app.customer.signup-form.form-sginup-text')); ?>

                    </p>

                    <?php echo view_render_event('bagisto.shop.customers.signup.before'); ?>


                    <form
                        method="post"
                        action="<?php echo e(route('customer.register.create')); ?>"
                        @submit.prevent="onSubmit">

                        <?php echo e(csrf_field()); ?>


                        <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.before'); ?>


                        <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                            <label for="first_name" class="required label-style">
                                <?php echo e(__('shop::app.customer.signup-form.firstname')); ?>

                            </label>

                            <input
                                type="text"
                                class="form-style"
                                name="first_name"
                                v-validate="'required'"
                                value="<?php echo e(old('first_name')); ?>"
                                data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.firstname')); ?>&quot;" />

                            <span class="control-error" v-if="errors.has('first_name')">
                                {{ errors.first('first_name') }}
                            </span>
                        </div>

                        <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.firstname.after'); ?>


                        <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                            <label for="last_name" class="required label-style">
                                <?php echo e(__('shop::app.customer.signup-form.lastname')); ?>

                            </label>

                            <input
                                type="text"
                                class="form-style"
                                name="last_name"
                                v-validate="'required'"
                                value="<?php echo e(old('last_name')); ?>"
                                data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.lastname')); ?>&quot;" />

                            <span class="control-error" v-if="errors.has('last_name')">
                                {{ errors.first('last_name') }}
                            </span>
                        </div>

                        <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.lastname.after'); ?>


                        <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                            <label for="email" class="required label-style">
                                <?php echo e(__('shop::app.customer.signup-form.email')); ?>

                            </label>

                            <input
                                type="email"
                                class="form-style"
                                name="email"
                                v-validate="'required|email'"
                                value="<?php echo e(old('email')); ?>"
                                data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.email')); ?>&quot;" />

                            <span class="control-error" v-if="errors.has('email')">
                                {{ errors.first('email') }}
                            </span>
                        </div>

                        <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.email.after'); ?>


                        <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                            <label for="password" class="required label-style">
                                <?php echo e(__('shop::app.customer.signup-form.password')); ?>

                            </label>

                            <input
                                type="password"
                                class="form-style"
                                name="password"
                                v-validate="'required|min:6'"
                                ref="password"
                                value="<?php echo e(old('password')); ?>"
                                data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.password')); ?>&quot;" />

                            <span class="control-error" v-if="errors.has('password')">
                                {{ errors.first('password') }}
                            </span>
                        </div>

                        <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.password.after'); ?>


                        <div class="control-group" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                            <label for="password_confirmation" class="required label-style">
                                <?php echo e(__('shop::app.customer.signup-form.confirm_pass')); ?>

                            </label>

                            <input
                                type="password"
                                class="form-style"
                                name="password_confirmation"
                                v-validate="'required|min:6|confirmed:password'"
                                data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.confirm_pass')); ?>&quot;" />

                            <span class="control-error" v-if="errors.has('password_confirmation')">
                                {{ errors.first('password_confirmation') }}
                            </span>
                        </div>

                        <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.after'); ?>


                        <button class="theme-btn" type="submit">
                            <?php echo e(__('shop::app.customer.signup-form.title')); ?>

                        </button>
                    </form>

                    <?php echo view_render_event('bagisto.shop.customers.signup.after'); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suhailinfo/domains/suhail.info/public_html/resources/themes/velocity/views/customers/signup/index.blade.php ENDPATH**/ ?>