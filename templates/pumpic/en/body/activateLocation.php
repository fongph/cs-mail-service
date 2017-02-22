<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">
    <?php if (isset($params['firstName'])) : ?>
        Dear <?= $params['firstName'] ?>,
    <?php else: ?>
        Dear customer,
    <?php endif; ?>
</h1>

<p style="<?= $style['paragraph'] ?>">
    Sorry, but it looks like Location Service has been turned off on the target device.<br /> 
    You will stop receiving the data on a tracked user location. Geo-fence alerts are also disabled. Please follow the instruction below to activate Location Service on the target device.
</p>

<p style="<?= $style['paragraph'] ?>">
    <?php if ($params['os'] == 'android') : ?>
        <a href="<?= $this->analyticsLink('https://cp.pumpic.com/instructions/activate-location-android.html', ['term' => 'activate-location-android', 'campaign' => 'activateLocation_android']) ?>" style="<?= $style['textLink'] ?>">https://cp.pumpic.com/instructions/activate-location-android.html</a>
    <?php elseif ($params['os'] == 'ios'): ?>                
        <a href="<?= $this->analyticsLink('https://cp.pumpic.com/instructions/activate-location-ios.html', ['term' => 'activate-location-ios', 'campaign' => 'activateLocation_ios']) ?>" style="<?= $style['textLink'] ?>">https://cp.pumpic.com/instructions/activate-location-ios.html</a>
    <?php endif; ?>
</p>

<p style="<?= $style['paragraph'] ?>">Thank you for choosing Pumpic!</p>
<?php $this->stop() ?>

<?php $this->start('footer') ?>
Happy monitoring, <br>
<a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('https://pumpic.com/', ['source' => 'system', 'medium' => 'system-email', 'term' => 'signature']) ?>">
    Pumpic.com</a><br>
Support Team<br>
<a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>
<?php $this->stop() ?>


