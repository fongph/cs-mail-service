<?php
$_name = false;
if (isset($params['customerName'])) {
    $name = explode(' ', $params['customerName']);
    if (is_array($name) and count($name) > 0) {
        $_name = $name[0];
    } else {
        $_name = $params['customerName'];
    }
}
?>

<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<p style="<?= $style['paragraph'] ?>">
   <?php if ($_name): ?>
        Dear <?= $_name ?>,
    <?php else: ?>
        Hello,
    <?php endif; ?>
    you have successfully submitted your payment for <?= $params['productName'] ?>.</p> 
<p style="<?= $style['paragraph'] ?>">Your order ID number is <?= $params['orderId'] ?>.</p>

<p style="<?= $style['paragraph'] ?>">Log into your <a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('https://cp.pumpic.com/', ['term' => 'newPurchase']) ?>">control panel</a> to continue working with our service.</p> 

<p style="<?= $style['paragraph'] ?>">Feel free to contact our Customer Support Team at <a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>, in case of any questions.<br> We are also looking forward to your suggestions on our service improvement.</p>
<?php $this->stop() ?>