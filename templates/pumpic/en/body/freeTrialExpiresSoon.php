<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>

<h1 style="<?= $style['firstHeading'] ?>" align="center">
    <?php if (isset($params['firstName'])) : ?>
        Dear <?= $params['firstName'] ?>,
    <?php else: ?>
        Dear customer,
    <?php endif; ?>
</h1>
<p style="<?= $style['paragraph'] ?>">
    Thank you for using the <strong style="<?= $style['strong'] ?>">7-day trial</strong>. 
    <br>We hope you enjoy the ultimate monitoring features of the Pumpic app.</p>

<p style="<?= $style['paragraph'] ?>">
    Please, note that your trial is about to expire in <strong style="<?= $style['strong'] ?>"><?= $params['numberDays'] ?> day<?php if ($params['numberDays'] > 1): ?>s<?php endif; ?></strong>!
    You can
    <a
            href="<?= $this->analyticsLink('https://pumpic.com/store.html', ['source' => 'system', 'medium' => 'system-email', 'term' => 'store', 'campaign' => 'free-trial-expires-soon']) ?>"
            style="<?= $style['textLink'] ?>">
        purchase
    </a>
    one of our subscription plans right now and continue using the app without the need to reassign the device or any
    other delay.
    At that, all previously collected data will remain available in the Control Panel.
</p>

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
