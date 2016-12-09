<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">
    <?php if (isset($params['firstName'])) : ?>
        Dear <?= $params['firstName'] ?>,
    <?php else: ?>
        Dear customer,
    <?php endif; ?>
</h1>

<div style="display: inline-block;
     border: 0; 
     font-size: normal; 
     font-style: normal; 
     font-variant: normal; 
     font-weight: normal; 
     line-height: normal; 
     margin: 0; 
     padding: 15px 0px;
     clear: both;
     vertical-align: baseline">

    <p style="<?= $style['paragraph'] ?>">This is Ginna from Pumpic Customer Support.</p>
    <p style="<?= $style['paragraph'] ?>">You have recently subscribed for <?= $params['plan'] ?>. However, you have not installed the application on the target device yet.</p>
    <p style="<?= $style['paragraph'] ?>">If you feel any difficulties with the setup process, please let me know.</p>
</div>

<i style="border: 0; 
   font-size: normal; 
   font-style: italic; 
   font-variant: normal; 
   font-weight: 400; 
   line-height: normal; 
   margin: 0; 
   padding: 15px 0px; 
   vertical-align: baseline">Kind regards,</i><br />
<?php $this->stop() ?>

<?php $this->start('footer') ?>
Enjoy Your Peace of Mind, <br>
<a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('http://pumpic.com/', ['term' => 'signature']) ?>">
    Pumpic.com</a><br>
Support Team<br>
<a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>
<?php $this->stop() ?>

