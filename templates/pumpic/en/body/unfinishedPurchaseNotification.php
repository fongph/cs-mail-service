<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<p style="<?= $style['paragraph'] ?>">
    You have received this notification because you didn’t complete your purchase on Pumpic website. <br />
    If you aborted the purchase due to technical reasons, you can go back to the Store and start a new purchase process.
</p>
<a class="btn" href="<?= $this->analyticsLink('http://pumpic.com/store.html', ['source' => 'pumpic', 'medium' => 'email', 'campaign' => 'abandoned_cart', 'content' => 'notification1']) ?>" style="<?= $style['button'] ?>">
    Go to the Store
</a>
<p style="<?= $style['paragraph'] ?>">
If you still hesitate or have any questions about Pumpic product, contact Support and we will gladly help you to sort out all the peculiarities of our product!
</p>
<a class="btn" href="<?= $this->analyticsLink('http://pumpic.com/faq.html', ['source' => 'pumpic', 'medium' => 'email', 'campaign' => 'abandoned_cart', 'content' => 'notification1']) ?>" style="<?= $style['button'] ?>">
    I need help
</a>
<p style="<?= $style['paragraph'] ?>">
In case you have finished the purchase and received this email by mistake, please, press  <a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('https://cp.pumpic.com/?alreadyhaveaccount='.$params['email'], ['source' => 'pumpic', 'medium' => 'email', 'campaign' => 'abandoned_cart', 'content' => 'notification1']) ?>" >
        <strong style="<?= $style['strong'] ?>">I already completed a purchase</strong></a>
</p>
<?php $this->stop() ?>
<?php $this->start('footer') ?>
Warmly, <br>
Pumpic Team
<?php $this->stop() ?>
