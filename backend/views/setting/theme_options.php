<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use common\components\MediaHelper;
use common\models\Media;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Theme Options';
$this->params['breadcrumbs'][] = $this->title;
$urlManager = Yii::$app->urlManager;
?>
<div class="row">
	<div class="col-lg-12">
				<div class="panel-group" id="accordion">
					<form id="theme-options-form" method="post" enctype="multipart/form-data">
						<input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#headerContent">Header</a>
								</h4>
							</div>
							<div id="headerContent" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="row">
										<?php 
											$menu_bar_logo = $headerOptions['menu_bar_logo'];
											
											echo '<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">';
												if($menu_bar_logo->media){
													echo "<div class='setting-media-container'>";
														echo "<img src='".MediaHelper::getImageUrl($menu_bar_logo->media->file_name)."' width='100px'>";
													echo "</div>";
												}
												echo '<label class="control-label" for="themeoption-menu_bar_logo">Logo</label>';
												echo '<input type="file" id="themeoption-menu_bar_logo" name="menu_bar_logo">';
											echo '</div>';
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#socialContent">Social</a>
								</h4>
							</div>
							<div id="socialContent" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="row">
										<?php 
											$facebook = $headerOptions['facebook']['value'];
											$twitter = $headerOptions['twitter']['value'];
											$gplus = $headerOptions['gplus']['value'];
											$pinterest = $headerOptions['pinterest']['value'];
											$instagram = $headerOptions['instagram']['value'];
											
											echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
												echo '<label class="control-label" for="themeoption-twitter">Twitter</label>';
												echo '<input type="text" id="themeoption-twitter" class="form-control" name="twitter" value="'.$twitter.'"/>';
												echo '<label class="control-label" for="themeoption-facebook">Facebook</label>';
												echo '<input type="text" id="themeoption-facebook" class="form-control" name="facebook" value="'.$facebook.'">';
											echo '</div>';
											echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
												echo '<label class="control-label" for="themeoption-gplus">G+</label>';
												echo '<input type="text" id="themeoption-gplus" class="form-control" name="gplus" value="'.$gplus.'">';
												echo '<label class="control-label" for="themeoption-pinterest">Pinterest</label>';
												echo '<input type="text" id="themeoption-pinterest" class="form-control" name="pinterest" value="'.$pinterest.'"/>';
											echo '</div>';
											echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
												echo '<label class="control-label" for="themeoption-instagram">Instagram</label>';
												echo '<input type="text" id="themeoption-instagram" class="form-control" name="instagram" value="'.$instagram.'">';
											echo '</div>';
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#footerContent">Footer</a>
								</h4>
							</div>
							<div id="footerContent" class="panel-collapse collapse">
								<div class="panel-body">
									<?php 
										$footer_icon = $footerOptions['footer_icon'];
										$footer_copyright = $footerOptions['footer_copyright']['value'];
										echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
											if($footer_icon->media){
												echo "<div class='setting-media-container'>";
													echo "<img src='".MediaHelper::getImageUrl($footer_icon->media->file_name)."' width='100px'>";
												echo "</div>";
											}
											echo '<label class="control-label" for="themeoption-footer_icon">Icon</label>';
											echo '<input type="file" id="themeoption-footer_icon" name="footer_icon">';
											echo '<label class="control-label" for="themeoption-footer_copyright">Copyright</label>';
											echo '<input type="text" id="themeoption-footer_copyright" class="form-control" name="footer_copyright" value="'.$footer_copyright.'">';
										echo '</div>';
									?>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#homePage">Home Page</a>
								</h4>
							</div>
							<div id="homePage" class="panel-collapse collapse">
								<div class="panel-body">
									<?php 
										$slider_images = $homePageOptions['slider_images'];
										$slider_text = $homePageOptions['slider_text']['value'];
										$home_page_content = $homePageOptions['home_page_content']['value'];
										
										if($slider_images->value){
											$logos = json_decode($slider_images->value);
											foreach($logos as $logo){
												echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
													$logoModel = Media::findOne($logo);
													if($logoModel){
														echo "<div class='setting-media-container mt20 float-left'>";
															echo "<img src='".MediaHelper::getImageUrl($logoModel->file_name)."' width='100%'>";
														echo "</div>";
													}
												echo '</div>';
											}
											echo "<div class='clearfix'></div>";
										}
										echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
											echo '<label class="control-label" for="themeoption-slider_images">Slider Images</label>';
											echo '<input type="file" id="themeoption-slider_images" name="slider_images[]" multiple/>';
										echo '</div>';
										echo '<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">';
											echo '<label class="control-label" for="themeoption-slider_text">Title</label>';
											echo '<input type="text" id="themeoption-slider_text" class="form-control" name="slider_text" value="'.$slider_text.'"/>';
										echo '</div>';
										
										//feature section
										echo '<div class="mt10 col-lg-12 col-sm-12 col-md-12 col-xs-12"><h2>Feature Image Section</h2></div>';
										for($i=1;$i<=3;$i++){
											$feature_image = $homePageOptions['feature_image_'.$i];
											$feature_title = $homePageOptions['feature_title_'.$i]['value'];
											echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
												if($feature_image->value){
													echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
														$mediaModel = Media::findOne($feature_image->value);
														if($mediaModel){
															echo "<div class='setting-media-container mt20 float-left'>";
																echo "<img src='".MediaHelper::getImageUrl($mediaModel->file_name)."' width='100%'>";
															echo "</div>";
														}
													echo '</div>';
													echo "<div class='clearfix'></div>";
												}
												echo '<label class="control-label" for="themeoption-feature_image_'.$i.'">Feature Image '.$i.'</label>';
												echo '<input type="file" id="themeoption-feature_image_'.$i.'" name="feature_image_'.$i.'"/>';
												
												echo '<label class="control-label" for="themeoption-feature_title_'.$i.'">Title</label>';
												echo '<input type="text" id="themeoption-feature_title_'.$i.'" class="form-control" name="feature_title_'.$i.'" value="'.$feature_title.'"/>';
											echo '</div>';
										}
										
										//welcome section
										echo '<div class="mt10 col-lg-12 col-sm-12 col-md-12 col-xs-12"><h2>Welcome Section</h2></div>';
										$welcome_title = $homePageOptions['welcome_title']['value'];
										$welcome_subtitle = $homePageOptions['welcome_subtitle']['value'];
										$welcome_button_text = $homePageOptions['welcome_button_text']['value'];
										$welcome_button_link = $homePageOptions['welcome_button_link']['value'];
										$welcome_content = $homePageOptions['welcome_content']['value'];
										echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
											echo '<label class="control-label" for="themeoption-welcome_title">Title</label>';
											echo '<input type="text" id="themeoption-welcome_title" class="form-control" name="welcome_title" value="'.$welcome_title.'"/>';
											echo '<label class="control-label" for="themeoption-welcome_subtitle">Sub Title</label>';
											echo '<input type="text" id="themeoption-welcome_subtitle" class="form-control" name="welcome_subtitle" value="'.$welcome_subtitle.'"/>';
											echo '<label class="control-label" for="themeoption-welcome_button_text">Button Text</label>';
											echo '<input type="text" id="themeoption-welcome_button_text" class="form-control" name="welcome_button_text" value="'.$welcome_button_text.'"/>';
											echo '<label class="control-label" for="themeoption-welcome_button_link">Button Link</label>';
											echo '<input type="text" id="themeoption-welcome_button_link" class="form-control" name="welcome_button_link" value="'.$welcome_button_link.'"/>';
										echo '</div>';
										echo '<div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">';
											echo '<label class="control-label" for="themeoption-welcome_content">Content</label>';
											echo '<textarea rows="10" id="themeoption-welcome_content" class="form-control" name="welcome_content">'.$welcome_content.'</textarea>';
										echo '</div>';
										
										//localization section
										echo '<div class="mt10 col-lg-12 col-sm-12 col-md-12 col-xs-12"><h2>Localization Section</h2></div>';
										$localization_title = $homePageOptions['localization_title']['value'];
										$localization_images = $homePageOptions['localization_images'];
										echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
											echo '<label class="control-label" for="themeoption-localization_title">Title</label>';
											echo '<input type="text" id="themeoption-localization_title" class="form-control" name="localization_title" value="'.$localization_title.'"/>';
										echo '</div>';
										echo "<div class='clearfix'></div>";
										echo '<div class="mt10 col-lg-12 col-sm-12 col-md-12 col-xs-12">';
											if($localization_images->value){
												$images = json_decode($localization_images->value);
												foreach($images as $image){
													echo '<div class="col-lg-2 col-sm-12 col-md-2 col-xs-12">';
														$imageModel = Media::findOne($image);
														if($imageModel){
															echo "<div class='setting-media-container mt20 float-left'>";
																echo "<img src='".MediaHelper::getImageUrl($imageModel->file_name)."' width='100%'>";
															echo "</div>";
														}
													echo '</div>';
												}
												echo "<div class='clearfix'></div>";
											}
										echo '</div>';
										echo '<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">';
											echo '<label class="control-label" for="themeoption-localization_images">Images</label>';
											echo '<input type="file" id="themeoption-localization_images" name="localization_images[]" multiple/>';
										echo '</div>';
										
										//services section
										echo '<div class="mt10 col-lg-12 col-sm-12 col-md-12 col-xs-12"><h2>Services Section</h2></div>';
										$services_title = $homePageOptions['services_title']['value'];
										$services_content = $homePageOptions['services_content']['value'];
										echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
											echo '<label class="control-label" for="themeoption-services_title">Title</label>';
											echo '<input type="text" id="themeoption-services_title" class="form-control" name="services_title" value="'.$services_title.'"/>';
										echo '</div>';
										echo '<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">';
											echo '<label class="control-label" for="themeoption-services_content">Content</label>';
											echo '<textarea id="themeoption-services_content" class="form-control" name="services_content">'.$services_content.'"</textarea>';
										echo '</div>';
										
										for($i=1;$i<=6;$i++){
											$service_icon = $homePageOptions['service_icon_'.$i];
											$service_title = $homePageOptions['service_title_'.$i]['value'];
											$service_content = $homePageOptions['service_content_'.$i]['value'];
											echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
												if($service_icon->media){
													echo "<div class='setting-media-container'>";
														echo "<img src='".MediaHelper::getImageUrl($service_icon->media->file_name)."' width='100px'>";
													echo "</div>";
												}
												echo '<label class="control-label" for="themeoption-service_icon_'.$i.'">Service Icon '.$i.'</label>';
												echo '<input type="file" id="themeoption-service_icon_'.$i.'" name="service_icon_'.$i.'"/>';
												
												echo '<label class="control-label" for="themeoption-service_title_'.$i.'">Title</label>';
												echo '<input type="text" id="themeoption-service_title_'.$i.'" class="form-control" name="service_title_'.$i.'" value="'.$service_title.'"/>';
												
												echo '<label class="control-label" for="themeoption-service_content_'.$i.'">Content</label>';
												echo '<textarea id="themeoption-service_content_'.$i.'" class="form-control" name="service_content_'.$i.'">'.$service_content.'"</textarea>';
											echo '</div>';
										}
										
										//book a room section
										echo '<div class="mt10 col-lg-12 col-sm-12 col-md-12 col-xs-12"><h2>Book A Room Section Content</h2></div>';
										$book_a_room_section_content = $homePageOptions['book_a_room_section_content']['value'];
										echo '<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">';
											echo '<label class="control-label" for="themeoption-book_a_room_section_content">Content</label>';
											echo '<textarea id="themeoption-book_a_room_section_content" class="form-control" name="book_a_room_section_content">'.$book_a_room_section_content.'"</textarea>';
										echo '</div>';
										
										//Map section
										echo '<div class="mt10 col-lg-12 col-sm-12 col-md-12 col-xs-12"><h2>Map Section</h2></div>';
										$map_address = $homePageOptions['map_address']['value'];
										$map_address_marker = $homePageOptions['map_address_marker'];
										echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
											echo '<label class="control-label" for="themeoption-map_address">Coordinates</label>';
											echo '<input type="text" id="themeoption-map_address" class="form-control" name="map_address" value="'.$map_address.'"/>';
										echo '</div>';
										echo '<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">';
											if($map_address_marker->media){
												echo "<div class='setting-media-container'>";
													echo "<img src='".MediaHelper::getImageUrl($map_address_marker->media->file_name)."' width='100px'>";
												echo "</div>";
											}
											echo '<label class="control-label" for="themeoption-map_address_marker">Marker Icon</label>';
											echo '<input type="file" id="themeoption-map_address_marker" name="map_address_marker">';
										echo '</div>';
										
										//Contact section
										echo '<div class="mt10 col-lg-12 col-sm-12 col-md-12 col-xs-12"><h2>Contact Section</h2></div>';
										$address = $homePageOptions['address']['value'];
										$phone = $homePageOptions['phone']['value'];
										$email = $homePageOptions['email']['value'];
										echo '<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">';
											echo '<label class="control-label" for="themeoption-address">Address</label>';
											echo '<textarea id="themeoption-address" class="form-control" name="address">'.$address.'"</textarea>';
										echo '</div>';
										echo '<div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">';
											echo '<label class="control-label" for="themeoption-phone">Phone</label>';
											echo '<input type="text" id="themeoption-phone" class="form-control" name="phone" value="'.$phone.'"/>';
										echo '</div>';
										echo '<div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">';
											echo '<label class="control-label" for="themeoption-email">Phone</label>';
											echo '<input type="text" id="themeoption-email" class="form-control" name="email" value="'.$email.'"/>';
										echo '</div>';
									?>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#aboutPage">About Page</a>
								</h4>
							</div>
							<div id="aboutPage" class="panel-collapse collapse">
								<div class="panel-body">
									<?php 
										$about_title = $aboutPageOptions['about_title']['value'];
										$about_page_content_title = $aboutPageOptions['about_page_content_title']['value'];
										$about_page_content_subtitle = $aboutPageOptions['about_page_content_subtitle']['value'];
										$about_page_content_content = $aboutPageOptions['about_page_content_content']['value'];
										$about_page_image_1 = $aboutPageOptions['about_page_image_1'];
										$about_page_image_2 = $aboutPageOptions['about_page_image_2'];
										$about_page_second_section_icon = $aboutPageOptions['about_page_second_section_icon'];
										$about_page_second_section_title = $aboutPageOptions['about_page_second_section_title']['value'];
										$about_page_second_section_subtitle = $aboutPageOptions['about_page_second_section_subtitle']['value'];
										$about_page_second_section_content = $aboutPageOptions['about_page_second_section_content']['value'];
										
										echo '<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">';
											echo '<label class="control-label" for="themeoption-about_title">Main Title</label>';
											echo '<input type="text" id="themeoption-about_title" class="form-control" name="about_title" value="'.$about_title.'"/>';
										echo '</div>';
										echo '<div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">';
											echo '<label class="control-label" for="themeoption-about_page_content_title">Title</label>';
											echo '<input type="text" id="themeoption-about_page_content_title" class="form-control" name="about_page_content_title" value="'.$about_page_content_title.'"/>';
										echo '</div>';
										echo '<div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">';
											echo '<label class="control-label" for="themeoption-about_page_content_subtitle">Sub Title</label>';
											echo '<input type="text" id="themeoption-about_page_content_subtitle" class="form-control" name="about_page_content_subtitle" value="'.$about_page_content_subtitle.'"/>';
										echo '</div>';
										echo '<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">';
											echo '<label class="control-label" for="themeoption-about_page_content_content">Content</label>';
											echo '<textarea id="themeoption-about_page_content_content" class="form-control" name="about_page_content_content" rows="5">'.$about_page_content_content.'</textarea>';
										echo '</div>';
										echo '<div class="mt10 col-lg-6 col-sm-12 col-md-6 col-xs-12">';
											if($about_page_image_1->media){
												echo "<div class='setting-media-container'>";
													echo "<img src='".MediaHelper::getImageUrl($about_page_image_1->media->file_name)."' width='100px'>";
												echo "</div>";
											}
											echo '<label class="control-label" for="themeoption-about_page_image_1">Image 1</label>';
											echo '<input type="file" id="themeoption-about_page_image_1" name="about_page_image_1">';
										echo '</div>';
										echo '<div class="mt10 col-lg-6 col-sm-12 col-md-6 col-xs-12">';
											if($about_page_image_2->media){
												echo "<div class='setting-media-container'>";
													echo "<img src='".MediaHelper::getImageUrl($about_page_image_2->media->file_name)."' width='100px'>";
												echo "</div>";
											}
											echo '<label class="control-label" for="themeoption-about_page_image_2">Image 2</label>';
											echo '<input type="file" id="themeoption-about_page_image_2" name="about_page_image_2">';
										echo '</div>';
										echo '<div class="mt10 col-lg-12 col-sm-12 col-md-12 col-xs-12">';
											if($about_page_second_section_icon->media){
												echo "<div class='setting-media-container'>";
													echo "<img src='".MediaHelper::getImageUrl($about_page_second_section_icon->media->file_name)."' width='100px'>";
												echo "</div>";
											}
											echo '<label class="control-label" for="themeoption-about_page_second_section_icon">Icon</label>';
											echo '<input type="file" id="themeoption-about_page_second_section_icon" name="about_page_second_section_icon">';
										echo '</div>';
										echo '<div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">';
											echo '<label class="control-label" for="themeoption-about_page_second_section_title">Title</label>';
											echo '<input type="text" id="themeoption-about_page_second_section_title" class="form-control" name="about_page_second_section_title" value="'.$about_page_second_section_title.'"/>';
										echo '</div>';
										echo '<div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">';
											echo '<label class="control-label" for="themeoption-about_page_second_section_subtitle">Sub Title</label>';
											echo '<input type="text" id="themeoption-about_page_second_section_subtitle" class="form-control" name="about_page_second_section_subtitle" value="'.$about_page_second_section_subtitle.'"/>';
										echo '</div>';
										echo '<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">';
											echo '<label class="control-label" for="themeoption-about_page_second_section_content">Content</label>';
											echo '<textarea id="themeoption-about_page_second_section_content" class="form-control" name="about_page_second_section_content" rows="5">'.$about_page_second_section_content.'</textarea>';
										echo '</div>';
									?>
								</div>
							</div>
						</div>
						<div class="form-group mt10">
							<button type="submit" class="btn btn-success">Save</button>
						</div>
					</form>
				</div>
	</div>
</div>
<?php 
$this->registerCss("
	.mt10{
		margin-top:10px;
	}
");
?>