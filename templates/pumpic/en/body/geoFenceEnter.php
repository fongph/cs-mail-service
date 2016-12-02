<?php $this->layout('layout/default', ['title' => $title, 'style' => $style, 'group' => $group]) ?>

<?php $this->start('page') ?>
<p style="<?= $style['paragraph'] ?>">
    <?= $params['name'] ?> has entered the Geo-fence area <?= $params['zone'] ?> at <?= $params['zoneTime'] ?>.
</p>
<?php if (isset($params['zoneImg'])): ?>
    <p style="<?= $style['paragraph'] ?>">
        <a href="<?= $params['zoneHref'] ?>"><img style="border: 0; 
                                                  display: block; 
                                                  font-size: normal; 
                                                  font-style: normal; 
                                                  font-variant: normal; 
                                                  font-weight: normal; 
                                                  line-height: normal; 
                                                  margin: 0; 
                                                  min-width: 100%; 
                                                  padding: 0; 
                                                  position: relative; 
                                                  vertical-align: baseline; 
                                                  width: 100%" src="<?= $params['zoneImg'] ?>" alt="" /> </a>
    </p>
<?php endif; ?>
<p style="<?= $style['paragraph'] ?>">
    You can customize Geo-fencing preferences and alerts in <a href="<?= $this->analyticsLink($params['zoneHref'], ['term' => 'geoFenceEnter']) ?>" style="<?= $style['textLink'] ?>">https://cp.pumpic.com/cp/locations/zones</a>
</p>
<?php $this->stop() ?>
<?php $this->start('footer') ?>
Happy monitoring, <br>
<a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('http://pumpic.com/', ['term' => 'signature']) ?>">
    Pumpic.com</a><br>
Support Team<br>
<a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>
<?php $this->stop() ?>

