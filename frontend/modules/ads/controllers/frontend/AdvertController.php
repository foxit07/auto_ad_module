<?php

namespace frontend\modules\ads\controllers\frontend;

use frontend\modules\ads\models\entity\OptionsCar;
use Yii;
use frontend\modules\ads\models\entity\advert\Advert;
use frontend\modules\ads\models\entity\car\Car;
use frontend\modules\ads\models\entity\mark\Mark;
use frontend\modules\ads\models\entity\model\Model;
use frontend\modules\ads\models\entity\option\Option;
use yii\helpers\ArrayHelper;
use frontend\modules\ads\models\entity\image\Image;
use yii\web\Response;
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

        $adverts = Advert::find()->with(['car','images'])->all();
        return $this->render('index',[
            'adverts' =>  $adverts,
        ]);
    }

    public function actionCreate()
    {
        $itemsOptions = Option::find()->all();
        $items = ArrayHelper::map(Mark::find()->all(),'id','name');
        $itemOptions = ArrayHelper::map( $itemsOptions,'id','name');

        return $this->render('create',[
            'advert' => new Advert(),
            'car' =>  new Car(),
            'mark' => new Mark(),
            'model' => new Model(),
            'options' => new Option(),
            'image' => new Image(),
            'items' => $items,
            'itemOptions' => $itemOptions,
        ]);
    }


    public function actionStore()
    {
      $advert = new Advert();

      if(Yii::$app->request->isPost){
          $request = Yii::$app->request->post();
          $advert->saveAdvert($request);
      }

      return $this->redirect('/frontend/advert');
    }


    public function actionEdit($id)
    {

      /*  $advert = Advert::findOne($id);
        $items = ArrayHelper::map(Mark::find()->all(),'id','name');
        $itemOptions = ArrayHelper::map( Option::find()->all(),'id','name');
        $itemsCarOptions = ArrayHelper::map($advert->car->options,'id','name');

        return $this->render('edit',[
            'advert' =>  Advert::findOne($id),
            'car' =>  new Car(),
            'mark' => new Mark(),
            'model' => new Model(),
            'options' => new Option(),
            'image' => new Image(),
            'items' => $items,
            'itemOptions' => $itemOptions,
            'itemsCarOptions' => $itemsCarOptions,
        ]);*/
    }


    public function actionUpdate($id)
    {

    }


    public function actionDestroy()
    {
        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $advert = Advert::findOne($id);
            $idCar = $advert->car->id;
            OptionsCar::deleteAll(['id_car' => $idCar]);
            Car::findOne($idCar)->delete();
            Image::deleteAll(['id_advert' => $id]);
            $advert->delete();

            return $this->redirect('/frontend/advert');
        }
    }


    public function actionModels() {

        Yii::$app->response->format = Response::FORMAT_JSON;
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('key');
            $models = Model::find()->where(['id_mark' => $id])->select('id, name')->all();
            return $models;
        }

    }
}
