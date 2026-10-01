<?php

namespace app\models;

use app\models\UserReports;
use app\models\UserReportsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserReportsController implements the CRUD actions for UserReports model.
 */
class UserReportsController extends Controller
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
     * Lists all UserReports models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserReportsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserReports model.
     * @param int $id_user_reports Id User Reports
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_user_reports)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_user_reports),
        ]);
    }

    /**
     * Creates a new UserReports model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UserReports();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_user_reports' => $model->id_user_reports]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserReports model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_user_reports Id User Reports
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_user_reports)
    {
        $model = $this->findModel($id_user_reports);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user_reports' => $model->id_user_reports]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserReports model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_user_reports Id User Reports
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_user_reports)
    {
        $this->findModel($id_user_reports)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserReports model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_user_reports Id User Reports
     * @return UserReports the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_user_reports)
    {
        if (($model = UserReports::findOne(['id_user_reports' => $id_user_reports])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
