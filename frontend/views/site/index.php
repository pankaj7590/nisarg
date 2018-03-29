<?php
use yii\web\View;
$user = Yii::$app->user;
$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;

$this->title = 'Resort';
?>
                        <div class="section mcb-section " style="padding-top:70px; padding-bottom:20px; background-image:url(<?= $baseUrl;?>/images/home_hotel2_pattern.png); background-repeat:repeat; background-position:center; ">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one clearfix">
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_sliding_box ">
                                        <div class="sliding_box">
                                            <a href="#">
                                                <div class="photo_wrapper"><img class="scale-with-grid" src="<?= $baseUrl;?>/images/home_hotel2_offer1.jpg" alt="Astonishing view" width="700" height="910" />
                                                </div>
                                                <div class="desc_wrapper">
                                                    <h4>Astonishing view</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_sliding_box ">
                                        <div class="sliding_box">
                                            <a href="#">
                                                <div class="photo_wrapper"><img class="scale-with-grid" src="<?= $baseUrl;?>/images/home_hotel2_offer2.jpg" alt="Wellness and spa" width="700" height="910" />
                                                </div>
                                                <div class="desc_wrapper">
                                                    <h4>Wellness and spa</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_sliding_box ">
                                        <div class="sliding_box">
                                            <a href="#">
                                                <div class="photo_wrapper"><img class="scale-with-grid" src="<?= $baseUrl;?>/images/home_hotel2_offer3.jpg" alt="Romantic dinner" width="700" height="910" />
                                                </div>
                                                <div class="desc_wrapper">
                                                    <h4>Romantic dinner</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section " style="padding-top:70px; padding-bottom:20px; ">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one clearfix">
                                    <!-- Two Fifth (2/5) Column -->
                                    <div class="column mcb-column two-fifth column_column">
                                        <div class="column_attr align_right" style=" padding:0 5% 0 0;">
                                            <h2>Welcome
												<br>
												to the BE HOTEL</h2>
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
                                                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud</h4>
                                                <p>
                                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod magni dolores eos qui ratione volui nesciunt.
                                                </p>
                                                <p>
                                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.
                                                </p><a class="button button_js" href="content/hotel2/booking.html"><span class="button_label">Book your room</span></a>
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
                                            <h2 class="themecolor">Localization and attractions</h2>
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
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon portrait'>
															<a href='<?= $baseUrl;?>/images/home_hotel2_gallery1.jpg'><img width="700" height="802" src="<?= $baseUrl;?>/images/home_hotel2_gallery1.jpg" class="attachment-full" alt="home_hotel2_gallery1" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon portrait'>
															<a href='<?= $baseUrl;?>/images/home_hotel2_gallery2.jpg'><img width="700" height="802" src="<?= $baseUrl;?>/images/home_hotel2_gallery2.jpg" class="attachment-full" alt="home_hotel2_gallery2" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon portrait'>
															<a href='<?= $baseUrl;?>/images/home_hotel2_gallery3.jpg'><img width="700" height="802" src="<?= $baseUrl;?>/images/home_hotel2_gallery3.jpg" class="attachment-full" alt="home_hotel2_gallery3" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon portrait'>
															<a href='<?= $baseUrl;?>/images/home_hotel2_gallery4.jpg'><img width="700" height="802" src="<?= $baseUrl;?>/images/home_hotel2_gallery4.jpg" class="attachment-full" alt="home_hotel2_gallery4" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon portrait'>
															<a href='<?= $baseUrl;?>/images/home_hotel2_gallery5.jpg'><img width="700" height="802" src="<?= $baseUrl;?>/images/home_hotel2_gallery5.jpg" class="attachment-full" alt="home_hotel2_gallery5" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <br class="flv_clear_both" />
                                            </div>
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
                                        <div class="column_attr align_right" style=" padding:0 5% 0 0;">
                                            <h2> Services
												<br>
												and standards</h2>
                                        </div>
                                    </div>
                                    <!-- One Second (1/2) Column -->
                                    <div class="column mcb-column one-second column_column">
                                        <div class="column_attr" style=" padding:10px 0 0 0;">
                                            <h4>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore ausmod tempor incididunt ut labore et dolore. Proin eget tellus tristique lacinia erat non.</h4>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr align_center">
                                            <div style="width: 40%; height: 1px; margin: 0 auto; background: #c2c2c2;"></div>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_divider ">
                                        <hr class="no_line hrmargin_b_20" />
                                    </div>
                                </div>
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix" style="padding:0 3% 0 0; ">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_list ">
                                        <div class="list_item lists_2 clearfix">
                                            <div class="list_left list_image"><img src="<?= $baseUrl;?>/images/home_hotel2_icon1.png" alt="Exclusive interior" class="scale-with-grid" width="77" height="77" />
                                            </div>
                                            <div class="list_right">
                                                <h4>Exclusive interior</h4>
                                                <div class="desc">
                                                    Nullam interdum pellentesque orci at luctus. Vivamus scelerisque purus et auctor iaculis. Curabitur molestie ut neque non egestas. Nulla et tempor nibh, et sed. Vestibulum lacinia erat non nibh feugiat dignis.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_list ">
                                        <div class="list_item lists_2 clearfix">
                                            <div class="list_left list_image"><img src="<?= $baseUrl;?>/images/home_hotel2_icon2.png" alt="Sea view" class="scale-with-grid" width="77" height="77" />
                                            </div>
                                            <div class="list_right">
                                                <h4>Sea view</h4>
                                                <div class="desc">
                                                    Fusce elit orci; condimentum at erat a, fermentum interdum ex. Fusce finibus volutpat rutrum. Pellentesque elementum rutrum leo sed dictum. Maecenas in erat id fringilla nunc vel ipsum massa nunc.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_list ">
                                        <div class="list_item lists_2 clearfix">
                                            <div class="list_left list_image"><img src="<?= $baseUrl;?>/images/home_hotel2_icon3.png" alt="Fitness, wellness and spa" class="scale-with-grid" width="77" height="77" />
                                            </div>
                                            <div class="list_right">
                                                <h4>Fitness, wellness and spa</h4>
                                                <div class="desc">
                                                    Vivamus sapien velit, porttitor sed metus a; viverra porttitor mauris. Pellentesque in lectus pharetra, malesuada purus et, ultricies elit. Integer feugiat sed sit amet justo dictum ornare sed amet.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_list ">
                                        <div class="list_item lists_2 clearfix">
                                            <div class="list_left list_image"><img src="<?= $baseUrl;?>/images/home_hotel2_icon4.png" alt="Free Wi-Fi" class="scale-with-grid" width="77" height="77" />
                                            </div>
                                            <div class="list_right">
                                                <h4>Free Wi-Fi</h4>
                                                <div class="desc">
                                                    Suspendisse eget dapibus dolor? Aenean consectetur ex et metus convallis pharetra. Nullam nunc lorem; semper at leo non, mollis pulvinar orci! Aliquam volutpat blandit sapien ac odio cras amet.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_list ">
                                        <div class="list_item lists_2 clearfix">
                                            <div class="list_left list_image"><img src="<?= $baseUrl;?>/images/home_hotel2_icon5.png" alt="490m2 of swimming pool" class="scale-with-grid" width="77" height="77" />
                                            </div>
                                            <div class="list_right">
                                                <h4>490m2 of swimming pool</h4>
                                                <div class="desc">
                                                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus aliquam arcu ut tellus dignissim, eu auctor lectus amet. In feugiat, mi et maximus semper, neque elit auctor.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_list ">
                                        <div class="list_item lists_2 clearfix">
                                            <div class="list_left list_image"><img src="<?= $baseUrl;?>/images/home_hotel2_icon6.png" alt="Bar and restaurant" class="scale-with-grid" width="77" height="77" />
                                            </div>
                                            <div class="list_right">
                                                <h4>Bar and restaurant</h4>
                                                <div class="desc">
                                                    Nulla a feugiat ante, ac suscipit dolor. Morbi et tortor viverra, tincidunt urna in, luctus purus. Vestibulum dignissim diam id ipsum faucibus, in commodo amet. Nunc pellentesque id leo posuere.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                <form id="contactform_booking">
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>Name</label><span class="wpcf7-form-control-wrap name">
																<input type="text" id="name" name="name" value="" size="40" aria-required="true" aria-invalid="false" />
															</span>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>Surname</label><span class="wpcf7-form-control-wrap surname">
																<input type="text" id="surname" name="surname" value="" size="40" aria-required="true" aria-invalid="false" />
															</span>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>E-mail</label><span class="wpcf7-form-control-wrap email">
																<input type="email" id="email" name="email" value="" size="40"  aria-required="true" aria-invalid="false" />
															</span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>Arrival</label><span class="wpcf7-form-control-wrap arrival">
																<input type="text" id="arrival" name="arrival" value="" size="40"  aria-required="true" placeholder="mm/dd/yy" />
															</span>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>Departure</label><span class="wpcf7-form-control-wrap departure">
																<input type="text"  id="departure" name="departure" value="" size="40"  aria-required="true" placeholder="mm/dd/yy" />
															</span>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>Room type</label><span class="wpcf7-form-control-wrap room">
																<select name="room"  id="room"  aria-invalid="false">
																	<option value="Exclusive room">Exclusive room</option><option value="Family room">Family room</option><option value="Panoramic room">Panoramic room</option><option value="Daily room">Daily room</option>
																</select></span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>Adults<span class="wpcf7-form-control-wrap adults">
																	<select name="adults"  id="adults"  aria-required="true" aria-invalid="false">
																		<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
																	</select></span>
                                                        </label>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>Children<span class="wpcf7-form-control-wrap children">
																	<select name="children"  id="children"  aria-required="true" aria-invalid="false">
																		<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
																	</select></span>
                                                        </label>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>Rooms<span class="wpcf7-form-control-wrap rooms">
																	<select name="rooms"  id="rooms" aria-required="true" aria-invalid="false">
																		<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
																	</select></span>
                                                        </label>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="column one">
                                                        <label>Message</label><span class="wpcf7-form-control-wrap message"> <textarea name="message"  id="body" cols="40" rows="5"  aria-invalid="false"></textarea></span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="column one" style="text-align: center;">
                                                        <input type="button" id="submit" onClick="return check_values_booking();" value="Book your room now" />
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr align_center">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exommodo consequat.
                                            </p>
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
                                                <a href="content/hotel2/booking.html">
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
                                                <a href="content/hotel2/rooms.html">
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