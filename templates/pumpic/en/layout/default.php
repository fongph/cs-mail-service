<!DOCTYPE html>
<html lang="en-US" style="*overflow: auto; border: 0; font-size: normal; font-style: normal; font-variant: normal; font-weight: normal; height: 100%; line-height: normal; margin: 0; padding: 0; vertical-align: baseline">
    <head>
        <title><?= $title ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="background: #fff; border: 0; color: #4d4f5b; font: 400 14px 'Open Sans', sans-serif; margin: 0; min-height: 100%; min-width: 1000px; padding: 0; position: relative; vertical-align: baseline" bgcolor="#fff">

        <style type="text/css">
            @font-face {
                font-family: 'Open Sans'; font-style: normal; font-weight: 300; src: local('Open Sans Light'), local('OpenSans-Light'), url('http://fonts.gstatic.com/s/opensans/v10/DXI1ORHCpsQm3Vp6mXoaTYnF5uFdDttMLvmWuJdhhgs.ttf') format('truetype');
            }
            @font-face {
                font-family: 'Open Sans'; font-style: normal; font-weight: 400; src: local('Open Sans'), local('OpenSans'), url('http://fonts.gstatic.com/s/opensans/v10/cJZKeOuBrn4kERxqtaUH3aCWcynf_cDxXwCLxiixG1c.ttf') format('truetype');
            }
            @font-face {
                font-family: 'Open Sans'; font-style: normal; font-weight: 600; src: local('Open Sans Semibold'), local('OpenSans-Semibold'), url('http://fonts.gstatic.com/s/opensans/v10/MTP_ySUJH_bn48VBG8sNSonF5uFdDttMLvmWuJdhhgs.ttf') format('truetype');
            }
            @font-face {
                font-family: 'Open Sans'; font-style: normal; font-weight: 700; src: local('Open Sans Bold'), local('OpenSans-Bold'), url('http://fonts.gstatic.com/s/opensans/v10/k3k702ZOKiLJc3WVjuplzInF5uFdDttMLvmWuJdhhgs.ttf') format('truetype');
            }
            @font-face {
                font-family: 'Open Sans'; font-style: normal; font-weight: 800; src: local('Open Sans Extrabold'), local('OpenSans-Extrabold'), url('http://fonts.gstatic.com/s/opensans/v10/EInbV5DfGHOiMmvb1Xr-honF5uFdDttMLvmWuJdhhgs.ttf') format('truetype');
            }
            @font-face {
                font-family: 'Open Sans'; font-style: italic; font-weight: 300; src: local('Open Sans Light Italic'), local('OpenSansLight-Italic'), url('http://fonts.gstatic.com/s/opensans/v10/PRmiXeptR36kaC0GEAetxrfB31yxOzP-czbf6AAKCVo.ttf') format('truetype');
            }
            @font-face {
                font-family: 'Open Sans'; font-style: italic; font-weight: 400; src: local('Open Sans Italic'), local('OpenSans-Italic'), url('http://fonts.gstatic.com/s/opensans/v10/xjAJXh38I15wypJXxuGMBp0EAVxt0G0biEntp43Qt6E.ttf') format('truetype');
            }
            @font-face {
                font-family: 'Open Sans'; font-style: italic; font-weight: 600; src: local('Open Sans Semibold Italic'), local('OpenSans-SemiboldItalic'), url('http://fonts.gstatic.com/s/opensans/v10/PRmiXeptR36kaC0GEAetxi8cqLH4MEiSE0ROcU-qHOA.ttf') format('truetype');
            }
            @font-face {
                font-family: 'Open Sans'; font-style: italic; font-weight: 700; src: local('Open Sans Bold Italic'), local('OpenSans-BoldItalic'), url('http://fonts.gstatic.com/s/opensans/v10/PRmiXeptR36kaC0GEAetxp_TkvowlIOtbR7ePgFOpF4.ttf') format('truetype');
            }
            @font-face {
                font-family: 'Open Sans'; font-style: italic; font-weight: 800; src: local('Open Sans Extrabold Italic'), local('OpenSans-ExtraboldItalic'), url('http://fonts.gstatic.com/s/opensans/v10/PRmiXeptR36kaC0GEAetxlDMrAYtoOisqqMDW9M_Mqc.ttf') format('truetype');
            }
            body {
                margin: 0; 
                padding: 0; 
                border: 0; 
                font-size: 100%; 
                font: inherit; 
                vertical-align: baseline;
            }
            img {
                margin: 0; 
                padding: 0; 
                border: 0; 
                font-size: 100%; 
                font: inherit; 
                vertical-align: baseline;
            }
        </style>
        <?php
        if (isset($params['name']) && !empty($params['name'])) {
            $name = explode(' ', $params['name']);
            if (is_array($name) && count($name) > 0) {
                $firstName = $name[0];
            } else {
                $firstName = $params['name'];
            }
        }
        ?>
        <div id="body" style="-moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius: 10px; border: 2px solid #4d4f5b; color: #4d4f5b; font: 400 14px 'Open Sans', sans-serif; margin: 0; padding: 0; vertical-align: baseline; width: 600px">
            <div id="header" style="background: #4d4f5b; border: 0; display: block; font-size: normal; font-style: normal; font-variant: normal; font-weight: normal; height: 105px; line-height: normal; margin: 0; padding: 0; vertical-align: baseline">
                <a href="<?= $this->analyticsLink('http://pumpic.com/', ['term' => 'logo']) ?>" style="border: 0; 
                   font-size: normal; 
                   font-style: normal; 
                   font-variant: normal; 
                   font-weight: normal; 
                   line-height: normal; 
                   margin: 0; 
                   padding: 0; 
                   text-decoration: none; 
                   vertical-align: baseline">
                    <img src="http://pumpic.com/images/logo-mail.png" alt="" style="border: 0; display: block; font-size: normal; font-style: normal; font-variant: normal; font-weight: normal; line-height: normal; margin: 0 auto; padding: 30px 0 0; vertical-align: baseline">
                </a>
            </div>

            <div id="content" style="border: 0; font-size: normal; font-style: normal; font-variant: normal; font-weight: normal; line-height: normal; margin: 0; padding: 30px 40px 0px; vertical-align: baseline">
                <?= $this->section('page') ?>
            </div>

            <div id="footer" style="border: 0; font-size: inherit; font-style: normal; font-variant: normal; font-weight: normal; line-height: normal; margin: 0; padding: 15px 40px; vertical-align: baseline">
                <?php if ($this->section('footer')): ?>
                    <?= $this->section('footer') ?>
                <?php else: ?>
                    Best Regards,<br>
                    <a style="<?= $style['textLink'] ?>" href="<?= $this->analyticsLink('http://pumpic.com/', ['term' => 'signature']) ?>">
                        Pumpic.com</a><br>
                    Support Team<br>
                    <a style="<?= $style['textLink'] ?>" href="mailto:support@pumpic.com">support@pumpic.com</a>
                <?php endif ?>
            </div>

            <?php if (isset($group)): ?>
                <?php if ($group == 'system'): ?>
                    <div style="border: 0; font-size: small; font-style: normal; font-variant: normal; font-weight: normal; line-height: normal; margin: 0; padding: 0 40px 15px 40px; vertical-align: baseline; text-align: center; color: #a3a3a3;">
                        If you’d no longer like to receive account status emails from Pumpic, please <a style="border: 0; color: #a3a3a3; font-size: normal; font-style: normal; font-variant: normal; font-weight: normal; line-height: normal; margin: 0; padding: 0; text-decoration: underline; vertical-align: baseline;" href="http://cp.pumpic.com/profile/unsubscribe/system" target="_blank">unsubscribe</a>.
                    </div>
                <?php elseif ($group == 'monitoring'): ?>
                    <div style="border: 0; font-size: small; font-style: normal; font-variant: normal; font-weight: normal; line-height: normal; margin: 0; padding: 0 40px 15px 40px; vertical-align: baseline; text-align: center; color: #a3a3a3;">
                        If you’d no longer like to receive monitoring notification emails from Pumpic, please <a style="border: 0; color: #a3a3a3; font-size: normal; font-style: normal; font-variant: normal; font-weight: normal; line-height: normal; margin: 0; padding: 0; text-decoration: underline; vertical-align: baseline;" href="http://cp.pumpic.com/profile/unsubscribe/monitoring" target="_blank">unsubscribe</a>.
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </body>
</html>