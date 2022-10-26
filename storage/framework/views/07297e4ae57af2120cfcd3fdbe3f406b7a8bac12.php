<?php echo view_render_event('bagisto.shop.layout.header.locale.before'); ?>


    <div class="pull-left">
        <div class="dropdown">

            <?php
                $localeImage = null;
            ?>
            <?php $__currentLoopData = core()->getCurrentChannel()->locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($locale->code == app()->getLocale()): ?>
                    <?php
                        $localeImage = $locale->locale_image;
                    ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="locale-icon">
                <?php if($localeImage): ?>
                    <img src="<?php echo e(asset('/storage/' . $localeImage)); ?>" onerror="this.src = '<?php echo e(asset($localeImage)); ?>'" />
                <?php elseif(app()->getLocale() == 'en'): ?>
                    <img src="<?php echo e(asset('/themes/velocity/assets/images/flags/en.png')); ?>" />
                <?php endif; ?>
            </div>

            <select
                class="btn btn-link dropdown-toggle control locale-switcher styled-select"
                onchange="window.location.href = this.value"
                <?php if(count(core()->getCurrentChannel()->locales) == 1): ?>
                    disabled="disabled"
                <?php endif; ?>>
                
                <?php $__currentLoopData = core()->getCurrentChannel()->locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($serachQuery)): ?>
                        <option
                            value="?<?php echo e($serachQuery); ?>&locale=<?php echo e($locale->code); ?>"
                            <?php echo e($locale->code == app()->getLocale() ? 'selected' : ''); ?>>
                            <?php echo e($locale->name); ?>

                        </option>
                    <?php else: ?>
                        <option value="?locale=<?php echo e($locale->code); ?>" <?php echo e($locale->code == app()->getLocale() ? 'selected' : ''); ?>><?php echo e($locale->name); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <div class="select-icon-container">
                <span class="select-icon rango-arrow-down"></span>
            </div>
        </div>
    </div>

<?php echo view_render_event('bagisto.shop.layout.header.locale.after'); ?>


<?php echo view_render_event('bagisto.shop.layout.header.currency-item.before'); ?>


    <?php if(core()->getCurrentChannel()->currencies->count() > 1): ?>
        <div class="pull-left">
            <div class="dropdown">
               <select
                    class="btn btn-link dropdown-toggle control locale-switcher styled-select"
                    onchange="window.location.href = this.value">
                    <?php $__currentLoopData = core()->getCurrentChannel()->currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($serachQuery)): ?>
                            <option value="?<?php echo e($serachQuery); ?>&currency=<?php echo e($currency->code); ?>" <?php echo e($currency->code == core()->getCurrentCurrencyCode() ? 'selected' : ''); ?>><?php echo e($currency->code); ?></option>
                        <?php else: ?>
                            <option value="?currency=<?php echo e($currency->code); ?>" <?php echo e($currency->code == core()->getCurrentCurrencyCode() ? 'selected' : ''); ?>><?php echo e($currency->code); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

                <div class="select-icon-container">
                    <span class="select-icon rango-arrow-down"></span>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php echo view_render_event('bagisto.shop.layout.header.currency-item.after'); ?>

<?php /**PATH /home/weaverslk/domains/weavers.lk/public_html/resources/themes/velocity/views/layouts/top-nav/locale-currency.blade.php ENDPATH**/ ?>