<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">
    <?php if(isset($params['name'])): ?>
        Dear <?= $params['name'] ?>,
    <?php else: ?>
        Hello,
    <?php endif; ?>
</h1>
<p style="<?= $style['paragraph'] ?>">
    Please be notified on your order <?= $params['order_id'] ?> payment failure. For any details or additional billing 
    assistance please contact our billing partner <a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('http://www.fastspring.com/', ['term' => 'OrderCancelled']) ?>">FastSpring.com</a> via <a style="<?= $style['textLink'] ?>" href= "mailto:orders@fastspring.com">orders@fastspring.com</a>.
</p>
<?php $this->stop() ?>