<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
    <h1 style="<?= $style['firstHeading'] ?>" align="center">
        <?php if (isset($firstName)) : ?>
            Dear <?= $firstName ?>,
        <?php else: ?>
            Dear customer,
        <?php endif; ?>
    </h1>
    <p>You have successfully submitted your payment for <?= $params['productName'] ?>.</p>
<p style="<?= $style['paragraph'] ?>">Your order ID number is <?= $params['orderId'] ?>.</p>

<p style="<?= $style['paragraph'] ?>">Log into your <a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('https://cp.pumpic.com/', ['term' => 'newPurchase']) ?>">control panel</a> to continue working with our service.</p> 

<p style="<?= $style['paragraph'] ?>">Feel free to contact our Customer Support Team at <a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>, in case of any questions.<br> We are also looking forward to your suggestions on our service improvement.</p>
<?php $this->stop() ?>