<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">Thank you for choosing Pumpic!</h1>

<p style="<?= $style['paragraph'] ?>">Enjoy a wide range of ultimate monitoring features right now.
    <br>This letter will show you <strong style="<?= $style['strong'] ?>">how to install the app</strong> on the target device.
    <br>Please read the letter attentively to make it quick and simple.</p>

<ul style="border: 0; 
    font-size: normal; 
    font-style: normal; 
    font-variant: normal; 
    font-weight: normal; 
    line-height: normal; 
    list-style: none; 
    margin: 0 0 0 20px; 
    padding: 0; 
    vertical-align: baseline">
    <li style="border: 0; 
        font-size: normal; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: normal; 
        line-height: normal; 
        list-style: none; 
        margin: 0 0 10px; 
        padding: 0; 
        vertical-align: baseline">1. Use the following entries to log in to your <strong style="<?= $style['strong'] ?>">Control Panel</strong>.
        <p style="border: 0; font-size: normal; font-style: normal; font-variant: normal; font-weight: normal; line-height: normal; margin: 0; padding: 15px 0px; vertical-align: baseline">
            <b class="green" style="<?= $style['colorText'] ?>">Your login:</b> <?= $params['login'] ?><br>
            <b class="green" style="<?= $style['colorText'] ?>">Your password:</b> <?= $params['password'] ?>
        </p>
        <div class="btn-center" style="<?= $style['buttonWrapper'] ?>" align="center">
            <a class="btn" href="<?= $this->analyticsLink('https://cp.pumpic.com/', ['term' => 'freeTrialWelcome']) ?>" style="<?= $style['button'] ?>">
                <img src="https://pumpic.com/images/lock_mail.png" alt="" class="icon-lock" style="background: url('https://pumpic.com/images/lock_mail.png'); border: 0; display: inline-block; font-size: normal; font-style: normal; font-variant: normal; font-weight: normal; height: 13px; line-height: normal; margin: 0 10px 0 0; padding: 0; speak: none; vertical-align: baseline; width: 9px"> Login
            </a>
        </div>
    </li>
    <li style="border: 0; 
        font-size: normal; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: normal; 
        line-height: normal; 
        list-style: none; 
        margin: 0 0 10px; 
        padding: 0; 
        vertical-align: baseline">2. After logging in, follow the guidelines to complete the installation.</li>

</ul>

<p style="<?= $style['paragraph'] ?>">
    When the installation is complete, Pumpic is ready to start monitoring.<br />
    The app will send all the information from the target device right to your 
    <strong style="<?= $style['strong'] ?>">Control Panel</strong>.
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