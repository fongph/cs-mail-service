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
    A two-step verification is activated in the account of the target device. You should turn it off to receive data updates.
    Please follow the link to learn more and solve the problem:
    <a href="<?= $this->analyticsLink('https://support.apple.com/en-us/HT202664', ['term' => 'supportApple']) ?>" style="<?= $style['textLink'] ?>">https://support.apple.com/en-us/HT202664</a>
</p>
<?php $this->stop() ?>

<?php $this->start('footer') ?>
Happy monitoring, <br>
<a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('https://pumpic.com/', ['source' => 'system', 'medium' => 'system-email', 'term' => 'signature']) ?>">
    Pumpic.com</a><br>
Support Team<br>
<a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>
<?php $this->stop() ?>
