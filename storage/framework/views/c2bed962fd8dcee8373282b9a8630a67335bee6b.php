<?php
    $isRendered = false;
    $advertisementTwo = null;
?>

<?php if($velocityMetaData && $velocityMetaData->advertisement): ?>
    <?php
        $advertisement = json_decode($velocityMetaData->advertisement, true);
        
        if (isset($advertisement[2]) && is_array($advertisement[2])) {
            $advertisementTwo = array_values(array_filter($advertisement[2]));
        }
    ?>

    <?php if($advertisementTwo): ?>
        <?php
            $isRendered = true;
        ?>

        <div class="container-fluid advertisement-two-container">
            <div class="row">
                <?php if( isset($advertisementTwo[0])): ?>
                    <a class="col-lg-9 col-md-12 no-padding">
                        <img src="<?php echo e(asset('/storage/' . $advertisementTwo[0])); ?>" />
                    </a>
                <?php endif; ?>
                
                <?php if( isset($advertisementTwo[1])): ?>
                    <a class="col-lg-3 col-md-12 pr0">
                        <img src="<?php echo e(asset('/storage/' . $advertisementTwo[1])); ?>" />
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if(! $isRendered): ?>
    <div class="container-fluid advertisement-two-container">
        <div class="row">
            <a class="col-lg-9 col-md-12 no-padding">
                <img src="<?php echo e(asset('/themes/velocity/assets/images/toster.png')); ?>" />
            </a>

            <a class="col-lg-3 col-md-12 pr0">
                <img src="<?php echo e(asset('/themes/velocity/assets/images/trimmer.png')); ?>" />
            </a>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\wamp64\www\handloomlk/resources/themes/velocity/views/home/advertisements/advertisement-two.blade.php ENDPATH**/ ?>