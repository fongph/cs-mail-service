<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<p style="<?= $style['paragraph'] ?>">Dear Customer,</p>
<p style="<?= $style['paragraph'] ?>">
    Thank you for choosing Pumpic remote monitoring software for your mobile 
    device. Taking care of your safety, we always try to prevent any possible 
    security violations.
</p>
<p style="<?= $style['paragraph'] ?>">Because of too many attempts to login to your Control Panel, which seems suspicious, we have temporarily locked your account.</p>  
<p style="<?= $style['paragraph'] ?>">Please press the button below to unlock your account and continue using Pumpic monitoring advantages.</p>

<div class="btn-center" style="<?= $style['buttonWrapper'] ?>" align="center">
    <a class="btn" href="<?= $this->analyticsLink($params['unlockUrl'], ['term' => 'locked']) ?>" style="<?= $style['button'] ?>">
        Unlock
    </a>
</div>

<p style="<?= $style['paragraph'] ?>">You may also use the following link to unlock your Personal Account: <?= $params['unlockUrl'] ?></p>
<p style="<?= $style['paragraph'] ?>">Thank you for staying with us.</p>
<?php $this->stop() ?>