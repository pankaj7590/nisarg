<?php
use yii\web\View;
$user = Yii::$app->user;
$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;

$this->title = 'Booking';
$this->params['subheader'] = '<div id="Subheader" style="padding:190px 0 100px;">
                <div class="container">
                    <div class="column one">
                        <h1 class="title">Book your room today</h1>
                    </div>
                </div>
            </div>';
?>
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
                                        <div class="column_attr align_right" style=" padding:10px 5% 0 0;">
                                            <h2>BeHotel 2</h2>
                                            <h4>Consectetur adipisicing elit sed do eiusmod
												<br>
												tempor incididunt ut labore dolore magna</h4>
                                            <p class="big">
                                                Ut nec mollis ipsum. Sed quis magna commodo, eleifend est interdum, tristique massa. Cras eget tempor massa, non euismod eros.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr">
                                            <div style="border-left: 1px solid #c2c2c2; padding: 15px 0 5px 7%;">
                                                <h4>Level 13, 2 Elizabeth St,
													<br>
													Melbourne, Victoria 3000
													<br>
													Australia</h4>
                                                <hr class="no_line hrmargin_b_30" />
                                                <p class="hrmargin_0 big">
                                                    Call us:
                                                </p>
                                                <h3 class="themecolor">+61 (0) 3 8376 6284</h3>
                                                <hr class="no_line hrmargin_b_30" />
                                                <p class="hrmargin_0 big">
                                                    Email:
                                                </p>
                                                <h3 class="themecolor">noreply@envato.com</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section dark " style="padding-top:70px; padding-bottom:40px; background-image:url(images/home_hotel2_booking_bg.jpg); background-repeat:no-repeat; background-position:center; ">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one-sixth clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_placeholder">
                                        <div class="placeholder">
                                            &nbsp;
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap two-third clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr align_center">
                                            <h2>Book a room</h2>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr">
                                            <div role="form" class="wpcf7" id="wpcf7-f80-p34-o1" lang="en-US" dir="ltr">
                                                <div class="screen-reader-response"></div>
                                                <form action="#">
                                                    <div style="display: none;">
                                                        <input type="hidden" name="_wpcf7" value="80" />
                                                        <input type="hidden" name="_wpcf7_version" value="4.3.1" />
                                                        <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f80-p34-o1" />
                                                        <input type="hidden" name="_wpnonce" value="e603c78acb" />
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>Name</label><span class="wpcf7-form-control-wrap your-name">
																<input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" />
															</span>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>Surname</label><span class="wpcf7-form-control-wrap your-surname">
																<input type="text" name="your-surname" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" />
															</span>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>E-mail</label><span class="wpcf7-form-control-wrap your-email">
																<input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" />
															</span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>Arrival</label><span class="wpcf7-form-control-wrap arrival">
																<input type="text" name="arrival" value="" size="40" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required" aria-required="true" placeholder="mm/dd/yy" />
															</span>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>Departure</label><span class="wpcf7-form-control-wrap departure">
																<input type="text" name="departure" value="" size="40" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required" aria-required="true" placeholder="mm/dd/yy" />
															</span>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>Room type</label><span class="wpcf7-form-control-wrap room">
																<select name="room" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
																	<option value="Exclusive room">Exclusive room</option><option value="Family room">Family room</option><option value="Panoramic room">Panoramic room</option><option value="Daily room">Daily room</option>
																</select></span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>Adults<span class="wpcf7-form-control-wrap adults">
																	<select name="adults" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
																		<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
																	</select></span>
                                                        </label>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>Children<span class="wpcf7-form-control-wrap children">
																	<select name="children" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
																		<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
																	</select></span>
                                                        </label>
                                                    </div>
                                                    <!-- One Third (1/3) Column -->
                                                    <div class="column one-third">
                                                        <label>Rooms<span class="wpcf7-form-control-wrap rooms">
																	<select name="rooms" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
																		<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
																	</select></span>
                                                        </label>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="column one">
                                                        <label>Message</label><span class="wpcf7-form-control-wrap your-message"> 																<textarea name="your-message" cols="40" rows="5" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="column one" style="text-align: center;">
                                                        <input type="submit" value="Book your room now" class="wpcf7-form-control wpcf7-submit" />
                                                    </div>
                                                    <div class="wpcf7-response-output wpcf7-display-none"></div>
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
                                                <a href="#">
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
                                                <a href="#">
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
	$this->registerJsFile('http://maps.google.com/maps/api/js?sensor=false&ver=5.9');
	$this->registerJs('
        function google_maps_566008f9ece90() {
            var latlng = new google.maps.LatLng(-33.8710, 151.2039);
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
                icon: "images/home_hotel2_pin.png",
                map: map
            });
        }


        jQuery(document).ready(function($) {
            google_maps_566008f9ece90();
        });
	', View::POS_READY, "map-location");
?>