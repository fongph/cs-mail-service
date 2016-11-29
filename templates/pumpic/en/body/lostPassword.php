<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">
    <?php if (isset($firstName)) : ?>
        Dear <?= $firstName ?>,
    <?php else: ?>
        Dear customer,
    <?php endif; ?>
</h1>
<p style="<?= $style['paragraph'] ?>">Thank you for choosing Pumpic mobile monitoring software. We really 
    appreciate our clients and always do our best to provide you with any 
    requested information and assistance as soon as possible.</p> 
<p style="<?= $style['paragraph'] ?>">Our Customer Support Team has recently received a <strong style="<?= $style['strong'] ?>">Password Reset Request</strong> sent from <?= $params['userEmail'] ?>. If it is a mistake, just ignore this email.</p>
<p style="<?= $style['paragraph'] ?>">If you really want to reset the following password, please press the <strong style="<?= $style['strong'] ?>">Reset Password</strong> button below, or use the following link: <?= $params['restorePageUrl'] ?></p>

<div class="btn-center" style="<?= $style['buttonWrapper'] ?>" align="center">
    <a class="btn" href="<?= $this->analyticsLink($params['restorePageUrl'], ['term' => 'lostpassword']) ?>" style="<?= $style['button'] ?>">
        RESET
    </a>
</div>

<p style="<?= $style['paragraph'] ?>">Thank you for your trust and patience. We will never stop improving our service quality for you.</p>
<?php $this->stop() ?>

<?php $this->start('footer') ?>
Happy monitoring, <br>
<a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('http://pumpic.com/', ['term' => 'signature']) ?>">
    Pumpic.com</a><br>
Support Team<br>
<a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>
<?php $this->stop() ?>

