<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">
    <?php if (isset($firstName)) : ?>
        Dear <?= $firstName ?>,
    <?php else: ?>
        Dear customer,
    <?php endif; ?>
</h1>

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

<?php $this->start('footer') ?>
Happy monitoring, <br>
<a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('http://pumpic.com/', ['term' => 'signature']) ?>">
    Pumpic.com</a><br>
Support Team<br>
<a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>
<?php $this->stop() ?>
