<?php

namespace frontend\controllers;

use Yii;
use common\models\Booking;
use common\models\BookingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\RoomType;
use common\models\Customer;

/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends Controller
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
     * Lists all Booking models.
     * @return mixed
     */
    public function actionIndex()
    {
		$this->layout = 'myaccount';
		
        $searchModel = new BookingSearch();
		$searchModel->customer_id = Yii::$app->user->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Booking model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
		$this->layout = 'myaccount';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Booking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
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

        return $this->render('create', [
            'model' => $model,
			'roomTypes' => $roomTypes,
        ]);
    }

    /**
     * Updates an existing Booking model.
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
     * Deletes an existing Booking model.
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
     * Cancels an existing Booking model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCancel($id)
    {
        $model = $this->findModel($id);
		$model->status = Booking::STATUS_CANCELLED;
		$model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Booking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Booking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Booking::findOne($id)) !== null) {
			$model->detachBehavior('blameable');
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
