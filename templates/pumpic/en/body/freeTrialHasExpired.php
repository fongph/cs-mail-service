<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">Your Trial Expires Soon</h1>

<p style="<?= $style['paragraph'] ?>">
   <?php if (isset($params['customerName'])): ?>
        Dear <?= $params['customerName'] ?>,
    <?php else: ?>
        Dear customer,
    <?php endif; ?>
</p>

<p style="<?= $style['paragraph'] ?>">Thank you for using the <strong style="<?= $style['strong'] ?>">7-day trial</strong>. 
    <br>We hope you enjoyed the ultimate monitoring features of the Pumpic app.</p>

<p style="<?= $style['paragraph'] ?>">However, please note that your trial has <strong style="<?= $style['strong'] ?>">expired today</strong>. 
    If you enjoyed Pumpic&rsquo;s functionality and want to continue using it, 
    please choose a new <a href="<?= $this->analyticsLink('http://pumpic.com/store.html', ['term' => 'freeTrialHasExpired']) ?>" style="<?= $style['textLink'] ?>">subscription</a> to continue using the app.</p>

<i style="border: 0; 
   font-size: normal; 
   font-style: italic; 
   font-variant: normal; 
   font-weight: 400; 
   line-height: normal; 
   margin: 0; 
   padding: 15px 0px; 
   vertical-align: baseline">Keep your eyes open!</i>
<?php $this->stop() ?>
