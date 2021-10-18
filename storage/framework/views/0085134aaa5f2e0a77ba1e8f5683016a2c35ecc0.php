<?php if(request()->route()->getName() == 'admin.dashboard.index'): ?>
    
    <?php $versionHelper = app('Webkul\UpgradeVersion\Helpers\Version'); ?>

    <?php if($versionHelper->isNewReleaseOut()): ?>

        <div class="verion-notification-container">
            
            <div class="version-alert">
                <?php echo __('upgradeversion::app.new-version-notification', [
                    'release_link' => 'https://github.com/bagisto/bagisto/releases/tag/' . $versionHelper->getLatestVersion(),
                    'tag_name' => $versionHelper->getLatestVersion(),
                    'upgrade_link' => route('upgrad_version.upgrade.index')
                ]); ?>

            </div>

        </div>
        
    <?php endif; ?>

<?php endif; ?><?php /**PATH /home/weaverslk/domains/weavers.lk/public_html/packages/Webkul/UpgradeVersion/src/Providers/../Resources/views/notification/index.blade.php ENDPATH**/ ?>