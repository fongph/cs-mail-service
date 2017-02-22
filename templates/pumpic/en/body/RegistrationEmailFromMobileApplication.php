<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">Start monitoring today!</h1>
<p style="<?= $style['paragraph'] ?>">Greetings!</p>
<p style="<?= $style['paragraph'] ?>">We are writing to you because you&#39;ve requested registration on Pumpic.</p>
<p style="<?= $style['paragraph'] ?>">Briefly about Pumpic:</p>

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
        vertical-align: baseline">Monitoring app compatible with both iOS &amp; Android;
    </li>
    <li style="border: 0; 
        font-size: normal; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: normal; 
        line-height: normal; 
        list-style: initial;
        margin: 0 0 10px; 
        padding: 0; 
        vertical-align: baseline">24+ monitoring features;</li>
    <li style="border: 0;
        font-size: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: normal;
        list-style: initial;
        margin: 0 0 10px;
        padding: 0;
        vertical-align: baseline">Support for jailbreak-free solution;</li>
    <li style="border: 0;
        font-size: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: normal;
        list-style: initial;
        margin: 0 0 10px;
        padding: 0;
        vertical-align: baseline">Quick &amp; easy installation;</li>
    <li style="border: 0;
        font-size: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: normal;
        list-style: initial;
        margin: 0 0 10px;
        padding: 0;
        vertical-align: baseline">Technical &amp; sales support available via chat &amp; email;</li>
    <li style="border: 0;
        font-size: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: normal;
        list-style: initial;
        margin: 0 0 10px;
        padding: 0;
        vertical-align: baseline">The best price - annual packages start from $5.99/month!;</li>
    <li style="border: 0;
        font-size: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: normal;
        list-style: initial;
        margin: 0 0 10px;
        padding: 0;
        vertical-align: baseline">Advanced control panel.</li>
</ul>

<p style="<?= $style['paragraph'] ?>">And more!</p>

<p style="<?= $style['paragraph'] ?>">How do you get your hands on all that? You just need to make 4 simple steps:</p>


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
        vertical-align: baseline">1. Visit Pumpic&#39;s website;

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
        vertical-align: baseline">2. Select the subscription plan with the required functionality;</li>
    <li style="border: 0;
        font-size: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: normal;
        list-style: none;
        margin: 0 0 10px;
        padding: 0;
        vertical-align: baseline">3. Install and setup Pumpic app on the target device;</li>
    <li style="border: 0;
        font-size: normal;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: normal;
        list-style: none;
        margin: 0 0 10px;
        padding: 0;
        vertical-align: baseline">4. Find peace of mind by monitoring data via control panel - web or mobile based.</li>
</ul>

<p style="<?= $style['paragraph'] ?>">Got questions? Contact support or</p>

<div class="btn-center" style="<?= $style['buttonWrapper'] ?>" align="center">
    <a class="btn" href="<?= $this->analyticsLink('https://pumpic.com/store.html', ['source' => 'ioscpapp', 'medium' => 'system-email', 'campaign' => 'registration']) ?>" style="<?= $style['button'] ?>">
        Start Monitoring Now
    </a>
</div>
<?php $this->stop() ?>

<?php $this->start('footer') ?>
Enjoy Your Peace of Mind, <br>
<a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('https://pumpic.com/', ['source' => 'system', 'medium' => 'system-email', 'term' => 'signature']) ?>">
    Pumpic.com</a><br>
Support Team<br>
<a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>
<?php $this->stop() ?>


