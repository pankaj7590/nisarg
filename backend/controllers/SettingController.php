<?php

namespace backend\controllers;

use Yii;
use common\models\Setting;
use common\models\SettingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\components\MediaTypes;
use common\components\MediaUploader;
use yii\web\UploadedFile;

/**
 * SettingController implements the CRUD actions for Setting model.
 */
class SettingController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Setting models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SettingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Setting model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Setting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Setting();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Setting model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Setting model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Lists all Theme Setting models.
     * @return mixed
     */
    public function actionThemeOptions()
    {
        $searchModel = new SettingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		//header options
		$headerOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_HEADER])->all();
		$headerOptions = [];
		foreach($headerOptionModels as $model){
			$headerOptions[$model->name] = $model;
		}
		//footer options
		$footerOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_FOOTER])->all();
		$footerOptions = [];
		foreach($footerOptionModels as $model){
			$footerOptions[$model->name] = $model;
		}
		// echo "<pre>";print_r($footerOptions);exit;
		//home page options
		$homePageOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_HOME])->all();
		$homePageOptions = [];
		foreach($homePageOptionModels as $model){
			$homePageOptions[$model->name] = $model;
		}
		//about page options
		$aboutPageOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_ABOUT])->all();
		$aboutPageOptions = [];
		foreach($aboutPageOptionModels as $model){
			$aboutPageOptions[$model->name] = $model;
		}
		if(Yii::$app->request->post()){
			$sent_options = Yii::$app->request->post();
			// echo "<pre>";print_r($sent_options);exit;
			
			//SAVING HEADER OPTIONS
			$file = UploadedFile::getInstanceByName('menu_bar_logo');
			if ($file != null && !$file->getHasError()) {
				$type = MediaTypes::THEME_OPTION;
				$mediaDetails = MediaUploader::uploadFiles($file, $type);
				if ($mediaDetails) {
					$menu_bar_logo_model = Setting::findOne(['name' => 'menu_bar_logo']);
					if(!$menu_bar_logo_model->default_value){
						$menu_bar_logo_model->default_value = strval($mediaDetails['media_id']);
					}
					$menu_bar_logo_model->value = strval($mediaDetails['media_id']);
					$menu_bar_logo_model->save();
				}
			}
			
			//SOCIAL MEDIA LINKS
			$twitter = $sent_options['twitter'];
			$twitter_model = Setting::findOne(['name' => 'twitter']);
			if($twitter_model){
				if(!$twitter_model->default_value){
					$twitter_model->default_value = $twitter;
				}
				$twitter_model->value = $twitter;
				$twitter_model->save();
			}
			$gplus = $sent_options['gplus'];
			$gplus_model = Setting::findOne(['name' => 'gplus']);
			if($gplus_model){
				if(!$gplus_model->default_value){
					$gplus_model->default_value = $gplus;
				}
				$gplus_model->value = $gplus;
				$gplus_model->save();
			}
			$instagram = $sent_options['instagram'];
			$instagram_model = Setting::findOne(['name' => 'instagram']);
			if($instagram_model){
				if(!$instagram_model->default_value){
					$instagram_model->default_value = $instagram;
				}
				$instagram_model->value = $instagram;
				$instagram_model->save();
			}
			$facebook = $sent_options['facebook'];
			$facebook_model = Setting::findOne(['name' => 'facebook']);
			if($facebook_model){
				if(!$facebook_model->default_value){
					$facebook_model->default_value = $facebook;
				}
				$facebook_model->value = $facebook;
				$facebook_model->save();
			}
			$pinterest = $sent_options['pinterest'];
			$pinterest_model = Setting::findOne(['name' => 'pinterest']);
			if($pinterest_model){
				if(!$pinterest_model->default_value){
					$pinterest_model->default_value = $pinterest;
				}
				$pinterest_model->value = $pinterest;
				$pinterest_model->save();
			}
			
			//FOOTER OPTIONS
			$footer_copyright = $sent_options['footer_copyright'];
			$footer_copyright_model = Setting::findOne(['name' => 'footer_copyright']);
			if($footer_copyright_model){
				if(!$footer_copyright_model->default_value){
					$footer_copyright_model->default_value = $footer_copyright;
				}
				$footer_copyright_model->value = $footer_copyright;
				$footer_copyright_model->save();
			}
			$file = UploadedFile::getInstanceByName('footer_icon');
			if ($file != null && !$file->getHasError()) {
				$type = MediaTypes::THEME_OPTION;
				$mediaDetails = MediaUploader::uploadFiles($file, $type);
				if ($mediaDetails) {
					$footer_icon_model = Setting::findOne(['name' => 'footer_icon']);
					if(!$footer_icon_model->default_value){
						$footer_icon_model->default_value = strval($mediaDetails['media_id']);
					}
					$footer_icon_model->value = strval($mediaDetails['media_id']);
					$footer_icon_model->save();
				}
			}
			
			//SAVING HOME PAGE SLIDER IMAGES
			$slider_images = UploadedFile::getInstancesByName('slider_images');
			$sliderimages = [];
			foreach ($slider_images as $k => $v) {
				if ($v != null && !$v->getHasError()) {
					$type = MediaTypes::THEME_OPTION;
					$mediaDetails = MediaUploader::uploadFiles($v, $type);
					if ($mediaDetails) {
						$sliderimages[] = $mediaDetails['media_id'];
					}
				}
			}
			if(count($sliderimages)){
				$main_slider_images_model = Setting::findOne(['name' => 'slider_images']);
				if(!$main_slider_images_model->default_value){
					$main_slider_images_model->default_value = json_encode($sliderimages);
				}
				$main_slider_images_model->value = json_encode($sliderimages);
				$main_slider_images_model->save();
			}
			
			//HOME PAGE FEATURE SECTION
			for($i=1;$i<=3;$i++){
				$file = UploadedFile::getInstanceByName('feature_image_'.$i);
				if ($file != null && !$file->getHasError()) {
					$type = MediaTypes::THEME_OPTION;
					$mediaDetails = MediaUploader::uploadFiles($file, $type);
					if ($mediaDetails) {
						$feature_image_model = Setting::findOne(['name' => 'feature_image_'.$i]);
						if(!$feature_image_model->default_value){
							$feature_image_model->default_value = strval($mediaDetails['media_id']);
						}
						$feature_image_model->value = strval($mediaDetails['media_id']);
						$feature_image_model->save();
					}
				}
				
				$feature_title = $sent_options['feature_title_'.$i];
				$feature_title_model = Setting::findOne(['name' => 'feature_title_'.$i]);
				if($feature_title_model){
					if(!$feature_title_model->default_value){
						$feature_title_model->default_value = $feature_title;
					}
					$feature_title_model->value = $feature_title;
					$feature_title_model->save();
				}
			}
			
			//HOME PAGE WELCOME SECTION
			$welcome_title = $sent_options['welcome_title'];
			$welcome_title_model = Setting::findOne(['name' => 'welcome_title']);
			if($welcome_title_model){
				if(!$welcome_title_model->default_value){
					$welcome_title_model->default_value = $welcome_title;
				}
				$welcome_title_model->value = $welcome_title;
				$welcome_title_model->save();
			}
			$welcome_subtitle = $sent_options['welcome_subtitle'];
			$welcome_subtitle_model = Setting::findOne(['name' => 'welcome_subtitle']);
			if($welcome_subtitle_model){
				if(!$welcome_subtitle_model->default_value){
					$welcome_subtitle_model->default_value = $welcome_subtitle;
				}
				$welcome_subtitle_model->value = $welcome_subtitle;
				$welcome_subtitle_model->save();
			}
			$welcome_button_text = $sent_options['welcome_button_text'];
			$welcome_button_text_model = Setting::findOne(['name' => 'welcome_button_text']);
			if($welcome_button_text_model){
				if(!$welcome_button_text_model->default_value){
					$welcome_button_text_model->default_value = $welcome_button_text;
				}
				$welcome_button_text_model->value = $welcome_button_text;
				$welcome_button_text_model->save();
			}
			$welcome_button_link = $sent_options['welcome_button_link'];
			$welcome_button_link_model = Setting::findOne(['name' => 'welcome_button_link']);
			if($welcome_button_link_model){
				if(!$welcome_button_link_model->default_value){
					$welcome_button_link_model->default_value = $welcome_button_link;
				}
				$welcome_button_link_model->value = $welcome_button_link;
				$welcome_button_link_model->save();
			}
			$welcome_content = $sent_options['welcome_content'];
			$welcome_content_model = Setting::findOne(['name' => 'welcome_content']);
			if($welcome_content_model){
				if(!$welcome_content_model->default_value){
					$welcome_content_model->default_value = $welcome_content;
				}
				$welcome_content_model->value = $welcome_content;
				$welcome_content_model->save();
			}
			
			//SAVING HOME PAGE LOCALIZATION IMAGES
			$localization_images = UploadedFile::getInstancesByName('localization_images');
			$localizationimages = [];
			foreach ($localization_images as $k => $v) {
				if ($v != null && !$v->getHasError()) {
					$type = MediaTypes::THEME_OPTION;
					$mediaDetails = MediaUploader::uploadFiles($v, $type);
					if ($mediaDetails) {
						$localizationimages[] = $mediaDetails['media_id'];
					}
				}
			}
			if(count($localizationimages)){
				$localization_image_model = Setting::findOne(['name' => 'localization_images']);
				if(!$localization_image_model->default_value){
					$localization_image_model->default_value = json_encode($localizationimages);
				}
				$localization_image_model->value = json_encode($localizationimages);
				$localization_image_model->save();
			}
			$localization_title = $sent_options['localization_title'];
			$localization_title_model = Setting::findOne(['name' => 'localization_title']);
			if($localization_title_model){
				if(!$localization_title_model->default_value){
					$localization_title_model->default_value = $localization_title;
				}
				$localization_title_model->value = $localization_title;
				$localization_title_model->save();
			}
			
			//HOME PAGE SERVICES SECTION
			$services_title = $sent_options['services_title'];
			$services_title_model = Setting::findOne(['name' => 'services_title']);
			if($services_title_model){
				if(!$services_title_model->default_value){
					$services_title_model->default_value = $services_title;
				}
				$services_title_model->value = $services_title;
				$services_title_model->save();
			}
			$services_content = $sent_options['services_content'];
			$services_content_model = Setting::findOne(['name' => 'services_content']);
			if($services_content_model){
				if(!$services_content_model->default_value){
					$services_content_model->default_value = $services_content;
				}
				$services_content_model->value = $services_content;
				$services_content_model->save();
			}
			for($i=1;$i<=6;$i++){
				$file = UploadedFile::getInstanceByName('service_icon_'.$i);
				if ($file != null && !$file->getHasError()) {
					$type = MediaTypes::THEME_OPTION;
					$mediaDetails = MediaUploader::uploadFiles($file, $type);
					if ($mediaDetails) {
						$service_icon_model = Setting::findOne(['name' => 'service_icon_'.$i]);
						if(!$service_icon_model->default_value){
							$service_icon_model->default_value = strval($mediaDetails['media_id']);
						}
						$service_icon_model->value = strval($mediaDetails['media_id']);
						$service_icon_model->save();
					}
				}
				
				$service_title = $sent_options['service_title_'.$i];
				$service_title_model = Setting::findOne(['name' => 'service_title_'.$i]);
				if($service_title_model){
					if(!$service_title_model->default_value){
						$service_title_model->default_value = $service_title;
					}
					$service_title_model->value = $service_title;
					$service_title_model->save();
				}
				
				$service_content = $sent_options['service_content_'.$i];
				$service_content_model = Setting::findOne(['name' => 'service_content_'.$i]);
				if($service_content_model){
					if(!$service_content_model->default_value){
						$service_content_model->default_value = $service_content;
					}
					$service_content_model->value = $service_content;
					$service_content_model->save();
				}
			}
			
			//HOME PAGE BOOK A ROOM SECTION
			$book_a_room_section_content = $sent_options['book_a_room_section_content'];
			$book_a_room_section_content_model = Setting::findOne(['name' => 'book_a_room_section_content']);
			if($book_a_room_section_content_model){
				if(!$book_a_room_section_content_model->default_value){
					$book_a_room_section_content_model->default_value = $book_a_room_section_content;
				}
				$book_a_room_section_content_model->value = $book_a_room_section_content;
				$book_a_room_section_content_model->save();
			}
			
			//MAP OPTIONS
			$map_address = $sent_options['map_address'];
			$map_address_model = Setting::findOne(['name' => 'map_address']);
			if($map_address_model){
				if(!$map_address_model->default_value){
					$map_address_model->default_value = $map_address;
				}
				$map_address_model->value = $map_address;
				$map_address_model->save();
			}
			$file = UploadedFile::getInstanceByName('map_address_marker');
			if ($file != null && !$file->getHasError()) {
				$type = MediaTypes::THEME_OPTION;
				$mediaDetails = MediaUploader::uploadFiles($file, $type);
				if ($mediaDetails) {
					$map_address_marker_model = Setting::findOne(['name' => 'map_address_marker']);
					if(!$map_address_marker_model->default_value){
						$map_address_marker_model->default_value = strval($mediaDetails['media_id']);
					}
					$map_address_marker_model->value = strval($mediaDetails['media_id']);
					$map_address_marker_model->save();
				}
			}
			
			//CONTACT OPTIONS
			$address = $sent_options['address'];
			$address_model = Setting::findOne(['name' => 'address']);
			if($address_model){
				if(!$address_model->default_value){
					$address_model->default_value = $address;
				}
				$address_model->value = $address;
				$address_model->save();
			}
			$phone = $sent_options['phone'];
			$phone_model = Setting::findOne(['name' => 'phone']);
			if($phone_model){
				if(!$phone_model->default_value){
					$phone_model->default_value = $phone;
				}
				$phone_model->value = $phone;
				$phone_model->save();
			}
			$email = $sent_options['email'];
			$email_model = Setting::findOne(['name' => 'email']);
			if($email_model){
				if(!$email_model->default_value){
					$email_model->default_value = $email;
				}
				$email_model->value = $email;
				$email_model->save();
			}
			
			//ABOUT PAGE CONTENT
			$about_title = $sent_options['about_title'];
			$about_title_model = Setting::findOne(['name' => 'about_title']);
			if($about_title_model){
				if(!$about_title_model->default_value){
					$about_title_model->default_value = $about_title;
				}
				$about_title_model->value = $about_title;
				$about_title_model->save();
			}
			$about_page_content_title = $sent_options['about_page_content_title'];
			$about_page_content_title_model = Setting::findOne(['name' => 'about_page_content_title']);
			if($about_page_content_title_model){
				if(!$about_page_content_title_model->default_value){
					$about_page_content_title_model->default_value = $about_page_content_title;
				}
				$about_page_content_title_model->value = $about_page_content_title;
				$about_page_content_title_model->save();
			}
			$about_page_content_subtitle = $sent_options['about_page_content_subtitle'];
			$about_page_content_subtitle_model = Setting::findOne(['name' => 'about_page_content_subtitle']);
			if($about_page_content_subtitle_model){
				if(!$about_page_content_subtitle_model->default_value){
					$about_page_content_subtitle_model->default_value = $about_page_content_subtitle;
				}
				$about_page_content_subtitle_model->value = $about_page_content_subtitle;
				$about_page_content_subtitle_model->save();
			}
			$about_page_content_content = $sent_options['about_page_content_content'];
			$about_page_content_content_model = Setting::findOne(['name' => 'about_page_content_content']);
			if($about_page_content_content_model){
				if(!$about_page_content_content_model->default_value){
					$about_page_content_content_model->default_value = $about_page_content_content;
				}
				$about_page_content_content_model->value = $about_page_content_content;
				$about_page_content_content_model->save();
			}
			$about_page_second_section_title = $sent_options['about_page_second_section_title'];
			$about_page_second_section_title_model = Setting::findOne(['name' => 'about_page_second_section_title']);
			if($about_page_second_section_title_model){
				if(!$about_page_second_section_title_model->default_value){
					$about_page_second_section_title_model->default_value = $about_page_second_section_title;
				}
				$about_page_second_section_title_model->value = $about_page_second_section_title;
				$about_page_second_section_title_model->save();
			}
			$about_page_second_section_subtitle = $sent_options['about_page_second_section_subtitle'];
			$about_page_second_section_subtitle_model = Setting::findOne(['name' => 'about_page_second_section_subtitle']);
			if($about_page_second_section_subtitle_model){
				if(!$about_page_second_section_subtitle_model->default_value){
					$about_page_second_section_subtitle_model->default_value = $about_page_second_section_subtitle;
				}
				$about_page_second_section_subtitle_model->value = $about_page_second_section_subtitle;
				$about_page_second_section_subtitle_model->save();
			}
			$about_page_second_section_content = $sent_options['about_page_second_section_content'];
			$about_page_second_section_content_model = Setting::findOne(['name' => 'about_page_second_section_content']);
			if($about_page_second_section_content_model){
				if(!$about_page_second_section_content_model->default_value){
					$about_page_second_section_content_model->default_value = $about_page_second_section_content;
				}
				$about_page_second_section_content_model->value = $about_page_second_section_content;
				$about_page_second_section_content_model->save();
			}
			$file = UploadedFile::getInstanceByName('about_page_image_1');
			if ($file != null && !$file->getHasError()) {
				$type = MediaTypes::THEME_OPTION;
				$mediaDetails = MediaUploader::uploadFiles($file, $type);
				if ($mediaDetails) {
					$mediaModel = Setting::findOne(['name' => 'about_page_image_1']);
					if(!$mediaModel->default_value){
						$mediaModel->default_value = strval($mediaDetails['media_id']);
					}
					$mediaModel->value = strval($mediaDetails['media_id']);
					$mediaModel->save();
				}
			}
			$file = UploadedFile::getInstanceByName('about_page_image_2');
			if ($file != null && !$file->getHasError()) {
				$type = MediaTypes::THEME_OPTION;
				$mediaDetails = MediaUploader::uploadFiles($file, $type);
				if ($mediaDetails) {
					$mediaModel = Setting::findOne(['name' => 'about_page_image_2']);
					if(!$mediaModel->default_value){
						$mediaModel->default_value = strval($mediaDetails['media_id']);
					}
					$mediaModel->value = strval($mediaDetails['media_id']);
					$mediaModel->save();
				}
			}
			$file = UploadedFile::getInstanceByName('about_page_second_section_icon');
			if ($file != null && !$file->getHasError()) {
				$type = MediaTypes::THEME_OPTION;
				$mediaDetails = MediaUploader::uploadFiles($file, $type);
				if ($mediaDetails) {
					$mediaModel = Setting::findOne(['name' => 'about_page_second_section_icon']);
					if(!$mediaModel->default_value){
						$mediaModel->default_value = strval($mediaDetails['media_id']);
					}
					$mediaModel->value = strval($mediaDetails['media_id']);
					$mediaModel->save();
				}
			}
			
			
			return $this->redirect(['theme-options']);
		}

        return $this->render('theme_options', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'headerOptions' => $headerOptions,
            'footerOptions' => $footerOptions,
            'homePageOptions' => $homePageOptions,
            'contactPageOptions' => $contactPageOptions,
            'aboutPageOptions' => $aboutPageOptions,
            'schedulePageOptions' => $schedulePageOptions,
        ]);
    }

    /**
     * Finds the Setting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Setting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Setting::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
