<?php

namespace backend\controllers;

use Yii;
use common\models\FacilityType;
use common\models\RoomType;
use common\models\Customer;
use common\models\Booking;
use common\models\BookingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

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
        $searchModel = new BookingSearch();
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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Booking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($customer=null)
    {
        $model = new Booking();
		if($customer){
			$customerModel = Customer::findOne($customer);
			if(!$customerModel){
				throw new NotFoundHttpException('Customer not found.');
			}
			$model->name = $customerModel->name;
			$model->surname = $customerModel->surname;
			$model->email = $customerModel->email;
			$model->customer_id = $customerModel->id;
		}

		$customerModels = Customer::find()->all();
		$customers = [];
		foreach($customerModels as $customer){
			$customers[$customer->id] = ($customer->name.'('.$customer->phone.', '.$customer->email.')');
		}
		
		$facilityTypeModels = FacilityType::find()->all();
		$facilityTypes = [];
		foreach($facilityTypeModels as $facilityType){
			$facilityTypes[$facilityType->id] = $facilityType->name;
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
            'customers' => $customers,
            'facilityTypes' => $facilityTypes,
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
    public function actionUpdate($id, $customer=null)
    {
        $model = $this->findModel($id);
		$model->booking_type = Booking::TYPE_BY_STAFF;
		if($customer){
			$customerModel = Customer::findOne($customer);
			if(!$customerModel){
				throw new NotFoundHttpException('Customer not found.');
			}
			$model->name = $customerModel->name;
			$model->surname = $customerModel->surname;
			$model->email = $customerModel->email;
			$model->phone = $customerModel->phone;
			$model->customer_id = $customerModel->id;
		}

		$customerModels = Customer::find()->all();
		$customers = [];
		foreach($customerModels as $customer){
			$customers[$customer->id] = ($customer->name.'('.$customer->phone.', '.$customer->email.')');
		}
		
		$facilityTypeModels = FacilityType::find()->all();
		$facilityTypes = [];
		foreach($facilityTypeModels as $facilityType){
			$facilityTypes[$facilityType->id] = $facilityType->name;
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
					return $this->redirect(['booking/view', 'id' => $model->id]);
				}
			}
		}catch(Exception $e){
			$transaction->rollBack();
			throw new ServerErrorHttpException('Something went wrong. Please try again.');
		}

        return $this->render('update', [
            'model' => $model,
            'customers' => $customers,
            'facilityTypes' => $facilityTypes,
            'roomTypes' => $roomTypes,
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
     * Finds the Booking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Booking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Booking::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
