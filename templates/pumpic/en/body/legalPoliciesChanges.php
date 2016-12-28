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
        This email is to advise you of changes made to the Pumpic Legal Policies.
    </p>
    <p style="<?= $style['paragraph'] ?>">
        The Legal Policies updates introduce terms that govern legal issues of <b><i>processing data you provide us with. Also, they clarify how some parts of our services work, including:</i></b>
    </p>
    <p style="<?= $style['paragraph'] ?>">
        <?= $params['text'] ?>
    </p>
    <p style="<?= $style['paragraph'] ?>">
        The most current version of Pumpic Legal Policies with the latest updates is available at <a href="http://pumpic.com/policy.html">http://pumpic.com/policy.html</a>.
        Please, read it carefully.
    </p>
    <div style="text-align: center">
        <p  style="<?= $style['paragraph'] ?>">
            <b>Would you like to accept new terms of service now?</b>
        </p>
        <p  style="<?= $style['paragraph'] ?>">
            <i>(We'll take you to the Control Panel login page.)</i>
        </p>
    </div>
    <div class="btn-center" style="<?= $style['buttonWrapper'] ?>" align="center">
        <a class="btn" href="https://cp.pumpic.com/" style="<?= $style['button'] ?>">
            Yes, please
        </a>
        <span> I'll do it later </span>
    </div>

    <p style="<?= $style['paragraph'] ?>">
        We are committed to keeping our services as clear and convenient for you (and all of our customers) as it only gets. If you have any questions or thoughts about our Legal Policies, please contact us by emailing to <a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>.
    </p>
<?php $this->stop() ?>


<?php $this->start('footer') ?>
Ginna Anderson <br>
Customer Experience Manager<br>
<?php $this->stop() ?>
