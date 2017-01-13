<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
    <h1 style="<?= $style['firstHeading'] ?>" align="center">
        <?php if (isset($params['firstName'])) : ?>
            Hello <?= $params['firstName'] ?>,
        <?php else: ?>
            Dear customer,
        <?php endif; ?>
    </h1>
    <p style="<?= $style['paragraph'] ?>">
        This email is to advise you of changes made to the Pumpic <?= $params['legacyName'] ?>.
    </p>
    <p style="<?= $style['paragraph'] ?>">
        The <?= $params['legacyName'] ?> updates introduce terms that govern legal issues of <b><i>processing data you provide us with. Also, they clarify how some parts of our services work, including:</i></b>
    </p>
    <?= $params['text'] ?>
    <p style="<?= $style['paragraph'] ?>">
        The most current version of Pumpic <?= $params['legacyName'] ?> with the latest updates is available at <a href="<?= $this->analyticsLink('http://pumpic.com/'. $params['link'] .'.html', ['source' => 'system', 'medium' => 'system-email', 'term' => $params['term']]) ?>">http://pumpic.com/<?= $params['link'] ?>.html</a>.
        Please, read it carefully.
    </p>
    <p style="<?= $style['paragraph'] ?>">
        You will be prompted to accept the new terms the next time when attempting to log in to the Control Panel.
    </p>
    <div style="text-align: center">
        <p  style="<?= $style['paragraph'] ?>">
            <b>Would you like to accept new terms of service now?</b>
            <br>
            <i>(We'll take you to the Control Panel login page.)</i>
        </p>
    </div>
    <div class="btn-center" style="<?= $style['buttonWrapper'] ?>" align="center">
        <a class="btn" href="<?= $this->analyticsLink('https://cp.pumpic.com/', ['source' => 'system', 'medium' => 'system-email', 'term' => $params['term']]) ?>" style="<?= $style['button'] ?>">
            Yes, please
        </a>
    </div>

    <p style="<?= $style['paragraph'] ?>">
        We are committed to keeping our services as clear and convenient for you (and all of our customers) as it only gets. If you have any questions or thoughts about our <?= $params['legacyName'] ?>, please contact us by emailing to <a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>.
    </p>
<?php $this->stop() ?>


<?php $this->start('footer') ?>
Ginna Anderson <br>
Customer Experience Manager<br>
<?php $this->stop() ?>
