<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">
    <?php if (isset($params['name'])): ?>
        Dear <?= $params['name'] ?>,
    <?php else: ?>
        Dear customer,
    <?php endif; ?>
</h1>
<p style="<?= $style['paragraph'] ?>">
We have received your request. Thank you!<br />
Our support representative will contact you as soon as possible. Please check the information you have provided below.
</p>
<p style="<?= $style['paragraph'] ?>">
    <?php if (isset($params['name'])): ?>   
    <b class="green" style="<?= $style['colorText'] ?>">Name:</b> <?= $params['name'] ?><br>
    <?php endif; ?>
    
    <?php if (isset($params['email'])): ?>   
    <b class="green" style="<?= $style['colorText'] ?>">Email:</b> <?= $params['email'] ?><br>
    <?php endif; ?>
    
    <?php if (isset($params['deviceModel'])): ?>
    <b class="green" style="<?= $style['colorText'] ?>">Device Model:</b> <?= $params['deviceModel'] ?><br>
    <?php endif; ?>

    <?php if (isset($params['OSVersion'])): ?>
        <b class="green" style="<?= $style['colorText'] ?>">OS Version:</b> <?= $params['OSVersion'] ?>
    <?php endif; ?>
</p>

<p style="<?= $style['paragraph'] ?>">
If you have any additional questions, let us know by replying to this email.
</p>
<?php $this->stop() ?>