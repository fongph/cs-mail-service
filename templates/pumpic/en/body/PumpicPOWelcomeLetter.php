<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">
    <?php if (isset($params['firstName'])) : ?>
        Dear <?= $params['firstName'] ?>,
    <?php else: ?>
        Dear customer,
    <?php endif; ?>
</h1>
<p style="<?= $style['paragraph'] ?>">I’d like to thank you for favoring Pumpic app! We designed it to help parents to protect the most valuable treasure – their kids. Hope, the app is doing its job as you’ve expected.</p>

<p style="<?= $style['paragraph'] ?>">Actually, that’s why I’m writing you – as a Product Owner, I am intrigued to hear about your first-week experience with Pumpic. You can hardly imagine how grateful I’d be if you could answer these 2 quick questions:</p>
<ul style="border: 0;
    font-size: normal;
    font-style: normal;
    font-variant: normal;
    font-weight: normal;
    line-height: normal;
    list-style: none;
    margin: 0 0 0 35px;
    padding: 0;
    vertical-align: baseline">
    <li style="border: 0;
        font-size: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: normal;
        list-style: initial;
        margin: 0 0 10px;
        padding: 0;
        vertical-align: baseline">In your opinion, what could be improved in Pumpic?</li>
    <li style="border: 0;
        font-size: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: normal;
        list-style: initial;
        margin: 0 0 10px;
        padding: 0;
        vertical-align: baseline">If you happened to contact Pumpic Customer Support, how satisfied you are with the assistance provided on your issue?</li>

</ul>
<p style="<?= $style['paragraph'] ?>">I’m asking because knowing those things is fundamental for ensuring that the product we deliver is exactly what you need. Plus, based on the feedback, we can keep improving Pumpic to enhance your satisfaction – we do believe that perfection knows no limits!</p>
<p style="<?= $style['paragraph'] ?>">So, press “Reply” and let me know what you think. Thank you so much for your time!</p>


<?php $this->stop() ?>
<?php $this->start('footer') ?>
Best regards,<br>
Margaret Berman <br>
Product Owner at Pumpic.com <br>
margaret@pumpic.com
<?php $this->stop() ?>
