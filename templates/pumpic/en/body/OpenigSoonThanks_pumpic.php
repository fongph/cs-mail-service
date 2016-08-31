<?php $this->layout('layout/default', ['title' => $title, 'style' => $style]) ?>

<?php $this->start('page') ?>
<h1 class="title" style="<?= $style['firstHeading'] ?>">Greetings!</h1>
<p style="<?= $style['paragraph'] ?>">
    Thank you for your interest in using Pumpic monitoring services. The 
    application is coming soon and going to introduce reasonably advanced mobile
    tracking solutions. You have a unique chance to be among those, who are lucky
    to use the whole range of amazing monitoring services first. We are happy to
    give you a 50% discount as a gift and a ticket to our successful cooperation.
</p> 
<p style="<?= $style['paragraph'] ?>">
    As soon as we launch our service, you will receive the confirmation email with 
    instructions on how to use the service as well as the 50% discount.
</p> 
<p style="<?= $style['paragraph'] ?>">
    If you have any questions, please feel free to contact our Customer Support 
    Team at <a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>.
</p>
<?php $this->stop() ?>