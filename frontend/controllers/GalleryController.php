<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\ServerErrorHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Booking;
use common\models\RoomType;
use common\models\Customer;
use common\models\Room;
use common\models\Gallery;
use common\models\GallerySearch;

/**
 * Gallery controller
 */
class GalleryController extends Controller
{
	public function actionView($id){
		$model = $this->findModel($id);
		return $this->render('view', [
			'model' => $model,
		]);
	}
	
	public function findModel($id){
		if($model = Gallery::findOne($id)){
			return $model;
		}
		throw new NotFoundHttpException('Gallery not found.');
	}
}