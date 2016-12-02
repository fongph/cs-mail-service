<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<p style="<?= $style['paragraph'] ?>">
    You have received this notification because you didn’t complete your purchase on Pumpic website. <br />
    If you aborted the purchase due to technical reasons, you can go back to the Store and start a new purchase process.
</p>
<a class="btn" href="<?= $this->analyticsLink('http://pumpic.com/store.html', ['source' => 'system', 'medium' => 'system-email', 'campaign' => 'abandoned_cart', 'term' => 'store']) ?>" style="<?= $style['button'] ?>">
    Go to the Store
</a>
<p style="<?= $style['paragraph'] ?>">
If you still hesitate or have any questions about Pumpic product, contact Support and we will gladly help you to sort out all the peculiarities of our product!
</p>
<a class="btn" href="<?= $this->analyticsLink('http://pumpic.com/faq.html', ['source' => 'system', 'medium' => 'system-email', 'campaign' => 'abandoned_cart', 'term' => 'faq']) ?>" style="<?= $style['button'] ?>">
    I need help
</a>
<p style="<?= $style['paragraph'] ?>">
In case you have finished the purchase and received this email by mistake, please, press  <a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('https://cp.pumpic.com/?alreadycompletedpurchase='.$params['email'], ['source' => 'system', 'medium' => 'system-email', 'campaign' => 'abandoned_cart', 'term' => 'completedPurchase']) ?>" >
        <strong style="<?= $style['strong'] ?>">I already completed a purchase</strong></a>.
</p>
<?php $this->stop() ?>

<?php $this->start('footer') ?>
Happy monitoring, <br>
<a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('http://pumpic.com/', ['term' => 'signature']) ?>">
    Pumpic.com</a><br>
Support Team<br>
<a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>
<?php $this->stop() ?>
