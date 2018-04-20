<?php
use yii\web\View;
use common\components\MediaHelper;

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
                                                <?= $total_rooms?>
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
								<?php foreach($room_type_models as $key => $room_type){?>
									<?php if($key != 0 && $key % 2 == 0){?>
										<div class="wrap mcb-wrap divider clearfix" style="padding:0 1%; "></div>
									<?php }?>
									<div class="wrap mcb-wrap one-second clearfix" style="padding:0 1%; ">
										<!-- One Full Row-->
										<div class="column mcb-column one column_image ">
											<div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
												<div class="image_wrapper"><img class="scale-with-grid" src="<?= ($room_type->coverImage?MediaHelper::getImageUrl($room_type->coverImage->file_name):$baseUrl.'/images/home_hotel2_room1.jpg')?>" alt="" width="700" height="485" />
												</div>
											</div>
										</div>
										<!-- One Full Row-->
										<div class="column mcb-column one column_column column-margin-0px">
											<div class="column_attr align_center">
												<h4 class="themecolor">&#8377;<?= $room_type->charges;?>/night</h4>
												<h3><?= $room_type->name;?></h3>
												<p class="big"><?= $room_type->description;?></p>
											</div>
										</div>
										<!-- One Third (1/3) Column -->
										<div class="column mcb-column one-third column_quick_fact ">
											<!-- Counter area-->
											<div class="quick_fact animate-math">
												<div class="number-wrapper">
													<span class="number" data-to="<?= $room_type->occupancy;?>"><?= $room_type->occupancy;?></span>
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
													<span class="number" data-to="<?= $room_type->beds;?>"><?= $room_type->beds;?></span>
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
													<span class="number" data-to="<?= count($room_type->rooms);?>"><?= count($room_type->rooms);?></span>
												</div>
												<h3 class="title">Rooms</h3>
												<hr class="hr_narrow" />
												<div class="desc"></div>
											</div>
										</div>
									</div>
								<?php }?>
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