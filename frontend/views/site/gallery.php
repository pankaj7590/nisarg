<?php
use yii\web\View;
use common\components\MediaHelper;

$user = Yii::$app->user;
$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;

$this->title = 'Gallery';
$this->params['subheader'] = '<div id="Subheader" style="padding:190px 0 100px;">
                <div class="container">
                    <div class="column one">
                        <h1 class="title">Image gallery</h1>
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
												<?php foreach($dataProvider->getModels() as $gallery){?>
													<dl class='gallery-item'>
														<dt class='gallery-icon portrait'>
																<a href='<?= MediaHelper::getImageUrl(($gallery->firstImage?$gallery->firstImage->media->file_name:''))?>'>
																	<img width="700" src="<?= MediaHelper::getImageUrl(($gallery->firstImage?$gallery->firstImage->media->file_name:''))?>" class="attachment-full" alt="home_hotel2_gallery2" />
																</a>
														</dt>
														<dd>
															<a href='<?= $urlManager->createAbsoluteUrl(['gallery/view', 'id' => $gallery->id])?>'>
																<?= $gallery->name;?>
															</a>
														</dd>
													</dl>
												<?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?= $this->render('../layouts/_subfooter');?>
                        <div class="section the_content no_content">
                            <div class="section_wrapper">
                                <div class="the_content_wrapper"></div>
                            </div>
                        </div>