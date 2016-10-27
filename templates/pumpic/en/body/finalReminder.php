<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
    <p style="<?= $style['paragraph'] ?>">
        We wanted to remind you one last time that it’s been over 24 hours since you haven’t completed your purchase at Pumpic.
        <br>
        If you experienced any problems, please, let us know about it.
    </p>
    <a class="btn" href="<?= $this->analyticsLink('http://pumpic.com/faq.html', ['source' => 'pumpic', 'medium' => 'email', 'campaign' => 'abandoned_cart', 'content' => 'notification2']) ?>" style="<?= $style['button'] ?>">
        I need help
    </a>
    <p style="<?= $style['paragraph'] ?>">
        In case you have finished the purchase, you can ignore this email.
    </p>

    <a class="btn" href="<?= $this->analyticsLink('https://cp.pumpic.com', ['source' => 'pumpic', 'medium' => 'email', 'campaign' => 'abandoned_cart', 'content' => 'notification2']) ?>" style="<?= $style['button'] ?>">
        Go to Control Panel
    </a>
<?php $this->stop() ?>
<?php $this->start('footer') ?>
    Warmly, <br>
    Pumpic Team
<?php $this->stop() ?>