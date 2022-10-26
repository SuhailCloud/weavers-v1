<header class="sticky-header" v-if="!isMobile()">
    <div class="row col-12 remove-padding-margin velocity-divide-page">
        <logo-component></logo-component>
        <searchbar-component></searchbar-component>
    </div>
</header>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        (() => {
            document.addEventListener('scroll', e => {
                scrollPosition = Math.round(window.scrollY);

                if (scrollPosition > 50){
                    document.querySelector('header').classList.add('header-shadow');
                } else {
                    document.querySelector('header').classList.remove('header-shadow');
                }
            });
        })()
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp64\www\weavers-v1/resources/themes/velocity/views/layouts/header/index.blade.php ENDPATH**/ ?>