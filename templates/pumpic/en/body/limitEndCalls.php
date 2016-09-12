<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<h1 style="<?= $style['firstHeading'] ?>" align="center">
    <?php if(isset($params['name']) and !empty($params['name'])): ?>
        Dear <?= $params['name'] ?>,
    <?php else: ?>
        Hello,
    <?php endif; ?></h1>

<p style="<?= $style['paragraph'] ?>">
    You have reached <strong style="<?= $style['strong'] ?>">Call Monitoring Limit</strong>. You will not be able to monitor new Call data any longer.                                                 
</p>

<b class="green" style="<?= $style['colorText'] ?>">Why Limit Reached</b><br />

<p style="<?= $style['paragraph'] ?>">
    With Pumpic 
    <strong style="<?= $style['strong'] ?>">Basic subscription plan</strong>, you can monitor up to 
<strong style="<?= $style['strong'] ?>">700 calls monthly</strong>. 
    As soon as you reach this limit, you stop receiving any new data on 
    <i style="border: 0; 
       font-size: normal; 
       font-style: italic; 
       font-variant: normal; 
       font-weight: 400; 
       line-height: normal; 
       margin: 0; 
       padding: 15px 0px; 
       vertical-align: baseline">incoming and outgoing Calls</i> in your Control Panel.        
</p>


<b class="green" style="<?= $style['colorText'] ?>">What to Do</b><br />
                    
<p style="<?= $style['paragraph'] ?>">
    To <strong style="<?= $style['strong'] ?>">resume Call monitoring</strong>, Pumpic provides you with <strong style="<?= $style['strong'] ?>">two options</strong>:       
</p>

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
        vertical-align: baseline">
        1. <a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink($params['buyUrl'], ['term' => 'store']) ?>">
                <strong style="<?= $style['strong'] ?>">Buy Premium</strong>
        </a> subscription and use <i style="border: 0; 
       display: inline;                         
       font-size: normal; 
       font-style: italic; 
       font-variant: normal; 
       font-weight: 400; 
       line-height: normal; 
       margin: 0; 
       padding: 0; 
       vertical-align: baseline">more than 24 useful tracking features <strong style="<?= $style['strong'] ?>">without any limits</strong></i>;
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
        vertical-align: baseline">2. Order an additional <a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink($params['unlimitedUrl'], ['term' => 'unlimited-calls']) ?>" >
                <strong style="<?= $style['strong'] ?>">Unlimited Calls</strong></a> service for <strong style="<?= $style['strong'] ?>">$4.99/30 days</strong> to resume this particular feature.</li>

</ul>

<p style="<?= $style['paragraph'] ?>">Thank you for choosing Pumpic as your ultimate mobile monitoring app.</p>
<?php $this->stop() ?>