<?php

namespace app\models;

use app\models\RentalRequests;
use app\models\RentalRequestsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RentalRequestsController implements the CRUD actions for RentalRequests model.
 */
class RentalRequestsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all RentalRequests models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RentalRequestsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RentalRequests model.
     * @param int $id_rental_requests Id Rental Requests
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_rental_requests)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_rental_requests),
        ]);
    }

    /**
     * Creates a new RentalRequests model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RentalRequests();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_rental_requests' => $model->id_rental_requests]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RentalRequests model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_rental_requests Id Rental Requests
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_rental_requests)
    {
        $model = $this->findModel($id_rental_requests);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_rental_requests' => $model->id_rental_requests]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RentalRequests model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_rental_requests Id Rental Requests
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_rental_requests)
    {
        $this->findModel($id_rental_requests)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RentalRequests model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_rental_requests Id Rental Requests
     * @return RentalRequests the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_rental_requests)
    {
        if (($model = RentalRequests::findOne(['id_rental_requests' => $id_rental_requests])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
