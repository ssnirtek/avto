<?php

namespace app\models;

use app\models\CarClasses;
use app\models\CarClassesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CarClassesController implements the CRUD actions for CarClasses model.
 */
class CarClassesController extends Controller
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
     * Lists all CarClasses models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CarClassesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CarClasses model.
     * @param int $id_car_classes Id Car Classes
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_car_classes)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_car_classes),
        ]);
    }

    /**
     * Creates a new CarClasses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CarClasses();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_car_classes' => $model->id_car_classes]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CarClasses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_car_classes Id Car Classes
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_car_classes)
    {
        $model = $this->findModel($id_car_classes);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_car_classes' => $model->id_car_classes]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CarClasses model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_car_classes Id Car Classes
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_car_classes)
    {
        $this->findModel($id_car_classes)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CarClasses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_car_classes Id Car Classes
     * @return CarClasses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_car_classes)
    {
        if (($model = CarClasses::findOne(['id_car_classes' => $id_car_classes])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
