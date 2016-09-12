<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<p style="<?= $style['paragraph'] ?>"><?= $params['faedback'] ?></p>
<?php $this->stop() ?>