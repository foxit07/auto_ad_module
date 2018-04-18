<?php

namespace frontend\modules\ads\models\entity\advert;

use Yii;
use frontend\modules\ads\models\entity\car\Car;
use frontend\modules\ads\models\entity\image\Image;
use frontend\modules\ads\models\entity\model\Model;
use frontend\modules\ads\models\entity\mark\Mark;
use frontend\modules\ads\models\entity\option\Option;
use frontend\modules\ads\models\entity\OptionsCar;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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

    public function getCars()
    {
        return $this->hasOne(Car::className(),['id' => 'id_car']);
    }

    public function getImages()
    {
        return $this->hasMany(Image::className(),['id_advert' => 'id']);
    }

    public function saveData($request)
    {
        $car = new Car();

        $car->load($request);
        $car->id_mark = $request['Mark']['name'];
        $car->id_model = $request['Model']['name'];
        $car->save();

        $key = null;
        $val = null;
        $a = $car->id;

        $optionsCar = new OptionsCar();

        foreach ($request['Option']['name'] as  $value){
            $a = function ($value){
                return $value;
            };
            $key[] = $a($value);
            $val[] = $a($car->id);

            $optionsCar->id_option = $a($value);
            $optionsCar->id_car = $car->id;
            $optionsCar->save();
        }


        $this->load($request);
        $this->created_at = $t = time();
        $this->updated_at = $t;
        $this->id_car = $car->id;
        $this->save();

    }
}
