<?php
    $isRendered = false;
    $advertisementFour = null;
?>

<?php if($velocityMetaData && $velocityMetaData->advertisement): ?>
    <?php
        $advertisement = json_decode($velocityMetaData->advertisement, true);
        
        if (isset($advertisement[4]) && is_array($advertisement[4])) {
            $advertisementFour = array_values(array_filter($advertisement[4]));
        }
    ?>

    <?php if($advertisementFour): ?>
        <?php
            $isRendered = true;
        ?>

        <div class="container-fluid advertisement-four-container">
            <div class="row">
                <?php if( isset($advertisementFour[0])): ?>
                    <a <?php if(isset($one)): ?> href="<?php echo e($one); ?>" <?php endif; ?> class="col-lg-4 col-12 no-padding">
                        <img class="col-12" src="<?php echo e(asset('/storage/' . $advertisementFour[0])); ?>" />
                    </a>
                <?php endif; ?>

                <div class="col-lg-4 col-12 offers-ct-panel">
                    <?php if( isset($advertisementFour[1])): ?>
                        <a <?php if(isset($two)): ?> href="<?php echo e($two); ?>" <?php endif; ?> class="row col-12 remove-padding-margin">
                            <img class="col-12 offers-ct-top" src="<?php echo e(asset('/storage/' . $advertisementFour[1])); ?>" />
                        </a>
                    <?php endif; ?>

                    <?php if( isset($advertisementFour[2])): ?>
                        <a <?php if(isset($three)): ?> href="<?php echo e($three); ?>" <?php endif; ?> class="row col-12 remove-padding-margin">
                            <img class="col-12 offers-ct-bottom" src="<?php echo e(asset('/storage/' . $advertisementFour[2])); ?>" />
                        </a>
                    <?php endif; ?>
                </div>

                <?php if( isset($advertisementFour[3])): ?>
                    <a <?php if(isset($four)): ?> href="<?php echo e($four); ?>" <?php endif; ?> class="col-lg-4 col-12 no-padding">
                        <img class="col-12" src="<?php echo e(asset('/storage/' . $advertisementFour[3])); ?>" />
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if(! $isRendered): ?>
    <div class="container-fluid advertisement-four-container">
        <div class="row">
            <a <?php if(isset($one)): ?> href="<?php echo e($one); ?>" <?php endif; ?> class="col-lg-4 col-12 no-padding">
                <img class="col-12" src="<?php echo e(asset('/themes/velocity/assets/images/big-sale-banner.png')); ?>" />
            </a>

            <div class="col-lg-4 col-12 offers-ct-panel">
                <a <?php if(isset($two)): ?> href="<?php echo e($two); ?>" <?php endif; ?> class="row col-12 remove-padding-margin">
                    <img class="col-12 offers-ct-top" src="<?php echo e(asset('/themes/velocity/assets/images/seasons.png')); ?>" />
                </a>
                <a <?php if(isset($three)): ?> href="<?php echo e($three); ?>" <?php endif; ?> class="row col-12 remove-padding-margin">
                    <img class="col-12 offers-ct-bottom" src="<?php echo e(asset('/themes/velocity/assets/images/deals.png')); ?>" />
                </a>
            </div>

            <a <?php if(isset($four)): ?> href="<?php echo e($four); ?>" <?php endif; ?> class="col-lg-4 col-12 no-padding">
                <img class="col-12" src="<?php echo e(asset('/themes/velocity/assets/images/kids.png')); ?>" />
            </a>
        </div>
    </div>
<?php endif; ?><?php /**PATH /home/weaverslk/domains/weavers.lk/public_html/resources/themes/velocity/views/home/advertisements/advertisement-four.blade.php ENDPATH**/ ?>