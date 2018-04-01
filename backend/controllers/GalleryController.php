<?php

namespace backend\controllers;

use Yii;
use common\models\Room;
use common\models\Facility;
use common\models\RoomType;
use common\models\FacilityType;
use common\models\Gallery;
use common\models\GalleryMediaSearch;
use common\models\GallerySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends Controller
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
     * Lists all Gallery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gallery model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
		$model = $this->findModel($id);
        $searchModel = new GalleryMediaSearch();
		$searchModel->gallery_id = $model->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Gallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($type=null)
    {
        $model = new Gallery();
		
		if($type){
			if(!array_key_exists($type, Gallery::$types)){
				throw new NotFoundHttpException('Gallery type not found.');
			}
			$model->type = $type;
		}
		
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
		
		$roomTypeModels = RoomType::find()->all();
		$roomTypes = [];
		foreach($roomTypeModels as $roomType){
			$roomTypes[$roomType->id] = $roomType->name;
		}
		
		$facilityTypeModels = FacilityType::find()->all();
		$facilityTypes = [];
		foreach($facilityTypeModels as $facilityType){
			$facilityTypes[$facilityType->id] = $facilityType->name;
		}

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'rooms' => $rooms,
            'facilities' => $facilities,
            'roomTypes' => $roomTypes,
            'facilityTypes' => $facilityTypes,
        ]);
    }

    /**
     * Updates an existing Gallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$type=null)
    {
        $model = $this->findModel($id);

		if($type){
			if(!array_key_exists($type, Gallery::$types)){
				throw new NotFoundHttpException('Gallery type not found.');
			}
			$model->type = $type;
		}
		
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
		
		$roomTypeModels = RoomType::find()->all();
		$roomTypes = [];
		foreach($roomTypeModels as $roomType){
			$roomTypes[$roomType->id] = $roomType->name;
		}
		
		$facilityTypeModels = FacilityType::find()->all();
		$facilityTypes = [];
		foreach($facilityTypeModels as $facilityType){
			$facilityTypes[$facilityType->id] = $facilityType->name;
		}
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'rooms' => $rooms,
            'facilities' => $facilities,
            'roomTypes' => $roomTypes,
            'facilityTypes' => $facilityTypes,
        ]);
    }

    /**
     * Deletes an existing Gallery model.
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
     * Finds the Gallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
