<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">
    <?php if (isset($firstName)) : ?>
        Dear <?= $firstName ?>,
    <?php else: ?>
        Dear customer,
    <?php endif; ?>
</h1>
<p style="<?= $style['paragraph'] ?>">Congratulations! Your device <b><?= $params['deviceName'] ?></b> has been successfully added to your Personal Account on pumpic.com.</p>
<p style="<?= $style['paragraph'] ?>">
    Thank you for preferring Pumpic software. Hopefully, our services will satisfy 
    your monitoring ambitions completely. We really appreciate your loyalty, and 
    thus do our best to provide you with any possible assistance you may request.
</p>
<p style="<?= $style['paragraph'] ?>">
    By using Pumpic, you agree that you have gained consent from the owner of the device to be monitored. 
    You also agree that you will monitor your own underage children, those you are a legal guardian of, or your employees only.
</p>
<?php $this->stop() ?>

<?php $this->start('footer') ?>
Enjoy Your Peace of Mind, <br>
<a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('http://pumpic.com/', ['term' => 'signature']) ?>">
    Pumpic.com</a><br>
Support Team<br>
<a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>
<?php $this->stop() ?>
