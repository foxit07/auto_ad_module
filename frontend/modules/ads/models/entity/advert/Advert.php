<?php

namespace frontend\modules\ads\models\entity\advert;

use Yii;
use frontend\modules\ads\models\entity\car\Car;
use frontend\modules\ads\models\entity\image\Image;
use frontend\modules\ads\models\entity\OptionsCar;
use yii\web\UploadedFile;

/**
 * This is the model class for table "adverts".
 *
 * @property int $id
 * @property int $id_car
 * @property int $price
 * @property string $phone
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Advert extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adverts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_car', 'price', 'status', 'created_at', 'updated_at'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['phone'], 'string', 'max' => 255],
            [['phone'], 'required'],
            [['price'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_car' => 'Id Car',
            'price' => 'Price',
            'phone' => 'Phone',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getCar()
    {
        return $this->hasOne(Car::className(),['id' => 'id_car']);
    }

    public function getImages()
    {
        return $this->hasMany(Image::className(),['id_advert' => 'id']);
    }

  /*  public function isImage()
    {
        if ($this->getImages()){
            return $this->images[0]->path;
        }

        return null;
    }*/

    public function saveAdvert($request)
    {
        $car = new Car();
        $carOptions = new OptionsCar();
        $image = new Image();

        $car->saveCar($request);
        $carOptions->saveCarOptions($request, $car);

        $this->load($request);
        $this->created_at = $t = time();
        $this->updated_at = $t;
        $this->id_car = $car->id;
        $this->save();

        $image->saveRelation($this->id);

    }

}
