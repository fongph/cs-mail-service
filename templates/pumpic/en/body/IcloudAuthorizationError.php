<?php $this->layout('layout/default', ['title' => $title, 'style' => $style]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">
    <?php if(isset($params['name'])): ?>
        Dear <?= $params['name'] ?>,
    <?php else: ?>
        Hello,
    <?php endif; ?>
</h1>
<p style="<?= $style['paragraph'] ?>">The iCloud password of the target device seems to be invalid, which resulted in an authorization error. Please follow the link below to set a new password.</p>

<?php if (isset($params['link'])): ?>
<p style="<?= $style['paragraph'] ?>">
    <a class="btn" href="<?= $this->analyticsLink('https://cp.pumpic.com/profile/iCloudPassword/' . $params['link'], ['term' => 'reset-password']) ?>" style="<?= $style['button'] ?>">
        RESET PASSWORD
    </a>  
</p>
<?php endif; ?>
<?php $this->stop() ?>