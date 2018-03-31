<?php

namespace backend\controllers;

use Yii;
use common\models\Facility;
use common\models\FacilityType;
use common\models\FacilitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\components\MediaUploader;

/**
 * FacilityController implements the CRUD actions for Facility model.
 */
class FacilityController extends Controller
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
     * Lists all Facility models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FacilitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Facility model.
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
     * Creates a new Facility model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($type=null)
    {
        $model = new Facility();
		if($type){
			$facilityTypeModel = FacilityType::findOne($type);
			if(!$facilityTypeModel){
				throw new NotFoundHttpException('Facility type not found.');
			}
			if($facilityTypeModel->coverImage){
				$duplicatedFile = MediaUploader::duplicateFile($facilityTypeModel->coverImage->file_name, $facilityTypeModel->coverImage);
				$model->cover_image = $duplicatedFile['media_id'];
			}
			if($facilityTypeModel->iconImage){
				$duplicatedFile = MediaUploader::duplicateFile($facilityTypeModel->iconImage->file_name, $facilityTypeModel->iconImage);
				$model->icon_image = $duplicatedFile['media_id'];
			}
			$model->name = $facilityTypeModel->name;
			$model->charges = $facilityTypeModel->charges;
			$model->description = $facilityTypeModel->description;
			$model->type = $facilityTypeModel->id;
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
            'facilityTypes' => $facilityTypes,
        ]);
    }

    /**
     * Updates an existing Facility model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

		if($type){
			$facilityTypeModel = FacilityType::findOne($type);
			if(!$facilityTypeModel){
				throw new NotFoundHttpException('Facility type not found.');
			}
			if($facilityTypeModel->coverImage){
				$duplicatedFile = MediaUploader::duplicateFile($facilityTypeModel->coverImage->file_name, $facilityTypeModel->coverImage);
				$model->cover_image = $duplicatedFile['media_id'];
			}
			if($facilityTypeModel->iconImage){
				$duplicatedFile = MediaUploader::duplicateFile($facilityTypeModel->iconImage->file_name, $facilityTypeModel->iconImage);
				$model->icon_image = $duplicatedFile['media_id'];
			}
			$model->name = $facilityTypeModel->name;
			$model->charges = $facilityTypeModel->charges;
			$model->description = $facilityTypeModel->description;
			$model->type = $facilityTypeModel->id;
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
            'facilityTypes' => $facilityTypes,
        ]);
    }

    /**
     * Deletes an existing Facility model.
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
     * Finds the Facility model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Facility the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Facility::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
