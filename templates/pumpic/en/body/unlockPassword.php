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
    Thank you for choosing Pumpic remote monitoring software for your mobile 
    device. Taking care of your safety, we always try to prevent any possible 
    security violations.
</p>
<p style="<?= $style['paragraph'] ?>">Because of too many attempts to login to your Control Panel, which seems suspicious, we have temporarily locked your account.</p>  
<p style="<?= $style['paragraph'] ?>">Please press the button below to unlock your account and continue using Pumpic monitoring advantages.</p>

<div class="btn-center" style="<?= $style['buttonWrapper'] ?>" align="center">
    <a class="btn" href="<?= $this->analyticsLink($params['unlockUrl'], ['term' => 'unlock']) ?>" style="<?= $style['button'] ?>">
        Unlock
    </a>
</div>

<p style="<?= $style['paragraph'] ?>">You may also use the following link to unlock your Personal Account: <?= $params['unlockUrl'] ?></p>
<p style="<?= $style['paragraph'] ?>">Thank you for staying with us.</p>
<?php $this->stop() ?>

<?php $this->start('footer') ?>
Enjoy Your Peace of Mind, <br>
<a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('http://pumpic.com/', ['term' => 'signature']) ?>">
    Pumpic.com</a><br>
Support Team<br>
<a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>
<?php $this->stop() ?>
