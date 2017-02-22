<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<p style="<?= $style['paragraph'] ?>">Dear Customer,</p>
<p style="<?= $style['paragraph'] ?>">
    Thank you for choosing Pumpic as your monitoring software. We take care of 
    our clients and always provide you with important information immediately. We 
    never stop improving our services for you.
</p>
<p style="<?= $style['paragraph'] ?>">
    For now, it seems like the SIM card of the target device was changed. 
    Nevertheless, Pumpic keeps monitoring and sending information to your 
    Control Panel. Login to check the new Mobile Network Operator data updates.
</p>

<div class="btn-center" style="<?= $style['buttonWrapper'] ?>" align="center">
    <a class="btn" href="<?= $this->analyticsLink('https://cp.pumpic.com/', ['term' => 'simCardChanged']) ?>" style="<?= $style['button'] ?>">
        <img src="https://pumpic.com/images/lock_mail.png"
             class="icon-lock"
             alt=""
             style="background: url('https://pumpic.com/images/lock_mail.png'); border: 0; display: inline-block; font-size: normal; font-style: normal; font-variant: normal; font-weight: normal; height: 13px; line-height: normal; margin: 0 10px 0 0; padding: 0; speak: none; vertical-align: baseline; width: 9px">Login
    </a>
</div>

<p style="<?= $style['paragraph'] ?>">Thank you for staying with us.</p>
<?php $this->stop() ?>