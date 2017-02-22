<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
    <p style="<?= $style['paragraph'] ?>">
        We wanted to remind you one last time that it’s been over 24 hours since you haven’t completed your purchase at Pumpic.
        <br>
        If you experienced any problems, please, let us know about it.
    </p>
    <a class="btn" href="<?= $this->analyticsLink('https://pumpic.com/faq.html', ['source' => 'system', 'medium' => 'system-email', 'campaign' => 'abandoned_cart', 'content' => 'needHelp']) ?>" style="<?= $style['button'] ?>">
        I need help
    </a>
    <p style="<?= $style['paragraph'] ?>">
        In case you have finished the purchase, you can ignore this email.
    </p>

    <a class="btn" href="<?= $this->analyticsLink('https://cp.pumpic.com', ['source' => 'system', 'medium' => 'system-email', 'campaign' => 'abandoned_cart', 'content' => 'goToCP']) ?>" style="<?= $style['button'] ?>">
        Go to Control Panel
    </a>
<?php $this->stop() ?>

<?php $this->start('footer') ?>
    Happy monitoring, <br>
    <a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('https://pumpic.com/', ['source' => 'system', 'medium' => 'system-email', 'term' => 'signature']) ?>">
        Pumpic.com</a><br>
    Support Team<br>
    <a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>
<?php $this->stop() ?>