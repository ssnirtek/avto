<?php

namespace app\models;

use app\models\CarBrands;
use app\models\CarBrandsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CarBrandsController implements the CRUD actions for CarBrands model.
 */
class CarBrandsController extends Controller
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
     * Lists all CarBrands models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CarBrandsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CarBrands model.
     * @param int $id_car_brands Id Car Brands
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_car_brands)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_car_brands),
        ]);
    }

    /**
     * Creates a new CarBrands model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CarBrands();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_car_brands' => $model->id_car_brands]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CarBrands model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_car_brands Id Car Brands
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_car_brands)
    {
        $model = $this->findModel($id_car_brands);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_car_brands' => $model->id_car_brands]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CarBrands model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_car_brands Id Car Brands
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_car_brands)
    {
        $this->findModel($id_car_brands)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CarBrands model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_car_brands Id Car Brands
     * @return CarBrands the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_car_brands)
    {
        if (($model = CarBrands::findOne(['id_car_brands' => $id_car_brands])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
