<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">
    <?php if (isset($params['firstName'])) : ?>
        Dear, <?= $params['firstName'] ?>!
    <?php else: ?>
        Dear customer,
    <?php endif; ?>
</h1>
<p style="<?= $style['paragraph'] ?>">For starters, let us thank you for being with Pumpic for all this time! We value every minute of our joint
    effort to know your kid better and protect your little ones from online and offline dangers.</p>

<p style="<?= $style['paragraph'] ?>">As we can see, your current subscription <?= $params['oldProductName'] ?> comes to an end. </p>

<p style="<?= $style['paragraph'] ?>">We would like to inform you that <?= $params['oldProductName'] ?> is no longer available at
    Pumpic Store. For your convenience, you will be automatically switched to <?= $params['newProductName'] ?>.</p>

<p style="<?= $style['paragraph'] ?>">The standard price is Standard Price <?= $params['oldProductPrice'] ?>. We highly appreciate you as our loyal
    client and apply 10% discount to your new subscription. The final price will be Price with coupon <?= $params['newProductPrice'] ?>.</p>

<p style="<?= $style['paragraph'] ?>">If you have questions about this change or anything else at all – please, do not
    hesitate to <a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">contact our Support</a>, we will gladly clear out whatever you wish to know!</p>


<?php $this->stop() ?>
<?php $this->start('footer') ?>
Enjoy Your Peace of Mind,<br>
Support Team <br>
<a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>
<?php $this->stop() ?>
