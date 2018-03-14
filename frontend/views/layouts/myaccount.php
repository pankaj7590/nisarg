<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);

$user = Yii::$app->user;
$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7 "> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Basic Page Needs -->
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="content/hotel2/images/favicon.ico">

    <!-- FONTS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Patua+One:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic,700,700italic'>

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>


</head>

<body class="home template-slider style-simple layout-full-width mobile-tb-left button-flat if-overlay no-content-padding header-split header-semi minimalist-header sticky-header sticky-white ab-hide subheader-both-center menuo-no-borders footer-copy-center">
<?php $this->beginBody() ?>
    <!-- Main Theme Wrapper -->
    <div id="Wrapper">
        <!-- Header Wrapper -->
        <div id="Header_wrapper" class="bg-parallax" data-enllax-ratio="0.3">
            <!-- Header -->
            <header id="Header">

                <!-- Header -  Logo and Menu area -->
                <div id="Top_bar">
                    <div class="container">
                        <div class="column one">
                            <div class="top_bar_left clearfix">
                                <!-- Logo-->
                                <div class="logo">
                                    <a id="logo" href="<?= $baseUrl;?>/index-hotel2.html" title="BeHotel2 - BeTheme"> <img class="scale-with-grid" src="<?= $baseUrl;?>/images/hotel2.png" alt="BeHotel2 - BeTheme" />
                                    </a>
                                </div>
                                <!-- Main menu-->
                                <div class="menu_wrapper">
                                    <nav id="menu">
                                        <ul id="menu-main-menu-left" class="menu menu_left">
                                            <li class="current_page_item">
                                                <a href="<?= $urlManager->createAbsoluteUrl(['site/index'])?>"><span>Back To Hotel</span></a>
                                            </li>
                                            <li>
                                                <a href="<?= $urlManager->createAbsoluteUrl(['site/my-profile'])?>"><span>My Profile</span></a>
                                            </li>
                                            <li>
                                                <a href="<?= $urlManager->createAbsoluteUrl(['site/bookings'])?>"><span>Bookings</span></a>
                                            </li>
                                        </ul>
                                        <ul id="menu-main-menu-right" class="menu menu_right">
                                            <li>
                                                <a href="<?= $urlManager->createAbsoluteUrl(['site/gallery'])?>"><span>Gallery</span></a>
                                            </li>
											<li>
												<a href="<?= $urlManager->createAbsoluteUrl(['site/logout'])?>" data-method="post"><span>Logout</span></a>
											</li>
                                        </ul>
                                    </nav><a class="responsive-menu-toggle" href="#"><i class="icon-menu"></i></a>
                                </div>
                                
                                <!-- Banner area - only for certain pages-->
                                <div class="banner_wrapper"></div>
                                <!-- Header Searchform area-->
                                <div class="search_wrapper">
                                    <form method="get" id="searchform" action="#">

                                        <input type="text" class="field" name="s" id="s" placeholder="Enter your search" />
                                        <input type="submit" class="submit flv_disp_none" value="" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Revolution slider area-->
                <div class="mfn-main-slider">
                    <div id="rev_slider_1_2_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                        <div id="rev_slider_1_2" class="rev_slider fullwidthabanner" data-version="5.1.1">
                            <ul>
                                <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="500" data-rotate="0" data-saveperformance="off" data-title="Slide" data-description="">
                                    <img src="<?= $baseUrl;?>/images/home_hotel2_slider1.jpg" alt="" width="1920" height="800" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                </li>
                                <li data-index="rs-2" data-transition="fade" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="500" data-rotate="0" data-saveperformance="off" data-title="Slide" data-description="">
                                    <img src="<?= $baseUrl;?>/images/home_hotel2_slider3.jpg" alt="" width="1920" height="800" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                </li>
                            </ul>
                            <div class="tp-static-layers">
                                <div class="tp-caption Fashion-BigDisplay tp-resizeme tp-static-layer" id="slide-1-layer-1" data-x="center" data-hoffset="" data-y="bottom" data-voffset="90" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeOut;" data-transform_out="opacity:0;s:300;s:300;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-startslide="0" data-endslide="1" style="z-index: 5; white-space: nowrap; font-size: 73px; line-height: 73px; font-weight: 400; color: rgba(255, 255, 255, 1.00);font-family:Playfair Display;text-align:center;font-style:italic;">
                                    It's where dreams come true
                                </div>
                            </div>
                            <div class="tp-bannertimer tp-bottom flv_viz_hid"></div>
                        </div>
                    </div>
                </div>
            </header>
			<?php if(isset($this->params['subheader'])){?>
				<?= $this->params['subheader'];?>
			<?php }?>
        </div>
        <!-- Main Content -->
        <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="entry-content">        
						<?= $content ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer id="Footer" class="clearfix">
            <div class="widgets_wrapper">
                <div class="container">
                    <div class="column one">
                        <!-- Text Area -->
                        <aside class="widget widget_text">
                            <div class="textwidget">
                                <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                                    <div class="image_wrapper"><img class="scale-with-grid" src="<?= $baseUrl;?>/images/home_hotel2_logo_footer.png" alt="" width="60" height="47" />
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            <!-- Footer copyright-->
            <div class="footer_copy">
                <div class="container">
                    <div class="column one">
                        <div class="copyright">
                            &copy; <?= date('Y') ?> <?= Html::encode(Yii::$app->name) ?></a>
                        </div>
                        <!--Social info area-->
                        <ul class="social"></ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>