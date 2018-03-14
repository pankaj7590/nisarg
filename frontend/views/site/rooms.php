<?php
use yii\web\View;
$user = Yii::$app->user;
$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;

$this->title = 'Rooms';
$this->params['subheader'] = '<div id="Subheader" style="padding:190px 0 100px;">
                <div class="container">
                    <div class="column one">
                        <h1 class="title">Find a room for you</h1>
                    </div>
                </div>
            </div>';
?>
                        <div class="section mcb-section " style="padding-top:70px; padding-bottom:30px; background-image:url(<?= $baseUrl;?>/images/home_hotel2_pattern.png); background-repeat:repeat; background-position:center; ">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr align_center">
                                            <p class="themecolor" style="font-size: 60px; line-height: 60px;">
                                                60
                                            </p>
                                            <hr class="no_line hrmargin_b_15">
                                            <h2>High standard rooms in total</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section " style="padding-top:70px; padding-bottom:20px; ">
                            <div class="section_wrapper mcb-section-inner">
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix" style="padding:0 1%; ">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_image ">
                                        <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                                            <div class="image_wrapper"><img class="scale-with-grid" src="<?= $baseUrl;?>/images/home_hotel2_room1.jpg" alt="" width="700" height="485" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column column-margin-0px">
                                        <div class="column_attr align_center">
                                            <h4 class="themecolor">$219/night</h4>
                                            <h3>Exclusive room</h3>
                                            <p class="big">
                                                Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut et nunc at nibh egestas ultrices dictum a dolor? Quisque turpis duis. Nam vitae iaculis lorem. Donec placerat.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_quick_fact ">
                                        <!-- Counter area-->
                                        <div class="quick_fact animate-math">
                                            <div class="number-wrapper">
                                                <span class="number" data-to="2">2</span>
                                            </div>
                                            <h3 class="title">Occupancy</h3>
                                            <hr class="hr_narrow" />
                                            <div class="desc"></div>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_quick_fact ">
                                        <!-- Counter area-->
                                        <div class="quick_fact animate-math">
                                            <div class="number-wrapper">
                                                <span class="number" data-to="1">1</span>
                                            </div>
                                            <h3 class="title">Bed</h3>
                                            <hr class="hr_narrow" />
                                            <div class="desc"></div>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_quick_fact ">
                                        <!-- Counter area-->
                                        <div class="quick_fact animate-math">
                                            <div class="number-wrapper">
                                                <span class="number" data-to="14">14</span>
                                            </div>
                                            <h3 class="title">Rooms</h3>
                                            <hr class="hr_narrow" />
                                            <div class="desc"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix" style="padding:0 1%; ">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_image ">
                                        <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                                            <div class="image_wrapper"><img class="scale-with-grid" src="<?= $baseUrl;?>/images/home_hotel2_room2.jpg" alt="" width="700" height="485" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column column-margin-0px">
                                        <div class="column_attr align_center">
                                            <h4 class="themecolor">$299/night</h4>
                                            <h3>Family room</h3>
                                            <p class="big">
                                                Nullam sed ullamcorper urna? Donec aliquet dolor felis, sed auctor nunc sollicitudin et. Donec ornare nulla leo, molestie laoreet orci efficitur facilisis amet. Magna vel leo imperdiet sagittis. Fusce vulputate.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_quick_fact ">
                                        <!-- Counter area-->
                                        <div class="quick_fact animate-math">
                                            <div class="number-wrapper">
                                                <span class="number" data-to="6">6</span>
                                            </div>
                                            <h3 class="title">Occupancy</h3>
                                            <hr class="hr_narrow" />
                                            <div class="desc"></div>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_quick_fact ">
                                        <!-- Counter area-->
                                        <div class="quick_fact animate-math">
                                            <div class="number-wrapper">
                                                <span class="number" data-to="4">4</span>
                                            </div>
                                            <h3 class="title">Bed</h3>
                                            <hr class="hr_narrow" />
                                            <div class="desc"></div>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_quick_fact ">
                                        <!-- Counter area-->
                                        <div class="quick_fact animate-math">
                                            <div class="number-wrapper">
                                                <span class="number" data-to="20">20</span>
                                            </div>
                                            <h3 class="title">Rooms</h3>
                                            <hr class="hr_narrow" />
                                            <div class="desc"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap divider clearfix" style="padding:0 1%; "></div>
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix" style="padding:0 1%; ">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_image ">
                                        <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                                            <div class="image_wrapper"><img class="scale-with-grid" src="<?= $baseUrl;?>/images/home_hotel2_room3.jpg" alt="" width="700" height="485" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column column-margin-0px">
                                        <div class="column_attr align_center">
                                            <h4 class="themecolor">$349/night</h4>
                                            <h3>Panoramic room</h3>
                                            <p class="big">
                                                Curabitur fermentum luctus ipsum. Aenean sed porta ipsum, eget dignissim metus. Integer tincidunt at ante at dapibus. Etiam tempus justo vel velit iaculis amet. Quam vel leo viverra auctor. Cras ullam.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_quick_fact ">
                                        <!-- Counter area-->
                                        <div class="quick_fact animate-math">
                                            <div class="number-wrapper">
                                                <span class="number" data-to="5">5</span>
                                            </div>
                                            <h3 class="title">Occupancy</h3>
                                            <hr class="hr_narrow" />
                                            <div class="desc"></div>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_quick_fact ">
                                        <!-- Counter area-->
                                        <div class="quick_fact animate-math">
                                            <div class="number-wrapper">
                                                <span class="number" data-to="4">4</span>
                                            </div>
                                            <h3 class="title">Bed</h3>
                                            <hr class="hr_narrow" />
                                            <div class="desc"></div>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_quick_fact ">
                                        <!-- Counter area-->
                                        <div class="quick_fact animate-math">
                                            <div class="number-wrapper">
                                                <span class="number" data-to="14">14</span>
                                            </div>
                                            <h3 class="title">Rooms</h3>
                                            <hr class="hr_narrow" />
                                            <div class="desc"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix" style="padding:0 1%; ">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_image ">
                                        <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                                            <div class="image_wrapper"><img class="scale-with-grid" src="<?= $baseUrl;?>/images/home_hotel2_room4.jpg" alt="" width="700" height="485" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column column-margin-0px">
                                        <div class="column_attr align_center">
                                            <h4 class="themecolor">$119/night</h4>
                                            <h3>Daily room</h3>
                                            <p class="big">
                                                Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut et nunc at nibh egestas ultrices dictum a dolor? Quisque turpis duis. Corper quam non ipsum volutpat.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_quick_fact ">
                                        <!-- Counter area-->
                                        <div class="quick_fact animate-math">
                                            <div class="number-wrapper">
                                                <span class="number" data-to="4">4</span>
                                            </div>
                                            <h3 class="title">Occupancy</h3>
                                            <hr class="hr_narrow" />
                                            <div class="desc"></div>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_quick_fact ">
                                        <!-- Counter area-->
                                        <div class="quick_fact animate-math">
                                            <div class="number-wrapper">
                                                <span class="number" data-to="2">2</span>
                                            </div>
                                            <h3 class="title">Bed</h3>
                                            <hr class="hr_narrow" />
                                            <div class="desc"></div>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_quick_fact ">
                                        <!-- Counter area-->
                                        <div class="quick_fact animate-math">
                                            <div class="number-wrapper">
                                                <span class="number" data-to="8">8</span>
                                            </div>
                                            <h3 class="title">Rooms</h3>
                                            <hr class="hr_narrow" />
                                            <div class="desc"></div>
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