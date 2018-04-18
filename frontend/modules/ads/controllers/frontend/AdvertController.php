<?php

namespace frontend\modules\ads\controllers\frontend;

use Yii;
use frontend\modules\ads\models\entity\advert\Advert;
use frontend\modules\ads\models\entity\car\Car;
use frontend\modules\ads\models\entity\mark\Mark;
use frontend\modules\ads\models\entity\model\Model;
use frontend\modules\ads\models\entity\option\Option;
use yii\helpers\ArrayHelper;
use frontend\modules\ads\models\entity\advert\AdvertSearch;
use yii\web\Response;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdvertController implements the CRUD actions for Advert model.
 */
class AdvertController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'destroy' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {

        $adverts = Advert::find()->with('cars')->all();

        return $this->render('index',[
            'adverts' =>  $adverts,
        ]);
    }

    public function actionCreate()
    {

        if(Yii::$app->request->isPost){
            $request = Yii::$app->request->post();
            $this->actionStore($request);
        }

        $advert = new Advert();
        $car = new Car();
        $mark = new Mark; //::find()->all();
        $model = new Model();
        $options = new Option();

        $itemsOptions = Option::find()->all();

        $items = ArrayHelper::map(Mark::find()->all(),'id','name');
        $itemOptions = ArrayHelper::map( $itemsOptions,'id','name');


        return $this->render('create',[
            'advert' => $advert,
            'car' => $car,
            'items' => $items,
            'mark' => $mark,
            'model' => $model,
            'options' => $options,
            'itemOptions' => $itemOptions,
        ]);
    }


    public function actionModels() {

        Yii::$app->response->format = Response::FORMAT_JSON;
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('key');
            $models = Model::find()->where(['id_mark' => $id])->select('id, name')->all();
            return $models;
        }

    }

    public function actionStore($request)
    {
      $advert = new Advert();
      $advert->saveData($request);

      return $this->redirect('/frontend/index');
    }


    public function actionEdit($id)
    {

    }


    public function actionUpdate($id)
    {

    }


    public function actionDestoy($id)
    {

    }


    protected function findModel($id)
    {
        if (($model = Advert::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
