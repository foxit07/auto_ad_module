<?php

namespace frontend\modules\ads\models\entity\option;

use Yii;

/**
 * This is the model class for table "options".
 *
 * @property int $id
 * @property string $name
 */
class Option extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public function getCars()
    {
        return $this->hasMany(Car::className(), ['id' => 'id_car'])
            ->viaTable('cars_options', ['id_option' => 'id']);
    }
}
