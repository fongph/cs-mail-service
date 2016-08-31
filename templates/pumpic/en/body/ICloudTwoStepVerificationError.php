<?php $this->layout('layout/default', ['title' => $title, 'style' => $style]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">
    <?php if(isset($params['name'])): ?>
        Dear <?= $params['name'] ?>,
    <?php else: ?>
        Hello,
    <?php endif; ?>
</h1>
<p style="<?= $style['paragraph'] ?>">
    A two-step verification is activated in the account of the target device. You should turn it off to receive data updates.
    Please follow the link to learn more and solve the problem:
    <a class="btn" style="<?= $style['button'] ?>" href="https://support.apple.com/en-us/HT202664" style="<?= $style['button'] ?>">https://support.apple.com/en-us/HT202664</a>
</p>
<?php $this->stop() ?>