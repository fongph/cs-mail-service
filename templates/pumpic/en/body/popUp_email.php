<?php $this->layout('layout/default', ['title' => $title, 'style' => $style]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">Greetings!</h1> 
<p style="<?= $style['paragraph'] ?>">A new <strong style="<?= $style['strong'] ?>">Discount Request</strong> from Pumpic.com.
</p>
<p style="<?= $style['paragraph'] ?>">
    <?php if (isset($params['email'])): ?>
        <b class="green" style="<?= $style['colorText'] ?>">Email:</b> <?= $params['email'] ?>
    <?php endif; ?>
</p>
<?php $this->stop() ?>
