<?php

namespace backend\controllers;

use Yii;
use common\models\Room;
use common\models\RoomType;
use common\models\RoomSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\components\MediaUploader;

/**
 * RoomController implements the CRUD actions for Room model.
 */
class RoomController extends Controller
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
     * Lists all Room models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RoomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Room model.
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
     * Creates a new Room model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($type=null)
    {
        $model = new Room();
		if($type){
			$roomTypeModel = RoomType::findOne($type);
			if(!$roomTypeModel){
				throw new NotFoundHttpException('Room type not found.');
			}
			if($roomTypeModel->coverImage){
				$duplicatedFile = MediaUploader::duplicateFile($roomTypeModel->coverImage->file_name, $roomTypeModel->coverImage);
				$model->cover_image = $duplicatedFile['media_id'];
			}
			$model->name = $roomTypeModel->name;
			$model->charges = $roomTypeModel->charges;
			$model->occupancy = $roomTypeModel->occupancy;
			$model->beds = $roomTypeModel->beds;
			$model->description = $roomTypeModel->description;
			$model->type = $roomTypeModel->id;
		}

		$roomTypeModels = RoomType::find()->all();
		$roomTypes = [];
		foreach($roomTypeModels as $roomType){
			$roomTypes[$roomType->id] = $roomType->name;
		}
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'roomTypes' => $roomTypes,
        ]);
    }

    /**
     * Updates an existing Room model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

		if($type){
			$roomTypeModel = RoomType::findOne($type);
			if(!$roomTypeModel){
				throw new NotFoundHttpException('Room type not found.');
			}
			if($roomTypeModel->coverImage){
				$duplicatedFile = MediaUploader::duplicateFile($roomTypeModel->coverImage->file_name, $roomTypeModel->coverImage);
				$model->cover_image = $duplicatedFile['media_id'];
			}
			$model->name = $roomTypeModel->name;
			$model->charges = $roomTypeModel->charges;
			$model->occupancy = $roomTypeModel->occupancy;
			$model->beds = $roomTypeModel->beds;
			$model->description = $roomTypeModel->description;
			$model->type = $roomTypeModel->id;
		}
		
		$roomTypeModels = RoomType::find()->all();
		$roomTypes = [];
		foreach($roomTypeModels as $roomType){
			$roomTypes[$roomType->id] = $roomType->name;
		}
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'roomTypes' => $roomTypes,
        ]);
    }

    /**
     * Deletes an existing Room model.
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
     * Finds the Room model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Room the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Room::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
