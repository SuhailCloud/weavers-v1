<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

    <head>
        <title><?php echo $__env->yieldContent('page_title'); ?></title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta http-equiv="content-language" content="<?php echo e(app()->getLocale()); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="<?php echo e(asset('themes/velocity/assets/css/velocity.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('themes/velocity/assets/css/bootstrap.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('themes/velocity/assets/css/google-font.css')); ?>" />

        <?php if(core()->getCurrentLocale()->direction == 'rtl'): ?>
            <link href="<?php echo e(asset('themes/velocity/assets/css/bootstrap-flipped.css')); ?>" rel="stylesheet">
        <?php endif; ?>

        <?php if($favicon = core()->getCurrentChannel()->favicon_url): ?>
            <link rel="icon" sizes="16x16" href="<?php echo e($favicon); ?>" />
        <?php else: ?>
            <link rel="icon" sizes="16x16" href="<?php echo e(asset('/themes/velocity/assets/images/static/v-icon.png')); ?>" />
        <?php endif; ?>

        <script
            type="text/javascript"
            src="<?php echo e(asset('themes/velocity/assets/js/jquery.min.js')); ?>">
        </script>

        <script
            type="text/javascript"
            baseUrl="<?php echo e(url()->to('/')); ?>"
            src="<?php echo e(asset('themes/velocity/assets/js/velocity.js')); ?>">
        </script>

        <script
            type="text/javascript"
            src="<?php echo e(asset('themes/velocity/assets/js/jquery.ez-plus.js')); ?>">
        </script>

        <?php echo $__env->yieldContent('head'); ?>

        <?php $__env->startSection('seo'); ?>
            <meta name="description" content="<?php echo e(core()->getCurrentChannel()->description); ?>"/>
        <?php echo $__env->yieldSection(); ?>

        <?php echo $__env->yieldPushContent('css'); ?>

        <?php echo view_render_event('bagisto.shop.layout.head'); ?>


    </head>

    <body <?php if(core()->getCurrentLocale()->direction == 'rtl'): ?> class="rtl" <?php endif; ?>>
        <?php echo view_render_event('bagisto.shop.layout.body.before'); ?>


        <?php echo $__env->make('shop::UI.particals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div id="app">
            

            <product-quick-view v-if="$root.quickView"></product-quick-view>

            <div class="main-container-wrapper">

                <?php $__env->startSection('body-header'); ?>
                    <?php echo $__env->make('shop::layouts.top-nav.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo view_render_event('bagisto.shop.layout.header.before'); ?>


                        <?php echo $__env->make('shop::layouts.header.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo view_render_event('bagisto.shop.layout.header.after'); ?>


                    <div class="main-content-wrapper col-12 no-padding">
                        <?php
                            $velocityContent = app('Webkul\Velocity\Repositories\ContentRepository')->getAllContents();
                        ?>

                        <content-header
                            url="<?php echo e(url()->to('/')); ?>"
                            :header-content="<?php echo e(json_encode($velocityContent)); ?>"
                            heading= "<?php echo e(__('velocity::app.menu-navbar.text-category')); ?>"
                        ></content-header>

                        <div class="">
                            <div class="row col-12 remove-padding-margin">
                                <sidebar-component
                                    main-sidebar=true
                                    id="sidebar-level-0"
                                    url="<?php echo e(url()->to('/')); ?>"
                                    category-count="<?php echo e($velocityMetaData ? $velocityMetaData->sidebar_category_count : 10); ?>"
                                    add-class="category-list-container pt10">
                                </sidebar-component>

                                <div
                                    class="col-12 no-padding content" id="home-right-bar-container">

                                    <div class="container-right row no-margin col-12 no-padding">

                                        <?php echo view_render_event('bagisto.shop.layout.content.before'); ?>


                                        <?php echo $__env->yieldContent('content-wrapper'); ?>

                                        <?php echo view_render_event('bagisto.shop.layout.content.after'); ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php echo $__env->yieldSection(); ?>

                <div class="container">

                    <?php echo view_render_event('bagisto.shop.layout.full-content.before'); ?>


                        <?php echo $__env->yieldContent('full-content-wrapper'); ?>

                    <?php echo view_render_event('bagisto.shop.layout.full-content.after'); ?>


                </div>
            </div>
        </div>

        <!-- below footer -->
        <?php $__env->startSection('footer'); ?>
            <?php echo view_render_event('bagisto.shop.layout.footer.before'); ?>


                <?php echo $__env->make('shop::layouts.footer.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo view_render_event('bagisto.shop.layout.footer.after'); ?>

        <?php echo $__env->yieldSection(); ?>

        <?php echo view_render_event('bagisto.shop.layout.body.after'); ?>


        <div id="alert-container"></div>

        <script type="text/javascript">
            (() => {
                window.showAlert = (messageType, messageLabel, message) => {
                    if (messageType && message !== '') {
                        let alertId = Math.floor(Math.random() * 1000);

                        let html = `<div class="alert ${messageType} alert-dismissible" id="${alertId}">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>${messageLabel ? messageLabel + '!' : ''} </strong> ${message}.
                        </div>`;

                        $('#alert-container').append(html).ready(() => {
                            window.setTimeout(() => {
                                $(`#alert-container #${alertId}`).remove();
                            }, 5000);
                        });
                    }
                }

                let messageType = '';
                let messageLabel = '';

                <?php if($message = session('success')): ?>
                    messageType = 'alert-success';
                    messageLabel = "<?php echo e(__('velocity::app.shop.general.alert.success')); ?>";
                <?php elseif($message = session('warning')): ?>
                    messageType = 'alert-warning';
                    messageLabel = "<?php echo e(__('velocity::app.shop.general.alert.warning')); ?>";
                <?php elseif($message = session('error')): ?>
                    messageType = 'alert-danger';
                    messageLabel = "<?php echo e(__('velocity::app.shop.general.alert.error')); ?>";
                <?php elseif($message = session('info')): ?>
                    messageType = 'alert-info';
                    messageLabel = "<?php echo e(__('velocity::app.shop.general.alert.info')); ?>";
                <?php endif; ?>

                if (messageType && '<?php echo e($message); ?>' !== '') {
                    window.showAlert(messageType, messageLabel, '<?php echo e($message); ?>');
                }

                window.serverErrors = [];
                <?php if(isset($errors)): ?>
                    <?php if(count($errors)): ?>
                        window.serverErrors = <?php echo json_encode($errors->getMessages(), 15, 512) ?>;
                    <?php endif; ?>
                <?php endif; ?>

                window._translations = <?php echo json_encode(app('Webkul\Velocity\Helpers\Helper')->jsonTranslations(), 15, 512) ?>;
            })();
        </script>

        <script
            type="text/javascript"
            src="<?php echo e(asset('vendor/webkul/ui/assets/js/ui.js')); ?>">
        </script>

        <?php echo $__env->yieldPushContent('scripts'); ?>
    </body>
</html>
<?php /**PATH C:\wamp64\www\handloomlk/resources/themes/velocity/views/layouts/master.blade.php ENDPATH**/ ?>