<?php

namespace backend\controllers;

use Yii;
use common\models\Membership;
use common\models\Customer;
use common\models\MembershipCustomer;
use common\models\MembershipCustomerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * MembershipCustomerController implements the CRUD actions for MembershipCustomer model.
 */
class MembershipCustomerController extends Controller
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
     * Lists all MembershipCustomer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MembershipCustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MembershipCustomer model.
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
     * Creates a new MembershipCustomer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MembershipCustomer();
		
		$membershipModels = Membership::find()->all();
		$memberships = [];
		foreach($membershipModels as $membership){
			$memberships[$membership->id] = $membership->name;
		}
		
		$customerModels = Customer::find()->all();
		$customers = [];
		foreach($customerModels as $customer){
			$customers[$customer->id] = $customer->name;
		}

        if ($model->load(Yii::$app->request->post())){
			$model->type = $model->membership->type;
			if($model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			}else{
				Yii::$app->session->setFlash('error', json_encode($model->getErrors()));
			}
        }

        return $this->render('create', [
            'model' => $model,
            'memberships' => $memberships,
            'customers' => $customers,
        ]);
    }

    /**
     * Updates an existing MembershipCustomer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

		$membershipModels = Membership::find()->all();
		$memberships = [];
		foreach($membershipModels as $membership){
			$memberships[$membership->id] = $membership->name;
		}
		
		$customerModels = Customer::find()->all();
		$customers = [];
		foreach($customerModels as $customer){
			$customers[$customer->id] = $customer->name;
		}
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'memberships' => $memberships,
            'customers' => $customers,
        ]);
    }

    /**
     * Deletes an existing MembershipCustomer model.
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
     * Finds the MembershipCustomer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MembershipCustomer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MembershipCustomer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
