<?php $this->layout('layout/default', ['title' => $title, 'style' => $style]) ?>

<?php $this->start('page') ?>
<p style="<?= $style['paragraph'] ?>">Dear Customer,</p>
<p style="<?= $style['paragraph'] ?>">Congratulations! Your device <?= $params['deviceName'] ?> has been successfully added to your Personal Account on pumpic.com.</p>   
<p style="<?= $style['paragraph'] ?>">
    Thank you for preferring Pumpic software. Hopefully, our services will satisfy 
    your monitoring ambitions completely. We really appreciate your loyalty, and 
    thus do our best to provide you with any possible assistance you may request.
</p>
<p style="<?= $style['paragraph'] ?>">
    By using Pumpic, you agree that you have gained consent from the owner of the device to be monitored. 
    You also agree that you will monitor your own underage children, those you are a legal guardian of, or your employees only.
</p>
<?php $this->stop() ?>