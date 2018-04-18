<?php

namespace frontend\modules\ads\models\entity\car;

use Yii;

/**
 * This is the model class for table "cars".
 *
 * @property int $id
 * @property int $id_mark
 * @property int $id_model
 * @property int $mileage
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mark', 'id_model', 'mileage'], 'integer'],
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
        ];
    }

    public function getMarks()
    {
        return $this->hasOne(Mark::className(),['id' => 'id_mark']);
    }

    public function getModels()
    {
        return $this->hasOne(Model::className(), ['id' => 'id_mark']);
    }

    public function getOptions()
    {
        return $this->hasMany(Option::className(), ['id' => 'id_option'])
            ->viaTable('cars_options', ['id_car' => 'id']);
    }
}
