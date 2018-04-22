<?php
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use common\models\Setting;
use common\models\Media;
use common\components\MediaHelper;

$user = Yii::$app->user;
$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;

$this->title = 'Resort';

//HOME PAGE OPTIONS
$homeOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_HOME])->all();
$homeOptions = [];
foreach($homeOptionModels as $themeOptionModel){
	$homeOptions[$themeOptionModel->name] = $themeOptionModel;
}
$feature_images_arr = [];
for($i = 1; $i <=3; $i++){
	$feature_image = $homeOptions['feature_image_'.$i];
	$feature_image_url = '';
	if($feature_image->media){
		$feature_image_url = MediaHelper::getImageUrl($feature_image->media->file_name);
	}
	$feature_title = $homeOptions['feature_title_'.$i]['value'];
	$feature_images_arr[] = [
		'title' => $feature_title,
		'image' => $feature_image_url,
	];
}
$welcome_title = $homeOptions['welcome_title']['value'];
$welcome_subtitle = $homeOptions['welcome_subtitle']['value'];
$welcome_content = $homeOptions['welcome_content']['value'];
$welcome_button_text = $homeOptions['welcome_button_text']['value'];
$welcome_button_link = $homeOptions['welcome_button_link']['value'];

$localization_title = $homeOptions['localization_title']['value'];
$localization_images = $homeOptions['localization_images']['value'];
$localization_images_arr = [];
if($localization_images){
	$temp = json_decode($localization_images);
	foreach($temp as $media){
		$mediaModel = Media::findOne($media);
		if($mediaModel){
			$localization_images_arr[] = MediaHelper::getImageUrl($mediaModel->file_name);
		}
	}
}
$services_title = $homeOptions['services_title']['value'];
$services_content = $homeOptions['services_content']['value'];
$services_arr = [];
for($i = 1; $i <=6; $i++){
	$service_image = $homeOptions['service_icon_'.$i];
	$service_image_url = '';
	if($service_image->media){
		$service_image_url = MediaHelper::getImageUrl($service_image->media->file_name);
	}
	$service_title = $homeOptions['service_title_'.$i]['value'];
	$service_content = $homeOptions['service_content_'.$i]['value'];
	$services_arr[] = [
		'title' => $service_title,
		'content' => $service_content,
		'image' => $service_image_url,
	];
}
$book_a_room_section_content = $homeOptions['book_a_room_section_content']['value'];
$map_address = $homeOptions['map_address']['value'];
$map_address_marker = $homeOptions['map_address_marker'];
if($map_address_marker->media){
	$markerUrl = MediaHelper::getImageUrl($map_address_marker->media->file_name);
}else{
	$markerUrl = $baseUrl.'/images/home_hotel2_pin.png';
}
$address = $homeOptions['address']['value'];
$phone = $homeOptions['phone']['value'];
$email = $homeOptions['email']['value'];
?>
                        <div class="section mcb-section " style="padding-top:70px; padding-bottom:20px; background-image:url(<?= $baseUrl;?>/images/home_hotel2_pattern.png); background-repeat:repeat; background-position:center; ">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one clearfix">
                                    <!-- One Third (1/3) Column -->
									<?php foreach($feature_images_arr as $feature_image){?>
										<div class="column mcb-column one-third column_sliding_box ">
											<div class="sliding_box">
												<a href="#">
													<div class="photo_wrapper"><img class="scale-with-grid" src="<?= $feature_image['image'];?>" alt="<?= $feature_image['title'];?>" width="700" height="910" />
													</div>
													<div class="desc_wrapper">
														<h4><?= $feature_image['title'];?></h4>
													</div>
												</a>
											</div>
										</div>
									<?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section " style="padding-top:70px; padding-bottom:20px; ">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one clearfix">
                                    <!-- Two Fifth (2/5) Column -->
                                    <div class="column mcb-column two-fifth column_column">
                                        <div class="column_attr align_right" style=" padding:0 5% 0 0;">
                                            <h2><?= $welcome_title?></h2>
                                            <hr class="no_line hrmargin_b_30" />
                                            <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                <div class="image_wrapper"><img class="scale-with-grid" src="<?= $baseUrl;?>/images/home_hotel2_stars.png" alt="" width="143" height="22" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Three Fifth (3/5) Column -->
                                    <div class="column mcb-column three-fifth column_column">
                                        <div class="column_attr">
                                            <div style="border-left: 1px solid #c2c2c2; padding: 15px 0 5px 7%;">
                                                <h4><?= $welcome_subtitle?></h4>
                                                <p><?= $welcome_content?></p>
												<a class="button button_js" href="<?= $welcome_button_link?>"><span class="button_label"><?= $welcome_button_text?></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section " style="padding-top:55px; padding-bottom:0px; background-image:url(<?= $baseUrl;?>/images/home_hotel2_pattern.png); background-repeat:repeat; background-position:center; ">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr align_center">
                                            <h2 class="themecolor"><?= $localization_title?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section full-width no-margin-h no-margin-v sections_style_0">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr">

                                            <!-- Image Gallery-->
                                            <div id='gallery-1' class='gallery galleryid-2 gallery-columns-5 gallery-size-full file flat'>
                                                <!-- Gallery item -->
												<?php foreach($localization_images_arr as $localization_image){?>
													<dl class='gallery-item'>
														<dt class='gallery-icon portrait'>
																<a href='<?= $localization_image?>'><img width="700" height="802" src="<?= $localization_image?>" class="attachment-full" alt="home_hotel2_gallery1" /></a>
															</dt>
														<dd></dd>
													</dl>
												<?php }?>
                                                <br class="flv_clear_both" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section " style="padding-top:70px; padding-bottom:20px; ">
                            <div class="section_wrapper mcb-section-inner">
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix" style="padding:0 3% 0 0; ">
                                    <!-- One Full Row-->
									<?php 
										for($i=0; $i < 2; $i++){
											$service = $services_arr[$i];
									?>
										<div class="column mcb-column one column_list ">
											<div class="list_item lists_2 clearfix">
												<div class="list_left list_image"><img src="<?= $service['image']?>" alt="Exclusive interior" class="scale-with-grid" width="77" height="77" />
												</div>
												<div class="list_right">
													<h4><?= $service['title']?></h4>
													<!--<div class="desc"><?= $service['content']?></div>-->
												</div>
											</div>
										</div>
									<?php }?>
                                </div>
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix">
                                    <!-- One Full Row-->
									<?php 
										for($i=2; $i < 4; $i++){
											$service = $services_arr[$i];
									?>
										<div class="column mcb-column one column_list ">
											<div class="list_item lists_2 clearfix">
												<div class="list_left list_image"><img src="<?= $service['image']?>" alt="Exclusive interior" class="scale-with-grid" width="77" height="77" />
												</div>
												<div class="list_right">
													<h4><?= $service['title']?></h4>
													<!--<div class="desc"><?= $service['content']?></div>-->
												</div>
											</div>
										</div>
									<?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section " style="padding-top:70px; padding-bottom:40px; background-image:url(<?= $baseUrl;?>/images/home_hotel2_pattern.png); background-repeat:repeat; background-position:center; ">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one-sixth clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_placeholder">
                                        <div class="placeholder">
                                            &nbsp;
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap two-third column-margin-20px clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr align_center">
                                            <h2>Book a room</h2>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr">

                                            <div id="contactWrapper">
												<?php $form = ActiveForm::begin(["action" => ["booking/create"]]); ?>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
														<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
														<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
														<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
														<?= $form->field($model, 'checkin_date')->textInput(['type' => 'date', 'min' => date('Y-m-d', time()+(24*3600))]); ?>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
														<?= $form->field($model, 'checkout_date')->textInput(['type' => 'date', 'min' => date('Y-m-d', time()+(24*3600))]); ?>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
														<?= $form->field($model, 'room_type')->dropdownList($roomTypes, ['prompt' => 'Select room type...']) ?>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
														<?= $form->field($model, 'adults')->textInput() ?>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
														<?= $form->field($model, 'children')->textInput() ?>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
														<?= $form->field($model, 'rooms')->textInput() ?>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="column one">
														<?= $form->field($model, 'message')->textarea(['rows' => 11]) ?>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="column one" style="text-align: center;">
                                                        <input type="submit" value="Book your room now" />
                                                    </div>
												<?php ActiveForm::end(); ?>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <!--<div class="column mcb-column one column_column">
                                        <div class="column_attr align_center">
                                            <p><?= $book_a_room_section_content;?></p>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section full-width sections_style_0">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_map ">

                                        <!-- Google map area -->
                                        <div class="google-map-wrapper no_border">
                                            <div class="google-map" id="google-map-area-566008f9ece90" style="width:100%; height:550px;">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section " style="padding-top:70px; padding-bottom:40px; ">
                            <div class="section_wrapper mcb-section-inner">
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
										<?php $form = ActiveForm::begin(["action" => ["site/contact"]]); ?>
											<!-- One Third (1/3) Column -->
											<div class="column one-third">
												<?= $form->field($contactModel, 'name')->textInput() ?>
												<?= $form->field($contactModel, 'email') ?>
												<?= $form->field($contactModel, 'subject') ?>
											</div>
											<!-- One Third (1/3) Column -->
											<div class="column two-third">
												<?= $form->field($contactModel, 'body')->textarea(['rows' => 6, 'style' => ['width' => '100%']]) ?>
												<?= $form->field($contactModel, 'verifyCode')->widget(Captcha::className(), [
													'template' => '<div class="column one-half">{input}</div><div class="column one-half">{image}</div><div class="clearfix"></div>',
												]) ?>
											</div>
											<div class="clearfix"></div>
											<div class="column one" style="text-align: center;">
												<input type="submit" value="Contact now" />
											</div>
										<?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr">
                                            <div style="border-left: 1px solid #c2c2c2; padding: 15px 0 5px 7%;">
                                                <h4><?= $address;?></h4>
                                                <hr class="no_line hrmargin_b_30" />
                                                <p class="hrmargin_0 big">
                                                    Call us:
                                                </p>
                                                <h3 class="themecolor"><a href="tel:<?= $phone;?>"><?= $phone;?></a></h3>
                                                <hr class="no_line hrmargin_b_30" />
                                                <p class="hrmargin_0 big">
                                                    Email:
                                                </p>
                                                <h3 class="themecolor"><a href="mailto:<?= $email;?>"><?= $email;?></a></h3>
                                            </div>
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

<?php 
	$this->registerJs('
        function revslider_showDoubleJqueryError(sliderID) {
            var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
            errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
            errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option: <strong><b>Put JS Includes To Body</b></strong> option to true.";
            errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
            errorMessage = "<span style=\'font-size:16px;color:#BC0C06;\'>" + errorMessage + "</span>";
            jQuery(sliderID).show().html(errorMessage);
        }

        var tpj = jQuery;
        var revapi1;
        
		if (tpj("#rev_slider_1_2").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_1_2");
            } else {
                revapi1 = tpj("#rev_slider_1_2").show().revolution({
                    sliderType: "standard",
                    sliderLayout: "auto",
                    dottedOverlay: "none",
                    delay: 2000,
                    navigation: {
                        onHoverStop: "off",
                    },
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: 1240,
                    gridheight: 800,
                    lazyType: "none",
                    shadow: 0,
                    spinner: "spinner2",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }

            var retina = window.devicePixelRatio > 1 ? true : false;
            if (retina) {
                var retinaEl = jQuery("#logo img.logo-main");
                var retinaLogoW = retinaEl.width();
                var retinaLogoH = retinaEl.height();
                retinaEl.attr("src", "'.$baseUrl.'/images/retina-hotel2.png").width(retinaLogoW).height(retinaLogoH);
                var stickyEl = jQuery("#logo img.logo-sticky");
                var stickyLogoW = stickyEl.width();
                var stickyLogoH = stickyEl.height();
                stickyEl.attr("src", "'.$baseUrl.'/images/retina-hotel2.png").width(stickyLogoW).height(stickyLogoH);
                var mobileEl = jQuery("#logo img.logo-mobile");
                var mobileLogoW = mobileEl.width();
                var mobileLogoH = mobileEl.height();
                mobileEl.attr("src", "'.$baseUrl.'/images/retina-hotel2.png").width(mobileLogoW).height(mobileLogoH);
            }
', View::POS_READY,'init-rev-slider');
?>
<?php
	$this->registerJsFile('http://maps.google.com/maps/api/js?sensor=false&ver=5.9');
	$this->registerJs('
        function google_maps_566008f9ece90() {
            var latlng = new google.maps.LatLng('.$map_address.');
            var draggable = true;
            var myOptions = {
                zoom: 13,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: [{
                    "featureType": "all",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "saturation": 36
                    }, {
                        "color": "#503f1a"
                    }, {
                        "lightness": "6"
                    }]
                }, {
                    "featureType": "all",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "visibility": "on"
                    }, {
                        "color": "#fff"
                    }, {
                        "lightness": 16
                    }]
                }, {
                    "featureType": "all",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#88c6cd"
                    }, {
                        "lightness": 20
                    }]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "lightness": 17
                    }, {
                        "weight": 1.2
                    }, {
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#e4eced"
                    }]
                }, {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#d3e8ea"
                    }]
                }, {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#d3e8ea"
                    }, {
                        "lightness": 21
                    }]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#fff"
                    }, {
                        "lightness": 17
                    }]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#fff"
                    }, {
                        "lightness": 29
                    }, {
                        "weight": 0.2
                    }]
                }, {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#fff"
                    }, {
                        "lightness": 18
                    }]
                }, {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#fff"
                    }, {
                        "lightness": 16
                    }]
                }, {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#c1e7eb"
                    }, {
                        "lightness": 19
                    }]
                }, {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#88c6cd"
                    }, {
                        "lightness": 17
                    }]
                }],
                draggable: draggable,
                zoomControl: true,
                mapTypeControl: false,
                streetViewControl: false,
                scrollwheel: false
            };
            var map = new google.maps.Map(document.getElementById("google-map-area-566008f9ece90"), myOptions);
            var marker = new google.maps.Marker({
                position: latlng,
                icon: "'.$markerUrl.'",
                map: map
            });
        }


        jQuery(document).ready(function($) {
            google_maps_566008f9ece90();
        });
	', View::POS_READY, "map-location");
	
	$this->registerJs("
		$('#booking-checkin_date').on('change', function(){
			var checkin_date = $(this).val();
			if(typeof checkin_date != 'undefined'){
				$('#booking-checkout_date').attr('min', checkin_date);
			}
		});
	", View::POS_READY, "set-min-checkout-date");
?>