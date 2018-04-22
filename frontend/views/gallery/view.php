<?php
use yii\web\View;
use common\components\MediaHelper;

$user = Yii::$app->user;
$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;

$this->title = $model->name;
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
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr align_center">

                                            <!-- Image Gallery-->
                                            <div id='gallery-2' class='gallery galleryid-32 gallery-columns-3 gallery-size-full file isotope'>
                                                <!-- Gallery item -->
												<?php foreach($model->galleryMedia as $galleryMedia){?>
													<dl class='gallery-item'>
														<dt class='gallery-icon portrait'>
																<a href='<?= MediaHelper::getImageUrl(($galleryMedia->media?$galleryMedia->media->file_name:''))?>'><img width="700" src="<?= MediaHelper::getImageUrl(($galleryMedia->media?$galleryMedia->media->file_name:''))?>" class="attachment-full" alt="home_hotel2_gallery2" /></a>
															</dt>
														<dd></dd>
													</dl>
												<?php }?>
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
                                            <h2>Maecenas nec felis est
												<br>
												nunc efficitur</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap three-fifth clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr">
                                            <div style="border-left: 1px solid #c2c2c2; padding: 15px 0 5px 7%;">
                                                <h4>Duis eu dictum erat. Integer luctus lacus eget ante pharetra venenatis. Maecenas iaculis blandit sem a tincidunt. Sed in luctus magna, at rutrum orci cras amet. In cursus, tellus nec eleifend dapibus, sem posuere. In tincidunt; tellus ac hendrerit pretium, urna libero malesuada eros, vestibulum sagittis quam magna ac velit.</h4>
                                                <p>
                                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodm aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam vfugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem apeluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.
                                                </p>
                                                <p>
                                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodm aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam vfugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem apeluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.
                                                </p>
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