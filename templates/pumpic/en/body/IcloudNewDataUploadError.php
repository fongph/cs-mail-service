<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">
    <?php if(isset($params['name'])): ?>
        Dear <?= $params['name'] ?>,
    <?php else: ?>
        Hello,
    <?php endif; ?>
</h1>
<p style="<?= $style['paragraph'] ?>">An unknown error has occurred, when uploading the new data from the target device to your Control Panel.</p>

<p style="<?= $style['paragraph'] ?>">
Please, make sure backup is enabled on the target device and back it up manually.
To back up the device, open Settings app, select iCloud section, Backup and tap on "Back Up Now".
</p>

<p style="<?= $style['paragraph'] ?>">You can also contact our <a href="https://cp.pumpic.com/support" style="text-decoration: underline;">Customer Support</a> if you need assistance.</p>
<?php $this->stop() ?>