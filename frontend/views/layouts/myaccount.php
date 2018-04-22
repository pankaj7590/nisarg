<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\Setting;
use common\models\Media;
use common\components\MediaHelper;

AppAsset::register($this);

$user = Yii::$app->user;
$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;

$headerOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_HEADER])->all();
$headerOptions = [];
foreach($headerOptionModels as $model){
	$headerOptions[$model->name] = $model;
}
$facebook = $headerOptions['facebook']['value'];
$twitter = $headerOptions['twitter']['value'];
$gplus = $headerOptions['gplus']['value'];
$pinterest = $headerOptions['pinterest']['value'];
$instagram = $headerOptions['instagram']['value'];
$header_phone = $headerOptions['header_phone']['value'];
$header_email = $headerOptions['header_email']['value'];
$menu_bar_logo = $headerOptions['menu_bar_logo'];
if($menu_bar_logo->media){
	$logoUrl = MediaHelper::getImageUrl($menu_bar_logo->media->file_name);
}else{
	$logoUrl = $baseUrl.'/images/hotel2.png';
}

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
    <link rel="shortcut icon" href="<?= ($logoUrl?$logoUrl:'/images/hotel2.png')?>">

    <!-- FONTS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Patua+One:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic,700,700italic'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                                    <a id="logo" href="<?= $urlManager->createAbsoluteUrl(['site/index']);?>" title="Nisarg Resort"> <img class="scale-with-grid" src="<?= ($logoUrl?$logoUrl:'/images/hotel2.png')?>" alt="Nisarg Resort" />
                                    </a>
                                </div>
                                <!-- Main menu-->
                                <div class="menu_wrapper">
                                    <nav id="menu">
                                        <ul id="menu-main-menu-left" class="menu menu_left">
                                            <li class="current_page_item">
                                                <a href="<?= $urlManager->createAbsoluteUrl(['site/index'])?>"><span>Go Back</span></a>
                                            </li>
                                            <li>
                                                <a href="<?= $urlManager->createAbsoluteUrl(['booking/index'])?>"><span>My Bookings</span></a>
                                            </li>
                                        </ul>
                                        <ul id="menu-main-menu-right" class="menu menu_right">
                                            <li>
                                                <a href="<?= $urlManager->createAbsoluteUrl(['site/gallery'])?>"><span>Gallery</span></a>
                                            </li>
											<li>
												<a href="<?= $urlManager->createAbsoluteUrl(['site/logout'])?>" data-method="post"><span>Logout <span style="font-size:16px;display:inline;padding:0;" title="<?= Yii::$app->user->identity->name?>">(<?= substr(Yii::$app->user->identity->name, 0,6);?>)</span></span></a>
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
                                    <div class="image_wrapper"><img class="scale-with-grid" src="<?= ($iconUrl?$iconUrl:$baseUrl.'/images/home_hotel2_logo_footer.png')?>" alt="" width="60" height="47" />
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
                            &copy; <?= date('Y') ?> <?= ($footer_copyright?$footer_copyright:Html::encode(Yii::$app->name)) ?>
                        </div>
                        <!--Social info area-->
                        <ul class="social">
							<li><a href="<?= $facebook?>"><i class="fa fa-facebook-square fa-2x"></i></a></li>
							<li><a href="<?= $twitter?>"><i class="fa fa-twitter fa-2x"></i></a></li>
							<li><a href="<?= $gplus?>"><i class="fa fa-google-plus fa-2x"></i></a></li>
							<li><a href="<?= $pinterest?>"><i class="fa fa-pinterest fa-2x"></i></a></li>
							<li><a href="<?= $instagram?>"><i class="fa fa-instagram fa-2x"></i></a></li>
						</ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>