<?php

namespace backend\controllers;

use Yii;
use common\models\Room;
use common\models\Facility;
use common\models\Order;
use common\models\OrderComponent;
use common\models\OrderComponentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * OrderComponentController implements the CRUD actions for OrderComponent model.
 */
class OrderComponentController extends Controller
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
     * Lists all OrderComponent models.
     * @return mixed
     */
    public function actionIndex($id)
    {
		$orderModel = $this->findOrderModel($id);
		
        $searchModel = new OrderComponentSearch();
		$searchModel->order_id = $orderModel->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderComponent model.
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
     * Creates a new OrderComponent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
		$orderModel = $this->findOrderModel($id);
		
        $model = new OrderComponent();
		$model->order_id = $orderModel->id;
		
		$roomModels = Room::find()->all();
		$rooms = [];
		foreach($roomModels as $room){
			$rooms[$room->id] = $room->name;
		}
		
		$facilityModels = Facility::find()->all();
		$facilities = [];
		foreach($facilityModels as $facility){
			$facilities[$facility->id] = $facility->name;
		}

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'rooms' => $rooms,
            'facilities' => $facilities,
        ]);
    }

    /**
     * Updates an existing OrderComponent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

		$roomModels = Room::find()->all();
		$rooms = [];
		foreach($roomModels as $room){
			$rooms[$room->id] = $room->name;
		}
		
		$facilityModels = Facility::find()->all();
		$facilities = [];
		foreach($facilityModels as $facility){
			$facilities[$facility->id] = $facility->name;
		}
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'rooms' => $rooms,
            'facilities' => $facilities,
        ]);
    }

    /**
     * Deletes an existing OrderComponent model.
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
     * Finds the OrderComponent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrderComponent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrderComponent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrderComponent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findOrderModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested order does not exist.');
    }
}
