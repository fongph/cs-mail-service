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
    Sorry, but it looks like Keylogger has been turned off on the target device.<br />
    You will not be able to track the data typed from the keyboard any longer. If previously set, the outgoing SMS daily limit will be disabled as well. Please follow the instruction below to activate Keylogger on the target device.
</p>

<p style="<?= $style['paragraph'] ?>">
    <a href="<?= $this->analyticsLink('https://cp.pumpic.com/instructions/keylogger-activation.html', ['term' => 'activateKeylogger']) ?>" style="<?= $style['textLink'] ?>">https://cp.pumpic.com/instructions/keylogger-activation.html</a>
</p>                                       

<p style="<?= $style['paragraph'] ?>">
    Thank you for choosing Pumpic!                                         
</p>
<?php $this->stop() ?>