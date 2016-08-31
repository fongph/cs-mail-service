<?php $this->layout('layout/default', ['title' => $title, 'style' => $style]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">Greetings!</h1> 
<p style="<?= $style['paragraph'] ?>">A new <strong style="<?= $style['strong'] ?>">FAQ Request</strong> has been just submitted. Please do your best to provide 
    the information as soon as possible. We really appreciate your efforts.</p> 
<p style="<?= $style['paragraph'] ?>">
   <?php if (isset($params['name'])): ?>
        <b class="green" style="<?= $style['colorText'] ?>">Name:</b> <?= $params['name'] ?><br>
       <?php endif; ?>   
       <?php if (isset($params['email'])): ?>
        <b class="green" style="<?= $style['colorText'] ?>">Email:</b> <?= $params['email'] ?><br>
       <?php endif; ?>
       <?php if (isset($params['question'])): ?>
        <b class="green" style="<?= $style['colorText'] ?>">Question:</b> <?= $params['question'] ?>
    <?php endif; ?>
</p>
<?php $this->stop() ?>