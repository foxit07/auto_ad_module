<?php

namespace frontend\modules\ads\models;

use Yii;

/**
 * This is the model class for table "adverts".
 *
 * @property int $id
 * @property int $id_mark
 * @property int $id_model
 * @property int $mileage
 * @property int $price
 * @property string $phone
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
            [['id_mark', 'id_model', 'mileage', 'price'], 'integer'],
            [['phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_mark' => 'Id Mark',
            'id_model' => 'Id Model',
            'mileage' => 'Mileage',
            'price' => 'Price',
            'phone' => 'Phone',
        ];
    }
}
