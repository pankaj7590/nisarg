<?php
use yii\web\View;
use common\models\Setting;
use common\models\Media;
use common\components\MediaHelper;

$user = Yii::$app->user;
$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;
		
$aboutUsOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_ABOUT])->all();
$aboutUsOptions = [];
foreach($aboutUsOptionModels as $model){
	$aboutUsOptions[$model->name] = $model;
}
$about_title = $aboutUsOptions['about_title']['value'];
$about_page_content_title = $aboutUsOptions['about_page_content_title']['value'];
$about_page_content_subtitle = $aboutUsOptions['about_page_content_subtitle']['value'];
$about_page_content_content = $aboutUsOptions['about_page_content_content']['value'];
$about_page_second_section_title = $aboutUsOptions['about_page_second_section_title']['value'];
$about_page_second_section_subtitle = $aboutUsOptions['about_page_second_section_subtitle']['value'];
$about_page_second_section_content = $aboutUsOptions['about_page_second_section_content']['value'];
$about_page_image_1 = $aboutUsOptions['about_page_image_1'];
if($about_page_image_1->media){
	$about_page_image_1_url = MediaHelper::getImageUrl($about_page_image_1->media->file_name);
}else{
	$about_page_image_1_url = $baseUrl.'/images/home_hotel2_about1.png';
}
$about_page_image_2 = $aboutUsOptions['about_page_image_2'];
if($about_page_image_2->media){
	$about_page_image_2_url = MediaHelper::getImageUrl($about_page_image_2->media->file_name);
}else{
	$about_page_image_2_url = $baseUrl.'/images/home_hotel2_about2.png';
}
$about_page_second_section_icon = $aboutUsOptions['about_page_second_section_icon'];
if($about_page_second_section_icon->media){
	$about_page_second_section_icon_url = MediaHelper::getImageUrl($about_page_second_section_icon->media->file_name);
}else{
	$about_page_second_section_icon_url = $baseUrl.'/images/home_hotel2_about3.png';
}

$this->title = $about_title;
$this->params['subheader'] = '<div id="Subheader" style="padding:190px 0 100px;">
                <div class="container">
                    <div class="column one">
                        <h1 class="title">'.$about_title.'</h1>
                    </div>
                </div>
            </div>';
	
?>
                        <div class="section mcb-section " style="padding-top:70px; padding-bottom:30px; background-image:url(<?= $baseUrl;?>/images/home_hotel2_pattern.png); background-repeat:repeat; background-position:center; ">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one clearfix">
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_placeholder">
                                        <div class="placeholder">
                                            &nbsp;
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_image ">
                                        <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                                            <div class="image_wrapper"><img class="scale-with-grid" src="<?= $baseUrl;?>/images/home_hotel2_stars_big.png" alt="" width="285" height="44" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section " style="padding-top:70px; padding-bottom:40px; ">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap two-fifth clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr align_right" style=" padding:10px 5% 0 0;">
                                            <h2><?= $about_page_content_title;?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap three-fifth clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr">
                                            <div style="border-left: 1px solid #c2c2c2; padding: 15px 0 5px 7%;">
                                                <h4><?= $about_page_content_subtitle;?></h4>
                                                <p><?= $about_page_content_content;?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section full-width no-margin-h no-margin-v sections_style_0">
                            <div class="section_wrapper mcb-section-inner">
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_image ">
                                        <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                                            <div class="image_wrapper"><img class="scale-with-grid" src="<?= $about_page_image_1_url;?>" alt="" width="960" height="700" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_image ">
                                        <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                                            <div class="image_wrapper"><img class="scale-with-grid" src="<?= $about_page_image_1_url;?>" alt="" width="960" height="700" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section " style="padding-top:70px; padding-bottom:20px; background-image:url(<?= $baseUrl;?>/images/home_hotel2_pattern.png); background-repeat:repeat; background-position:center; ">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_image ">
                                        <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                                            <div class="image_wrapper"><img class="scale-with-grid" src="<?= $about_page_second_section_icon_url;?>" alt="" width="98" height="76" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr align_center" style=" padding:0 10%;">
                                            <h2><?= $about_page_second_section_title?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section " style="padding-top:70px; padding-bottom:20px; ">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one clearfix">
                                    <!-- One Second (1/2) Column -->
                                    <div class="column mcb-column one-second column_column">
                                        <div class="column_attr">
                                            <h4><?= $about_page_second_section_subtitle?></h4>
                                            <p class="big"><?= substr($about_page_second_section_content, 0, 385);?></p>
                                        </div>
                                    </div>
                                    <!-- One Second (1/2) Column -->
                                    <div class="column mcb-column one-second column_column">
                                        <div class="column_attr">
                                            <p class="big"><?= substr($about_page_second_section_content, 385);?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section no-margin-h no-margin-v full-width sections_style_0 ">
                            <div class="section_wrapper mcb-section-inner">
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_hover_color ">
                                        <div class="hover_color" style="background:#73818a;">
                                            <div class="hover_color_bg" style="background:#8a9399;">
                                                <a href="<?= $urlManager->createAbsoluteUrl(['site/contact']);?>">
                                                    <div class="hover_color_wrapper">
                                                        <h2 style="font-weight: 400; color: #fff; margin: 0px; padding: 30px 0 35px;">Contact information</h2>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_hover_color ">
                                        <div class="hover_color" style="background:#6eb3bb;">
                                            <div class="hover_color_bg" style="background:#88c6cd;">
                                                <a href="<?= $urlManager->createAbsoluteUrl(['booking/create']);?>">
                                                    <div class="hover_color_wrapper">
                                                        <h2 style="font-weight: 400; color: #fff; margin: 0px; padding: 30px 0 35px;">Check accommodation</h2>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section the_content no_content">
                            <div class="section_wrapper">
                                <div class="the_content_wrapper"></div>
                            </div>
                        </div>