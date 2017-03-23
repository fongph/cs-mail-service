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
    A two-factor authentication is activated for the Apple ID account of the target device. You should validate your
    password in our system and enter a Verification Code from the target device to continue monitoring.
    Click <a href="<?= $this->analyticsLink('https://cp.pumpic.com/profile/iCloudAccount/'.$params['link']) ?>" style="<?= $style['textLink'] ?>">here</a>
    to set up your account and continue monitoring.
</p>
<p style="<?= $style['paragraph'] ?>">
    <a href="<?= $this->analyticsLink('https://cp.pumpic.com/instructions/2factor-authentication.html') ?>" style="<?= $style['textLink'] ?>">Here</a>
    you can find out more info how to setup Pumpic with two-factor authentication.
</p>
<p>
    If you need any assistance, <a href="<?= $this->analyticsLink('https://cp.pumpic.com/support') ?>" style="<?= $style['textLink'] ?>">contact our Customer Support</a>.
</p>
<?php $this->stop() ?>

<?php $this->start('footer') ?>
Happy monitoring, <br>
<a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('https://pumpic.com/', ['source' => 'system', 'medium' => 'system-email', 'term' => 'signature']) ?>">
    Pumpic.com</a><br>
Support Team<br>
<a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>
<?php $this->stop() ?>
