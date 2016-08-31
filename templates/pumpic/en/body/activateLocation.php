<?php $this->layout('layout/default', ['title' => $title, 'style' => $style]) ?>

<?php $this->start('page') ?>
<p style="<?= $style['paragraph'] ?>">
    <?php if (isset($params['name']) and ! empty($params['name'])): ?>
        Dear <?= $params['name'] ?>,
    <?php else: ?>
        Hello,
    <?php endif; ?>
</p>

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