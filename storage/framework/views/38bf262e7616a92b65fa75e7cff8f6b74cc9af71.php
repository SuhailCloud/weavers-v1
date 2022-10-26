<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.sliders.edit-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <?php $locale = request()->get('locale') ?: app()->getLocale(); ?>

        <form method="POST" action="<?php echo e(route('admin.sliders.update', $slider->id)); ?>" @submit.prevent="onSubmit" enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '<?php echo e(url('/admin/dashboard')); ?>';"></i>

                        <?php echo e(__('admin::app.settings.sliders.edit-title')); ?>


                        <?php if($slider->locale): ?>
                            <span class="locale">[<?php echo e($slider->locale); ?>]</span>
                        <?php endif; ?>
                        
                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.settings.sliders.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">

                    <?php echo csrf_field(); ?>

                    <?php echo view_render_event('bagisto.admin.settings.slider.edit.before'); ?>


                    <div class="control-group" :class="[errors.has('title') ? 'has-error' : '']">
                        <label for="title" class="required"><?php echo e(__('admin::app.settings.sliders.name')); ?></label>
                        <input type="text" class="control" name="title" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('admin::app.settings.sliders.name')); ?>&quot;" value="<?php echo e($slider->title ?: old('title')); ?>">
                        <span class="control-error" v-if="errors.has('title')">{{ errors.first('title') }}</span>
                    </div>

                    <?php $channels = core()->getAllChannels() ?>
                    <div class="control-group" :class="[errors.has('channel_id') ? 'has-error' : '']">
                        <label for="channel_id"><?php echo e(__('admin::app.settings.sliders.channels')); ?></label>
                        <select class="control" id="channel_id" name="channel_id" data-vv-as="&quot;<?php echo e(__('admin::app.settings.sliders.channels')); ?>&quot;" value="" v-validate="'required'">
                            <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($channel->id); ?>" <?php if($channel->id == $slider->channel_id): ?> selected <?php endif; ?>>
                                    <?php echo e(__($channel->name)); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="control-error" v-if="errors.has('channel_id')">{{ errors.first('channel_id') }}</span>
                    </div>

                    <div class="control-group <?php echo $errors->has('image.*') ? 'has-error' : ''; ?>">
                        <label class="required"><?php echo e(__('admin::app.catalog.categories.image')); ?></label>

                        <image-wrapper :button-label="'<?php echo e(__('admin::app.settings.sliders.image')); ?>'" input-name="image" :multiple="false" :images='"<?php echo e(Storage::url($slider->path)); ?>"'></image-wrapper>

                        <span class="control-error" v-if="<?php echo $errors->has('image.*'); ?>">
                            <?php $__currentLoopData = $errors->get('image.*'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo str_replace($key, 'Image', $message[0]); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </span>
                    </div>

                    <div class="control-group">
                        <label for="content"><?php echo e(__('admin::app.settings.sliders.content')); ?></label>

                        <div class="panel-body">
                            <textarea id="tiny" class="control" id="add_content" name="content" rows="5"><?php echo e($slider->content ? : old('content')); ?></textarea>
                        </div>

                        <span class="control-error" v-if="errors.has('content')">{{ errors.first('content') }}</span>
                    </div>

                    <?php echo view_render_event('bagisto.admin.settings.slider.edit.after', ['slider' => $slider]); ?>

                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js')); ?>"></script>

    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: 'textarea#tiny',
                height: 200,
                width: "100%",
                plugins: 'image imagetools media wordcount save fullscreen code',
                toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
                image_advtab: true,
                templates: [
                    { title: 'Test template 1', content: 'Test 1' },
                    { title: 'Test template 2', content: 'Test 2' }
                ],
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\weavers-v1\vendor\bagisto\bagisto\packages\Webkul\Admin\src\Providers/../Resources/views/settings/sliders/edit.blade.php ENDPATH**/ ?>