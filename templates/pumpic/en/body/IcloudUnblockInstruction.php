<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">
    <?php if (isset($params['firstName'])) : ?>
        Hello <?= $params['firstName'] ?>,
    <?php else: ?>
        Hello customer,
    <?php endif; ?>
</h1>
<p style="<?= $style['paragraph'] ?>">We weren't able to download an iCloud backup from your target device. Hence, you can't receive the
    latest monitoring data to the Control Panel.</p>

<p style="<?= $style['paragraph'] ?>">Apparently, the Apple ID of the target device was blocked by Apple. To go on with
    monitoring, please unblock the Apple ID and re-authenticate it in Pumpic Control Panel following the guidelines below.</p>

<p style="<?= $style['paragraph'] ?>">
    <b>To unblock a disabled Apple ID:</b>
</p>
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
        vertical-align: baseline">Go to <a href="iforgot.apple.com">iforgot.apple.com</a></li>
    <li style="border: 0;
        font-size: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: normal;
        list-style: initial;
        margin: 0 0 10px;
        padding: 0;
        vertical-align: baseline">Enter the Apple ID email and the captcha code -> click Next</li>
    <li style="border: 0;
        font-size: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: normal;
        list-style: initial;
        margin: 0 0 10px;
        padding: 0;
        vertical-align: baseline">If you use <b>two-step verification</b>, you need to use your recovery key and a trusted device.
        If you use <b>two-factor authentication</b>, you need a trusted device or trusted phone number to unlock your Apple ID</li>
    <li style="border: 0;
        font-size: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: normal;
        list-style: initial;
        margin: 0 0 10px;
        padding: 0;
        vertical-align: baseline">Fill in the New Password and Confirm Password fields -> click Reset Password</li>
</ul>

<p style="<?= $style['paragraph'] ?>">After that, your Apple ID will be unlocked. You will need to use the new password
    with your target device. To update your password on an iOS device:</p>

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
        vertical-align: baseline">Tap Settings -> iCloud</li>
    <li style="border: 0;
        font-size: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: normal;
        list-style: initial;
        margin: 0 0 10px;
        padding: 0;
        vertical-align: baseline">Tap Edit, if asked</li>
    <li style="border: 0;
        font-size: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: normal;
        list-style: initial;
        margin: 0 0 10px;
        padding: 0;
        vertical-align: baseline">Enter the new password -> tap Done</li>
</ul>

<p style="<?= $style['paragraph'] ?>">
    <b>To re-authenticate Apple ID in Pumpic Control Panel:</b>
</p>
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
        vertical-align: baseline">Log in to your Control Panel in web-browser</li>
    <li style="border: 0;
        font-size: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: normal;
        list-style: initial;
        margin: 0 0 10px;
        padding: 0;
        vertical-align: baseline">Open Device Settings -> click Validate iCloud account in our system</li>
    <li style="border: 0;
        font-size: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: normal;
        list-style: initial;
        margin: 0 0 10px;
        padding: 0;
        vertical-align: baseline">Enter the new password -> click Update</li>
</ul>

<p><i>Note:</i> If two-factor authentication is enabled on the target Apple ID, you will need to generate and enter the
    Verification Code after you enter your target Apple ID and password. Instructions will be provided in your
    Control Panel. <a href="https://cp.pumpic.com/instructions/2factor-authentication.html">Here</a> you can find out more about two-factor authentication.</p>
<?php $this->stop() ?>

<?php $this->start('footer') ?>
Happy monitoring, <br>
<a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('https://pumpic.com/', ['source' => 'system', 'medium' => 'system-email', 'term' => 'signature']) ?>">
    Pumpic.com</a><br>
Support Team<br>
<a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>
<?php $this->stop() ?>

