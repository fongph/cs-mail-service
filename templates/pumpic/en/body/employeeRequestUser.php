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
    We have received your request. Thank you!<br />
    Our support representative will contact you as soon as possible. Please check the information you have provided below.
</p>
<p style="<?= $style['paragraph'] ?>">
    <?php if (isset($params['name'])): ?>
    <b class="green" style="<?= $style['colorText'] ?>">Name</b>: <?= $params['name'] ?><br/>
    <?php endif; ?>

    <?php if (isset($params['email'])): ?>
    <b class="green" style="<?= $style['colorText'] ?>">Email</b>: <?= $params['email'] ?><br/>
    <?php endif; ?>

    <?php if (isset($params['type'])): ?>
    <b class="green" style="<?= $style['colorText'] ?>">Question Type</b>: <?= $params['type'] ?><br/>        
    <?php endif; ?>

    <?php if (isset($params['deviceCount']) && !empty($params['deviceCount'])): ?>
    <b class="green" style="<?= $style['colorText'] ?>">Number of devices</b>: <?= $params['deviceCount'] ?><br/>
    <?php endif; ?>

    <?php if (isset($params['os'])): ?>
    <b class="green" style="<?= $style['colorText'] ?>">OS Version</b>: <?= $params['os'] ?><br/>
    <?php endif; ?>

    <?php if (isset($params['message'])): ?>
    <b class="green" style="<?= $style['colorText'] ?>">Question</b>: <?= $params['message'] ?>
    <?php endif; ?>
</p>

<p style="<?= $style['paragraph'] ?>">
    If you have any additional questions, let us know by replying to this email.
</p>
<p style="<?= $style['paragraph'] ?>">Usually, it takes couple hours for a rep to get back to you if you wrote us somewhere between 10 AM and 10 PM EDT and if no force majeure like the Internet breakdown happens.</p>
<?php $this->stop() ?>

<?php $this->start('footer') ?>
Yours sincerely, <br>
<a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('https://pumpic.com/', ['source' => 'system', 'medium' => 'system-email', 'term' => 'employee-form']) ?>">
    Pumpic.com</a><br>
Support Team<br>
<a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>
<?php $this->stop() ?>
