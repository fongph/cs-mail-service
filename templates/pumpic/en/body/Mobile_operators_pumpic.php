<?php $this->layout('layout/default', ['title' => $title, 'style' => $style]) ?>

<?php $this->start('page') ?>
<p style="<?= $style['paragraph'] ?>">
    <?php if(isset($params['name'])): ?>
    <b class="green" style="<?= $style['colorText'] ?>">Name:</b> <?= $params['name'] ?><br>
    <?php endif; ?>
    <?php if(isset($params['email'])): ?>   
    <b class="green" style="<?= $style['colorText'] ?>">Email:</b> <?= $params['email'] ?><br>   
    <?php endif; ?>
    <?php if(isset($params['carrier'])): ?>
    <b class="green" style="<?= $style['colorText'] ?>">Carrier:</b> <?= $params['carrier'] ?>
    <?php endif; ?>
</p>

<?php if(isset($params['_browser'])): ?>
<br /><p style="<?= $style['paragraph'] ?>">
    User system information:<br />
    Browser: <?php if (isset($params['_browser']['browser'])): ?>
                 <?= $params['_browser']['browser'] ?> <?php if (isset($params['_browser']['browser_version'])): ?><?= $params['_browser']['browser_version'] ?><?php endif; ?>
             <?php endif; ?>
    <br />
    OS: <?php if (isset($params['_browser']['platform'])): ?>
            <?= $params['_browser']['platform'] ?> <?php if (isset($params['_browser']['platform_version'])): ?><?= $params['_browser']['platform_version'] ?><?php endif; ?>
        <?php endif; ?>
    <br />
    Screen Resolution: -
    <br />
    Device: <?php if (isset($params['_browser']['ismobiledevice']) && $params['_browser']['ismobiledevice']): ?>
                Phone
            <?php elseif (isset($params['_browser']['istablet']) && $params['_browser']['istablet']): ?>
                Tablet
            <?php else: ?>
                Desktop
            <?php endif; ?>
    <br />
</p>
<?php endif; ?>
<?php $this->stop() ?>