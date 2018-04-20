<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$user = Yii::$app->user;
$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;

$this->title = $name;
$this->params['subheader'] = '<div id="Subheader" style="padding:190px 0 100px;">
                <div class="container">
                    <div class="column one">
                        <h1 class="title">'.$this->title.'</h1>
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
                                            <h2><?= Html::encode($this->title) ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap three-fifth clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr">
                                            <div style="border-left: 1px solid #c2c2c2; padding: 15px 0 5px 7%;">
                                                <h4><?= nl2br(Html::encode($message)) ?></h4>
												<p>
													The above error occurred while the Web server was processing your request.
												</p>
												<p>
													Please contact us if you think this is a server error. Thank you.
												</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>