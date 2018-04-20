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

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
		$model = new Booking();
		$model->detachBehavior('blameable');
		$model->booking_type = Booking::TYPE_BY_CUSTOMER;
		if(!Yii::$app->user->isGuest){
			$customerModel = Yii::$app->user->identity;
			$model->name = $customerModel->name;
			$model->surname = $customerModel->surname;
			$model->phone = $customerModel->phone;
			$model->email = $customerModel->email;
			$model->customer_id = $customerModel->id;
		}
		
		$roomTypeModels = RoomType::find()->all();
		$roomTypes = [];
		foreach($roomTypeModels as $roomType){
			$roomTypes[$roomType->id] = $roomType->name;
		}
		
		$contactModel = new ContactForm();
		$contactModel->detachBehavior('blameable');
		
		$transaction = Yii::$app->db->beginTransaction();
		try{
			if ($model->load(Yii::$app->request->post())){
				if(!$model->customer_id){
					$customerModel = Customer::find()->where(['email' => $model->email])->one();
					if(!$customerModel){
						$customerModel = Customer::find()->where(['phone' => $model->phone])->one();
						if(!$customerModel){
							$customerModel = new Customer();
							$customerModel->detachBehavior('blameable');
							$customerModel->username = str_replace(' ', '', $model->name).'_'.time();
							$customerModel->name = $model->name;
							$customerModel->email = $model->email;
							$customerModel->phone = $model->phone;
							$customerModel->setPassword($customerModel->phone);
							$customerModel->generateAuthKey();
							$customerModel->save();
						}
					}
					$model->customer_id = $customerModel->id;
				}
				if($model->save()) {
					$transaction->commit();
					return $this->redirect(['view', 'id' => $model->id]);
				}
			}
		}catch(Exception $e){
			$transaction->rollBack();
			throw new ServerErrorHttpException('Something went wrong. Please try again.');
		}
		
        return $this->render('index', [
			'model' => $model,
			'contactModel' => $contactModel,
			'roomTypes' => $roomTypes,
		]);
    }

    /**
     * Displays about hotel page.
     *
     * @return mixed
     */
    public function actionAboutHotel()
    {
        return $this->render('about-hotel');
    }

    /**
     * Displays rooms page.
     *
     * @return mixed
     */
    public function actionRooms()
    {
		$totalRooms = Room::find()->count();
		$roomTypeModels = RoomType::find()->all();
		
        return $this->render('rooms', [
			'total_rooms' => $totalRooms,
			'room_type_models' => $roomTypeModels,
		]);
    }

    /**
     * Displays gallery page.
     *
     * @return mixed
     */
    public function actionGallery()
    {
        return $this->render('gallery');
    }

    /**
     * Displays booking page.
     *
     * @return mixed
     */
    public function actionBooking()
    {
        return $this->render('booking');
    }

    /**
     * Displays my account page.
     *
     * @return mixed
     */
    public function actionMyAccount()
    {
		$this->layout = "myaccount";
		
        return $this->render('my-account');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if (!$model->sendEmail(Yii::$app->params['adminEmail'])) {
				throw new ServerErrorHttpException('Email not sent.');
            }
        }
		return $this->redirect(['index']);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
